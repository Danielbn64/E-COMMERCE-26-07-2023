<?php
require_once 'models/user.php';

class userController
{
	public function index()
	{
		echo "Controlador Usuarios, Acción index";
	}

	public function register()
	{
		require_once 'views/user/register.php';
	}

	public function ingresar()
	{
		require_once 'views/user/login.php';
	}

	public function validationName()
	{
		if (!isset($_POST['name'])) {
			return null;
		} else {
			$name = $_POST['name'];
			if (!empty($name) && !is_numeric($name) && !preg_match("/[0-9]/", $name)) {
				$_SESSION['error_name'] = "false";
				return true;
			} else {
				$_SESSION['error_name'] = "true";
				return false;
			}
		}
	}

	public function validationSurnames()
	{
		if (!isset($_POST['surnames'])) {
			return null;
		} else {
			$surnames = $_POST['surnames'];
			if (!empty($surnames) && !is_numeric($surnames) && !preg_match("/[0-9]/", $surnames)) {
				$_SESSION['error_surnames'] = "false";
				return true;
			} else {
				$_SESSION['error_surnames'] = "true";
				return false;
			}
		}
	}

	public function validationEmail()
	{
		if (!isset($_POST['email'])) {
			return null;
		} else {
			$email = $_POST['email'];
			if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$_SESSION['error_email'] = "false";
				return true;
			} else {
				$_SESSION['error_email'] = "true";
				return false;
			}
		}
	}

	public function validationPassword()
	{
		$validation_password = false;
		

		if (isset($_POST['password'])) {
			$password = $_POST['password'];
			
			if (strpos($password, " ")) {


				$validation_password = false;
			} else {


				$validation_password = true;
			}

			if (preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/', $password)  && strlen($password) >= 6) {


				$validation_password = true;
			} else {


				$validation_password = false;
			}
		} else {

			return null;
		}
		if(!$validation_password){

			$_SESSION['error_password'] = "true";
		}else{

			$_SESSION['error_password'] = "false";
		}
		return $validation_password;
	}

	public function save()
	{
		if (isset($_POST)) {
			$validation_password = $this->validationPassword();
			if (
				$this->validationName()
				&& $this->validationSurnames()
				&& $this->validationEmail()
				&& $validation_password
			) {

				$name = isset($_POST['name']) ? $_POST['name'] : false;
				$surnames = isset($_POST['surnames']) ? $_POST['surnames'] : false;
				$email = isset($_POST['email']) ? $_POST['email'] : false;
				$password = isset($_POST['password']) ? $_POST['password'] : false;

				$user = new User();
				$user->setName($name);
				$user->setSurnames($surnames);
				$user->setEmail($email);
				$user->setPassword($password);

				$save = $user->save();

				if ($save) {
					$_SESSION['register'] = "complete";
				} else {
					$_SESSION['register'] = "failed";
				}
			} else {
				$_SESSION['register'] = "failed";
			}
		} else {
			$_SESSION['register'] = "failed";
		}
		header("Location:" . base_url . 'user/register');
	}

	public function login()
	{
		if (isset($_POST)) {

			$user = new User();
			$user->setEmail($_POST['email']);
			$user->setPassword($_POST['password']);
			$identity = $user->login();

			$_SESSION['error_login'] = 'false';
			if ($identity && is_object($identity)) {
				$_SESSION['identity'] = $identity;

				if ($identity->rol == 'admin') {
					$_SESSION['admin'] = true;
				}
				
				header("Location:" . base_url);
			} else {
				$_SESSION['error_login'] = 'true';
				header("Location:" . base_url. 'user/ingresar');
			}
		}
	}

	public function logout()
	{
		if (isset($_SESSION['identity'])) {
			unset($_SESSION['identity']);
		}

		if (isset($_SESSION['admin'])) {
			unset($_SESSION['admin']);
		}
		echo "<script  type='text/javascript'>location.reload()</script>";
		header("Location:" . base_url);
	}

	public function cuenta(){
		require_once 'views/user/acount.php';
	}
}

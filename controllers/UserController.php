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

	public function save()
	{
		if (isset($_POST)) {

			$name = isset($_POST['name']) ? $_POST['name'] : false;
			$surnames = isset($_POST['surnames']) ? $_POST['surnames'] : false;
			$email = isset($_POST['email']) ? $_POST['email'] : false;
			$password = isset($_POST['password']) ? $_POST['password'] : false;

			if ($name && $surnames && $email && $password) {
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

			if ($identity && is_object($identity)) {
				$_SESSION['identity'] = $identity;

				if ($identity->rol == 'admin') {
					$_SESSION['admin'] = true;
				}
			} else {
				$_SESSION['error_login'] = 'Identificación fallida !!';
			}
		}
		header("Location:" . base_url);
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
}

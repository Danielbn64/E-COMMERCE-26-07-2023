<?php

class User
{
	private $id;
	private $name;
	private $surnames;
	private $email;
	private $password;
	private $rol;
	private $image;
	private $db;

	public function __construct()
	{
		$this->db = Database::connect();
	}

	function getId()
	{
		return $this->id;
	}

	function getName()
	{
		return $this->name;
	}

	function getSurnames()
	{
		return $this->surnames;
	}

	function getEmail()
	{
		return $this->email;
	}

	function getPassword()
	{
		return password_hash($this->db->real_escape_string($this->password), PASSWORD_BCRYPT, ['cost' => 4]);
	}

	function getRol()
	{
		return $this->rol;
	}

	function getImage()
	{
		return $this->image;
	}

	function setId($id)
	{
		$this->id = $id;
	}

	function setName($name)
	{
		$this->name = $this->db->real_escape_string($name);
	}

	function setSurnames($surnames)
	{
		$this->surnames = $this->db->real_escape_string($surnames);
	}

	function setEmail($email)
	{
		$this->email = $this->db->real_escape_string($email);
	}

	function setPassword($password)
	{
		$this->password = $password;
	}

	function setRol($rol)
	{
		$this->rol = $rol;
	}

	function setimage($image)
	{
		$this->image = $image;
	}

	public function save()
	{
		$sql = "INSERT INTO users VALUES(NULL, '{$this->getName()}', '{$this->getSurnames()}', '{$this->getEmail()}', '{$this->getPassword()}', 'user', null);";
		$save = $this->db->query($sql);

		$result = false;
		if ($save) {
			$result = true;
		}
		return $result;
	}

	public function login()
	{
		$result = false;
		$email = $this->email;
		$password = $this->password;

		// Comprobar si existe el usuario
		$sql = "SELECT * FROM users WHERE email = '$email'";
		$login = $this->db->query($sql);

		if ($login && $login->num_rows == 1) {
			$user = $login->fetch_object();

			// Verificar la contraseña
			$verify = password_verify($password, $user->password);

			if ($verify) {
				$result = $user;
			}
		}

		return $result;
	}
}

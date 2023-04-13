<?php

class Order
{
	private $id;
	private $user_id;
	private $name;
	private $surnames;
	private $province;
	private $location;
	private $address;
	private $cost;
	private $status;
	private $date;
	private $hour;

	private $db;

	public function __construct()
	{
		$this->db = Database::connect();
	}

	function getId()
	{
		return $this->id;
	}

	function getUser_id()
	{
		return $this->user_id;
	}

	function getName()
	{
		return $this->name;
	}

	function getSurnames()
	{
		return $this->surnames;
	}

	function getProvince()
	{
		return $this->province;
	}

	function getLocation()
	{
		return $this->location;
	}

	function getAddress()
	{
		return $this->address;
	}

	function getCost()
	{
		return $this->cost;
	}

	function getStatus()
	{
		return $this->status;
	}

	function getDate()
	{
		return $this->date;
	}

	function getHour()
	{
		return $this->hour;
	}

	function setId($id)
	{
		$this->id = $id;
	}

	function setUser_id($user_id)
	{
		$this->user_id = $user_id;
	}

	function setName($name)
	{
		$this->name = $name;
	}

	function setSurnames($surnames)
	{
		$this->surnames = $surnames;
	}

	function setProvince($province)
	{
		$this->province = $this->db->real_escape_string($province);
	}

	function setLocation($location)
	{
		$this->location = $this->db->real_escape_string($location);
	}

	function setAddress($address)
	{
		$this->address = $this->db->real_escape_string($address);
	}

	function setCost($cost)
	{
		$this->cost = $cost;
	}

	function setStatus($status)
	{
		$this->status = $status;
	}

	function setDate($date)
	{
		$this->date = $date;
	}

	function setHour($hour)
	{
		$this->hour = $hour;
	}

	public function getAll()
	{
		$products = $this->db->query("SELECT * FROM orders ORDER BY id DESC");
		return $products;
	}

	public function getOne()
	{
		$product = $this->db->query("SELECT * FROM orders WHERE id = {$this->getId()}");
		return $product->fetch_object();
	}

	public function getOneByUser()
	{
		$sql = "SELECT p.id, p.cost FROM orders p "
			. "WHERE p.user_id = {$this->getUser_id()} ORDER BY id DESC LIMIT 1";

		$order = $this->db->query($sql);
		return $order->fetch_object();
	}

	public function getAllByUser()
	{
		$sql = "SELECT p.* FROM orders p "
			. "WHERE p.user_id = {$this->getUser_id()} ORDER BY id DESC";

		$order = $this->db->query($sql);
		return $order;
	}

	public function getInvoiceInfo($id)
	{
		$sql = "SELECT province, location, address, date, hour, id FROM `orders`
		WHERE user_id = $id";
		$data = $this->db->query($sql);
		return $data;
	}

	public function getProductsByOrder($id)
	{
		$sql = "SELECT pr.*, lp.units FROM products pr "
			. "INNER JOIN order_line lp ON pr.id = lp.product_id "
			. "WHERE lp.order_id={$id}";

		$products = $this->db->query($sql);

		return $products;
	}

	public function save()
	{
		$sql = "INSERT INTO orders VALUES(NULL, '{$this->getUser_id()}', '{$this->getProvince()}', '{$this->getLocation()}', '{$this->getAddress()}', {$this->getCost()}, 'confirm', CURDATE(), CURTIME());";
		$save = $this->db->query($sql);

		$result = false;
		if ($save) {
			$result = true;
		}
		return $result;
	}

	public function save_line()
	{
		$sql = "SELECT LAST_INSERT_ID() as 'order';";
		$query = $this->db->query($sql);
		$order_id = $query->fetch_object()->order;
		foreach ($_SESSION['cart'] as $element) {
			$product = $element['product'];
			$insert = "INSERT INTO order_line VALUES(NULL, {$order_id}, {$product->id}, {$element['units']})";
			$save = $this->db->query($insert);
		}

		$result = false;
		if ($save) {
			$result = true;
		}
		return $result;
	}

	public function edit()
	{
		$sql = "UPDATE orders SET status='{$this->getStatus()}' ";
		$sql .= " WHERE id={$this->getId()};";

		$save = $this->db->query($sql);

		$result = false;
		if ($save) {
			$result = true;
		}
		return $result;
	}
}

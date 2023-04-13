<?php
require_once 'models/category.php';
require_once 'models/product.php';
require_once 'vendor/autoload.php';

class categoryController
{
	public function __construct()
	{
		$this->db = Database::connect();
	}

	private $db;
	public function index()
	{
		Utils::isAdmin();
		$category = new Category();
		$category = $category->getAll();

		require_once 'views/category/index.php';
	}

	public function see()
	{
		if (isset($_GET['id'])) {
			$id = $_GET['id'];

			// Conseguir categoria
			$category = new Category();
			$category->setId($id);
			$category = $category->getOne();

			// Conseguir productos:
			$product = new Product();
			$product->setCategory_id($id);
			$products = $product->getAllCategories();

			// Paginar la vista:
			$products = $this->db->query("SELECT * FROM `products` WHERE `category_id`=$id");
			$rowCount = $products->num_rows;
			$pagination = new Zebra_Pagination();
			$pagination->records($rowCount);
			$maxArticles = 12;
			$pagination->records_per_page($maxArticles);
			$page = $pagination->get_page('views/product/see.php');
			$startHere = (($page - 1) * $maxArticles);
			$notes = $this->db->query("SELECT * FROM `products` WHERE `category_id`=$id LIMIT $startHere ,$maxArticles");
		}

		require_once 'views/category/see.php';
	}

	public function create()
	{
		Utils::isAdmin();
		require_once 'views/category/create.php';
	}

	public function save()
	{
		Utils::isAdmin();
		if (isset($_POST) && isset($_POST['name'])) {
			// Guardar la categoria en bd
			$category = new Category();
			$category->setName($_POST['name']);
			$save = $category->save();
		}
		header("Location:" . base_url . "category/index");
	}
}

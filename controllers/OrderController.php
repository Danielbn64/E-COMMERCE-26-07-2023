<?php
require_once 'models/order.php';

class orderController
{
	public function make()
	{
		require_once 'views/order/make.php';
	}

	public function add()
	{
		if (isset($_SESSION['identity'])) {
			$user_id = $_SESSION['identity']->id;
			$user_name = $_SESSION['identity']->name;
			$user_name = "default";
			$user_surnames = $_SESSION['identity']->surnames;
			$user_surnames = "default";
			$province = isset($_POST['province']) ? $_POST['province'] : false;
			$location = isset($_POST['location']) ? $_POST['location'] : false;
			$address = isset($_POST['address']) ? $_POST['address'] : false;
			$stats = Utils::statsCart();
			$cost = $stats['total'];
			if ($province && $location && $address) {
				// Guardar datos en bd
				$order = new Order();
				$order->setUser_id($user_id);
				$order->setName($user_name);
				$order->setSurnames($user_surnames);
				$order->setProvince($province);
				$order->setLocation($location);
				$order->setAddress($address);
				$order->setCost($cost);
				$save = $order->save();
				$save_line = $order->save_line();
				if ($save && $save_line) {
					$_SESSION['order'] = "complete";
				} else {
					$_SESSION['order'] = "failed";
				}
			} else {
				$_SESSION['order'] = "failed";
			}
			$this->confirmed();
		} else {
			header("Location:" . base_url);
		}
	}

	public function confirmed()
	{
		if (isset($_SESSION['identity'])) {
			$identity = $_SESSION['identity'];
			$order = new Order();
			$order->setUser_id($identity->id);

			$order = $order->getOneByUser();
			$order_products = new Order();
			$products = $order_products->getProductsByOrder($order->id);

			$invoice = new Order();
			$data_invoice = $invoice->getInvoiceInfo($identity->id);
			$invoice_info = $data_invoice->fetch_object();
	
		}
		require_once 'views/order/confirmed.php';
	}

	public function my_orders()
	{
		Utils::isIdentity();
		$user_id = $_SESSION['identity']->id;
		$orders = new Order();

		// Sacar los pedidos del usuario
		$orders->setUser_id($user_id);
		$orders = $orders->getAllByUser();

		require_once 'views/order/my_orders.php';
	}

	public function detail()
	{
		Utils::isIdentity();

		if (isset($_GET['id'])) {
			$id = $_GET['id'];

			// Sacar el pedido
			$order = new Order();
			$order->setId($id);
			$order = $order->getOne();

			// Sacar los poductos
			$order_products = new Order();
			$products = $order_products->getProductsByOrder($id);

			require_once 'views/order/detail.php';
		} else {
			header('Location:' . base_url . 'order/my_orders');
		}
	}

	public function managment()
	{
		Utils::isAdmin();
		$managment = true;

		$orders = new Order();
		$orders = $orders->getAll();

		require_once 'views/order/my_orders.php';
	}

	public function status()
	{
		Utils::isAdmin();
		if (isset($_POST['order_id']) && isset($_POST['status'])) {
			// Recoger datos form
			$id = $_POST['order_id'];
			$status = $_POST['status'];

			// Upadate del pedido
			$order = new Order();
			$order->setId($id);
			$order->setStatus($status);
			$order->edit();

			header("Location:" . base_url . 'order/detalle&id=' . $id);
		} else {
			header("Location:" . base_url);
		}
	}
}
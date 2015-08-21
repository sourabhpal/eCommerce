<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// $this->output->enable_profiler();
	}

	public function index()
	{
		$this->load->model('Product');
		$products = array("products" => $this->Product->get_all_products());
		$id = array();
		$description = array();
		$price = array();
		$quantity = array();
		foreach($products as $rkey => $rvalue){
			foreach($rvalue as $v){
				array_push($id, $v['id']);
				array_push($description, $v['description']);
				array_push($price, $v['price']);
			}
		}
		$this->load->model('CartItems');
		$items = array("items" => $this->CartItems->get_all_cart_items());
		
		$numItemsInCart = 0;
		foreach ($items as $rkey => $rvalue)
		{
			foreach ($rvalue as $v)
			{
				$numItemsInCart++;
			}
		}
		
		$p = array(
			"id" => $id,
			"description" => $description,
			"price" => $price,
			"quantity" => $quantity,
			"numItemsInCart" => $numItemsInCart
			);
		$this->load->view('index', $p);
	}
	public function add_cart($id)
	{
		$quantity = $this->input->post('quantity');
		// echo $quantity;
		$product = array(
					"id" => $id,
					"quantity" => $quantity
					);
		$this->load->model('CartItems');
		$result = $this->CartItems->add_cart_item($product);
		// var_dump($product);
		$this->show_cart();
	}
	public function show_cart()
	{
		$this->load->model('CartItems');
		$items = array("items" => $this->CartItems->get_all_cart_items());
		$id = array();
		$quantity = array();
		$product_id = array();
		$description = array();
		$price = array();
		$total = 0;
		foreach ($items as $rkey => $rvalue)
		{
			foreach ($rvalue as $v)
			{
				array_push($id, $v['id']);
				array_push($quantity, $v['quantity']);
				array_push($product_id, $v['product_id']);
				array_push($description, $v['description']);
				array_push($price, $v['price']);
				$total +=  $v['quantity'] * $v['price'];
			}
		}
		$cart = array(
			"id" => $id,
			"quantity" => $quantity,
			"product_id" => $product_id,
			"description" => $description,
			"price" => $price,
			"total" => $total
			);
		// var_dump($cart);
		$this->load->view('show_cart', $cart);
	}
	public function remove_item($id)
	{
		$this->load->model('CartItems');
		$this->CartItems->delete_cart_item_by_id($id);
		$this->show_cart();
	}
}

//end of main controller
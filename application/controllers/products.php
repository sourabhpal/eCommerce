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
				array_push($quantity, $v['quantity']);
			}
		}
		$p = array(
			"id" => $id,
			"description" => $description,
			"price" => $price,
			"quantity" => $quantity
			);
		$this->load->view('index', $p);
	}
	public function add_cart($id){
		$this->load->model('Product');
		$p = $this->Product->get_product_by_id($id);
		$p('quantity') = $this->input->post('quantity');
		$this->load->view('show_cart', $p);
	}
}

//end of main controller
<?php 
	class Product extends CI_Model{
		function get_all_products()
		{
		 return $this->db->query("SELECT * FROM products")->result_array();
		}
		function get_product_by_id($product_id)
		{
		 return $this->db->query("SELECT * FROM products WHERE id = ?", array($product_id))->row_array();
		}
		function add_product($product)
		{
		 $query = "INSERT INTO products (name, description, price) VALUES (?,?,?)";
		 $values = array($product['name'], $product['description'], $product['price']); 
		 return $this->db->query($query, $values);
		} 
		function delete_product_by_id($product_id)
		{
			return $this->db->query("DELETE FROM products WHERE id = ?", $product_id);	
		}
		function update_product($product)
		{
			$query = "UPDATE products SET name = ?, description = ?, price = ? WHERE id = ?";
			$values = array($product['name'], $product['description'], $product['price'], $product['id']);
			return $this->db->query($query, $values);
		}
	}
 ?>
<?php 
	class CartItems extends CI_Model{
		function get_all_cart_items()
		{
		 return $this->db->query("SELECT cart_items.id, sum(cart_items.quantity) as quantity, cart_items.product_id, products.description, products.price 
			FROM cart_items JOIN products ON products.id = cart_items.product_id
			GROUP BY cart_items.product_id")->result_array();
		}
		function get_cart_item_by_id($id)
		{
		 return $this->db->query("SELECT * FROM cart_items WHERE product_id = ?", array($id))->row_array();
		}
		function add_cart_item($item)
		{
		 $query = "INSERT INTO cart_items (product_id, quantity) VALUES (?,?)";
		 $values = array($item['id'], $item['quantity']); 
		 return $this->db->query($query, $values);
		} 
		function delete_cart_item_by_id($id)
		{
			return $this->db->query("DELETE FROM cart_items WHERE product_id = ?", $id);	
		}
		function update_cart($item)
		{
			$query = "UPDATE cart_items SET quantity = ? WHERE product_id = ?";
			$values = array($item['quantity'], $item['id']);
			return $this->db->query($query, $values);
		}
	}
 ?>
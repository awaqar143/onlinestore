<?php
Class Order_model extends CI_model
{
	public function showOrder()
	{
		$this->db->query("select p.product_title,i.quantity,c.phone,r.grand_total  from order r,customer c, order_items i, product p");
		$query->$this->db->get();
		return $query->result_array();
	}
}
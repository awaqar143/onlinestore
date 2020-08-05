<?php 

Class Dashboard_model extends CI_Model
{
	
	public function totalOrders()
	{
		
		$query=$this->db->count_all_results('orders');
		return $query;
	}
	public function newOrders()
	{
		$this->db->where('status','');
		$query=$this->db->count_all_results('orders');
		return $query;
	}
	public function products()
	{
		$this->db->where('status','1');
		$query=$this->db->count_all_results('product');
		return $query;
	}
	public function lowQuantityProd()
	{
		$this->db->where('status','1');
		$this->db->where('product_stock <', 6);
		$query=$this->db->count_all_results('product');
		return $query;
	}
	public function subscribed()
	{
		$query=$this->db->count_all_results('subscribed');
		return $query;
	}
	public function chart()
	{
		$this->db->select('date,count(id) as id');
		$this->db->group_by('date');
		
		$query=$this->db->get('orders');
		return $query->result_array();
	}
		
	

}
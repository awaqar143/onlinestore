<?php 

Class Dashboard extends CI_model
{
	
	public function totalOrders()
	{
		
		$this->db->count_all_results('order');
		return TRUE;
	}
}
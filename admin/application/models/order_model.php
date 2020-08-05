<?php
Class order_model extends CI_model
{
	public function showOrder()
	{
	
	// $query=$this->db->query('select c.phone,r.status,r.grand_total ,c.name,r.id as cust, GROUP_CONCAT(p.product_title) as prod   from orders r,customers c,order_items i,product p where c.id=r.customer_id and r.id=i.order_id and i.product_id=p.id');

$this->db->join('customers','customers.id = orders.customer_id','left');
// $this->db->join('order_items','orders.id = order_items.order_id','left');
// $this->db->join('product','product.id = order_items.product_id','left');
 // $this->db->distinct();
$this->db->select('customers.name,customers.phone,orders.grand_total,orders.status,orders.id');
$query=$this->db->get('orders')->result_array();
 
 // print_r($query); exit;

		// $this->db->select('*');
		// $this->db->from('orders');
		// // $this->db->select('*')a;
		// $this->db->from('customers');
		// $this->db->where('id','orders_id');
		// $query=$this->db->get();

	foreach ($query as  $i=>$row) {
$this->db->where('order_items.order_id',$row['id']);			
$this->db->join('product','product.id = order_items.product_id','left');
$this->db->select('order_items.quantity,product.product_title,order_items.sub_total');

$sub_query=$this->db->get('order_items')->result_array();

$query[$i]['order_items']=$sub_query;
		
// 		print_r($query); exit;
//
		
	}
	 return ($query);
}
	// public function getcust()
	// {
	// 	$query=$this->db->get('customers');
	// 	return $query->result_array();
	// }
	// public function getorder($orId)
	// {
	// 	$this->db->where('id',$orId);
	// 	$query=$this->db->get('orders');
	// 	return $query->result_array();
	// }
	public function getorder_item($id)
	{
		//print_r($id); exit;

		$query=$this->db->query("select i.sub_total,p.product_title,i.quantity,i.order_id  from order_items i, product p where p.id=i.product_id
			and i.order_id='$id'");
		return $query->result_array();
		// $this->db->where('id',$item);
		// $query=$this->db->get('order_items');
		// return $query->result_array();
	}
	public function delete_order($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('orders');
	}
public function delete_customer($id)
{
	$this->db->select('customer_id');
	$this->db->where('id',$id);
	$result=$this->db->get('orders')->row_array();
	// print_r($result['customer_id']); exit;
	$this->db->where('id',$result['customer_id']);
	$this->db->delete('customers');

	// echo $this->db->last_query(); exit;
}
public function delete_items($id)
{
	$this->db->where('order_id',$id);
	$this->db->delete('order_items');
	// echo $this->db->last_query(); exit;
}
public function viewOrder($id)
{
	$query=$this->db->query("select o.status,o.created,o.id,o.grand_total,c.name,c.email,c.phone,c.address  from orders o, customers c where o.id='$id' and o.customer_id=c.id");
	return $query->row_array();
}
public function viewItem($id)
{
$query=$this->db->query("select i.color,i.size,i.quantity,i.sub_total,t.product_title from order_items i, product t where t.id=i.product_id and i.order_id='$id'");
return $query->result_array();
}
public function order_status()
{
	$query=$this->db->get('order_status');
	return $query->result_array();
}
public function editOrder($id,$data)
{
	$this->db->where('id',$id);
	$this->db->update('orders',$data);
	return true;
}
}
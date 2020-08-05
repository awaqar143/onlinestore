<?php
class Product_model extends CI_Model
{
	public function ShowProduct($condition=array())
	{
		// print_r($offset); exit;
		$this->db->where('status','1');
		$this->db->where('slider_status !=','1');
		$this->db->select('*');
		$this->db->from('product');
		if (array_key_exists("where", $condition)) {
			foreach ($condition['where'] as $key => $value) {
				
				$this->db->where($key,$value);
}
}
		if (array_key_exists("order_by", $condition)) {
			
			$this->db->order_by($condition['order_by']);
		}

		if (array_key_exists("id", $condition)) {


			$this->db->where('id',$condition['id']);
			$query=$this->db->get();
			$result = $query->row_array();
		}
		else {

			if (array_key_exists("start", $condition) && array_key_exists("limit", $condition)) {

				$this->db->limit($condition['limit'],$condition['start']);
			}
			elseif (!array_key_exists("start", $condition) && array_key_exists("limit", $condition)) {
				
				$this->db->limit($condition['limit']);
			}

		if (array_key_exists("returnType", $condition) && $condition['returnType'] == 'count') {

			$result=$this->db->count_all_results();
		}
		else
		{
			$query=$this->db->get();
			$result = ($query->num_rows() > 0)?$query->result_array():FALSE;


		}
		}


// print_r($result); exit;
		return $result;
	}
	public function slider()
	{
		$this->db->where('status','1');
		$this->db->where('slider_status','1');
		$res=$this->db->get('product');
		return $res->result();
	}
	public function ProductDetail($slug)
	{

		$this->db->where('slug',$slug);
		$res=$this->db->get('product');
		return $res->row_array();

	}
	public function multiImg($slug)
	{
		// print_r($slug); exit;
		$query=$this->db->query("select i.product_image from product p,product_images i where p.id=i.product_id and p.slug='$slug'");
		return $query->result_array();


		$this->db->where('product_id',$q);
		$query=$this->db->get('product_images');
		return $query->result_array();

	}
	public function ProductCategory()
	{
		$res=$this->db->get('category');
		return $res->result();
	}
	public function SearchResult($keyword)
	{
		if($keyword!="") {

		$this->db->like('product_title',$keyword);
		}
		
		$this->db->where('slider_status !=','1');
		
		$res=$this->db->get('product');
		// echo $this->db->last_query(); exit;
		return $res->result_array();

	}
	public function Search($cat_id)
	{
		
			$this->db->where('cat_id',$cat_id);
			$this->db->where('slider_status !=','1');
			$this->db->where('status','1');
		
		
		$res=$this->db->get('product');
		// echo $this->db->last_query(); exit;
		return $res->result_array();


		
	
	}
	public function getRows($id)
	{
		$this->db->select('*');
		$this->db->where('id',$id);
		$res=$this->db->get('product');
		return $res->row_array();
	}
	public function insertCustomer($custData)
	{
		$this->db->insert('customers',$custData);
		return $insert=$this->db->insert_id();	
	}
public function insertOrder($ordData)
{
	$this->db->insert('orders',$ordData);
	return $insert=$this->db->insert_id();
}
 public function insertItem($orderItem)
        {
            $insert=$this->db->insert_batch('order_items',$orderItem);
            return $insert?true:false;
        }
// public function getOrder($ordID)
// {
// 	$this->db->where('id',$ordID);
// 	$query=$this->db->get('orders');
// 	return $query->row_array();

// }
        public function quantity()
        {
        	$qty=$this->cart->contents();

		
		

		foreach ($qty as $qty) {
			$q=$qty['qty'];
			$id=$qty['id'];

			$this->db->set('product_stock','product_stock - ' .$q,false);
			$this->db->where('id',$id);
			$this->db->update('product');
			// $this->db->qurty("update product set product_stock =prodcut_stock - '$qty['qty']' where id = '$qty['id']' ");
			
		}


        }
public function getOrder($ordID)
{
	$this->db->select('o.*,c.name,c.phone,c.email,c.address');
	$this->db->from('orders as o');
	$this->db->join('customers as c','c.id=o.customer_id','left');
	$this->db->where('o.id',$ordID);
	$query=$this->db->get();
	$result= $query->row_array();

	$this->db->select('i.*,p.product_title,p.offer_price,p.id');
	$this->db->from('order_items i');
	$this->db->join('product as p','p.id=i.product_id','left');
	$this->db->where('i.order_id',$ordID);
	$query2=$this->db->get();
	 $result['items'] = ($query2->num_rows() > 0)?$query2->result_array():array();
        
       
        return !empty($result)?$result:false;



}
public function multi_size($prod_id)
{
	$this->db->where('product_id',$prod_id);
	$query=$this->db->get('product_size');
	return $query->result_array();

}
public function multi_color($prod_id)
{
	$this->db->where('product_id',$prod_id);
	$query=$this->db->get('product_color');
	return $query->result_array();

}
public function category($cat_id)
{
	$this->db->where('id',$cat_id);
	$query=$this->db->get('category');
	return $query->row_array();

}
public function subscribed($data)
{
	$query=$this->db->insert('subscribed',$data);
	return $query;
}
public function check_email_status($email)
	{
		$query=$this->db->get_where('subscribed', array('email' => $email));
		return $query->row_array();
	}
	public function contact()
	{
		$this->db->where('id','3');
		$query=$this->db->get('sco');
		return $query->row_array();
	}
	public function about()
	{
		$this->db->where('id','2');
		$query=$this->db->get('sco');
		return $query->row_array();
	}
}
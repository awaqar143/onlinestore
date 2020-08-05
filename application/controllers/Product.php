<?php
class Product extends CI_Controller
{

public function __construct()
{
	parent:: __construct();
	$this->load->model('Product_model');
	$this->load->library('cart');
	$this->load->helper('url');
	$this->load->library('session');
	$this->load->library('pagination');
	$this->perpage=4;
	// $this->load->library('ajax_pagination');
	// $this->perpage='4'; 
}

public function ProductDetail($slug)
{
		
		$id=$this->input->get('id');
		$prod_id=base64_decode($id);
		$data['multi_size']=$this->Product_model->multi_size($prod_id);
		
		$data['multi_color']=$this->Product_model->multi_color($prod_id);
		$data['productDetail']=$this->Product_model->ProductDetail($slug);

		$cat_id=$data['productDetail']['cat_id'];
		$data['cat']=$this->Product_model->category($cat_id);
		$data['multiImg']=$this->Product_model->multiImg($slug);
		// print_r($data['cat']); exit;
		$this->load->model('Product_model');
		$productCat=$this->Product_model->ProductCategory();
		
		$this->load->view('common\header',['productCat'=>$productCat]);
		// $this->load->view('common\banner');
		// $this->load->view('common\sidebar',['productCat'=>$productCat]);
		$this->load->view('Product/ProductDetail',$data);
		$this->load->view('common\footer');
}

public function ProductSearch()
{
	
	$keyword=$this->input->post('search');
	// $cat_id=$this->input->post('id');

	$this->load->model('Product_model');
	$productCat=$this->Product_model->ProductCategory();
	$ShowProduct['ShowProduct']=$this->Product_model->SearchResult($keyword);

		// print_r($search); exit;
		$this->load->view('common\header',['productCat'=>$productCat]);
		// $this->load->view('common\banner');
		// $this->load->view('common\sidebar');
		$this->load->view('Product/ProductSearch',$ShowProduct);
		$this->load->view('common\footer');
}
public function ProductSearchSide($sl)
{		
		
		// $keyword=$this->input->post('search');
		$id=$this->input->get('pid');
		$cat_id=base64_decode($id);
		

		$productCat=$this->Product_model->ProductCategory();
		$ShowProduct['ShowProduct']=$this->Product_model->Search($cat_id);
		// print_r($cat_id); exit;
		$this->load->view('common\header',['productCat'=>$productCat]);
		// $this->load->view('common\banner');
		// $this->load->view('common\sidebar',['productCat'=>$productCat]);
		$this->load->view('Product/ProductSearch',$ShowProduct);
		$this->load->view('common\footer');
}

public function addToCart()
{
	$this->load->library('form_validation');

$this->form_validation->set_rules('quantity', 'Quantity', 'less_than[6]|greater_than[0]');

if ($this->form_validation->run() == false) {

	$this->session->set_flashdata('danger', 'The maximum quantity allowed for purchase is 1 to 5.');
	header('Location: ' . $_SERVER['HTTP_REFERER']);

}
else {

	$id=$this->input->post('prodID');
	$size=$this->input->post('size');
	$color=$this->input->post('color');
	
 $product=$this->Product_model->getRows($id);
 // print_r($product); exit;
 $data= [

 	'id' => $product['id'],
 	'qty' => $this->input->post('quantity'),
 	'price' => $product['offer_price'],
 	'name' => $product['product_title'],
 	'image' => $product['product_image'],
 	'option' => array('size' => $size,'color'=>$color )



 ];
// print_r($data); exit;
$this->cart->insert($data);
 // $data['cartItems'] = $this->cart->contents();
 // print_r($data); exit;
redirect('cart/');
}
}

}
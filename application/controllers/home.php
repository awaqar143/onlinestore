<?php
class Home extends CI_Controller
{

		function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('product_model');
		$this->load->library('cart');
		$this->load->library('session');
		$this->load->library('pagination');
		$this->perpage= 12;
}


	public function index()
	{
		$data = array();
		$condition['order_by']= "id DESC";
		$condition['limit'] = $this->perpage;

		$data['ShowProduct']=$this->product_model->ShowProduct($condition);
		$slider=$this->product_model->slider();
		// print_r($slider); exit;
		$productCat=$this->product_model->ProductCategory();
		// print_r($productCat); exit;
		$this->load->view('common\header',['productCat'=>$productCat]);
		$this->load->view('common\banner',['slider'=>$slider]);
		// $this->load->view('common\sidebar');
		$this->load->view('home.php', $data);
		$this->load->view('common\footer');
	}
	public function loadMoreData()
	{

		// print_r($this->input->post());exit;
		$condition= array();

		$lastID=$this->input->post('id');
		$condition['where'] = array('id <'=>$lastID);
        $condition['returnType'] = 'count';
        $data['productNum'] = $this->product_model->ShowProduct($condition);
        $condition['returnType'] = '';
        $condition['order_by'] = "id DESC";
        $condition['limit'] = $this->perpage;
        $data['ShowProduct']=$this->product_model->ShowProduct($condition);
        $data['productLimit'] = $this->perpage;
        // print_r($data['ShowProduct']); exit;

        // $slider=$this->product_model->slider();
		$productCat=$this->product_model->ProductCategory();
        // $this->load->view('common\header',['productCat'=>$productCat]);
		// $this->load->view('common\banner',['slider'=>$slider]);
		// $this->load->view('common\sidebar');
		$this->load->view('load-more-product',$data, false);
		// $this->load->view('common\footer');


	}
	public function subscribed()
	{
	
	$email=$this->input->post('email');
	$this->form_validation->set_rules('email','Email','callback_check_email_status');
	if ($this->form_validation->run() == false) {
		
		
		$this->session->set_flashdata('dang', 'You have already Subscribed.');
	header('Location: ' . $_SERVER['HTTP_REFERER']);

	}
	else {

	$data = [

			'email' => $email,
			'ip'	=> $this->input->ip_address(),
			'date'	=> date("Y-m-d")

	];
	$res=$this->product_model->subscribed($data);

	if ($res) {
		// redirec('Home');
	$this->session->set_flashdata('succ', 'Subscribed successfully.');
	header('Location: ' . $_SERVER['HTTP_REFERER']);

}
}
	}
	public function check_email_status($email)
{
   $this->form_validation->set_message('check_email_status', 'This Email is already exists');
	$this->load->model('Product_model');
			if ($this->Product_model->check_email_status($email)) {
				return false;
			}else{
				return true;
			}

}
}

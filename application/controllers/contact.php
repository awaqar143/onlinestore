<?php 
class contact extends CI_controller
{
	public function index()
	{
		$this->load->library('cart');
		$this->load->model('Product_model');
		$productCat=$this->Product_model->ProductCategory();
		$con=$this->Product_model->contact();
		$this->load->view('common\header',['productCat'=>$productCat]);
		// $this->load->view('common\sidebar',['productCat'=>$productCat]);
		$this->load->view('contact',['con'=>$con]);
		$this->load->view('common\footer');
	}
	public function about()
	{
		$this->load->library('cart');
		$this->load->model('Product_model');
		$productCat=$this->Product_model->ProductCategory();
		$con=$this->Product_model->about();
		$this->load->view('common\header',['productCat'=>$productCat]);
		// $this->load->view('common\sidebar',['productCat'=>$productCat]);
		$this->load->view('about',['con'=>$con]);
		$this->load->view('common\footer');
	}
}
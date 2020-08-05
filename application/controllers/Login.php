<?php
class Login extends CI_Controller
{
		function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('Product_model');

		$this->load->model('Login_model');
	}
public function login()
{
	$productCat=$this->Product_model->ProductCategory();
		$this->load->view('common\header',['productCat'=>$productCat]);
		// $this->load->view('common\sidebar',['productCat'=>$productCat]);
		$this->load->view('login');
		$this->load->view('common\footer');
}
	public function userLogin()
	{
		
		$uname=$this->input->post('uname');
		$pass=$this->input->post('pass');
		$this->form_validation->set_rules('uname','User Name','required');
		$this->form_validation->set_rules('pass','Password','required');
		$this->form_validation->set_error_delimiters("<p class='text-danger'>","</P>"); 

		if($this->form_validation->run()==FALSE)

		{
			$productCat=$this->Product_model->ProductCategory();
		$this->load->view('common\header',['productCat'=>$productCat]);
		// $this->load->view('common\sidebar',['productCat'=>$productCat]);
		$this->load->view('login');
		$this->load->view('common\footer');
	}
	else {
			
			
			$reslogin=$this->Login_model->login($uname,$pass); 
			if($reslogin > 0)
			{
				
				$this->session->set_userdata('uname',$uname);
				redirect('Home');
			}
			else{
				$this->session->set_flashdata('login','Login Credential in invalid!');


				redirect('Login/login');
			}
		}
			
		}
		public function logout()
		{
			 // $this->session->sess_destroy();
			$this->session->unset_userdata('uname');
			redirect('home/index');
		}
	}

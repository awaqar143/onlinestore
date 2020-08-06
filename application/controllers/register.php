<?php
class Register extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('Product_model');
		

	}

	public function index()
	{
		
		$productCat=$this->Product_model->ProductCategory();
		$this->load->view('common\header',['productCat'=>$productCat]);
		// $this->load->view('common\sidebar',['productCat'=>$productCat]);
		$this->load->view('register');
		$this->load->view('common\footer');
	}

	public function signup()
	{
		
		$username=$this->input->post('uname');
		$fname=$this->input->post('fname');
		$lname=$this->input->post('lname');
		$email=$this->input->post('email');
		$password=$this->input->post('password');
		$mobile=$this->input->post('mobile');

		$this->form_validation->set_rules('uname','username','required|is_unique[signup.username]|min_length[4]');
		$this->form_validation->set_rules('fname','FirstName','required');
		// $this->form_validation->set_rules('lname','LastName','required');
		$this->form_validation->set_rules('email','Email','required|valid_email');
		$this->form_validation->set_rules('password','Password','required|alpha_numeric|min_length[5]');
		$this->form_validation->set_rules('conform_password','PasswordConformation','required|matches[password]');
		$this->form_validation->set_rules('mobile','Mobile','required|exact_length[11]');
		$this->form_validation->set_error_delimiters("<p class='text-danger'>","</P>"); 

		
		if($this->form_validation->run()==FALSE)
		{
		$productCat=$this->Product_model->ProductCategory();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->view('common\header');
		// $this->load->view('common\sidebar');
		$this->load->view('register');
		$this->load->view('common\footer');
		

		}
		else
		{
			$this->load->model('Register_model');
			$data=[
				'username'=>$username,
				'fname'=>$fname,
				'lname'=>$lname,
				'email'=>$email,
				'password'=>md5($password),
				'mobile'=>$mobile,
				'ip'=>$this->input->ip_address(),



			];
			$last_id=$this->Register_model->signupData($data);


			if($last_id)
			{

				$this->session->set_flashdata('signupSecess','You have sucessfuly register please login');

				redirect('register/signup');
			}
			
		}
		

	}
}

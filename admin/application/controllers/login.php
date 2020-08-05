<?php
Class Login Extends CI_Controller
{

	public function index()
	{
		
		$this->load->library('session');
		$this->load->helper('url');
		$username=$this->session->userdata('username');
		if($username !="")
		{
			
		
			redirect('dashboard');
			
			}
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('uname','Username','required|callback_check_user_status');
		$this->form_validation->set_rules('password','Password','required');
		if($this->form_validation->run()==FALSE)
		{
			
			$this->load->view('common/header-script');
			$this->load->view('common/footer');
			$this->load->view('login');
		}
		else{
		


		if($this->input->post()!=""){
	
		$uname=$this->input->post('uname');
		$pass=$this->input->post('password');

		$this->load->model('Login_model');
		$res=$this->Login_model->loginAuth($uname,$pass);
		if($res>0){

			$data = [

				'username'=>$uname,
				'id'=>$res->id,
				'email'=>$res->email,
				'image'=>$res->image,
				'name'=>$res->name

			];


			$this->session->set_userdata($data);

			// $this->session->set_flashdata('success', 'Welcome to administrator Dashboard.');
			redirect('Dashboard/index');

		}
		
			else {
					
			
				$this->session->set_flashdata('danger', 'Login Credential in invalid!');
				$this->load->view('common/header-script');
				$this->load->view('common/footer');
			    $this->load->view('login');
		}
	}
		else {


			$this->load->view('common/header-script');
			$this->load->view('login');
			$this->load->view('common/footer');
		}
	}
	}
	public function check_user_status($uname)
{
   $this->form_validation->set_message('check_user_status', 'This User is Block, Please choose a different one.');
$this->load->model('Login_model');
			if ($this->Login_model->check_user_status($uname)) {
				return false;
			}else{
				return true;
			}

}
public function forget_password()
{
	$this->load->view('common/header-script');
				$this->load->view('common/footer');
			    $this->load->view('forget_password');

}
public function forget_pass_email()
{
	 $this->load->library('form_validation');
    $this->form_validation->set_rules('email', 'Email', 'required|callback_validate_email');
    if($this->form_validation->run()== FALSE)
    {
    	$this->load->view('common/header-script');
				$this->load->view('common/footer');
			    $this->load->view('forget_password');

    }

else{




    $this->load->library('email',array('mailtype'=>'html'));


    // $config['protocol'] = 'smpt';
    // $config['smtp_host'] = 'smpt.gmail.com';
    // $config['smtp_port'] = '465';
    // $config['smtp_timeout'] = '60';
    // $config['smtp_user'] = 'awaqar143@gmail.com';
    // $config['smtp_pass'] = 'loveispak2016';
    // $config['charset'] = 'utf-8';
    // $config['new_line'] = "\r\n";
    // $config['mailtype'] = 'html';
    // $config['validation'] = TRUE; 
    
    // $this->email->initialize($config);
    // $this->email->set_mailtype("html");
// ini_set("SMTP","smtp.mailgun.org");
// ini_set("smtp_port","587");
// ini_set("smtp_user", "OnlineShop143");
// ini_set("smtp_pass","loveispak2014");
// ini_set("sendmail_form","awaqar143@gmail.com");

$this->email->to($this->input->post('email'));
$this->email->from('onlineshoppingstore@onlineshoppingstore.pk','onlineshop');
$this->email->subject('Onlineshop Password Reset');
$temp=md5(uniqid());
$message="<p> A request has been received to change the password for your onlineshop account<a href='".base_url()."login/reset_password/$temp'> Reset</a> </p>";
$this->email->message($message);
// $this->email->send();
if ($this->email->send()) {
	
$this->load->model('Login_model');
if($this->Login_model->temp_password($temp)){

	echo "Check your email, Thanks!";
}
else{
	echo "email send failed";
}
}
}

}



	public function validate_email($email)
{
 $this->form_validation->set_message('validate_email', 'This email is not in database');
$this->load->model('Login_model');
			if ($this->Login_model->validate_email($email)) {
				return true;
			}else{
				return false;
			}
}
public function reset_password($temp)
{
			$this->load->model('Login_model');
			if($this->Login_model->update_password($temp)){

				$this->load->view('common/header-script');
				$this->load->view('common/footer');
				$this->load->view('new_password');
			}

			else {
				echo "invalid";
			}


	
}

public function update_password()
{

	
	$this->load->library('form_validation');
	$this->form_validation->set_rules('new_password','Password','required');
	$this->form_validation->set_rules('conform_password','Conform Password','required|matches[new_password]');
	if($this->form_validation->run()==false) {


			$this->load->view('common/header-script');
			$this->load->view('common/footer');
			$this->load->view('new_password');
		}
		else
		{
			$data= [

				'password' => $this->input->post('new_password')

			];
			$this->load->model('Login_model');
			$this->Login_model->update_password($temp,$data);

		}


}

	}
	

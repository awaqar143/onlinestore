<?php 
Class User extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('user_model');
		$this->load->helper('file');

	}
	public function addUser()
	{
		$this->form_validation->set_rules('name','Name','required');
		$this->form_validation->set_rules('username','User Name','required|callback_check_user_exists');
		$this->form_validation->set_rules('password','Password','required');
		$this->form_validation->set_rules('conform_password', 'Conform Password', 'matches[password]');
		$this->form_validation->set_rules('email','Email','required');
		if($this->form_validation->run()==FALSE){
	$this->load->view('common/header-script');
	$this->load->view('common/header');
	$this->load->view('common/header-bottom');
	$this->load->view('user');
	$this->load->view('common/footer');
}
else{
	$password=$this->input->post('password');
	
				$config['upload_path'] = './uploads/userimage';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size'] = '1024';
				$config['max_width'] = '1000';
				$config['max_height'] = '1000';
				$this->load->library('upload', $config);

				if(!$this->upload->do_upload())
				{
					$errors =  array('error' => $this->upload->display_errors());
					$image = '';
				}
				else
				{
					$image =$this->upload->data('file_name');
					
					

				}
				// if(!empty($imgname))
				// {
				$data = [

					'name'=>$this->input->post('name'),
					'user_name'=>$this->input->post('username'),
					'mobile'=>$this->input->post('mobile'),
					'email'=>$this->input->post('email'),
					'password'=>md5($password),
					'gender'=>$this->input->post('gender'),
					'image'=>$image
					
			];
		// }
			// else{

			// 	$data = [

			// 		'name'=>$this->input->post('name'),
			// 		'user_name'=>$this->input->post('username'),
			// 		'mobile'=>$this->input->post('mobile'),
			// 		'email'=>$this->input->post('email'),
			// 		'password'=>md5($password),
			// 		'gender'=>$this->input->post('gender'),
			// 		'image'=>$post_image
			// 	];
			// }
				$res=$this->user_model->addUser($data);
				if ($res) {
					
					$this->session->set_flashdata('success','User Seccussfuly Created');
					redirect('user/addUser');
				}

			
	}
}
public function check_user_exists($username)
{
   $this->form_validation->set_message('check_user_exists', 'User already exsists, Please choose a different one.');

			if ($this->user_model->check_user_exists($username)) {
				return true;
			}else{
				return false;
			}

}
public function changePassword()
{
	$this->form_validation->set_rules('old_password','Current Password','required|callback_match_password');
	$this->form_validation->set_rules('new_password','New Password','required');
	$this->form_validation->set_rules('confirm_password','Confirm Password', 'required|matches[new_password]');
	if($this->form_validation->run()===FALSE)
	{
	$this->load->view('common/header-script');
	$this->load->view('common/header');
	$this->load->view('common/header-bottom');
	$this->load->view('changePassword');
	$this->load->view('common/footer');
}


	else{

				$new_password=$this->input->post('new_password');
				$this->user_model->changePassword($new_password);

				
				$this->session->set_flashdata('success', 'Password Has Been Changed Successfull.');
				redirect('user/changePassword');
}
}


public function match_password($old_password){
			
			$this->form_validation->set_message('match_password', 'Current Password Does not matched, Please Try Again.');
			$password = md5($old_password);
			$res = $this->user_model->match_password($password);
			if ($res) {
				return true; 
			}else{
				return false;
			}
		}

public function ShowUser()
{
	$res=$this->user_model->showUser();

	$this->load->view('common/header-script');
	$this->load->view('common/header');
	$this->load->view('common/header-bottom');
	$this->load->view('showUser',['res'=>$res]);
	$this->load->view('common/footer');
}
public function enable($id)
{
	$this->user_model->enable($id);
	$this->session->set_flashdata('success', 'Disabled Successfully');
	header('Location: ' . $_SERVER['HTTP_REFERER']);

}
public function disable($id)
{
	$this->user_model->disable($id);
	$this->session->set_flashdata('success', 'Enable Successfully');
	header('Location: ' . $_SERVER['HTTP_REFERER']);

}
public function delete($id)
{

	$res=$this->user_model->delete($id);
if($res)
{
	$this->session->set_flashdata('success', 'User deleted Successfully');
	header('Location: ' . $_SERVER['HTTP_REFERER']);
}


}
public function updateUser()
{
	$res=$this->user_model->updateUser();
  	$this->load->view('common/header-script');
	$this->load->view('common/header');
	$this->load->view('common/header-bottom');
	$this->load->view('updateUser',['res'=>$res]);
	$this->load->view('common/footer');
}
public function editUser()
{

	$this->form_validation->set_rules('name','Name','required');
	$res=$this->user_model->updateUser();	
		
	if($this->form_validation->run()==FALSE){
	$this->load->view('common/header-script');
	$this->load->view('common/header');
	$this->load->view('common/header-bottom');
	$this->load->view('updateUser',['res'=>$res]);
	$this->load->view('common/footer');

}
else{
	
	
				$config['upload_path'] = './uploads/userimage';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size'] = '1024';
				$config['max_width'] = '1000';
				$config['max_height'] = '1000';
				$this->load->library('upload', $config);
if(!empty($_FILES['userfile']['name'])){
				if(!$this->upload->do_upload())
				{
					$errors =  array('error' => $this->upload->display_errors());
					
				}
				else
				{
					$image =$this->upload->data('file_name');
				
				
				$data = [

					'name'=>$this->input->post('name'),
					
					'mobile'=>$this->input->post('mobile'),
					
					
					'gender'=>$this->input->post('gender'),
					'image'=>$image
					
			];
			$image=$this->session->userdata('image');

			@unlink('uploads/userimage/'.$image);
		
}
}
else{

		$data = [

					'name'=>$this->input->post('name'),
					
					'mobile'=>$this->input->post('mobile'),
					
					
					'gender'=>$this->input->post('gender'),
					
					
			];

	}

				$res=$this->user_model->editUser($data);
				if ($res) {
					
					$this->session->set_flashdata('success','User Seccussfuly Updated');
					redirect('user/EditUser');
				}

		
	}
}
}
<?php
class Site_setting extends CI_controller
{
	public function __construct()
	{
		parent:: __construct();
		$this->load->helper('url');
		$this->load->model('Site_model');
	}

	public function sco()
	{
		$this->load->view('common/header-script');
		$this->load->view('common/header');
		$this->load->view('common/header-bottom');
		$data['sco']=$this->Site_model->sco();
		$this->load->view('site_setting',$data);
		$this->load->view('common/footer');
	}
	public function sco_edit($id)
	{
		if ($this->input->post()) {

			$page_name=$this->input->post('page_name');
			$page_desc=$this->input->post('page_desc');
			
			$this->form_validation->set_rules('page_name','Page Name','required');
			$this->form_validation->set_rules('page_desc','Page Description','required');
			if ($this->form_validation->run() === FALSE) {
				
		$this->session->set_flashdata('danger', 'Page and Description field are required');
		header('Location: ' . $_SERVER['HTTP_REFERER']);

			}
		else
		{
			$data = [

				'page_name' =>$page_name,
				'description' =>$page_desc


			];
			$id=$this->input->post('id');
			$res=$this->Site_model->sco_update($id,$data);
			if ($res) {
				

					$this->session->set_flashdata('success', 'Update Successfully');
					redirect('site_setting/sco');
		// header('Location: ' . $_SERVER['HTTP_REFERER']);
			}

		}
		}
		$this->load->view('common/header-script');
		$this->load->view('common/header');
		$this->load->view('common/header-bottom');
		$data['sco']=$this->Site_model->sco_view($id);
		// print_r($data);exit;
		$this->load->view('sco_edit',$data);
		$this->load->view('common/footer');
	}
	public function socialLinks()
	{
		$this->load->view('common/header-script');
		$this->load->view('common/header');
		$this->load->view('common/header-bottom');
		$data['sco']=$this->Site_model->socialLinks();
		$this->load->view('socialLinks',$data);
		$this->load->view('common/footer');
	}
	
	public function socialLinksEdit($id)
	{
		if ($this->input->post()) {

			// $page_name=$this->input->post('page_name');
			$link=$this->input->post('link');
			
			
			$data = [

				'link' =>$link
			
			];
			$id=$this->input->post('id');
			$res=$this->Site_model->socialLinkUpdate($id,$data);
			if ($res) {
				

					$this->session->set_flashdata('success', 'Update Successfully');
					redirect('site_setting/socialLinks');
		
			

		
		}
	}
	$this->load->view('common/header-script');
		$this->load->view('common/header');
		$this->load->view('common/header-bottom');
		$data['sco']=$this->Site_model->socialLinkView($id);
		$this->load->view('socialLinksEdit',$data);
		$this->load->view('common/footer');
	}
	public function subscribedEmail()
	{
		$this->load->view('common/header-script');
		$this->load->view('common/header');
		$this->load->view('common/header-bottom');
		$data['sub']=$this->Site_model->subcribedEmail();
		$this->load->view('subscribedEmail',$data);
		$this->load->view('common/footer');
	}
	public function deleteEmail($id)
	{
		$res=$this->Site_model->deleteEmail($id);
		if ($res) {
			
			$this->session->set_flashdata('success', 'Delete Successfully');
			redirect('site_setting/subscribedEmail');
		}


	}
}
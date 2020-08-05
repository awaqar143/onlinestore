<?php
class Category extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('encrypt');
		$this->load->model('Category_model');
		$this->load->library('form_validation');
	}
	public function AddCat()
	{
		$this->load->library('form_validation');
		if($this->input->post('submit'))
		{
			$cat_name=$this->input->post('cat_name');
			$cat_desc=$this->input->post('cat_desc');
			$slug=url_title($this->input->post('cat_name'),"dash",TRUE);


				
				$this->form_validation->set_rules('cat_name','Category','required|callback_check_cat_exists');
				$this->form_validation->set_rules('cat_desc','Description','required');
				if($this->form_validation->run()===FALSE)
		{
				$this->load->view('common/header-script');
				$this->load->view('common/header');
				$this->load->view('common/header-bottom');
				$this->load->view('AddCat');
				$this->load->view('common/footer');
	}
		
		else{

			// $cat=$this->Category_model->showAllCat();
			
			
			// if($cat['cat_name'] = $cat_name)
			// {

			// 	$this->session->set_flashdata('dangar','Category Already Added');
			// 	redirect('Category/AddCat');
			// }


			if($cat_name!="" && $cat_desc!="")
			{
			
			$data= [
				'cat_name'=>$cat_name,
				'slug'=>$slug,
				'cat_desc'=>$cat_desc,
				'status' => '1'
			];
			// print_r($data); exit;
			$res=$this->Category_model->AddNewCat($data);
			if($res){

				$this->session->set_flashdata('success','Category Successfully Added');
				redirect('Category/showAllCat');
			}
			else{
				echo "Failed";
			}
		}
	}
	}

		else {

				$this->load->view('common/header-script');
				$this->load->view('common/header');
				$this->load->view('common/header-bottom');
				$this->load->view('AddCat');
				$this->load->view('common/footer');
	}
	}





	public function showAllCat()
	{
		
		$showAllCat=$this->Category_model->showAllCat();

		$this->load->view('common/header-script');
		$this->load->view('common/header');
		$this->load->view('common/header-bottom');
		$this->load->view('showAllCat',['showAllCat'=>$showAllCat]);
		$this->load->view('common/footer');
	}

public function DeleteCat($id)
	{

	$table=base64_decode($this->input->get('table'));

	$res=$this->Category_model->deleteCat($id,$table);
	if($res)
	{
		
		$this->session->set_flashdata('success','Record has been Deleted');
		redirect('Category/showAllCat');
	}
}

	public function enable($id)
	{
		
		$table=base64_decode($this->input->get('table'));
		
				$this->Category_model->enable($id,$table);
		$this->session->set_flashdata('success', 'Disabled Successfully');
	header('Location: ' . $_SERVER['HTTP_REFERER']);

	}


	public function disable($id)
	{
		
		$table=base64_decode($this->input->get('table'));
		
				$this->Category_model->disable($id,$table);
		$this->session->set_flashdata('success', 'Enabled Successfully');
		header('Location: ' . $_SERVER['HTTP_REFERER']);

	}
	

public function editCat($id)
{
	

	// $editcat=$this->input->get('cat_id');  

	$editcate=$this->Category_model->editCat($id);


	$this->load->view('common/header-script');
	$this->load->view('common/header');
	$this->load->view('common/header-bottom');
	$this->load->view('editCate',['editcate'=>$editcate]);
	$this->load->view('common/footer');
}
public function updateCat()
{

	
	$this->load->library('form_validation');
	
	$this->form_validation->set_rules('Cat_name','Category','required');
	$this->form_validation->set_rules('Cat_desc','Description','required');
	if($this->form_validation->run()==FALSE)
	{
				
				$this->session->set_flashdata('danger',"Update Failed");
				
				return redirect('Category/showAllCat');
}
else
	{
		
	
	$data= [

		'cat_name' => $this->input->post('Cat_name'),
		'slug'=>url_title($this->input->post('Cat_name'),"dash",TRUE),
		'cat_desc' => $this->input->post('Cat_desc'),
		'status'   => $this->input->post('status')
	];
	$id=$this->input->post('id');

	if($this->Category_model->update($id,$data) )
	{
		
		$this->session->set_flashdata('success','Update Successfully');
		redirect('Category/showAllCat');
	}
	else {

		$this->session->set_flashdata('danger',"Update Faileddd");
		
	}
	
	
} //else end
	

}


public function check_cat_exists($cat_name)
{
			$this->form_validation->set_message('check_cat_exists', 'Category already exsists, Please choose a different one.');

			if ($this->Category_model->check_cat_exists($cat_name)) {
				return true;
			}else{
				return false;
			}
		}



}
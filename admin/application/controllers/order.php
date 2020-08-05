<?php
Class order extends CI_controller 
{

public function __construct()
{
	parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('order_model');
		$this->load->helper('file');
}

public function showOrder()
{
	$results=$this->order_model->showOrder(); 

	$this->load->view('common/header-script');
	$this->load->view('common/header');
	$this->load->view('common/header-bottom');
	$this->load->view('order',['results'=>$results]); 
	$this->load->view('common/footer');

}
public function delete($id)
{
   $this->order_model->delete_customer($id);
  $this->order_model->delete_order($id);
 
  $this->order_model->delete_items($id);
  $this->session->set_flashdata('success','Record Delete');
  redirect('order/showOrder');
  // header('Location: ' . $_SERVER['HTTP_REFERER']);
}
public function view($id)
{
	$res['order']=$this->order_model->viewOrder($id);
	$id=$res['order']['id'];
	$res['item']=$this->order_model->viewItem($id);

	$this->load->view('common/header-script');
	$this->load->view('common/header');
	$this->load->view('common/header-bottom');
	$this->load->view('orderView',$res); 
	$this->load->view('common/footer');
}
public function update($id)
{
$res['order']=$this->order_model->viewOrder($id);
	$id=$res['order']['id'];
	$res['item']=$this->order_model->viewItem($id);
	$res['order_status']=$this->order_model->order_status();

	$this->load->view('common/header-script');
	$this->load->view('common/header');
	$this->load->view('common/header-bottom');
	$this->load->view('updateOrder',$res); 
	$this->load->view('common/footer');

}
public function editOrder()
{
	$id=$this->input->post('id');
	$data = [
		'status'=>$this->input->post('status'),
		'tracking_no'=>$this->input->post('track')

	];
	$res=$this->order_model->editOrder($id,$data);
	if ($res) {
		$this->session->set_flashdata('success','Update seccessfuly');
		redirect('order/showOrder');
	}
	
}

}
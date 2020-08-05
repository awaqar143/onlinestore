<?php 
class Dashboard extends CI_Controller
{

	public function index()
	{
		$this->load->model('Dashboard_model');
		$data['total_order']=$this->Dashboard_model->totalOrders();
		$data['new_order']=$this->Dashboard_model->newOrders();
		$data['product']=$this->Dashboard_model->products();
		$data['low_quantity']=$this->Dashboard_model->lowQuantityProd();
		$data['subscribed']=$this->Dashboard_model->subscribed();
		// print_r($data);
		$this->load->helper('url');
		$this->load->view('common/header-script');
		$this->load->view('common/header');
		$this->load->view('common/header-bottom');
		$this->load->view('dashboard',$data);
		$this->load->view('common/footer');
	}
	public function chart()
	{
		$this->load->model('Dashboard_model');
		$area_data=$this->Dashboard_model->chart();
		

	foreach($area_data as $row)
   {
    $output[] = array(
     'month'  => $row["date"],
     'profit' => floatval($row["id"])
    );
   }
   echo json_encode($output);
	}
}
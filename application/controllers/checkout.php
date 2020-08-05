<?php
class Checkout extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('cart');
$this->controller = 'checkout';

		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('Product_model');
	}
	public function index()
	{
		if ($this->cart->total_items() <= 0) {
			
			redirect('home/');

	}
	
 $submit = $this->input->post('placeOrder'); 
        if(isset($submit)){
            // Form field validation rules
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('mobile', 'Mobile', 'required');
            $this->form_validation->set_rules('address', 'Address', 'required');

             $custData = array(
                'name'     => strip_tags($this->input->post('name')),
                'email'     => strip_tags($this->input->post('email')),
                'phone'     => strip_tags($this->input->post('mobile')),
                'address'=> strip_tags($this->input->post('address'))
            );

             if($this->form_validation->run() == true){
                // Insert customer data
                $insert = $this->Product_model->insertCustomer($custData);


if($insert){
                    // Insert order
                    $order = $this->placeOrder($insert);
                    
                    // If the order submission is successful
                    if($order){

                        $this->session->set_userdata('success_msg', 'Order placed successfully.');
                        redirect($this->controller.'/orderSuccess/'.$order);
                    }else{
                        $data['error_msg'] = 'Order submission failed, please try again.';
                    }
                }else{
                    $data['error_msg'] = 'Some problems occured, please try again.';
                }
            }
        }
        
        // Customer data
        // $data['custData'] = $custData;



	$data['cartitem']=$this->cart->contents();	
	$productCat=$this->Product_model->ProductCategory();
		$this->load->view('common\header',['productCat'=>$productCat]);
		// $this->load->view('common\sidebar',['productCat'=>$productCat]);
		$this->load->view($this->controller,$data);
		$this->load->view('common\footer');

}
public function placeOrder($insert)
{
    $ordData = [
        'customer_id' => $insert,
        'grand_total' => $this->cart->total(),
        'date'        =>date('y-m-d')



    ];
    $insertOrder=$this->Product_model->insertOrder($ordData);
    if ($insertOrder) {
        
       $cartItem=$this->cart->contents();
       // print_r($cartItem);exit;
       $orderItem= array();
       $i=0;
       foreach ($cartItem as $item) {

           $orderItem[$i]['order_id'] = $insertOrder;
           $orderItem[$i]['product_id'] = $item['id'];
           $orderItem[$i]['quantity']   = $item['qty'];
           $orderItem[$i]['sub_total']  =  $item['subtotal'];
           

           if (empty($item['option']['size'])) {

             $orderItem[$i]['product_size']="";
           }
           else{

           $orderItem[$i]['product_size'] =$item['option']['size'];

           }
         
         if (empty($item['option']['color'])) {

          $orderItem[$i]['product_color']="";
        }
        else {
           $orderItem[$i]['product_color'] =$item['option']['color'];
         }


         

$i++;

}
      

    if (!empty($orderItem)) {
           
           $insertItem=$this->Product_model->insertItem($orderItem);
           if ($insertItem) { 

            

            $this->Product_model->quantity();
           $this->cart->destroy();
           return $insertOrder;
             
           }
            
           // if ($insertItem) {
           //     $this->cart->destroy();
           //     return $insertOrder;
           // }
       }
    
     }
    return false;
    
}
public function orderSuccess($ordID)
{
    $data['order'] = $this->Product_model->getOrder($ordID); 
    // $productCat=$this->Product_model->ProductCategory();
  
  $this->session->set_flashdata('succ', 'Your order has been placed successfully Under Order ID#'.$data['order']['id']);
redirect('home');
    // $this->load->view('common\header',['productCat'=>$productCat]);
       // $this->load->view('order_success',$data);
        // $this->load->view('common\footer');
    

}
}
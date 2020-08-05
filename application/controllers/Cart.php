<?php
class Cart extends CI_Controller{
    
    function  __construct(){
        parent::__construct();
        
        // Load cart library
        $this->load->library('cart');
        
        // Load product model
        $this->load->model('Product_model');
    }
 function index(){
        $data = array();
        
        // Retrieve cart data from the session
        $data['cartItems'] = $this->cart->contents();
        
        // Load the cart view
       $this->load->model('Product_model');
        $productCat=$this->Product_model->ProductCategory();
		$this->load->view('common\header',['productCat'=>$productCat]);
		// $this->load->view('common\sidebar',['productCat'=>$productCat]);
		
        $this->load->view('Cart', $data);
        $this->load->view('common\footer');
    }
    public function updateItemQty()
    {
    	$update = 0;
    	 $rowid = $this->input->get('rowid');
        $qty = $this->input->get('qty');

        if(!empty($rowid) && !empty($qty)){
            $data = array(
                'rowid' => $rowid,
                'qty'   => $qty
            );
            $update = $this->cart->update($data);
        }
        
        // Return response
        echo $update?'ok':'err';
    }
    public function removeItem($rowID)
    {
    	$this->cart->remove($rowID);
    	redirect('cart/');
    }
    
}
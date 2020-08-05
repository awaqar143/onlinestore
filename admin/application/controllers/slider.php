<?php 
/**
 * 
 */
class Slider extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('Prod_model');
		$this->load->helper('file');
		// $this->load->library('upload');
	}


		public function showSliderProd()
	{
		

	$data=$this->Prod_model->showSliderProd();

	$this->Prod_model->showProd();
	$this->load->view('common/header-script');
	$this->load->view('common/header');
	$this->load->view('common/header-bottom');
	$this->load->view('showSliderProd',['data'=>$data]);
	$this->load->view('common/footer');
}
	
public function addProductSlider()
{
			// $color=$this->input->post('multi_color'); 
			// $size=$this->input->post('multi_color'); 
			// $col=explode(',', $color);
			// $sz=explode(',', $size);
			// print_r($col);
			// print_r($sz);
			
			$username=$this->session->userdata('username');
			
			if($this->input->post())
			{
				$title=$this->input->post('title');
				$slug=url_title($this->input->post('title'),"dash",TRUE);
				$stock=$this->input->post('stock');
				$sku=$this->input->post('sku');
				$offer_price=$this->input->post('offer_price');
				$price=$this->input->post('price');
				// $color=$this->input->post('color');
				$short_description=$this->input->post('short_description');
				
				$cat_id=$this->input->post('cat_id');
				// $size=$this->input->post('size');
				$tag=$this->input->post('tag');
				$description=$this->input->post('description');
				$meta_title=$this->input->post('meta_title');
				$meta_tag=$this->input->post('meta_tag');
				$meta_desc=$this->input->post('meta_desc');


				$this->form_validation->set_rules('title','Title','required');
				$this->form_validation->set_rules('stock','Stock','required');
				$this->form_validation->set_rules('price','Price','required');
				$this->form_validation->set_rules('cat_id','Category','required');
				// $this->form_validation->set_rules('file','File','required');
			
				 if($this->form_validation->run() ===FALSE)
		{
			$cat=$this->Prod_model->ProductCategory();
		$this->load->view('common/header-script');
		$this->load->view('common/header');
		$this->load->view('common/header-bottom');
		$this->load->view('slider',['cat'=>$cat]);
		$this->load->view('common/footer');
	}
	else
	{
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png';
			// $config['max_size']     = '100';
			// $config['max_width'] = '1024';
			// $config['max_height'] = '768';

			$this->load->library('upload', $config);
			$this->load->library('form_validation');
			
			if(!$this->upload->do_upload())
			{
				$error= array('error'=>$this->upload->display_errors());
			}
			else{
				$file = $this->upload->data('file_name');

				$data= [
				'product_title'=>$title,
				'product_stock'=>$stock,
				'short_description'=>$short_description,
				'slider_status' =>'1',
				
				'sku'=>$sku,
				'slug'=>$slug,
				'product_price'=>$price,
				'offer_price' =>$offer_price,
				'cat_id'=>$cat_id,
				'product_tag' => $tag,
				// 'product_dimention'=>$dimention,
				// 'product_size'=>$size,
				'status'=>'1',
				'product_image'=>$file,
				'user'=>$username,
				'product_desc'=>$description,
				'meta_title' => $meta_title,
				'meta_tag'	=> $meta_tag,
				'meta_desc'	=> $meta_desc
			];


				$res=$this->Prod_model->addProduct($data);
		
			if($res)
			{
				if (!empty($this->input->post('multi_color'))) {
					$color=$this->input->post('multi_color');
					$multiColor=$this->multiColor($color,$res);
				}

				if (!empty($this->input->post('multi_size'))) {
					$size=$this->input->post('multi_size');
					$multiSize=$this->multiSize($size,$res);
				}

				if (!empty($_FILES['imgFiles']['name'])){
				$multipleUpload =  $this->multipleImageUpload($_FILES['imgFiles'],$res);
				
				}

				
				$this->session->set_flashdata('success','Product Successfully Added');
				
				$this->load->view('common/header-script');
				$this->load->view('common/header');
				$this->load->view('common/header-bottom');
				$this->load->view('slider',['res'=>$res]);
				$this->load->view('common/footer');
				
			}
			else
			{
				$this->session->set_flashdata('danger',"insert Failed");
				redirect('Product/addProduct');	

			}
			
		}
	}
		}	

	else
	{
		
		$cat=$this->Prod_model->ProductCategory();
			// $error = array('error' => $this->upload->display_errors());
				$this->load->view('common/header-script');
				$this->load->view('common/header');
				$this->load->view('common/header-bottom');
				$this->load->view('slider',['cat'=>$cat]);
				$this->load->view('common/footer');
	}	
}

	public function multipleImageUpload($images,$id){
		$images == $_FILES['imgFiles'];
        $data = array();
        if(!empty($_FILES['imgFiles']['name'])){
            $filesCount = count($_FILES['imgFiles']['name']);
            for($i = 0; $i < $filesCount; $i++){
                $_FILES['userFile']['name'] = $_FILES['imgFiles']['name'][$i];
                $_FILES['userFile']['type'] = $_FILES['imgFiles']['type'][$i];
                $_FILES['userFile']['tmp_name'] = $_FILES['imgFiles']['tmp_name'][$i];
                $_FILES['userFile']['error'] = $_FILES['imgFiles']['error'][$i];
                $_FILES['userFile']['size'] = $_FILES['imgFiles']['size'][$i];

                $uploadPath = './uploads/multifile';
                $config['upload_path'] = $uploadPath;
                $config['allowed_types'] = 'gif|jpg|png';
                
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if($this->upload->do_upload('userFile')){
                    $fileData = $this->upload->data();
                    $uploadData[$i]['product_image'] = $fileData['file_name'];
                     $uploadData[$i]['product_id'] = $id;
                   /* $uploadData[$i]['created'] = date("Y-m-d H:i:s");
                    $uploadData[$i]['modified'] = date("Y-m-d H:i:s");*/
                }
            }
            
            if(!empty($uploadData)){
                //Insert file information into the database
                $insert = $this->Prod_model->insertproductsmultipleImages($uploadData);
                return $insert;
               /* $statusMsg = $insert?'Files uploaded successfully.':'Some problem occurred, please try again.';
                $this->session->set_flashdata('success',$statusMsg);*/
            }
        }
    }
    public function multiColor($color,$id)
    {

			$color=$this->input->post('multi_color'); 
			$col=explode(',', $color);
			$no=0;
			foreach ($col as $col) {
				$this->Prod_model->multiColor($col,$id);
				$no++;
			}

}
			 public function multiSize($size,$id)
    {

			$size=$this->input->post('multi_size'); 
			$siz=explode(',', $size);
			$no=0;
			foreach ($siz as $siz) {
				$this->Prod_model->multiSize($siz,$id);
				$no++;
			}


    }
       public function delete($id)
    {
    	// $table=base64_decode($this->input->get('table'));
    	// $this->Prod_model->multi_delete($id);
    	$this->Prod_model->delete_images($id);
    	// print_r($image); exit;
    	$this->Prod_model->delete($id);
    	$this->session->set_flashdata('success','Record Delete');
    	redirect('Slider/showSliderProd');
    
}
	}

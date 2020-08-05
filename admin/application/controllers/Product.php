<?php
class Product extends CI_Controller
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
	public function showAllProd()
	{
		

		$data=$this->Prod_model->showProd();

	$this->Prod_model->showProd();
	$this->load->view('common/header-script');
	$this->load->view('common/header');
	$this->load->view('common/header-bottom');
	$this->load->view('showAllProd',['data'=>$data]);
	$this->load->view('common/footer');
}

public function addProduct()
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
				// $this->form_validation->set_rules('userfile','File','required');
			
				 if($this->form_validation->run() ===FALSE)
		{
		$cat=$this->Prod_model->ProductCategory();
		$this->load->view('common/header-script');
		$this->load->view('common/header');
		$this->load->view('common/header-bottom');
		$this->load->view('AddProduct',['cat'=>$cat]);
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
				// print_r("hello");exit;

				$file = $this->upload->data('file_name');

				$data= [
				'product_title'=>$title,
				'product_stock'=>$stock,
				'short_description'=>$short_description,
				
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

				$cat=$this->Prod_model->ProductCategory();
				$this->session->set_flashdata('success','Product Successfully Added');
				
				$this->load->view('common/header-script');
				$this->load->view('common/header');
				$this->load->view('common/header-bottom');
				$this->load->view('addProduct',['res'=>$res,'cat'=>$cat]);
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
				$this->load->view('AddProduct',['cat'=>$cat]);
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
    	redirect('Product/showAllProd');
    
}
public function update($id)
{
			$data['prodDetail']=$this->Prod_model->update($id);
			$data['imgDetail']=$this->Prod_model->image($id);
			$data['catDetail']=$this->Prod_model->Category();
			// print_r($data['imgDetail']); exit;

	
			
				$this->load->view('common/header-script');
				$this->load->view('common/header');
				$this->load->view('common/header-bottom');
				$this->load->view('prod_update',$data);

				$this->load->view('common/footer');
}
public function editProduct()
{
	$username=$this->session->userdata('username');

	

			
			if($this->input->post())
			{
				$title=$this->input->post('title');
				$slug=url_title($this->input->post('title'),"dash",TRUE);
				$stock=$this->input->post('stock');
				$sku=$this->input->post('sku');
				$offer_price=$this->input->post('offer_price');
				$price=$this->input->post('price');
				
				$short_description=$this->input->post('short_description');
				
				$cat_id=$this->input->post('cat_id');
				
				$tag=$this->input->post('tag');
				$description=$this->input->post('description');
				$meta_title=$this->input->post('meta_title');
				$meta_tag=$this->input->post('meta_tag');
				$meta_desc=$this->input->post('meta_desc');


				$this->form_validation->set_rules('title','Title','required');
				$this->form_validation->set_rules('stock','Stock','required');
				$this->form_validation->set_rules('price','Price','required');
				$this->form_validation->set_rules('cat_id','Category','required');

		if($this->form_validation->run() ===FALSE)
		{

		$this->session->set_flashdata('danger',"Update Failed");
		redirect('Product/showAllProd');
	}
	else{

		
			
		    $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']     = '100';
			$config['max_width'] = '1024';
			$config['max_height'] = '768';

			$this->load->library('upload', $config);
			$this->load->library('form_validation');
			
			// if(!$this->upload->do_upload())
			// {
			// 	$error= array('error'=>$this->upload->display_errors());
			// }
			// else{
			if(!empty($_FILES['userfile']['name'])){

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
				
				'slug'=>$slug,
				'product_price'=>$price,
				'offer_price' => $offer_price,
				'cat_id'=>$cat_id,
				'product_tag'=>$tag,
				'sku'=>$sku,
				// 'product_dimention'=>$dimention,
				
				'status'=>'1',
				'product_image'=>$file,
				'updated_by'=>$username,
				
				'product_desc'=>$description,
				'meta_title'=>$meta_title,
				'meta_tag'=>$meta_tag,
				'meta_desc'=>$meta_desc
			];
		}
			$oldImg=$this->input->post('oldimg');
			@unlink('uploads/' . $oldImg);
}
else {

	$data= [
				'product_title'=>$title,
				'product_stock'=>$stock,
				'short_description'=>$short_description,
				
				'slug'=>$slug,
				'product_price'=>$price,
				'offer_price' => $offer_price,
				'cat_id'=>$cat_id,
				'product_tag'=>$tag,
				'sku'=>$sku,
				// 'product_dimention'=>$dimention,
				
				'status'=>'1',
				'updated_by'=>$username,
				'user'=>$username,
				'product_desc'=>$description,
				'meta_title'=>$meta_title,
				'meta_tag'=>$meta_tag,
				'meta_desc'=>$meta_desc
			];
}
		




$id=$this->input->post('id');
$res=$this->Prod_model->editProduct($data,$id);
if($res)
			{
				if (!empty($_FILES['imgFiles']['name'])){
				$multipleUpload =  $this->multipleImageUpload($_FILES['imgFiles'],$id);
				
				}

				
				$this->session->set_flashdata('success','Product Successfully Added');
				
				
				redirect('Product/showAllProd');	
				
			}
			else
			{
				$this->session->set_flashdata('danger',"insert Failed");
				redirect('Product/showAllProd');	
			}				



}
}
}

// ajax multi image delete
public function deleteimg()
{
	if($this->input->post('id'));
	{
		$id=$this->input->post('id');
		$img=$this->Prod_model->getImgRow($id);
		$delete=$this->Prod_model->deleteimage($id);
		if($delete) {

			unlink('uploads/multifile/' . $img['product_image']);
			$status='ok';
		}
	}
	echo $status;die;
}
//view page
public function view($id)
{
	$data['viewDetial']=$this->Prod_model->viewDetial($id);
	$data['viewImg']=$this->Prod_model->viewImg($id);
	$cat=$data['viewDetial']['cat_id'];
	$data['color']=$this->Prod_model->colorView($id);
	$data['size']=$this->Prod_model->sizeView($id);
	$data['category']=$this->Prod_model->cat($cat);
	

				$this->load->view('common/header-script');
				$this->load->view('common/header');
				$this->load->view('common/header-bottom');
				$this->load->view('product_view',$data);

				$this->load->view('common/footer');

}
public function lowStockProd()
{
	$data['data']=$this->Prod_model->lowStockProd();
				$this->load->view('common/header-script');
				$this->load->view('common/header');
				$this->load->view('common/header-bottom');
				$this->load->view('lowStockProd',$data);

				$this->load->view('common/footer');

}
}

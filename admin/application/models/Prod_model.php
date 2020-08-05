<?php 
class Prod_model extends CI_Model
{
	public function ShowProd()
	{
		// $this->db->
		// select('p.product_id')
		// ->from('Product as p');
		// ->where('p.product_id','c.cat_id');
$query = $this->db->query('select * from product where slider_status != 1');
		return $query->result_array();
		// echo $this->db->last_query(); exit;


	}
	public function ProductCategory()
	{
		$res=$this->db->get('category');
		return $res->result();
	}

	public function AddProduct($data)
	{

		 $this->db->insert('product',$data);
		return $insert_id=$this->db->insert_id();	
	}
	public function insertproductsmultipleImages($data = array()){
       	 $insert = $this->db->insert_batch('product_images',$data);
       	 return $insert?true:false;
    	}
    	





   public function delete_images($id){

    $this->db->select('product_image');
    $query = $this->db->get_where('product_images', array('product_id' => $id));
    $images['product_image'] = $query->result_array();

    if (!empty($images)){

      
        foreach ($images['product_image'] as $images) { 
            unlink('uploads/multifile/' . $images['product_image']);
        }
            
     $this->db->query("DELETE FROM product_images WHERE product_id = $id");
    }
}
    public function delete($id)
    {
    $image=$this->db->select('product_image')->get_where('product', array('id'=>$id))->row()->product_image; 
            $cwd=getcwd();
            $image_path=$cwd;
            $path='\uploads';
            // print_r($image_path.$path); exit;
            chdir($image_path.$path);
            unlink($image);
            chdir($cwd);
            $this->db->where('id',$id);
            $this->db->delete('product'); 
            return true;      
    } 

    		
    		public function update($id)
            {
                $this->db->where('id',$id);
                $query=$this->db->get('product');
                return $query->row_array();
            }
            public function category()
            {
                // $this->db->where('id',$id);
                $query=$this->db->get('category');
                return $query->result_array();
            }
    		public function image($id)
            {
                $this->db->where('product_id',$id);
                $query=$this->db->get('product_images');
                return $query->result_array();


            }
            public function getImgRow($id)
            {
                $this->db->select('*');
                $this->db->from('product_images');
                $this->db->where('id',$id);
                $query=$this->db->get();
                return $query->row_array();
            }
            public function deleteimage($id)
            {
                $this->db->where('id',$id);
                $delete=$this->db->delete('product_images');
                return $delete?true:false;
            }
    	public function editProduct($data,$id)
        {
            $data['updated_date'] = date("Y-m-d H:i:s"); 
            $this->db->where('id',$id);
            $query=$this->db->update('product',$data);
            return  $query;

        }
        public function viewDetial($id)
        {
            $this->db->select('*');
            $this->db->from('product');
            $this->db->where('id',$id);
            $query=$this->db->get();
            return $query->row_array();
        }
         public function cat($cat)
        {
            $this->db->select('*');
            $this->db->from('category');
            $this->db->where('id',$cat);
            $query=$this->db->get();
            return $query->row_array();
        }
    	public function viewImg($id)
        {
            $this->db->select('*');
            $this->db->from('product_images');
            $this->db->where('product_id',$id);
            $query=$this->db->get();
            return $query->result_array();
        }
        public function multiColor($col,$id)
        {
            $data= [

                'product_id' => $id,
                'product_color' => $col
            ];
            $this->db->insert('product_color',$data);
            
        }

         public function multiSize($siz,$id)
        {
            $data= [

                'product_id' => $id,
                'product_size' => $siz
            ];
            $this->db->insert('product_size',$data);
            
        }
        public function colorView($id)
        {
            $this->db->where('product_id',$id);
            $query=$this->db->get('product_color');
            return $query->result_array();
        }
           public function sizeView($id)
        {
            $this->db->where('product_id',$id);
            $query=$this->db->get('product_size');
            return $query->result_array();
        }
        public function showSliderProd()
        {
            $this->db->where('slider_status','1');
                $query=$this->db->get('product');
                return $query->result_array();

        }
       public function lowStockProd()
       {
        $this->db->where('status','1');
        // $this->db->where('slider_status !=','1');
        $this->db->where('product_stock <',6);
        $query=$this->db->get('product');
        return $query->result_array();
       }
}
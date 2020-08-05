<?php
class Category_model extends CI_Model
{
	public function AddNewCat($data)
	{
		return $this->db->insert('category',$data);
	}

	public function showAllCat(){
		$this->db->order_by('id','DESC');
		$res=$this->db->get('category');
		return $res->result_array();
	}
	public function deleteCat($id,$table)
	{

		$this->db->where('id',$id);

		$res=$this->db->delete($table);
		// echo $this->db->last_query(); exit;
		return TRUE;
	}

	public function enable($id,$table)
	{
		$data= [
			'status'=> 0
		];
		
		$this->db->where('id',$id);
		return $this->db->update($table, $data);

	}
public function disable($id,$table)
	{
		$data=[
			'status'=> 1
		];
		
		$this->db->where('id',$id);
		return $this->db->update($table, $data);

	}

	public function EditCat($id)
	{

		$this->db->where('id',$id);
		$res=$this->db->get('category');
		return $res->row_array();
	}
	public function update($id,$data)
	{
		
		
		$this->db->where('id',$id);
		$this->db->update('category',$data);
		// echo $this->db->last_query(); exit;
		return TRUE;
	}

		public function check_cat_exists($cat_name){
			$query = $this->db->get_where('category', array('cat_name' => $cat_name));

			if(empty($query->row_array())){
				return true;
			}else{
				return false;
			}
		}
}

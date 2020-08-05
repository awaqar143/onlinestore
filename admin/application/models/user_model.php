<?php
Class user_model extends CI_Model
{
	public function addUser($data)
	{

		return $this->db->insert('user',$data);
	}

public function check_user_exists($username)
{
	$query=$this->db->get_where('user',array('user_name'=>$username));
	
		if(empty($query->row_array())){
				return true;
			}else{
				return false;
			}
}
public function changePassword($new_password)
{
	$data= [

		'password'=>md5($new_password)
	];
	$this->db->where('id',$this->session->userdata('id'));
	return $this->db->update('user',$data);

}
public function match_password($password)
{
	$id = $this->session->userdata('id');
			// if($id === FALSE){
			// 	$query = $this->db->get('user');
			// 	return $query->result_array(); 
			// }

			$query = $this->db->get_where('user', array('password' => $password,'id'=>$id));
			return $query->row_array();
}
public function showUser()
{
	$query=$this->db->get('user');
	return $query->result_array();

}
public function enable($id)
{
	
	$data= [

		'status'=>'0'
	];
	$this->db->where('id',$id);
	$this->db->update('user',$data);
}
public function disable($id)
{
	
	$data= [

		'status'=>'1'
	];
	$this->db->where('id',$id);
	$this->db->update('user',$data);
}
 public function delete($id)
    {
    $image=$this->db->select('image')->get_where('user', array('id'=>$id))->row()->image; 
            
if(!empty($image))
{
            $cwd=getcwd();
            $image_path=$cwd;
            $path='\uploads\userimage';
            // print_r($image_path.$path); exit;
            chdir($image_path.$path);
            unlink($image);
            chdir($cwd);
        }
            $this->db->where('id',$id);
            $this->db->delete('user'); 
            return true;  
	}
	public function updateUser()
	{
		$id=$this->session->userdata('id');
		$query=$this->db->get_where('user',array('id'=>$id));
		return $query->row_array();
	}
	public function editUser($data)
	{
		$id=$this->session->userdata('id');
		$this->db->where('id',$id);
		$this->db->update('user',$data);
		return true;
	}
}
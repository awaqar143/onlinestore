<?php 
class Register_model extends CI_Model
{
	function signupData($data)
	{
		// print_r($data); exit;
		$this->db->insert('signup',$data);
		return $this->db->insert_id();

	}
}
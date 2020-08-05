<?php 
class Login_model extends CI_Model
{
	public function login($uname,$pass)
	{
		$this->db->where('username',$uname);
		$this->db->where('password',md5($pass));
		$res=$this->db->get('signup');
		return $res->num_rows();

	}
}
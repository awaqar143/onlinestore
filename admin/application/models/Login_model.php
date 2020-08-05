<?php
class Login_model extends CI_Model
{

	public function loginAuth($uname,$pass)
	{

		$this->db->where('user_name',$uname);
		$this->db->where('password',md5($pass));
		$res=$this->db->get('user');
		if($res->num_rows()==1)
		{
			return $res->row(0);
		}
else{
	return FALSE;
}

		// echo $this->db->last_query(); exit;
	}
	public function check_user_status($uname)
	{
		$query=$this->db->get_where('user', array('user_name' => $uname, 'status'=> '0' ));
		return $query->row_array();
	}

	public function validate_email($email)
	{
		$query=$this->db->get_where('user', array('email' => $email));
		return $query->row_array();
	}
	public function temp_password($temp)
	{
		$data = [
					
					'reset_pass' => $temp

		];
		$email=$this->input->post('email');
		if($data) {

			$this->db->where('email',$email);
			$this->db->update('user',$data);
			return true;
		}
		
	}
	public function update_password($temp)
	{

		$this->db->where('reset_pass',$temp);
		$query=$this->db->get('user');
		if ($query->num_rows() == '1') {

			return true;
		}
		else {
			return false;
		}

	}
}
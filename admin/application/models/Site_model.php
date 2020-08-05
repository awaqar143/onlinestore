<?php 
class Site_model extends CI_model
{
	public function sco()
	{

		$query=$this->db->get('sco');

		return $query->result_array();
	}
	public function sco_view($id)
	{
		$this->db->where('id',$id);
		$query=$this->db->get('sco');
		return $query->row_array();
	}
	public function sco_update($id,$data)
	{
		$this->db->where('id',$id);
		$this->db->update('sco',$data);
		return true;
	}
	public function socialLinks()
	{

		$query=$this->db->get('sociallinks');

		return $query->result_array();
	}
	public function socialLinkView($id)
	{
		$this->db->where('id',$id);
		$query=$this->db->get('sociallinks');
		return $query->row_array();
	}
	public function socialLinkUpdate($id,$data)
	{
		$this->db->where('id',$id);
		$this->db->update('sociallinks',$data);
		return true;
	}
	public function subcribedEmail()
	{

		$query=$this->db->get('subscribed');

		return $query->result_array();
	}
	public function deleteEmail($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('subscribed');
		return true;
	}
}
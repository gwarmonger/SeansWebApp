<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Memodata extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	function Memosave($data)
	{
		$this->db->insert('memo',$data);
	}
	
	function Memoquery($jdate)
	{	
		$jdate = $this->input->post('jdate');
	    $this->db->select('*'); 
	    $this->db->from('memo');  
	    $this->db->where('memo.thedate', $jdate);
	    $this->db->order_by('thedate', 'desc'); 
	    $memo = $this->db->get();
	    return $memo->result_array();
	}

	function Savepos($data)
	{
		$memoid = $this->input->post('memoid');
		$this->db->where('memoid', $memoid);
		$this->db->update('memo', $data); 
	}
	function Datequery($userid)
	{	
	    $this->db->select('*'); 
	    $this->db->from('memo');  
	    $this->db->where('memo.id', $userid);
	    $this->db->order_by('thedate', 'desc'); 
	    $thedate = $this->db->get();
	    return $thedate->result_array();
	}
	function Deletememo($memoid){
		$this->db->delete('memo', array('memoid' => $memoid)); 
	}

}

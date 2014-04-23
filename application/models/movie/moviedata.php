<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Moviedata extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	function Catsave($data)
	{
		$this->db->insert('movies',$data);
	}
	function Moviequery()
	{	
		$userid = $this->session->userdata('user_id');
		$data['userid']=$userid;
		
	    $this->db->select('*'); 
	    $this->db->from('movies');  
	    $this->db->where('movies.userid', $userid);
	    $this->db->order_by('category', 'desc'); 
	    $query = $this->db->get();
	    return $query->result_array();
	}
	function Addmovie($data)
	{
		$this->db->insert('movielist',$data);
	}
	function Catitems()
	{	
		$userid = $this->session->userdata('user_id');
		$data['userid']=$userid;
		
	    $this->db->select('*'); 
	    $this->db->from('movies');  
	    $this->db->where('movies.userid', $userid);
	    $this->db->join('movielist', 'movielist.category = movies.category'); 
	    $query = $this->db->get();
	    return $query->result_array();
	}
}
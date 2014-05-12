<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Moviedata extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	function Catsave($data)
	{	
		$userid = $this->session->userdata('user_id');
		$data['userid']=$userid;
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
	function Catitems($category)
	{	
		$userid = $this->session->userdata('user_id');
		$data['userid']=$userid;
	    $this->db->select('*'); 
	    $this->db->from('movielist');  
	    $this->db->where('movielist.userid', $userid);
	    $this->db->where('movielist.category', $category); 
	    $movies = $this->db->get();
	    return $movies->result_array();
	}
	function Catitemsall()
	{	
		$userid = $this->session->userdata('user_id');
		$data['userid']=$userid;
	    $this->db->select('*'); 
	    $this->db->from('movielist');  
	    $this->db->where('movielist.userid', $userid);
	     
	    $movies = $this->db->get();
	    return $movies->result_array();
	}
	function Getcat(){
		$userid = $this->session->userdata('user_id');
		$data['userid']=$userid;

		$this->db->select('category');
		$this->db->from('movies');
		$this->db->where('movies.userid', $userid);
		$query = $this->db->get();
		return $query->result_array();
	}
	function Deleteitem($movieid){
		$this->db->delete('movielist', array('movieid' => $movieid)); 
	}
	function Deletecat($cat){
		$this->db->delete('movielist', array('category' => $cat));
		$this->db->delete('movies', array('category' => $cat));
	}
}
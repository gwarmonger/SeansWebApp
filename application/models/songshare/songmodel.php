<?php
class Songmodel extends CI_Model{
	
	function get_query()
	{
      	$userid = $this->session->userdata('user_id');
		$data['userid']=$userid;
	    $this->db->select('*'); 
	    $this->db->from('songs');  
	    $this->db->where('songs.userid', $userid);
	    $query = $this->db->get();
	    return $query->result_array();
	}

	function Songupload($data)
	{
		$userid = $this->session->userdata('user_id');
		$data['userid']=$userid;
		$this->db->insert('songs',$data);		
	}
	function Deletesong($songid){
		$this->db->delete('songs', array('songid' => $songid)); 
	}
}
	
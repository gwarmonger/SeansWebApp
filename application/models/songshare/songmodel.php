<?php
class Songmodel extends CI_Model{
	
	function get_query()
	{
      $query = $this->db->get('songs');
      return $query->result();
	}

	function Songupload($data)
	{
		$this->db->insert('songs',$data);		
	}
	function Deletesong($songid){
		$this->db->delete('songs', array('songid' => $songid)); 
	}
}
	
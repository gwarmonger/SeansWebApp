<?php
class Songmodel extends CI_Model{
	
	function get_query()
	{
      $query = $this->db->query('SELECT songid, title, description, url FROM gwarmonger');
      return $query->result();
	}

	function Songupload($data)
	{
		$this->db->insert('songs',$data);
		
}
		
	}
	
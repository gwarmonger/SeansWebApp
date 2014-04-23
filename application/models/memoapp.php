<?php
class Songmodel extends CI_Model{
	function __construct() 
  {
    /* Call the Model constructor */
    parent::__construct();
  }

		function get_query()
		{
        //$this->load->database();

      $query = $this->db->query('SELECT songid, title, description, url FROM gwarmonger');
      return $query->result();
		}
		
	}
	
?>
<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Memo extends CI_Controller {
               
	function __construct()
	{
 		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->database();
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');
		$this->load->model('memo/memodata');
		$this->load->model('songshare/Songmodel');
	}	
	function index()
	{	
		$username = $this->session->userdata('username');
		$userid = $this->session->userdata('user_id');
		$data['username']=$username;
		$data['userid']=$userid;
		$data = $this->memodata->SaveForm();
		$data2 = array(
				'query' => $this->Songmodel->Memo_query()
			);
			$this->load->model('memodata');
	    
	                 
	    		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('templates/header');
			$this->load->view('apps/memomain', $data);
			$this->load->view('apps/memomemcon', $data2);
		$this->load->view('templates/footer');
		}
		else
		{
			$this->load->view('memo');
		}
	}
		
		
		
		

function formInput(){
	$this->load->view('apps/memomain', $data);

}
}
		/*$form_data = array(
					       	'title' => set_value('title'),
					       	'memo' => set_value('memo'),
					       	'id' => set_value('id'),
					       	//'memoid' => set_value('memoid'),
					       	'username' => set_value('username'),
					       	'thedate' => set_value('thedate'),
						);
			*/
			  
//			}
//}
		/*$data = array(
				'query' => $this->Memodata->get_query()
			);
		$this->db->where('query.id', $userid);*/
		
/*
		$this->form_validation->set_rules('title', 'Title', '');			
		$this->form_validation->set_rules('memo', 'memo', '');
		$this->form_validation->set_rules('id', $userid, '');
		$this->form_validation->set_rules('username', $username, 'r');
		$this->form_validation->set_rules('date', 'Date', 'trim|required|valid_date[m/d/y,/]');	
		$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
	
		if ($this->form_validation->run() == FALSE) // validation hasn't been passed
		{
			
	
			
		}
		else // passed validation proceed to post success logic
		{
		 	// build array for the model
			
			
					}
			// run insert model to write data to db
		
			if ($this->Memodata->SaveForm($form_data) == TRUE) // the information has therefore been successfully saved in the db
			{
				redirect('Memo/success');   // or whatever logic needs to occur
			}
			else
			{
			echo 'An error occurred saving your information. Please try again later';
			// Or whatever error handling is necessary
			}
		
		
	}
}

*/
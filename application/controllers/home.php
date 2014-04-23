<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');
	}
	
	function index(){
		$this->load->view('templates/header');
		$username = $this->session->userdata('username');
		$userid = $this->session->userdata('user_id');
		$data['username']=$username;
		$data['user_id']=$userid;
		$this->load->view('home', $data);
		$this->load->view('templates/footer');

	}

}
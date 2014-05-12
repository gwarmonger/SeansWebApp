<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Seantherobot extends CI_Controller
{
		function __construct()
	{
		parent::__construct();
	
	$this->load->helper(array('form', 'url'));
	$this->load->library('security');
	$this->load->library('tank_auth');
	$this->lang->load('tank_auth');
	}
	function index(){
		$this->load->view('seantherobot');
	}
}
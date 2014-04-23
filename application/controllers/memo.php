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
	}	
	function index(){
		$username = $this->session->userdata('username');
		$userid = $this->session->userdata('user_id');
		$data['username']=$username;
		$data['userid']=$userid;
		$this->load->model('memo/memodata');
		$this->load->view('templates/header');
		$this->load->view('apps/memcalendar');
		$this->load->view('apps/memomain', $data);
		$this->load->view('templates/footer');
	}
	
	function memoform(){
		$memo = $this->input->post('memo');
		$title = $this->input->post('title');
		$username = $this->input->post('username');
		$id = $this->input->post('id');
		$thedate = $this->input->post('thedate');
		$data = array(
			'memo'=>$memo,
			'title'=>$title,
			'username'=>$username,
			'id'=>$id,
			'thedate'=>$thedate,	
		);

		$this->memodata->Memosave($data);
		redirect('/memo');
		
	}
	function drag(){
		$dragposition = $_GET['dragposition'];
	}
	function memoposition(){
		$postop = $this->input->post('postop');
		$posleft = $this->input->post('posleft');
		$memoid = $this->input->post('memoid');
		$data = array(
			'postop'=>$postop,
			'posleft'=>$posleft,
			'memoid'=>$memoid,	
		);
		$this->memodata->Savepos($data);
	}
	function getmemo(){
		
		$jdate = $this->input->post('jdate');
		$this->load->model('memo/memodata');
		$data['memo'] = $this->memodata->Memoquery($jdate);
		$this->load->view('apps/thememo', $data);
		}

}
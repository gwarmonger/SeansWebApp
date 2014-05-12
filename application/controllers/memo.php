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
		$userid = $this->session->userdata('user_id');
		$data['userid']=$userid;
		$this->load->model('memo/memodata');
		$this->load->view('templates/header');
		$this->load->view('memo/memomain',$data);
		$thedate['thedate'] = $this->memodata->Datequery($userid);
		$thedate['title'] = $this->memodata->Datequery($userid);
		$this->load->view('memo/datecontainer', $thedate);
		$this->load->view('memo/memcalendar');
		$this->load->view('memo/memocontainer');
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
		$this->load->view('memo/thememo', $data);
		}
	function deletememo(){
		$this->load->model('memo/memodata');
		$memoid = $this->input->post('memoid');
		$this->memodata->Deletememo($memoid);
	}	
}
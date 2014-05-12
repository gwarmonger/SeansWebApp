<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Songshare extends CI_Controller
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
		$data['userid']=$userid;
		
		$this->load->model('songshare/Songmodel');
		$data2 = array(
			'query' => $this->Songmodel->get_query()
		);
		$this->load->view('songshare/songupload', $data);
		$this->load->view('songshare/musicsharebody', $data2);
		$this->load->view('templates/footer');

}
	function upload(){
		$config['upload_path'] = realpath(APPPATH.'../uploads/');
		$config['max_size']    = '0';
		$config['allowed_types'] = 'mp3|wav';
		$config['remove_spaces'] = TRUE;
		$this->load->library('upload', $config);
		$data = array('upload_data' => $this->upload->data());
			//$upload_data = $this->upload->data();
		
		if (!$this->upload->do_upload('userfile')) {
			$data = array('msg' => $this->upload->display_errors());
		} else { //else, set the success message
			$data = array('upload_data' => $this->upload->data());
			//$upload_data = $this->upload->data(); 
		}
		$url = $data['upload_data']['file_name'];
		$userid = $this->session->userdata('user_id');
		$data['userid']=$userid;
		$songname = $this->input->post('songname');
		$songdesc = $this->input->post('songdesc');
		
		$data = array(
			'songname'=>$songname,
			'songdesc'=>$songdesc,
			'songurl'=>$url,	
		);
		$this->load->model('songshare/Songmodel');
		$this->Songmodel->songupload($data);
		redirect('/songshare');
	}
	function songdelete(){
		$this->load->model('songshare/songmodel');
		$songid = $this->input->post('songid');
		$this->songmodel->Deletesong($songid);	
	}

}

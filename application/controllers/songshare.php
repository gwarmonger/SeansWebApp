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
		$this->load->model('songshare/songmodel');
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
		//form data
		$this->load->helper('form');
		$userid = $this->session->userdata('user_id');
		$data['userid']=$userid;
		$songname = $this->input->post('songname');
		$songdesc = $this->input->post('songdesc');
		$userid = $this->input->post('userid');
		//$data['url'] = "@/var/www/appsdev.uwm.edu-deploy/public_html/appbrewery/uploads/" . $_FILES["photo"]["name"]
		$data = array(
			'songname'=>$songname,
			'songdesc'=>$songdesc,
			'userid'=>$userid,	
		);
		$this->songmodel->Songupload($data);
		//upload data
		
		$config['upload_path'] = 'e:/wamp/myuwmproject2/application/sounduploads/';
		$config['allowed_types'] = 'mp3|wav';
		$this->load->library('upload', $config);
		$this->upload->set_allowed_types('*');
		
		if (!$this->upload->do_upload('userfile')) {
			$data = array('msg' => $this->upload->display_errors());

		} else { //else, set the success message
			$data = array('msg' => "Upload success!");
      
      $data['upload_data'] = $this->upload->data();
      move_uploaded_file($_FILES["userfile"], "e:/wamp/myuwmproject2/application/sounduploads/" );

		}
		//redirect('/songshare');
	}


}

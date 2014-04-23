<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Movie extends CI_Controller {
	function __construct()
	{
 		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->database();
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');
		
		}
	function index(){
		$this->load->model('movie/moviedata');
		$theterm = $this->input->post('term');
		$username = $this->session->userdata('username');
		$userid = $this->session->userdata('user_id');
		$data['username']=$username;
		$data['userid']=$userid;
		//$catdata['category'] = $this->moviedata->Moviequery();
		$catitems['category'] = $this->moviedata->Catitems();
		$this->load->view('templates/header');
		$this->load->view('movie/movienews');
		$this->load->view('movie/movienews2');
		$this->load->view('movie/moviesearch',$data);
		$this->load->view('movie/newdvds');
		$this->load->view('movie/newfilms');
		$this->load->view('movie/upcoming');
		$this->load->view('movie/moviecats');
		$this->load->view('movie/mycats',$catitems);
		$this->load->view('templates/footer');	
		}

	function search(){
		$username = $this->session->userdata('username');
		$userid = $this->session->userdata('user_id');
		$data['username']=$username;
		$data['userid']=$userid;
		$this->load->model('movie/moviedata');
		$theterm = $this->input->post('term');
		$data['category'] = $this->moviedata->Moviequery();
		$this->load->view('templates/header');
		$this->load->view('movie/moviemain', $theterm);
		$this->load->view('movie/moviemodal', $data);
		$this->load->view('templates/footer');
		}
	function category(){
		$category = $this->input->post('category');
		$userid = $this->input->post('userid');
		$data = array(
			'category'=>$category,
			'userid'=>$userid
		);

		$this->load->model('movie/moviedata');
		$this->moviedata->Catsave($data);
		redirect('/movie');
	}
	function addmovie(){
		$this->load->model('movie/moviedata');
		$userid = $this->session->userdata('user_id');
		$data['userid']=$userid;
		$movieid = $this->input->post('movieid');
		$category = $this->input->post('category');
		$title = $this->input->post('title');
		$thumburl = $this->input->post('thumburl');
		$data = array(
			'userid'=>$userid,
			'movieid'=>$movieid,
			'category'=>$category,
			'title'=>$title,
			'thumburl'=>$thumburl	
		);

		$this->moviedata->Addmovie($data);
		redirect('/movie');
		
	}
}
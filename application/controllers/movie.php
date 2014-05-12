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
		$userid = $this->session->userdata('user_id');
		$data['userid']=$userid;
		$data['category'] = $this->moviedata->Getcat();
		$this->load->view('templates/header');
		$this->load->view('movie/movienews');
		$this->load->view('movie/movienews2');
		$this->load->view('movie/moviecats',$data);
		$this->load->view('movie/mycats');
		$this->load->view('movie/moviesearch',$data);
		$this->load->view('movie/newdvds');
		$this->load->view('movie/newfilms');
		$this->load->view('movie/upcoming');
		$this->load->view('movie/moviemodal', $data);
		$this->load->view('templates/footer');	
		}

	function search(){
		$userid = $this->session->userdata('user_id');
		$data['userid']=$userid;
		$this->load->model('movie/moviedata');
		$theterm = $this->input->post('term');
		$data['category'] = $this->moviedata->Getcat();
		$this->load->view('templates/header');
		$this->load->view('movie/moviemain', $theterm);
		$this->load->view('movie/modal2', $data);
		$this->load->view('templates/footer');
		}
	function category(){
		$category = $this->input->post('category');
		$data = array(
			'category'=>$category
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
	}
	function deleteitem(){
		$this->load->model('movie/moviedata');
		$movieid = $this->input->post('movieid');
		$this->moviedata->Deleteitem($movieid);
	}
	function deletecat(){
		$this->load->model('movie/moviedata');
		$cat = $this->input->post('category');
		$this->moviedata->Deletecat($cat);
		
	}
	function getcatitem(){
		$category = $this->input->post('category');
		$this->load->model('movie/moviedata');
		$movies['movies']= $this->moviedata->Catitems($category);
		$this->load->view('movie/catlistcontainer', $movies);
	}
}
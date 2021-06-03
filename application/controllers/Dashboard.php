<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('pagination');

		$this->load->model('AppModel');

	}

	public function index()
	{
		$this->load->view('backend/dashboard');
	}
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('AppModel');
		$this->load->model('CmsNewsModel');
		$this->load->model('CmsModel');
		$this->load->model('CmsServicesModel');
		$this->load->model('konfigurasi_model');

	}
	
	public function index()
	{ 
		$data['site'] = $this->konfigurasi_model->listing();
		$data['profil'] = $this->CmsModel->nav_head();
		$data['menu'] = $this->CmsNewsModel->nav_menu();
		$data['services'] = $this->CmsServicesModel->nav_berita();
		$data['layanan'] = $this->CmsServicesModel->nav_berita();
		$data['app'] = $this->CmsModel->nav_tentangkami();
		$data['app2'] = $this->CmsModel->nav_tentangkami();
		$data['artikel'] = $this->CmsModel->nav_artikel();
		$data['total_blogs'] = $this->AppModel->jumlah_blogs();
		$data['galeri'] = $this->db->get('t_galeri')->result();


		$this->load->view('welcome_message', $data);

	}

}


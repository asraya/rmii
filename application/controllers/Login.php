<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{
		
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		
		if($this->form_validation->run() == false ){
			
	        $this->load->view('auth/login');
		
		}else{
			//validasinya success
			$this->_login();
		}
		
	}

	private function _login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$t_user = $this->db->get_where('t_user', ['email' => $email ])->row_array();
		
		//jika usernya ada
		if($t_user){
		//jika usernya aktif
		if($t_user['user_status'] == 1 ){
			//cek password	
			if($t_user['password'] == sha1(md5($password))){
				$data = [
					'id_user' => $t_user['id_user'],
					'fullname' => $t_user['fullname'],
					'email' => $t_user['email'],
					'id_role' => $t_user['id_role'],
					'user_status' => $t_user['user_status']
				];
			
				$this->session->set_userdata($data);
		
				if ($t_user['id_role'] != 1) {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Akun anda sedang dalam proses aktivasi, notifikasi aktivasi akan dikirim ke email anda.</div>');
			    	redirect('login');
				}else {
					redirect('dashboard');
				}

			}else{
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password!</div>');
			    redirect('login');
			}

		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">This email has not been activated!</div>');
		     	redirect('login');
		}	
			
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email is not registered!</div>');
			redirect('login');
		}
	}

	public function register()
	{	

		$this->form_validation->set_rules('fullname', 'fullname', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[t_user.email]',['is_unique'
		=>'This email has already regestered']);
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]|matches[confirmpassword]',[
			'matches' => 'Password dont matches!',
			'min_length' => 'Password too short']);
		$this->form_validation->set_rules('confirmpassword', 'Password', 'required|trim|matches[password]');
	

		if($this->form_validation->run() == false){

	        $this->load->view('auth/register');
		
		} else {
			
			$data = [
				'fullname'=> htmlspecialchars($this->input->post('fullname', true)),
				'email'=> htmlspecialchars($this->input->post('email', true)),
				'password'=> password_hash($this->input->post('password'),PASSWORD_DEFAULT),
				'id_role'=> 1,
				'user_status'=> 1
			];

				$this->db->insert('t_user',$data);


				$html = "Akun anda sudah terdaftar di Openid Official. Terimakasih ";
					
					//start kirim email
		            $this->load->library('email');
		            $this->email->initialize(array(
		              'protocol' => 'smtp',
		              'smtp_host' => 'smtp.mailgun.org',
		              'smtp_user' => 'postmaster@sandbox7a7c411295d74460a28532f6c52cd23b.mailgun.org',
		              'smtp_pass' => 'c86b79af6e4fdca43807b69bfc4738e7-73ae490d-7a8475af',
		              'smtp_port' => 465,
		              'mailtype' => 'html', // text
		              'crlf' => "\r\n",
		              'newline' => "\r\n"
		            ));

		            $this->email->from('asep.rayana09@gmail.com', 'Openid Official');
		            $this->email->to($this->input->post('email', true)); //$check[0]['f_user_email']
		            $this->email->subject('Registrasi Openid Official');
		            $this->email->message($html);
		            $this->email->send();


		        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Silahkan cek email Anda</div>');  

				redirect('login');

		}	
	}


	public function destroy()
	{
		$this->session->sess_destroy();

        redirect('login');
	}

	public function forgot_pass()
	{
		
        $this->load->view('auth/forgot_password');
        
	}

	public function action_set_password()
	{
		$email = $this->input->post('email');
		$password = password_hash($this->input->post('password'),PASSWORD_DEFAULT);

		$cek = $this->db->get_where('t_user', ['email' => $email])->row();


		if ($cek == true) {
			
			$data = array('password' => $password);

			if ($data) {
				$this->db->where('id_user', $cek->id_user);
				$this->db->update('t_user', $data);

				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password Berhasil Dirubah</div>');  
		            redirect('login');
			}else{
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password Gagal Dirubah</div>');  
		            redirect('login');
			}
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Email Anda Tidak Terdaftar</div>');  
		            redirect('login');
		}
		
	}
}

<?php if(!defined('BASEPATH')) exit('No direct script access allowed'); 
/* Copyright by: VPNKrw */
/* Author: Eryan Fauzan */
/* End of file: auth.php */

class Auth extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model('m_login');
		
	}
	
	function index(){
		if($this->session->userdata('level')=='Admin'){
				redirect ('admin');
			} else if($this->session->userdata('level')=='Kasir'){
				redirect ('kasir');
			}else{
			$this->load->view('login');
			}
	}
	
	function login(){
		$data=(array('username'=>$this->input->post('username'),					 
					 'password'=> sha1($this->input->post('password'))
					 ));

		$data = $this->m_login->get_user($data);
			if($this->session->userdata('level')=='Admin'){
				redirect ('admin');
			} else if($this->session->userdata('level')=='Kasir'){
				redirect ('kasir');
			}else{
			echo "<script>alert('Username Atau Password Salah')</script>";
            redirect('auth','refresh');
			}
		
	}
	

	public function logout() {
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('level');
		$this->session->unset_userdata('foto');
		session_destroy();
		redirect('auth');
	}
	
}
/* Copyright by: VPNKrw */
/* Author: Eryan Fauzan */
/* End of file: auth.php */


?>
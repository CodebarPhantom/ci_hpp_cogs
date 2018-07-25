<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/* Copyright by: Laboratorim UNSIKA */
/* Author: Divisi Software */
/* Beginning of file: posting.php */
 class Posting extends CI_Controller {
        
        function __construct() {
            parent::__construct();
			$this->load->library('session');
			$this->load->helper('url');
			$this->load->helper('download');
			$this->load->model('m_posting');
        }
        
        function index() {
		/* $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
		
		$config['base_url']   = base_url().'posting/index';
		$config['total_rows'] = $this->m_posting->total_record();
		$config['per_page']   = 5;
		$config['uri_segment']= 5;
		$config['next_page']  = 'Next';
		$config['prev_page']  = 'Previous';
		$start = $this->uri->segment(5,0);
		 
		$this->pagination->initialize($config);	*/
			
		$data = (array(	
		   /* 'page' => $this->m_user->get_all_content($config['per_page'],$start),
			'q' => $q,*/
			'posting'=>$this->m_posting->lihat_posting(),
			'category_posting'=>$this->m_posting->category_posting(),
			'paging'=> $this->pagination->create_links()
			
        ));	
            $this->load->view('header',$data);
            $this->load->view('navbar',$data);
            $this->load->view('home');
            $this->load->view('footer');
        }
        
        function about() {
            $this->load->view('header');
            $this->load->view('navbar');
            $this->load->view('about');
            $this->load->view('footer');
        }

    }


/* Copyright by: Laboratorim UNSIKA */
/* Author: Divisi Software */
/* End of file: posting.php */
/* Location: ./application/controllers/posting.php */

?>
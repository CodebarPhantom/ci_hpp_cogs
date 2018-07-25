<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tbl_modal extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tbl_modal_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'tbl_modal/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'tbl_modal/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'tbl_modal/index.html';
            $config['first_url'] = base_url() . 'tbl_modal/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Tbl_modal_model->total_rows($q);
        $tbl_modal = $this->Tbl_modal_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'tbl_modal_data' => $tbl_modal,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('tbl_modal/tbl_modal_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Tbl_modal_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_modal' => $row->id_modal,
		'id_biaya' => $row->id_biaya,
		'kuantitas' => $row->kuantitas,
		'harga' => $row->harga,
		'jumlah' => $row->jumlah,
		'tanggal' => $row->tanggal,
	    );
            $this->load->view('tbl_modal/tbl_modal_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_modal'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('tbl_modal/create_action'),
	    'id_modal' => set_value('id_modal'),
	    'id_biaya' => set_value('id_biaya'),
	    'kuantitas' => set_value('kuantitas'),
	    'harga' => set_value('harga'),
	    'jumlah' => set_value('jumlah'),
	    'tanggal' => set_value('tanggal'),
	);
        $this->load->view('tbl_modal/tbl_modal_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_biaya' => $this->input->post('id_biaya',TRUE),
		'kuantitas' => $this->input->post('kuantitas',TRUE),
		'harga' => $this->input->post('harga',TRUE),
		'jumlah' => $this->input->post('jumlah',TRUE),
		'tanggal' => $this->input->post('tanggal',TRUE),
	    );

            $this->Tbl_modal_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('tbl_modal'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tbl_modal_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('tbl_modal/update_action'),
		'id_modal' => set_value('id_modal', $row->id_modal),
		'id_biaya' => set_value('id_biaya', $row->id_biaya),
		'kuantitas' => set_value('kuantitas', $row->kuantitas),
		'harga' => set_value('harga', $row->harga),
		'jumlah' => set_value('jumlah', $row->jumlah),
		'tanggal' => set_value('tanggal', $row->tanggal),
	    );
            $this->load->view('tbl_modal/tbl_modal_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_modal'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_modal', TRUE));
        } else {
            $data = array(
		'id_biaya' => $this->input->post('id_biaya',TRUE),
		'kuantitas' => $this->input->post('kuantitas',TRUE),
		'harga' => $this->input->post('harga',TRUE),
		'jumlah' => $this->input->post('jumlah',TRUE),
		'tanggal' => $this->input->post('tanggal',TRUE),
	    );

            $this->Tbl_modal_model->update($this->input->post('id_modal', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('tbl_modal'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tbl_modal_model->get_by_id($id);

        if ($row) {
            $this->Tbl_modal_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tbl_modal'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_modal'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_biaya', 'id biaya', 'trim|required');
	$this->form_validation->set_rules('kuantitas', 'kuantitas', 'trim|required');
	$this->form_validation->set_rules('harga', 'harga', 'trim|required');
	$this->form_validation->set_rules('jumlah', 'jumlah', 'trim|required');
	$this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');

	$this->form_validation->set_rules('id_modal', 'id_modal', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tbl_modal.doc");

        $data = array(
            'tbl_modal_data' => $this->Tbl_modal_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('tbl_modal/tbl_modal_doc',$data);
    }

}

/* End of file Tbl_modal.php */
/* Location: ./application/controllers/Tbl_modal.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-04-05 15:00:00 */
/* http://harviacode.com */
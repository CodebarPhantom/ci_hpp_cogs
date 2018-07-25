<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/* Copyright by: Laboratorim UNSIKA */
/* Author: Divisi Software */
/* Beginning of file: user.php */

class Kasir extends CI_Controller {


	function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
		$this->load->library('upload');
		$this->load->model('m_kasir');
		$this->load->helper('url');
		$this->load->helper('download');
		$this->load->library('cart');
		
	}
	
	/*Begin - Home*/
	public function index(){
		if ($this->session->userdata('level') == 'Kasir' ){
		
		$data['pie_chart'] = $this->m_kasir->pie_chart();
		$data['status'] = $this->m_kasir->status();
		
		
		
		/*$data['posting']=$this->m_user->total_posting($id_user);*/
		$id_user = $this->session->userdata('id_user');
		$data['queries']= $this->m_kasir->get_id_user($id_user)->result();
		$data['username']=$this->session->userdata('username');
		$data['level']=$this->session->userdata('level');
		$data['foto']=$this->session->userdata('foto');
		$this->load->view('kasir/header',$data);
		$this->load->view('kasir/navigasi');
		$this->load->view('kasir/dashboard');
		$this->load->view('kasir/footer');
		}else{
           redirect('hak_akses/warning');
       }
	}
	
	public function pemesanan(){
		if ($this->session->userdata('level') == 'Kasir' ){
			$id_user = $this->session->userdata('id_user');
			
		
		$data = (array(		
			'queries' => $this->m_kasir->get_id_user($id_user)->result(),
			'username'=> $this->session->userdata('username'),		
			'level'=> $this->session->userdata('level'),
			'foto'=> $this->session->userdata('foto'),				
			'lihat_menu'=>$this->m_kasir->lihat_menu()
        ));	
		
		$this->load->view('kasir/header',$data);
		$this->load->view('kasir/navigasi');
		$this->load->view('kasir/pemesanan');
		$this->load->view('kasir/footer');
			
			
			}else{
           redirect('hak_akses/warning');
       }
		
	}
	
	public function add_to_cart(){	
		
		$data = array(
						'id' =>  $this->input->post('id_menu'),
						'qty' =>  $this->input->post('qty'),
						'price' =>  $this->input->post('price'),
						'name' =>  $this->input->post('nama_menu')
		);		
		$this->cart->insert($data);
		redirect('kasir/pemesanan');
	}
	
	public function show_cart(){
		if ($this->session->userdata('level') == 'Kasir' ){
			$id_user = $this->session->userdata('id_user');
			
		
		$data = (array(		
			'queries' => $this->m_kasir->get_id_user($id_user)->result(),
			'username'=> $this->session->userdata('username'),		
			'level'=> $this->session->userdata('level'),
			'foto'=> $this->session->userdata('foto'),				
			
        ));	
		
		$this->load->view('kasir/header',$data);
		$this->load->view('kasir/navigasi');
		$this->load->view('kasir/show_cart');
		$this->load->view('kasir/footer');
			
			
			}else{
           redirect('hak_akses/warning');
       }
		
	}
	
	public function delete_pesanan($id){
	$data = array(
               'rowid' => $id,
               'qty'   => 0
            );
        $this->cart->update($data);
			redirect('kasir/show_cart');	
		
	}
	
	public function update_pesanan(){
	$data = array(
               'rowid' => $this->input->post('rowid'),
               'qty'   => $this->input->post('qty')
            );
        $this->cart->update($data);
			redirect('kasir/show_cart');	
		
	}
	
	public function transaksi_proses(){
		
			 $location_counter =  'data.txt';
			 $location_date = 'date.txt';
			 $itis = date ("d");
			 
			 // Hari baru?    
			$aday = join('', file($location_date));
			trim($aday);
		
			if("$aday"=="$itis"){
				//Cari hari ini
				$tcounter = join('', file($location_counter));
				trim($tcounter);
				$tcounter++;
				
				$fp = fopen($location_counter,"w");
				fputs($fp, $tcounter);
				fclose($fp);
			}else{
				//hari baru
				$fp = fopen($location_counter,"w");
				fputs($fp, 0);
				fclose($fp);
				$tcounter = join('', file($location_counter));
				trim($tcounter);
				$tcounter++;
				//tulis hari baru
				$fp = fopen($location_counter,"w");
				fputs($fp, $tcounter);
				fclose($fp);
				//tulis di date.txt
				$fp = fopen($location_date,"w");
				fputs($fp, $itis);
				fclose($fp);	
			}

			$panjang=strlen($tcounter);
			$antrian=$tcounter;
			
			
		
		$this->m_kasir->process($antrian);
	}
	
	function destroy_cart(){
		$this->cart->destroy();

		redirect('kasir/show_cart');	
	}
	
	function pembayaran(){
		if ($this->session->userdata('level') == 'Kasir' ){
			$id_user = $this->session->userdata('id_user');
			$tanggal = date("Y-m-d");
		
		$data = (array(		
			'queries' => $this->m_kasir->get_id_user($id_user)->result(),
			'username'=> $this->session->userdata('username'),		
			'level'=> $this->session->userdata('level'),
			'foto'=> $this->session->userdata('foto'),
			'lihat_pembayaran'=>$this->m_kasir->lihat_pembayaran($tanggal)			
        ));	
		
		$this->load->view('kasir/header',$data);
		$this->load->view('kasir/navigasi');
		$this->load->view('kasir/pembayaran');
		$this->load->view('kasir/footer');		
			}else{
           redirect('hak_akses/warning');
       }
		
	}
	
	function detail_pembayaran($id_pembeli){
		if ($this->session->userdata('level') == 'Kasir' ){
			$id_user = $this->session->userdata('id_user');
			$tanggal = date("Y-m-d");
		
		$data = (array(		
			'queries' => $this->m_kasir->get_id_user($id_user)->result(),
			'username'=> $this->session->userdata('username'),		
			'level'=> $this->session->userdata('level'),
			'foto'=> $this->session->userdata('foto'),
			'detail_pembayaran'=>$this->m_kasir->detail_pembayaran($id_pembeli),
			'keterangan_pembeli'=>$this->m_kasir->keterangan_pembeli($id_pembeli),
			'total_pembelian'=>$this->m_kasir->total_pembelian($id_pembeli)			
        ));	
		 
		$this->load->view('kasir/header',$data);
		$this->load->view('kasir/navigasi');
		$this->load->view('kasir/detail_pembayaran');
		$this->load->view('kasir/footer');		
			}else{
           redirect('hak_akses/warning');
       }
		
		
	}
	
	function proses_pembayaran(){
		if ($this->session->userdata('level') == 'Kasir' ){
			$id_user = $this->session->userdata('id_user');
			$id_pembeli = $this->input->post('id_pembeli');
			$bayar = $this->input->post('bayar');		
		
			$this->m_kasir->update_pembayaran($id_pembeli,$bayar);
$this->session->set_flashdata('pembayaran','pesan');			
		 redirect('kasir/pembayaran');
		}else{
           redirect('hak_akses/warning');
       }
		
	}
	
	function cetak_struk($id_pembeli){
		if ($this->session->userdata('level') == 'Kasir' ){
			$id_user = $this->session->userdata('id_user');
					
		
			$data = (array(		
			'queries' => $this->m_kasir->get_id_user($id_user)->result(),
			'username'=> $this->session->userdata('username'),		
			'level'=> $this->session->userdata('level'),
			'foto'=> $this->session->userdata('foto'),
			'detail_pembayaran'=>$this->m_kasir->detail_pembayaran($id_pembeli),
			'keterangan_pembeli'=>$this->m_kasir->keterangan_pembeli($id_pembeli),
			'total_pembelian'=>$this->m_kasir->total_pembelian($id_pembeli),
			
			));	
				
		$this->load->view('kasir/struk',$data);
		}else{
           redirect('hak_akses/warning');
       }
		
		
	}
	
	function rekap_pembayaran(){
		if ($this->session->userdata('level') == 'Kasir' ){
		$id_user = $this->session->userdata('id_user');
		
		$data = (array(		
			'queries' => $this->m_kasir->get_id_user($id_user)->result(),
			'username'=> $this->session->userdata('username'),		
			'level'=> $this->session->userdata('level'),
			'foto'=> $this->session->userdata('foto')		
        ));	
		$this->load->view('kasir/header',$data);
		$this->load->view('kasir/navigasi');
		$this->load->view('kasir/rekap_pembayaran');
		$this->load->view('kasir/footer');
		}else{
           redirect('hak_akses/warning');
	}
	}
	
	function hasil_rekap_pembayaran(){
		$awal = date("Y-m-d", strtotime($this->input->post('awal')));		
    	$akhir = date("Y-m-d", strtotime($this->input->post('akhir')));
		$data_pembayaran = $this->m_kasir->hasil_rekap_pembayaran($awal,$akhir);		
		$id_user = $this->session->userdata('id_user');
		$data = array(    
			'queries' => $this->m_kasir->get_id_user($id_user)->result(),
			'username'=> $this->session->userdata('username'),		
			'level'=> $this->session->userdata('level'),
			'foto'=> $this->session->userdata('foto'),
			
        	'data_pembayaran' => $data_pembayaran
        );
		$this->load->view('kasir/header',$data);
		$this->load->view('kasir/navigasi');
		$this->load->view('kasir/hasil_rekap_pembayaran');
		$this->load->view('kasir/footer');
		
	}
	
	
	
	
	/*End - Home*/

	
	
}
		
		


/* Copyright by: Laboratorim UNSIKA */
/* Author: Divisi Software */
/* End of file: user.php */
/* Location: ./application/controllers/user.php */
?>
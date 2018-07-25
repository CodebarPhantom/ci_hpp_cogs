<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/* Copyright by: Laboratorim UNSIKA */
/* Author: Divisi Software */
/* Beginning of file: Admin.php */

class Admin extends CI_Controller {


	function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
		$this->load->library('upload');
		$this->load->model('m_admin');
		$this->load->model('m_keuntungan');
		$this->load->model('m_hpp');
		$this->load->helper('url');
		$this->load->helper('download');
		
	}
	
	/*Begin - Home*/
	public function index(){
		if ($this->session->userdata('level') == 'Admin' ){
		$users = 'User';
        $admin = 'Admin';
		$id_user = $this->session->userdata('id_user');
		$tanggal = date("Y-m-d");
		foreach($this->m_admin->omzet_chart()->result_array() as $row){
			$data['grafik'][]=(float)$row['Januari'];
			$data['grafik'][]=(float)$row['Februari'];
			$data['grafik'][]=(float)$row['Maret'];
			$data['grafik'][]=(float)$row['April'];
			$data['grafik'][]=(float)$row['Mei'];
			$data['grafik'][]=(float)$row['Juni'];
			$data['grafik'][]=(float)$row['Juli'];
			$data['grafik'][]=(float)$row['Agustus'];
			$data['grafik'][]=(float)$row['September'];
			$data['grafik'][]=(float)$row['Oktober'];
			$data['grafik'][]=(float)$row['November'];
			$data['grafik'][]=(float)$row['Desember'];
		}
		
		foreach($this->m_admin->modal_chart()->result_array() as $row){
			$data['grafik1'][]=(float)$row['Januari'];
			$data['grafik1'][]=(float)$row['Februari'];
			$data['grafik1'][]=(float)$row['Maret'];
			$data['grafik1'][]=(float)$row['April'];
			$data['grafik1'][]=(float)$row['Mei'];
			$data['grafik1'][]=(float)$row['Juni'];
			$data['grafik1'][]=(float)$row['Juli'];
			$data['grafik1'][]=(float)$row['Agustus'];
			$data['grafik1'][]=(float)$row['September'];
			$data['grafik1'][]=(float)$row['Oktober'];
			$data['grafik1'][]=(float)$row['November'];
			$data['grafik1'][]=(float)$row['Desember'];
		}
		
		foreach($this->m_admin->keuntungan_chart()->result_array() as $row){
			$data['grafik2'][]=(float)$row['Januari'];
			$data['grafik2'][]=(float)$row['Februari'];
			$data['grafik2'][]=(float)$row['Maret'];
			$data['grafik2'][]=(float)$row['April'];
			$data['grafik2'][]=(float)$row['Mei'];
			$data['grafik2'][]=(float)$row['Juni'];
			$data['grafik2'][]=(float)$row['Juli'];
			$data['grafik2'][]=(float)$row['Agustus'];
			$data['grafik2'][]=(float)$row['September'];
			$data['grafik2'][]=(float)$row['Oktober'];
			$data['grafik2'][]=(float)$row['November'];
			$data['grafik2'][]=(float)$row['Desember'];
		}
			
		/*$data['total_users']= $this->m_admin->total_users();
		$data['admin']=$this->m_admin->admin($admin);
		$data['users']=$this->m_admin->users($users);
		$data['posting']=$this->m_admin->total_posting();*/
		$data['queries']= $this->m_admin->get_id_user($id_user)->result();
		$data['username']=$this->session->userdata('username');
		$data['level']=$this->session->userdata('level');
		$data['foto']=$this->session->userdata('foto');
		$data['total_modal_harian']=$this->m_hpp->total_modal_harian($tanggal);
		$data['total_omzet_harian']=$this->m_hpp->total_omzet_harian($tanggal);
		$data['total_transaksi']=$this->m_hpp->total_transaksi($tanggal);
		
		$data['tot_penjualan']  = $this->m_hpp->tot_penjualan($tanggal);
		$data['tot_biaya_lain'] = $this->m_hpp->tot_biaya_lain($tanggal);
		
	
		
		$this->load->view('admin/header',$data);
		$this->load->view('admin/navigasi');
		$this->load->view('admin/dashboard');		
		$this->load->view('admin/footer');		
		}else{
           redirect('hak_akses/warning');
       }
	}
	
	
	/*End - Home*/
	
	/*Begin - Manajemen Pegawai OK*/
	function lihat_pegawai() {
		if ($this->session->userdata('level') == 'Admin' ){
		$id_user = $this->session->userdata('id_user');
		$data = (array(
		
			'queries' => $this->m_admin->get_id_user($id_user)->result(),
			'username'=> $this->session->userdata('username'),		
			'level'=> $this->session->userdata('level'),
			'foto'=> $this->session->userdata('foto'),
			'lihat_pegawai'=>$this->m_admin->lihat_pegawai()
			
        ));		
		$this->load->view('admin/header',$data);
		$this->load->view('admin/navigasi');
		$this->load->view('admin/harga_pokok_produksi/pegawai/view');
		$this->load->view('admin/footer');
		}else{
           redirect('hak_akses/warning');
       }
   
    }
	
	function tambah_pegawai(){
		if ($this->session->userdata('level') == 'Admin' ){
		$id_user = $this->session->userdata('id_user');
		$data = (array(
		
			'queries' => $this->m_admin->get_id_user($id_user)->result(),
			'username'=> $this->session->userdata('username'),		
			'level'=> $this->session->userdata('level'),
			'foto'=> $this->session->userdata('foto'),
			
        ));
		$this->load->view('admin/header',$data);
		$this->load->view('admin/navigasi');
		$this->load->view('admin/harga_pokok_produksi/pegawai/insert');
		$this->load->view('admin/footer');
		}else{
           redirect('hak_akses/warning');
       }
	}
	
	function tambah_pegawai_proses(){
        $this->load->library('upload');
        $config['upload_path'] = './assets/image/foto_pegawai/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '2048'; //maksimum besar file 2M
        $config['max_width']  = '1080'; //lebar maksimum 1288 px
        $config['max_height']  = '1920'; //tinggi maksimu 768 px
		$config['encrypt_name']  = true;
        $this->upload->initialize($config);
         
        if($_FILES['filefoto']['name']){
            if ($this->upload->do_upload('filefoto')){
                $gbr = $this->upload->data();
				
                $data=(array(				       
					   'nik'          => $this->input->post('nik'),
					   'nama_pegawai'      => $this->input->post('nama_pegawai'),
					   'jk'      => $this->input->post('jk'),
					   'alamat'        => $this->input->post('alamat'),
					   'tempat_lahir'=>$this->input->post('tempat_lahir'),
					   'tgl_lahir' =>$this->input->post('tahun')."/".$this->input->post('bulan')."/".$this->input->post('hari'),					  
					   'jabatan'        => $this->input->post('jabatan'),  
					   'no_hp'        => $this->input->post('no_hp'),				  					   
                       'foto' =>$gbr['file_name']					 
					));
					$jabatan = $this->input->post('jabatan');        
					$get_jabatan_id = $this->m_admin->setID_pegawai($jabatan);
 
                $this->m_admin->add_pegawai($get_jabatan_id,$data); //akses model untuk menyimpan ke database
                //pesan yang muncul jika berhasil diupload pada session flashdata
               $this->session->set_flashdata('input_sukses','pesan');
                redirect('admin/lihat_pegawai'); //jika berhasil maka akan ditampilkan view vupload
            }else{
                //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
                $this->session->set_flashdata('input_gagal','pesan');
                redirect('admin/lihat_pegawai'); //jika gagal maka akan ditampilkan form upload
            }
        }else{
			echo "<script>alert('Belum Memilih Gambar Untuk Foto Pegawai')</script>";
			echo("<script>window.history.go(-1)</script>");
            
		}    
	}
	
	function delete_pegawai($id_pegawai){
	$foto = $this->m_admin->get_id_pegawai($id_pegawai)->result();
	$data = $this->m_admin->fungsi2($foto);	
	  $this->m_admin->delete_pegawai($id_pegawai);
	  $this->session->set_flashdata('delete_sukses','pesan');
	  redirect('admin/lihat_pegawai');
	  
	}
	
	function details_pegawai($id_pegawai){
		if ($this->session->userdata('level') == 'Admin' ){
		$id_user = $this->session->userdata('id_user');
		$data = (array(
			'detail'  =>$this->m_admin->get_id_pegawai($id_pegawai)->result(),
			'queries' => $this->m_admin->get_id_user($id_user)->result(),
			'username'=> $this->session->userdata('username'),		
			'level'   => $this->session->userdata('level'),
			'foto'    => $this->session->userdata('foto'),
			
        ));
		
		
		
		$this->load->view('admin/header',$data);
		$this->load->view('admin/navigasi');
		$this->load->view('admin/harga_pokok_produksi/pegawai/details');
		$this->load->view('admin/footer');
		}else{
           redirect('hak_akses/warning');
       }
	}
			
    function update_pegawai($id_pegawai) {
		if ($this->session->userdata('level') == 'Admin' ){
		$id_user = $this->session->userdata('id_user');
		$data = (array(
			'detail' =>$this->m_admin->get_id_update_pegawai($id_pegawai)->result(),
			'queries' => $this->m_admin->get_id_user($id_user)->result(),
			'username'=> $this->session->userdata('username'),		
			'level'=> $this->session->userdata('level'),
			'foto'=> $this->session->userdata('foto'),
			
        ));
		
	        
       $this->load->view('admin/header',$data);
		$this->load->view('admin/navigasi');
		$this->load->view('admin/harga_pokok_produksi/pegawai/update');
		$this->load->view('admin/footer');
    }else{
           redirect('hak_akses/warning');
       }
	}
    
    function update_pegawai_proses(){
		
		$id_pegawai = $this->input->post('id_pegawai');
		$this->load->library('upload');
        $config['upload_path'] = './assets/image/foto_pegawai/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '2048'; //maksimum besar file 2M
        $config['max_width']  = '1920'; //lebar maksimum 1288 px
        $config['max_height']  = '1080'; //tinggi maksimu 768 px
		$config['encrypt_name']  = true;
        $this->upload->initialize($config);
        if($_FILES['filefoto']['name']){
            if ($this->upload->do_upload('filefoto')){	
					$foto = $this->m_admin->get_id_update_pegawai($id_pegawai)->result();
					$data = $this->m_admin->fungsi($foto);					
					if($data==''){
						
						$gbr = $this->upload->data();
						$data['foto'] = $this->session->userdata('foto');
						$data_pegawai=(array(
					   'nik'          => $this->input->post('nik'),
					   'nama_pegawai'      => $this->input->post('nama_pegawai'),
					   'jk'      => $this->input->post('jk'),
					   'alamat'        => $this->input->post('alamat'),
					   'tempat_lahir'=>$this->input->post('tempat_lahir'),
					   'tgl_lahir' =>$this->input->post('tahun')."/".$this->input->post('bulan')."/".$this->input->post('hari'),					  
					   'jabatan'        => $this->input->post('jabatan'),  
					   'no_hp'        => $this->input->post('no_hp'),   
					   					   
                       'foto' =>$gbr['file_name']
							));
						$this->m_admin->update_pegawai($id_pegawai,$data_pegawai);
						$this->session->set_flashdata('update_sukses','pesan');
						redirect('admin/lihat_pegawai');
				}else{
                $gbr = $this->upload->data();
				$foto = $this->m_admin->get_id_update_pegawai($id_pegawai)->result();
				$data = $this->m_admin->fungsi2($foto);				
                	$data_pegawai=(array(
					   'nik'          => $this->input->post('nik'),
					   'nama_pegawai'      => $this->input->post('nama_pegawai'),
					   'jk'      => $this->input->post('jk'),
					   'alamat'        => $this->input->post('alamat'),
					   'tempat_lahir'=>$this->input->post('tempat_lahir'),
					   'tgl_lahir' =>$this->input->post('tahun')."/".$this->input->post('bulan')."/".$this->input->post('hari'),					  
					   'jabatan'        => $this->input->post('jabatan'),  
					   'no_hp'        => $this->input->post('no_hp'),  
					   				   
                       'foto' =>$gbr['file_name']
							));
				$this->m_admin->update_pegawai($id_pegawai,$data_pegawai);
				$this->session->set_flashdata('update_sukses','pesan');
                redirect('admin/lihat_pegawai'); //jika berhasil maka akan ditampilkan view vupload
				}
			}else{
               $this->session->set_flashdata('update_gagal','pesan');
                redirect('admin/lihat_pegawai'); //jika gagal maka akan ditampilkan form upload
            }
        }else if(empty($_FILES['foto']['name'])){
		
                	$data_pegawai=(array(
					   'nik'          => $this->input->post('nik'),
					   'nama_pegawai'      => $this->input->post('nama_pegawai'),
					   'jk'      => $this->input->post('jk'),
					   'alamat'        => $this->input->post('alamat'),
					   'tempat_lahir'=>$this->input->post('tempat_lahir'),
					   'tgl_lahir' =>$this->input->post('tahun')."/".$this->input->post('bulan')."/".$this->input->post('hari'),					  
					   'jabatan'        => $this->input->post('jabatan'),  
					   'no_hp'        => $this->input->post('no_hp'),
                       				   
                      
							));
				$this->m_admin->update_pegawai($id_pegawai,$data_pegawai);
				$this->session->set_flashdata('update_sukses','pesan');
				redirect('admin/lihat_pegawai','refresh');
		}
	
	}	
	/*End - Manajemen Pegawai*/
	
	/*Begin - Manajemen User OK*/
	function tambah_user(){
		if ($this->session->userdata('level') == 'Admin' ){
		$id_user = $this->session->userdata('id_user');
		$data = (array(
		
			'queries' => $this->m_admin->get_id_user($id_user)->result(),
			'username'=> $this->session->userdata('username'),		
			'level'=> $this->session->userdata('level'),
			'foto'=> $this->session->userdata('foto'),
			
        ));
		$this->load->view('admin/header',$data);
		$this->load->view('admin/navigasi');
		$this->load->view('admin/master_data_user/user/insert');
		$this->load->view('admin/footer');
		}else{
           redirect('hak_akses/warning');
       }
	}
	
	function tambah_user_proses(){
        $data=(array(
					   'nama_user'     => $this->input->post('nama_user'),
					   'username'      => $this->input->post('username'),
					   'password'      =>sha1($this->input->post('password')),					   
                       'level'         => $this->input->post('level')		 
					));
					$level = $this->input->post('level');        
					$get_level_id = $this->m_admin->setID($level);
 
				  $this->m_admin->add_user($get_level_id,$data);
				if($data >= 1){
					$this->session->set_flashdata('input_sukses','pesan');
					redirect('admin/lihat_user','refresh');    
				}else{
						$this->session->set_flashdata('input_gagal','pesan');
					redirect('admin/lihat_user','refresh');  
					}
	}                
	
	function lihat_user() {
		if ($this->session->userdata('level') == 'Admin' ){
		$id_user = $this->session->userdata('id_user');
		$data = (array(
		
			'queries' => $this->m_admin->get_id_user($id_user)->result(),
			'username'=> $this->session->userdata('username'),		
			'level'=> $this->session->userdata('level'),
			'foto'=> $this->session->userdata('foto'),
			'lihat_user'=>$this->m_admin->lihat_user()
			
        ));		
		$this->load->view('admin/header',$data);
		$this->load->view('admin/navigasi');
		$this->load->view('admin/master_data_user/user/view');
		$this->load->view('admin/footer');
		}else{
           redirect('hak_akses/warning');
       }
   
    }
	
    function delete_user($id_user1){
	
	  $this->m_admin->delete_user($id_user1);
	  $this->session->set_flashdata('delete_sukses','pesan');
	  redirect('admin/lihat_user');
	  
	}	
	
    function update_user($id_user1) {
		if ($this->session->userdata('level') == 'Admin' ){
		$id_user = $this->session->userdata('id_user');
		$data = (array(
			'detail' =>$this->m_admin->get_id_update($id_user1)->result(),
			'queries' => $this->m_admin->get_id_user($id_user)->result(),
			'username'=> $this->session->userdata('username'),		
			'level'=> $this->session->userdata('level'),
			'foto'=> $this->session->userdata('foto'),
			
        ));
		
	        
       $this->load->view('admin/header',$data);
		$this->load->view('admin/navigasi');
		$this->load->view('admin/master_data_user/user/update');
		$this->load->view('admin/footer');
    }else{
           redirect('hak_akses/warning');
       }
	}
    
    function update_user_proses(){
		
		$id_user = $this->input->post('id_user');	
						
		if($this->input->post('password')==''){
			$data_user=(array(
				'nama_user'     => $this->input->post('nama_user'),
				'username'      => $this->input->post('username'),					   			   
                'level'         => $this->input->post('level')
				));
		}else{
			$data_user=(array(
					   'nama_user'     => $this->input->post('nama_user'),
					   'username'      => $this->input->post('username'),
					   'password'      => sha1($this->input->post('password')),					   
                       'level'         => $this->input->post('level')
					   ));
			}
		$this->m_admin->update_user($id_user,$data_user);
		
		$this->session->set_flashdata('update_sukses','pesan');
		redirect('admin/lihat_user','refresh');    
				
	
	}
	/*End - Manajemen User*/
	
	/*Begin - Manajemen Category menu OK*/
	function lihat_category_menu() {
		if ($this->session->userdata('level') == 'Admin' ){
		$id_user = $this->session->userdata('id_user');
		$data = (array(
		
			'queries' => $this->m_admin->get_id_user($id_user)->result(),
			'username'=> $this->session->userdata('username'),		
			'level'=> $this->session->userdata('level'),
			'foto'=> $this->session->userdata('foto'),
			'lihat_category_menu'=>$this->m_admin->lihat_category_menu()
			
        ));	
		$this->load->view('admin/header',$data);
		$this->load->view('admin/navigasi');
		$this->load->view('admin/manajemen_menu/category_menu/view');
		$this->load->view('admin/footer');
		}else{
           redirect('hak_akses/warning');
       }
   
    }
			
	function tambah_category_menu_proses(){
		
				
		$data_category_menu=(array('category_menu'=>$this->input->post('category_menu')));
		$get_id_category = $this->m_admin->set_id_category();
		$this->m_admin->add_category_menu($get_id_category,$data_category_menu);
		if($data_category_menu >= 1){
					$this->session->set_flashdata('input_sukses','pesan');
					redirect('admin/lihat_category_menu','refresh');    
				}else{
						$this->session->set_flashdata('input_gagal','pesan');
					redirect('admin/lihat_category_menu','refresh');  
					}
		
	}
	
	function delete_category_menu($id_category){
		
		$this->m_admin->delete_category_menu($id_category);
		$this->session->set_flashdata('delete_sukses','pesan');
		redirect('admin/lihat_category_menu');
	
	}
	
	function update_category_menu($id_category){
		if ($this->session->userdata('level') == 'Admin' ){
		$id_user = $this->session->userdata('id_user');
		$data = (array(
		
			'queries' => $this->m_admin->get_id_user($id_user)->result(),
			'username'=> $this->session->userdata('username'),		
			'level'=> $this->session->userdata('level'),
			'foto'=> $this->session->userdata('foto'),
			'update'=>$this->m_admin->get_id_category_menu($id_category)->result()
			
        ));	
		
		$this->load->view('admin/header',$data);
		$this->load->view('admin/navigasi');
		$this->load->view('admin/manajemen_menu/category_menu/update');
		$this->load->view('admin/footer');
	
		}else{
           redirect('hak_akses/warning');
		}
	}
	
	function update_category_menu_proses(){
	
	$id_category = $this->input->post('id_category');
	
		$data_category=(array('category_menu'=>$this->input->post('category_menu')
		));
		$this->m_admin->update_category_menu($id_category,$data_category);
		
		if($data_category >= 1){
		$this->session->set_flashdata('update_sukses','pesan');
		redirect('admin/lihat_category_menu','refresh');    
				}else{
						$this->session->set_flashdata('update_gagal','pesan');
					redirect('admin/lihat_category_menu','refresh');  
					}
	
	}
	
	/*End - Manajemen Category menu*/
	
	/*Begin - Menu OK*/
	function lihat_menu() {
		if ($this->session->userdata('level') == 'Admin' ){
		$id_user = $this->session->userdata('id_user');
		$data = (array(
		
			'queries' => $this->m_admin->get_id_user($id_user)->result(),
			'username'=> $this->session->userdata('username'),		
			'level'=> $this->session->userdata('level'),
			'foto'=> $this->session->userdata('foto'),
			'lihat_menu'=>$this->m_admin->lihat_menu()
			
        ));		
		$this->load->view('admin/header',$data);
		$this->load->view('admin/navigasi');
		$this->load->view('admin/manajemen_menu/menu/view');
		$this->load->view('admin/footer');
		}else{
           redirect('hak_akses/warning');
       }
   
    }
	
	function tambah_menu(){
		if ($this->session->userdata('level') == 'Admin' ){
		$id_user = $this->session->userdata('id_user');
		$data = (array(
		
			'queries' => $this->m_admin->get_id_user($id_user)->result(),
			'username'=> $this->session->userdata('username'),		
			'level'=> $this->session->userdata('level'),
			'foto'=> $this->session->userdata('foto'),
			'id_category'=>$this->m_admin->lihat_category_menu()
			
        ));
		$this->load->view('admin/header',$data);
		$this->load->view('admin/navigasi');
		$this->load->view('admin/manajemen_menu/menu/insert');
		$this->load->view('admin/footer');
		}else{
           redirect('hak_akses/warning');
       }
	}
	
	function tambah_menu_proses(){
        $this->load->library('upload');
        $config['upload_path'] = './assets/image/foto_menu/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '2048'; //maksimum besar file 2M
        $config['max_width']  = '1920'; //lebar maksimum 1288 px
        $config['max_height']  = '1080'; //tinggi maksimu 768 px
		$config['encrypt_name']  = true;
        $this->upload->initialize($config);
         
        if($_FILES['filefoto']['name']){
            if ($this->upload->do_upload('filefoto')){
                $gbr = $this->upload->data();
				
                $data=(array(				       
					   'id_menu'          => $this->m_admin->setID_menu(),
					   'nama_menu'      => $this->input->post('nama_menu'),
					   'id_category'      => $this->input->post('id_category'),
					   'harga'      => $this->input->post('harga'),					   
                       'foto' =>$gbr['file_name']
					 
					));
					
 
                $this->m_admin->add_menu($data); //akses model untuk menyimpan ke database
                //pesan yang muncul jika berhasil diupload pada session flashdata
                $this->session->set_flashdata('input_sukses','pesan');
                redirect('admin/lihat_menu','refresh'); //jika berhasil maka akan ditampilkan view vupload
            }else{
                //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
                $this->session->set_flashdata('input_gagal','pesan');
                redirect('admin/lihat_menu','refresh'); //jika gagal maka akan ditampilkan form upload
            }
        }else{
			echo "<script>alert('Belum Memilih Gambar Untuk Foto Menu')</script>";
			echo("<script>window.history.go(-1)</script>");
            
		}    
	}
	
	function delete_menu($id_menu){
	$foto = $this->m_admin->get_id_menu($id_menu)->result();
	$data = $this->m_admin->fungsi3($foto);	
	  $this->m_admin->delete_menu($id_menu);
	  $this->session->set_flashdata('delete_sukses','pesan');
	  redirect('admin/lihat_menu');
	  
	}
	
	function update_menu($id_menu){
		if ($this->session->userdata('level') == 'Admin' ){
		$id_user = $this->session->userdata('id_user');
		
		$row = $this->m_admin->get_menu_row($id_menu);
		if ($row) {
            $data = array(
			'queries' => $this->m_admin->get_id_user($id_user)->result(),
			'username'=> $this->session->userdata('username'),		
			'level'=> $this->session->userdata('level'),
			'foto'=> $this->session->userdata('foto'),
			
			'update'=>$this->m_admin->get_id_menu($id_menu)->result(),
			'id_menu' => set_value('id_menu', $row->id_menu),
			'id_category' => set_value('id_category',$row->id_category),			
			'nama_menu' => set_value('nama_menu', $row->nama_menu),
			
						
			);
			
			$this->load->view('admin/header',$data);
			$this->load->view('admin/navigasi');
			$this->load->view('admin/manajemen_menu/menu/update',$data);
			$this->load->view('admin/footer');
			} else {
				$this->session->set_flashdata('message', 'Record Not Found');
				redirect(site_url('admin/lihat_menu'));}
		}else{
           redirect('hak_akses/warning');
		}
	}
	
	function update_menu_proses(){
		
		$id_menu = $this->input->post('id_menu');
		$this->load->library('upload');
        $config['upload_path'] = './assets/image/foto_menu/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '2048'; //maksimum besar file 2M
        $config['max_width']  = '1920'; //lebar maksimum 1288 px
        $config['max_height']  = '1080'; //tinggi maksimu 768 px
		$config['encrypt_name']  = true;
        $this->upload->initialize($config);
        if($_FILES['filefoto']['name']){
            if ($this->upload->do_upload('filefoto')){	
					$foto = $this->m_admin->get_id_menu($id_menu)->result();
					$data = $this->m_admin->fungsi($foto);	
					if($data==''){
						
						$gbr = $this->upload->data();
						$data['foto'] = $this->session->userdata('foto');
						$data_menu=(array(
					   'nama_menu'      => $this->input->post('nama_menu'),
					   'id_category'      => $this->input->post('id_category'),	
					   'harga'      => $this->input->post('harga'),						   
                       'foto' =>$gbr['file_name']
							));
						$this->m_admin->update_menu($id_menu,$data_menu);
						$this->session->set_flashdata('update_sukses','pesan');
						redirect('admin/lihat_menu','refresh');
				}else{
                $gbr = $this->upload->data();
				$foto = $this->m_admin->get_id_menu($id_menu)->result();
				$data = $this->m_admin->fungsi3($foto);	
				
                	$data_menu=(array(
					  'nama_menu'      => $this->input->post('nama_menu'),
					   'id_category'      => $this->input->post('id_category'),	
						'harga'      => $this->input->post('harga'),	
                       'foto' =>$gbr['file_name']
							));
				$this->m_admin->update_menu($id_menu,$data_menu);
				$this->session->set_flashdata('update_sukses','pesan');
                redirect('admin/lihat_menu','refresh'); //jika berhasil maka akan ditampilkan view vupload
				}
			}else{
                $this->session->set_flashdata('update_gagal','pesan');
                redirect('admin/lihat_menu','refresh'); //jika gagal maka akan ditampilkan form upload
            }
        }else if(empty($_FILES['foto']['name'])){
		
                	$data_menu=(array(
					   'nama_menu'      => $this->input->post('nama_menu'),
					   'id_category'      => $this->input->post('id_category'),	
					   'harga'      => $this->input->post('harga'),						   
                      
							));
				$this->m_admin->update_menu($id_menu,$data_menu);
				$this->session->set_flashdata('update_sukses','pesan');
				redirect('admin/lihat_menu','refresh');
		}
	
	}	
	
	function details_menu($id_menu) {
		if ($this->session->userdata('level') == 'Admin' ){
		$id_user = $this->session->userdata('id_user');
		
		$data = (array(
		
			'queries' => $this->m_admin->get_id_user($id_user)->result(),
			'username'=> $this->session->userdata('username'),		
			'level'=> $this->session->userdata('level'),
			'foto'=> $this->session->userdata('foto'),
			
			'details'=>$this->m_admin->get_id_menu_details($id_menu),
			'id_biaya'=>$this->m_hpp->lihat_daftar_biaya(),
			'query'=>$this->m_hpp->lihat_resep($id_menu)
			
			
        ));		
		$this->load->view('admin/header',$data);
		$this->load->view('admin/navigasi');
		$this->load->view('admin/manajemen_menu/menu/details');
		$this->load->view('admin/footer');
		}else{
           redirect('hak_akses/warning');
       }
   
    }
	
	function tambah_resep_proses() {
		if ($this->session->userdata('level') == 'Admin' ){
		$id_user = $this->session->userdata('id_user');
		$id_menu = $this->input->post('id_menu');
		$data_resep = (array(
			'id_menu' => $this->input->post('id_menu'),
			'id_biaya'=>$this->input->post('id_biaya')			
        ));	
		$this->m_hpp->add_resep($data_resep);
		$this->session->set_flashdata('input_sukses','pesan');		
		redirect('admin/details_menu/'.$id_menu);
		}else{
           redirect('hak_akses/warning');
       }
   
    }
	
	function delete_resep($id_resep){
		if ($this->session->userdata('level') == 'Admin' ){
		
		$id_menu = $this->input->post('id_menu');
		$this->m_hpp->delete_resep($id_resep);
		$this->session->set_flashdata('delete_sukses','pesan');
		redirect('admin/details_menu/'.$id_menu);
		}else{
           redirect('hak_akses/warning');
       }
	
	}
	
	/*End - Menu*/
	
	
	/*Begin - Komponen Biaya HPP OK*/
	function lihat_daftar_biaya() {
		if ($this->session->userdata('level') == 'Admin' ){
		$id_user = $this->session->userdata('id_user');
		$data = (array(
		
			'queries' => $this->m_admin->get_id_user($id_user)->result(),
			'username'=> $this->session->userdata('username'),		
			'level'=> $this->session->userdata('level'),
			'foto'=> $this->session->userdata('foto'),
			'lihat_daftar_biaya'=>$this->m_hpp->lihat_daftar_biaya()
			
        ));	
		$this->load->view('admin/header',$data);
		$this->load->view('admin/navigasi');
		$this->load->view('admin/harga_pokok_produksi/biaya/view');
		$this->load->view('admin/footer');
		}else{
           redirect('hak_akses/warning');
       }
   
    }
	
	function tambah_biaya_proses(){			
		$data_biaya=(array('nama_biaya'=>$this->input->post('nama_biaya'),
		'satuan'=>$this->input->post('satuan'),
		'golongan_biaya'=>$this->input->post('golongan_biaya')
		));
		$golongan_biaya = $this->input->post('golongan_biaya');
		$get_id_biaya = $this->m_hpp->set_id_biaya($golongan_biaya);
		$this->m_hpp->add_biaya($get_id_biaya,$data_biaya);
		if($data_biaya >= 1){
		$this->session->set_flashdata('input_sukses','pesan');
		redirect('admin/lihat_daftar_biaya','refresh');    
				}else{
					$this->session->set_flashdata('input_gagal','pesan');
					redirect('admin/lihat_daftar_biaya','refresh');  
					}
		
		
	}
	
	function delete_biaya($id_biaya){
		
		$this->m_hpp->delete_biaya($id_biaya);
		$this->session->set_flashdata('delete_sukses','pesan');
		redirect('admin/lihat_daftar_biaya');
	
	}
	
	function update_biaya($id_biaya){
		if ($this->session->userdata('level') == 'Admin' ){
		$id_user = $this->session->userdata('id_user');
		$data = (array(		
			'queries' => $this->m_admin->get_id_user($id_user)->result(),
			'username'=> $this->session->userdata('username'),		
			'level'=> $this->session->userdata('level'),
			'foto'=> $this->session->userdata('foto'),
			'update'=>$this->m_hpp->get_id_biaya($id_biaya)->result()
			
        ));	
		
		$this->load->view('admin/header',$data);
		$this->load->view('admin/navigasi');
		$this->load->view('admin/harga_pokok_produksi/biaya/update');
		$this->load->view('admin/footer');
	
		}else{
           redirect('hak_akses/warning');
		}
	}
	
	function update_biaya_proses(){
	
	$id_biaya = $this->input->post('id_biaya');
	
		$data_biaya=(array('nama_biaya'=>$this->input->post('nama_biaya'),
		'satuan'=>$this->input->post('satuan'),
		'golongan_biaya'=>$this->input->post('golongan_biaya')
		));
		$this->m_hpp->update_biaya($id_biaya,$data_biaya);
		if($data_biaya >= 1){
		$this->session->set_flashdata('update_sukses','pesan');
		redirect('admin/lihat_daftar_biaya','refresh');    
				}else{
						$this->session->set_flashdata('update_gagal','pesan');
					redirect('admin/lihat_daftar_biaya','refresh');  
					}
	}
		
	/*End - Komponen Biaya HPP*/	
	
	/*Begin - Input Modal Harian OK*/
	function lihat_modal_harian() {
		if ($this->session->userdata('level') == 'Admin' ){
		$id_user = $this->session->userdata('id_user');
		$tanggal = date("Y-m-d");
		$data = (array(		
			'queries' => $this->m_admin->get_id_user($id_user)->result(),
			'username'=> $this->session->userdata('username'),		
			'level'=> $this->session->userdata('level'),
			'foto'=> $this->session->userdata('foto'),			
			'lihat_modal_harian'=>$this->m_hpp->lihat_modal_harian($tanggal),
			'total_modal_harian'=>$this->m_hpp->total_modal_harian($tanggal),			
			'id_biaya'=>$this->m_hpp->lihat_daftar_biaya()
			
			
        ));	
		$this->load->view('admin/header',$data);
		$this->load->view('admin/navigasi');
		$this->load->view('admin/harga_pokok_produksi/modal_harian/view');
		$this->load->view('admin/footer');
		}else{
           redirect('hak_akses/warning');
       }
   
    }
	
	function tambah_modal_proses(){
		$data=(array(		 'id_biaya'=>$this->input->post('id_biaya'),
							 'kuantitas'=>$this->input->post('kuantitas'),
							 'harga'=>$this->input->post('harga'),
					         'jumlah'=>$this->input->post('kuantitas')*$this->input->post('harga'), 
							 'tanggal'=>date("Y-m-d")							 			 
					));			
			$this->m_hpp->add_modal($data);
		   if($data >= 1){
		$this->session->set_flashdata('input_sukses','pesan');
		redirect('admin/lihat_modal_harian','refresh');    
				}else{
					$this->session->set_flashdata('input_gagal','pesan');
					redirect('admin/lihat_modal_harian','refresh');  
					}
	}
	
	function update_modal($id_modal){
		if ($this->session->userdata('level') == 'Admin' ){
		$id_user = $this->session->userdata('id_user');
		
		$row = $this->m_hpp->get_modal_row($id_modal);
		if ($row) {
            $data = array(
			'queries' => $this->m_admin->get_id_user($id_user)->result(),
			'username'=> $this->session->userdata('username'),		
			'level'=> $this->session->userdata('level'),
			'foto'=> $this->session->userdata('foto'),
			
			'update'=>$this->m_hpp->get_id_modal($id_modal)->result(),
			'id_biaya' => set_value('id_biaya',$row->id_biaya),
			'id_modal' => set_value('id_modal', $row->id_modal),
			'kuantitas' => set_value('kuantitas', $row->kuantitas),
			'harga' => set_value('harga', $row->harga)			
			);
			
			$this->load->view('admin/header',$data);
			$this->load->view('admin/navigasi');
			$this->load->view('admin/harga_pokok_produksi/modal_harian/update');
			$this->load->view('admin/footer');
			} else {
				$this->session->set_flashdata('message', 'Record Not Found');
				redirect(site_url('admin/lihat_modal_harian'));}
		}else{
           redirect('hak_akses/warning');
		}
	}
	
	function update_modal_proses(){
		$id_modal = $this->input->post('id_modal');
		$data=(array(		 'id_biaya'=>$this->input->post('id_biaya'),
							 'kuantitas'=>$this->input->post('kuantitas'),
							 'harga'=>$this->input->post('harga'),
					         'jumlah'=>$this->input->post('kuantitas')*$this->input->post('harga') 						 			 
					));			
			$this->m_hpp->update_modal($id_modal,$data);
			if($data >= 1){
		$this->session->set_flashdata('update_sukses','pesan');
		redirect('admin/lihat_modal_harian','refresh');    
				}else{
						$this->session->set_flashdata('update_gagal','pesan');
					redirect('admin/lihat_modal_harian','refresh');  
					}
	}
	
	function modal_terdahulu() {
		if ($this->session->userdata('level') == 'Admin' ){
		$id_user = $this->session->userdata('id_user');
		
		$data = (array(		
			'queries' => $this->m_admin->get_id_user($id_user)->result(),
			'username'=> $this->session->userdata('username'),		
			'level'=> $this->session->userdata('level'),
			'foto'=> $this->session->userdata('foto')		
        ));	
		$this->load->view('admin/header',$data);
		$this->load->view('admin/navigasi');
		$this->load->view('admin/harga_pokok_produksi/modal_harian/modal_terdahulu');
		$this->load->view('admin/footer');
		}else{
           redirect('hak_akses/warning');
       }
   
    }
	
	function hasil_terdahulu(){
		$awal = date("Y-m-d", strtotime($this->input->post('awal')));		
    	$akhir = date("Y-m-d", strtotime($this->input->post('akhir')));
		$data_modal = $this->m_hpp->get_modal($awal,$akhir);
		$total_modal = $this->m_hpp->total_modal($awal,$akhir);
		$id_user = $this->session->userdata('id_user');
		$data = array(    
			'queries' => $this->m_admin->get_id_user($id_user)->result(),
			'username'=> $this->session->userdata('username'),		
			'level'=> $this->session->userdata('level'),
			'foto'=> $this->session->userdata('foto'),
			'total_modal'=>$total_modal,
        	'data_modal' => $data_modal,
        );
		$this->load->view('admin/header',$data);
		$this->load->view('admin/navigasi');
		$this->load->view('admin/harga_pokok_produksi/modal_harian/hasil_terdahulu');
		$this->load->view('admin/footer');
		
		
	}	
	
	/*End - Overhead Pabrik*/
	
	/*Begin - HPP OK*/
	function pilih_hpp() {
		if ($this->session->userdata('level') == 'Admin' ){
		$id_user = $this->session->userdata('id_user');
		$data = (array(
		
			'queries' => $this->m_admin->get_id_user($id_user)->result(),
			'username'=> $this->session->userdata('username'),		
			'level'=> $this->session->userdata('level'),
			'foto'=> $this->session->userdata('foto'),
			
			'id_menu'=>$this->m_admin->lihat_menu()
			
			
        ));		
		$this->load->view('admin/header',$data);
		$this->load->view('admin/navigasi');
		$this->load->view('admin/harga_pokok_produksi/lihat_hpp/pilih');
		$this->load->view('admin/footer');
		}else{
           redirect('hak_akses/warning');
       }
   
    }
	
	function hasil_hpp(){
		if ($this->session->userdata('level') == 'Admin' ){
			$id_menu=$this->input->post('id_menu');
			$bulan= $this->input->post('bulan');
			$tahun= $this->input->post('tahun');
			$id_user = $this->session->userdata('id_user');
			
			$bahan_baku = $this->m_hpp->bahan_baku($id_menu,$bulan,$tahun);
			$total_bahan_baku = $this->m_hpp->total_bahan_baku($id_menu,$bulan,$tahun);
			
			$bahan_penolong = $this->m_hpp->bahan_penolong($id_menu,$bulan,$tahun);
			$total_bahan_penolong = $this->m_hpp->total_bahan_penolong($id_menu,$bulan,$tahun);
			
			$tktl=$this->m_hpp->tktl($bulan,$tahun);
			$total_tktl=$this->m_hpp->total_tktl($bulan,$tahun);
			
			$tkl=$this->m_hpp->tkl($bulan,$tahun);
			$total_tkl=$this->m_hpp->total_tkl($bulan,$tahun);
			
			$pemeliharaan=$this->m_hpp->pemeliharaan($bulan,$tahun);
			$total_pemeliharaan=$this->m_hpp->total_pemeliharaan($bulan,$tahun);
			
			$bop_lain=$this->m_hpp->bop_lain($bulan,$tahun);
			$total_bop_lain=$this->m_hpp->total_bop_lain($bulan,$tahun);
			
			$tampil_nama_menu= $this->m_hpp->tampil_nama_menu($id_menu);
			
			$hasil_produksi = $this->m_hpp->hasil_produksi($bulan,$tahun,$id_menu);
		$data = (array(    
			'queries' => $this->m_admin->get_id_user($id_user)->result(),
			'username'=> $this->session->userdata('username'),		
			'level'=> $this->session->userdata('level'),
			'foto'=> $this->session->userdata('foto'),
			
			'bahan_baku'=>$bahan_baku,
			'total_bahan_baku'=>$total_bahan_baku,
			
			'bahan_penolong'=>$bahan_penolong,
			'total_bahan_penolong'=>$total_bahan_penolong,

			'tkl'=>$tkl,
			'total_tkl'=>$total_tkl,

			'tktl'=>$tktl,
			'total_tktl'=>$total_tktl,
			
			'pemeliharaan'=>$pemeliharaan,
			'total_pemeliharaan'=>$total_pemeliharaan,
			
			'bop_lain'=>$bop_lain,
			'total_bop_lain'=>$total_bop_lain,
			
			'tampil_nama_menu'=>$tampil_nama_menu,
			'hasil_produksi'=>$hasil_produksi
			
			
			
        ));
		$this->load->view('admin/header',$data);
		$this->load->view('admin/navigasi');
		$this->load->view('admin/harga_pokok_produksi/lihat_hpp/hpp');
		$this->load->view('admin/footer');
		
			
			}else{
           redirect('hak_akses/warning');
       }
	}
	/*End - HPP*/
	
	/*Begin - Biaya Lain OK*/
	function lihat_biaya_lain(){
		if ($this->session->userdata('level') == 'Admin' ){
		$id_user = $this->session->userdata('id_user');
		$data = (array(
		
			'queries' => $this->m_admin->get_id_user($id_user)->result(),
			'username'=> $this->session->userdata('username'),		
			'level'=> $this->session->userdata('level'),
			'foto'=> $this->session->userdata('foto'),
			'lihat_biaya_lain'=>$this->m_admin->lihat_biaya_lain()
			
        ));	
		$this->load->view('admin/header',$data);
		$this->load->view('admin/navigasi');
		$this->load->view('admin/biaya_lain/view');
		$this->load->view('admin/footer');
		}else{
           redirect('hak_akses/warning');
       }
		
	}
	
	function tambah_biaya_lain_proses(){
		$data=(array(		 'nama_biaya_lain'=>$this->input->post('nama_biaya_lain'),
							 'kuantitas'=>$this->input->post('kuantitas'),
							 'harga'=>$this->input->post('harga'),					         
							 'tanggal'=>date("Y-m-d")							 			 
					));	
		$this->m_admin->add_biaya_lain($data);
			 if($data >= 1){
		$this->session->set_flashdata('input_sukses','pesan');
		
		redirect('admin/lihat_biaya_lain','refresh');    
				}else{
					$this->session->set_flashdata('input_gagal','pesan');
					redirect('admin/lihat_biaya_lain','refresh');  
					}
	}
	
	function update_biaya_lain($id_biaya_lain){
		if ($this->session->userdata('level') == 'Admin' ){
		$id_user = $this->session->userdata('id_user');
		$data = (array(		
			'queries' => $this->m_admin->get_id_user($id_user)->result(),
			'username'=> $this->session->userdata('username'),		
			'level'=> $this->session->userdata('level'),
			'foto'=> $this->session->userdata('foto'),
			'update'=>$this->m_admin->get_id_biaya_lain($id_biaya_lain)->result()
			
        ));	
		
		$this->load->view('admin/header',$data);
		$this->load->view('admin/navigasi');
		$this->load->view('admin/biaya_lain/update');
		$this->load->view('admin/footer');
	
		}else{
           redirect('hak_akses/warning');
		}
	}
	
	function update_biaya_lain_proses(){	
		$id_biaya_lain = $this->input->post('id_biaya_lain');	
		$data_biaya_lain=(array('nama_biaya_lain'=>$this->input->post('nama_biaya_lain'),
							 'kuantitas'=>$this->input->post('kuantitas'),
							 'harga'=>$this->input->post('harga')
							 ));
		$this->m_admin->update_biaya_lain($id_biaya_lain,$data_biaya_lain);
		if($data_biaya_lain >= 1){
		$this->session->set_flashdata('update_sukses','pesan');
		redirect('admin/lihat_biaya_lain','refresh');    
				}else{
						$this->session->set_flashdata('update_gagal','pesan');
					redirect('admin/lihat_biaya_lain','refresh');  
					}

	
	}
	
	function delete_biaya_lain($id_biaya_lain){
		
		$this->m_admin->delete_biaya_lain($id_biaya_lain);
		$this->session->set_flashdata('delete_sukses','pesan');
		redirect('admin/lihat_biaya_lain');
	
	}
	/*END - Biaya Lain*/
	
	function periode_keuntungan_bersih(){
		if ($this->session->userdata('level') == 'Admin' ){
		$id_user = $this->session->userdata('id_user');
		$data = (array(
		
			'queries' => $this->m_admin->get_id_user($id_user)->result(),
			'username'=> $this->session->userdata('username'),		
			'level'=> $this->session->userdata('level'),
			'foto'=> $this->session->userdata('foto'),
						
			
        ));		
		$this->load->view('admin/header',$data);
		$this->load->view('admin/navigasi');
		$this->load->view('admin/laporan_keuntungan/pilih_bersih');
		$this->load->view('admin/footer');
		}else{
           redirect('hak_akses/warning');
       }
   
    }
	
	function keuntungan_bersih(){
		if ($this->session->userdata('level') == 'Admin' ){
		
			$bulan = $this->input->post('bulan');
			$tahun = $this->input->post('tahun');
			$id_user = $this->session->userdata('id_user');
			
			
		$data = (array(    
			'queries' => $this->m_admin->get_id_user($id_user)->result(),
			'username'=> $this->session->userdata('username'),		
			'level'=> $this->session->userdata('level'),
			'foto'=> $this->session->userdata('foto'),
			
			
			'hitung_bbb_bbp'=>  $this->m_hpp->hitung_bbb_bbp($bulan,$tahun),
			'total_bbb_bbp'=>  $this->m_hpp->total_bbb_bbp($bulan,$tahun),
			
			'hitung_bop_dll'=>  $this->m_hpp->hitung_bop_dll($bulan,$tahun),
			'total_bop_dll'=>  $this->m_hpp->total_bop_dll($bulan,$tahun),
			
			'total_penjualan'=>$this->m_hpp->total_penjualan($bulan,$tahun),
			
			'biaya_lain'=>$this->m_hpp->biaya_lain($bulan,$tahun),
			'total_biaya_lain'=>$this->m_hpp->total_biaya_lain($bulan,$tahun),
			
			'bulan' =>$this->input->post('bulan'),
			'tahun'=>$this->input->post('tahun')
        ));
		$this->load->view('admin/header',$data);
		$this->load->view('admin/navigasi');
		$this->load->view('admin/laporan_keuntungan/keuntungan_bersih');
		$this->load->view('admin/footer');
		
			
			}else{
           redirect('hak_akses/warning');
       }
	}
	
	function periode_keuntungan_kotor(){
		if ($this->session->userdata('level') == 'Admin' ){
		$id_user = $this->session->userdata('id_user');
		$data = (array(
		
			'queries' => $this->m_admin->get_id_user($id_user)->result(),
			'username'=> $this->session->userdata('username'),		
			'level'=> $this->session->userdata('level'),
			'foto'=> $this->session->userdata('foto'),
						
			
        ));		
		$this->load->view('admin/header',$data);
		$this->load->view('admin/navigasi');
		$this->load->view('admin/laporan_keuntungan/pilih_kotor');
		$this->load->view('admin/footer');
		}else{
           redirect('hak_akses/warning');
       }
	}
	
	function keuntungan_kotor(){
		if ($this->session->userdata('level') == 'Admin' ){
		
			$bulan = $this->input->post('bulan');
			$tahun = $this->input->post('tahun');
			$id_user = $this->session->userdata('id_user');
			
			
		$data = (array(    
			'queries' => $this->m_admin->get_id_user($id_user)->result(),
			'username'=> $this->session->userdata('username'),		
			'level'=> $this->session->userdata('level'),
			'foto'=> $this->session->userdata('foto'),
			
			
			'hitung_bbb_bbp'=>  $this->m_hpp->hitung_bbb_bbp($bulan,$tahun),
			'total_bbb_bbp'=>  $this->m_hpp->total_bbb_bbp($bulan,$tahun),
			
			'hitung_bop_dll'=>  $this->m_hpp->hitung_bop_dll($bulan,$tahun),
			'total_bop_dll'=>  $this->m_hpp->total_bop_dll($bulan,$tahun),
			
			'total_penjualan'=>$this->m_hpp->total_penjualan($bulan,$tahun),
			
			'bulan' =>$this->input->post('bulan'),
			'tahun'=>$this->input->post('tahun')
        ));
		$this->load->view('admin/header',$data);
		$this->load->view('admin/navigasi');
		$this->load->view('admin/laporan_keuntungan/keuntungan_kotor');
		$this->load->view('admin/footer');
		
			
			}else{
           redirect('hak_akses/warning');
       }
	}
	
	
	
}
		
		


/* Copyright by: Laboratorim UNSIKA */
/* Author: Divisi Software */
/* End of file: admin.php */
/* Location: ./application/controllers/admin.php */
?>
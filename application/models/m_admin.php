<?php 
if(!defined('BASEPATH')) exit ('No direct script access allowed');
class M_admin extends CI_Model{
	
		
	/* Copyright by: Laboratorim UNSIKA */
	/* Author: Divisi Software */
	/* Beginninh of file: m_admin.php */
	
	/* Begin - Dashboard*/
	function total_users(){
		return $this->db->count_all('tbl_users');
	}
	
	function total_menu(){
		return $this->db->count_all('tbl_menu');
	}
	
	function users($users){
       $this->db->where('level',$users);
       $cek = $this->db->get('tbl_users');
       return $cek->num_rows();
	}
	
	function admin($admin) {
       $this->db->where('level',$admin);
       $cek = $this->db->get('tbl_users');
       return $cek->num_rows();
    }
	
	public function omzet_chart(){
		
		$tahun = date('Y');
		$bc = $this->db->query("
		
		select
		ifnull((SELECT SUM(pesan.price*pesan.qty) as total FROM tbl_pesanan as pesan, tbl_pembeli as beli WHERE pesan.id_pembeli=beli.id_pembeli AND beli.status='paid' AND ((Month(beli.tanggal)=01) AND (YEAR(beli.tanggal)='$tahun'))),0) AS 'Januari',
		ifnull((SELECT SUM(pesan.price*pesan.qty) as total FROM tbl_pesanan as pesan, tbl_pembeli as beli WHERE pesan.id_pembeli=beli.id_pembeli AND beli.status='paid' AND ((Month(beli.tanggal)=02) AND (YEAR(beli.tanggal)='$tahun'))),0) AS 'Februari',
		ifnull((SELECT SUM(pesan.price*pesan.qty) as total FROM tbl_pesanan as pesan, tbl_pembeli as beli WHERE pesan.id_pembeli=beli.id_pembeli AND beli.status='paid' AND ((Month(beli.tanggal)=03) AND (YEAR(beli.tanggal)='$tahun'))),0) AS 'Maret',
		ifnull((SELECT SUM(pesan.price*pesan.qty) as total FROM tbl_pesanan as pesan, tbl_pembeli as beli WHERE pesan.id_pembeli=beli.id_pembeli AND beli.status='paid' AND ((Month(beli.tanggal)=04) AND (YEAR(beli.tanggal)='$tahun'))),0) AS 'April',
		ifnull((SELECT SUM(pesan.price*pesan.qty) as total FROM tbl_pesanan as pesan, tbl_pembeli as beli WHERE pesan.id_pembeli=beli.id_pembeli AND beli.status='paid' AND ((Month(beli.tanggal)=05) AND (YEAR(beli.tanggal)='$tahun'))),0) AS 'Mei',
		ifnull((SELECT SUM(pesan.price*pesan.qty) as total FROM tbl_pesanan as pesan, tbl_pembeli as beli WHERE pesan.id_pembeli=beli.id_pembeli AND beli.status='paid' AND ((Month(beli.tanggal)=06) AND (YEAR(beli.tanggal)='$tahun'))),0) AS 'Juni',
		ifnull((SELECT SUM(pesan.price*pesan.qty) as total FROM tbl_pesanan as pesan, tbl_pembeli as beli WHERE pesan.id_pembeli=beli.id_pembeli AND beli.status='paid' AND ((Month(beli.tanggal)=07) AND (YEAR(beli.tanggal)='$tahun'))),0) AS 'Juli',
		ifnull((SELECT SUM(pesan.price*pesan.qty) as total FROM tbl_pesanan as pesan, tbl_pembeli as beli WHERE pesan.id_pembeli=beli.id_pembeli AND beli.status='paid' AND ((Month(beli.tanggal)=08) AND (YEAR(beli.tanggal)='$tahun'))),0) AS 'Agustus',
		ifnull((SELECT SUM(pesan.price*pesan.qty) as total FROM tbl_pesanan as pesan, tbl_pembeli as beli WHERE pesan.id_pembeli=beli.id_pembeli AND beli.status='paid' AND ((Month(beli.tanggal)=09) AND (YEAR(beli.tanggal)='$tahun'))),0) AS 'September',
		ifnull((SELECT SUM(pesan.price*pesan.qty) as total FROM tbl_pesanan as pesan, tbl_pembeli as beli WHERE pesan.id_pembeli=beli.id_pembeli AND beli.status='paid' AND ((Month(beli.tanggal)=10) AND (YEAR(beli.tanggal)='$tahun'))),0) AS 'Oktober',
		ifnull((SELECT SUM(pesan.price*pesan.qty) as total FROM tbl_pesanan as pesan, tbl_pembeli as beli WHERE pesan.id_pembeli=beli.id_pembeli AND beli.status='paid' AND ((Month(beli.tanggal)=11) AND (YEAR(beli.tanggal)='$tahun'))),0) AS 'November',
		ifnull((SELECT SUM(pesan.price*pesan.qty) as total FROM tbl_pesanan as pesan, tbl_pembeli as beli WHERE pesan.id_pembeli=beli.id_pembeli AND beli.status='paid' AND ((Month(beli.tanggal)=12) AND (YEAR(beli.tanggal)='$tahun'))),0) AS 'Desember'
	from tbl_pesanan as pesan, tbl_pembeli as beli 
	GROUP BY date_format(beli.tanggal,'%M')=1 
		
		");
		
		return $bc;}
		
	public function modal_chart(){
	
		$tahun = date('Y');
		$bs = $this->db->query("
		select
		(sum(ifnull((select sum(kuantitas*harga) as total from tbl_biaya_lain where MONTH(tanggal)='01' AND YEAR(tanggal)='$tahun'),0)+ifnull((SELECT SUM(jumlah) as total_modal FROM tbl_modal WHERE MONTH(tanggal) = '01' and YEAR(tanggal)='$tahun'),0))) as Januari,
		(sum(ifnull((select sum(kuantitas*harga) as total from tbl_biaya_lain where MONTH(tanggal)='02' AND YEAR(tanggal)='$tahun'),0)+ifnull((SELECT SUM(jumlah) as total_modal FROM tbl_modal WHERE MONTH(tanggal) = '02' and YEAR(tanggal)='$tahun'),0))) as Februari,
		(sum(ifnull((select sum(kuantitas*harga) as total from tbl_biaya_lain where MONTH(tanggal)='03' AND YEAR(tanggal)='$tahun'),0)+ifnull((SELECT SUM(jumlah) as total_modal FROM tbl_modal WHERE MONTH(tanggal) = '03' and YEAR(tanggal)='$tahun'),0))) as Maret,
		(sum(ifnull((select sum(kuantitas*harga) as total from tbl_biaya_lain where MONTH(tanggal)='04' AND YEAR(tanggal)='$tahun'),0)+ifnull((SELECT SUM(jumlah) as total_modal FROM tbl_modal WHERE MONTH(tanggal) = '04' and YEAR(tanggal)='$tahun'),0))) as April,
		(sum(ifnull((select sum(kuantitas*harga) as total from tbl_biaya_lain where MONTH(tanggal)='05' AND YEAR(tanggal)='$tahun'),0)+ifnull((SELECT SUM(jumlah) as total_modal FROM tbl_modal WHERE MONTH(tanggal) = '05' and YEAR(tanggal)='$tahun'),0))) as Mei,
		(sum(ifnull((select sum(kuantitas*harga) as total from tbl_biaya_lain where MONTH(tanggal)='06' AND YEAR(tanggal)='$tahun'),0)+ifnull((SELECT SUM(jumlah) as total_modal FROM tbl_modal WHERE MONTH(tanggal) = '06' and YEAR(tanggal)='$tahun'),0))) as Juni,
		(sum(ifnull((select sum(kuantitas*harga) as total from tbl_biaya_lain where MONTH(tanggal)='07' AND YEAR(tanggal)='$tahun'),0)+ifnull((SELECT SUM(jumlah) as total_modal FROM tbl_modal WHERE MONTH(tanggal) = '07' and YEAR(tanggal)='$tahun'),0))) as Juli,
		(sum(ifnull((select sum(kuantitas*harga) as total from tbl_biaya_lain where MONTH(tanggal)='08' AND YEAR(tanggal)='$tahun'),0)+ifnull((SELECT SUM(jumlah) as total_modal FROM tbl_modal WHERE MONTH(tanggal) = '08' and YEAR(tanggal)='$tahun'),0))) as Agustus,
		(sum(ifnull((select sum(kuantitas*harga) as total from tbl_biaya_lain where MONTH(tanggal)='09' AND YEAR(tanggal)='$tahun'),0)+ifnull((SELECT SUM(jumlah) as total_modal FROM tbl_modal WHERE MONTH(tanggal) = '09' and YEAR(tanggal)='$tahun'),0))) as September,
		(sum(ifnull((select sum(kuantitas*harga) as total from tbl_biaya_lain where MONTH(tanggal)='10' AND YEAR(tanggal)='$tahun'),0)+ifnull((SELECT SUM(jumlah) as total_modal FROM tbl_modal WHERE MONTH(tanggal) = '10' and YEAR(tanggal)='$tahun'),0))) as Oktober,
		(sum(ifnull((select sum(kuantitas*harga) as total from tbl_biaya_lain where MONTH(tanggal)='11' AND YEAR(tanggal)='$tahun'),0)+ifnull((SELECT SUM(jumlah) as total_modal FROM tbl_modal WHERE MONTH(tanggal) = '11' and YEAR(tanggal)='$tahun'),0))) as November,
		(sum(ifnull((select sum(kuantitas*harga) as total from tbl_biaya_lain where MONTH(tanggal)='12' AND YEAR(tanggal)='$tahun'),0)+ifnull((SELECT SUM(jumlah) as total_modal FROM tbl_modal WHERE MONTH(tanggal) = '12' and YEAR(tanggal)='$tahun'),0))) as Desember

	
		");
		
		return $bs;}
		
	public function keuntungan_chart(){
	
		$tahun = date('Y');
		$kc = $this->db->query("
		select
		(sum(ifnull((SELECT SUM(pesan.price*pesan.qty) as total FROM tbl_pesanan as pesan, tbl_pembeli as beli WHERE pesan.id_pembeli=beli.id_pembeli AND MONTH(beli.tanggal) = '01' and YEAR(beli.tanggal)='$tahun' AND beli.status='paid'),0)-ifnull((select sum(kuantitas*harga) as total from tbl_biaya_lain where MONTH(tanggal)='01' AND YEAR(tanggal)='$tahun'),0)-ifnull((SELECT SUM(jumlah) as total_modal FROM tbl_modal WHERE MONTH(tanggal) = '01' and YEAR(tanggal)='$tahun'),0))) as Januari,
		(sum(ifnull((SELECT SUM(pesan.price*pesan.qty) as total FROM tbl_pesanan as pesan, tbl_pembeli as beli WHERE pesan.id_pembeli=beli.id_pembeli AND MONTH(beli.tanggal) = '02' and YEAR(beli.tanggal)='$tahun' AND beli.status='paid'),0)-ifnull((select sum(kuantitas*harga) as total from tbl_biaya_lain where MONTH(tanggal)='02' AND YEAR(tanggal)='$tahun'),0)-ifnull((SELECT SUM(jumlah) as total_modal FROM tbl_modal WHERE MONTH(tanggal) = '02' and YEAR(tanggal)='$tahun'),0))) as Februari,
		(sum(ifnull((SELECT SUM(pesan.price*pesan.qty) as total FROM tbl_pesanan as pesan, tbl_pembeli as beli WHERE pesan.id_pembeli=beli.id_pembeli AND MONTH(beli.tanggal) = '03' and YEAR(beli.tanggal)='$tahun' AND beli.status='paid'),0)-ifnull((select sum(kuantitas*harga) as total from tbl_biaya_lain where MONTH(tanggal)='03' AND YEAR(tanggal)='$tahun'),0)-ifnull((SELECT SUM(jumlah) as total_modal FROM tbl_modal WHERE MONTH(tanggal) = '03' and YEAR(tanggal)='$tahun'),0))) as Maret,
		(sum(ifnull((SELECT SUM(pesan.price*pesan.qty) as total FROM tbl_pesanan as pesan, tbl_pembeli as beli WHERE pesan.id_pembeli=beli.id_pembeli AND MONTH(beli.tanggal) = '04' and YEAR(beli.tanggal)='$tahun' AND beli.status='paid'),0)-ifnull((select sum(kuantitas*harga) as total from tbl_biaya_lain where MONTH(tanggal)='04' AND YEAR(tanggal)='$tahun'),0)-ifnull((SELECT SUM(jumlah) as total_modal FROM tbl_modal WHERE MONTH(tanggal) = '04' and YEAR(tanggal)='$tahun'),0))) as April,
		(sum(ifnull((SELECT SUM(pesan.price*pesan.qty) as total FROM tbl_pesanan as pesan, tbl_pembeli as beli WHERE pesan.id_pembeli=beli.id_pembeli AND MONTH(beli.tanggal) = '05' and YEAR(beli.tanggal)='$tahun' AND beli.status='paid'),0)-ifnull((select sum(kuantitas*harga) as total from tbl_biaya_lain where MONTH(tanggal)='05' AND YEAR(tanggal)='$tahun'),0)-ifnull((SELECT SUM(jumlah) as total_modal FROM tbl_modal WHERE MONTH(tanggal) = '05' and YEAR(tanggal)='$tahun'),0))) as Mei,
		(sum(ifnull((SELECT SUM(pesan.price*pesan.qty) as total FROM tbl_pesanan as pesan, tbl_pembeli as beli WHERE pesan.id_pembeli=beli.id_pembeli AND MONTH(beli.tanggal) = '06' and YEAR(beli.tanggal)='$tahun' AND beli.status='paid'),0)-ifnull((select sum(kuantitas*harga) as total from tbl_biaya_lain where MONTH(tanggal)='06' AND YEAR(tanggal)='$tahun'),0)-ifnull((SELECT SUM(jumlah) as total_modal FROM tbl_modal WHERE MONTH(tanggal) = '06' and YEAR(tanggal)='$tahun'),0))) as Juni,
		(sum(ifnull((SELECT SUM(pesan.price*pesan.qty) as total FROM tbl_pesanan as pesan, tbl_pembeli as beli WHERE pesan.id_pembeli=beli.id_pembeli AND MONTH(beli.tanggal) = '07' and YEAR(beli.tanggal)='$tahun' AND beli.status='paid'),0)-ifnull((select sum(kuantitas*harga) as total from tbl_biaya_lain where MONTH(tanggal)='07' AND YEAR(tanggal)='$tahun'),0)-ifnull((SELECT SUM(jumlah) as total_modal FROM tbl_modal WHERE MONTH(tanggal) = '07' and YEAR(tanggal)='$tahun'),0))) as Juli,
		(sum(ifnull((SELECT SUM(pesan.price*pesan.qty) as total FROM tbl_pesanan as pesan, tbl_pembeli as beli WHERE pesan.id_pembeli=beli.id_pembeli AND MONTH(beli.tanggal) = '08' and YEAR(beli.tanggal)='$tahun' AND beli.status='paid'),0)-ifnull((select sum(kuantitas*harga) as total from tbl_biaya_lain where MONTH(tanggal)='08' AND YEAR(tanggal)='$tahun'),0)-ifnull((SELECT SUM(jumlah) as total_modal FROM tbl_modal WHERE MONTH(tanggal) = '08' and YEAR(tanggal)='$tahun'),0))) as Agustus,
		(sum(ifnull((SELECT SUM(pesan.price*pesan.qty) as total FROM tbl_pesanan as pesan, tbl_pembeli as beli WHERE pesan.id_pembeli=beli.id_pembeli AND MONTH(beli.tanggal) = '09' and YEAR(beli.tanggal)='$tahun' AND beli.status='paid'),0)-ifnull((select sum(kuantitas*harga) as total from tbl_biaya_lain where MONTH(tanggal)='09' AND YEAR(tanggal)='$tahun'),0)-ifnull((SELECT SUM(jumlah) as total_modal FROM tbl_modal WHERE MONTH(tanggal) = '09' and YEAR(tanggal)='$tahun'),0))) as September,
		(sum(ifnull((SELECT SUM(pesan.price*pesan.qty) as total FROM tbl_pesanan as pesan, tbl_pembeli as beli WHERE pesan.id_pembeli=beli.id_pembeli AND MONTH(beli.tanggal) = '10' and YEAR(beli.tanggal)='$tahun' AND beli.status='paid'),0)-ifnull((select sum(kuantitas*harga) as total from tbl_biaya_lain where MONTH(tanggal)='10' AND YEAR(tanggal)='$tahun'),0)-ifnull((SELECT SUM(jumlah) as total_modal FROM tbl_modal WHERE MONTH(tanggal) = '10' and YEAR(tanggal)='$tahun'),0))) as Oktober,
		(sum(ifnull((SELECT SUM(pesan.price*pesan.qty) as total FROM tbl_pesanan as pesan, tbl_pembeli as beli WHERE pesan.id_pembeli=beli.id_pembeli AND MONTH(beli.tanggal) = '11' and YEAR(beli.tanggal)='$tahun' AND beli.status='paid'),0)-ifnull((select sum(kuantitas*harga) as total from tbl_biaya_lain where MONTH(tanggal)='11' AND YEAR(tanggal)='$tahun'),0)-ifnull((SELECT SUM(jumlah) as total_modal FROM tbl_modal WHERE MONTH(tanggal) = '11' and YEAR(tanggal)='$tahun'),0))) as November,
		(sum(ifnull((SELECT SUM(pesan.price*pesan.qty) as total FROM tbl_pesanan as pesan, tbl_pembeli as beli WHERE pesan.id_pembeli=beli.id_pembeli AND MONTH(beli.tanggal) = '12' and YEAR(beli.tanggal)='$tahun' AND beli.status='paid'),0)-ifnull((select sum(kuantitas*harga) as total from tbl_biaya_lain where MONTH(tanggal)='12' AND YEAR(tanggal)='$tahun'),0)-ifnull((SELECT SUM(jumlah) as total_modal FROM tbl_modal WHERE MONTH(tanggal) = '12' and YEAR(tanggal)='$tahun'),0))) as Desember
		

	
		");
		
		return $kc;}
		
	
		
		/*salah
		$this->db->select('*');
		$this->db->like('tanggal','2013-');
		$this->db->order_by('tanggal','asc');
		return $this->db->get('tbl_tbl_menu');
		*salah
	}
	
	/*function favorit() {
		return $query = $this->db->query("SELECT ca.category_menu AS hasil, 
		p.id_menu,p.title,p.isi_menu,p.wkt_menu,p.gambar,u.nama_user,ca.category_menu, 
		COUNT(*) total FROM tbl_menu as p, tbl_category_menu as ca, tbl_users as u 
		WHERE p.id_category=ca.id_category and p.id_users=u.id_users 
		GROUP BY hasil"); 

			
  }*/
	/* End - Dashboard */
	
	/* Begin - Manajemen Pegawai */ 	
	function lihat_pegawai() {
        return $this->db->get('tbl_pegawai','ASC');
    }
	
	function setID_pegawai($jabatan) {
		
        $cek = $this->db->query("SELECT RIGHT(id_pegawai,4) AS kode  FROM tbl_pegawai WHERE jabatan LIKE '%$jabatan%' ORDER BY id_pegawai DESC LIMIT 1 ");
        
       if($jabatan == 'Kasir') {
		   if($cek->num_rows()>0){
				foreach($cek->result() as $query){
					  $kode = ((int)$query->kode)+1;}							 		
				}else{
				  $kode = 1;	
				  }$kodeunik = str_pad($kode,4,"0",STR_PAD_LEFT);
				  return "KAS-".$kodeunik;
	   }
	   
	  if($jabatan == 'Koki') {
		   if($cek->num_rows()>0){
				foreach($cek->result() as $query){
					  $kode = ((int)$query->kode)+1;}							 		
				}else{
				  $kode = 1;	
				  }$kodeunik = str_pad($kode,4,"0",STR_PAD_LEFT);
				  return "KKI-".$kodeunik;
	   }
	   if($jabatan == 'Pelayan') {
		   if($cek->num_rows()>0){
				foreach($cek->result() as $query){
					  $kode = ((int)$query->kode)+1;}							 		
				}else{
				  $kode = 1;	
				  }$kodeunik = str_pad($kode,4,"0",STR_PAD_LEFT);
				  return "PEL-".$kodeunik;
	   }
	}
	
	function add_pegawai($get_pegawai_id,$data) {
        
        $this->db->set('id_pegawai',$get_pegawai_id);
        $this->db->insert('tbl_pegawai',$data);        
    }
	
	function get_id_pegawai($id_pegawai) {
		$this->db->select("id_pegawai, nik, nama_pegawai, jk, alamat, jabatan, no_hp, foto, tempat_lahir, date_format(tgl_lahir,'%d-%m-%Y') as tgl");
        $this->db->where('id_pegawai',$id_pegawai);
        return $this->db->get('tbl_pegawai');
    }
	
	function get_id_update_pegawai($id_pegawai) {
		$this->db->select("id_pegawai, nik, nama_pegawai, jk, alamat, jabatan, no_hp, foto, tempat_lahir,  date_format(tgl_lahir,'%d') as hari, date_format(tgl_lahir,'%m') as bulan, date_format(tgl_lahir,'%Y') as tahun");
        $this->db->where('id_pegawai',$id_pegawai);
        return $this->db->get('tbl_pegawai');
    }
	
	function delete_pegawai($id_pegawai) {
        $this->db->where('id_pegawai',$id_pegawai);
        $this->db->delete('tbl_pegawai');
    }
	
	 function update_pegawai($id_pegawai,$data_pegawai) {
        $this->db->where('id_pegawai',$id_pegawai);
        $this->db->update('tbl_pegawai',$data_pegawai);
    }
	
	/* End - Manajemen Pegawai */	
	
	/* Begin - Manajemen User */ 
	function setID_user($level) {
		
        $cek = $this->db->query("SELECT RIGHT(id_user,4) AS kode  FROM tbl_users WHERE level LIKE '%$level%' ORDER BY id_user DESC LIMIT 1 ");
        
       if($level == 'Admin') {
		   if($cek->num_rows()>0){
				foreach($cek->result() as $query){
					  $kode = ((int)$query->kode)+1;}							 		
				}else{
				  $kode = 1;	
				  }$kodeunik = str_pad($kode,4,"0",STR_PAD_LEFT);
				  return "ADM-".$kodeunik;
	   }
	   
	  if($level == 'Kasir') {
		   if($cek->num_rows()>0){
				foreach($cek->result() as $query){
					  $kode = ((int)$query->kode)+1;}							 		
				}else{
				  $kode = 1;	
				  }$kodeunik = str_pad($kode,4,"0",STR_PAD_LEFT);
				  return "USR-".$kodeunik;
	   }	  
	}
    
    function add_user($get_level_id,$data) {
        
        $this->db->set('id_user',$get_level_id);
        $this->db->insert('tbl_users',$data);
        
    }
    
    function lihat_user() {
        return $this->db->get('tbl_users','ASC');
    }
    
    function delete_user($id_user1) {
        $this->db->where('id_user',$id_user1);
        $this->db->delete('tbl_users');
    }
    
    function get_id_user($id_user) {
		
        $this->db->where('id_user',$id_user);
        return $this->db->get('tbl_users');
    }
	
	function get_id_detail($id_user1) {
		
        $this->db->where('id_user',$id_user1);
        return $this->db->get('tbl_users');
    }
	
	function get_id_update($id_user1) {
		
        $this->db->where('id_user',$id_user1);
        return $this->db->get('tbl_users');
    }
	
    function update_user($id_user,$data_user) {
        $this->db->where('id_user',$id_user);
        $this->db->update('tbl_users',$data_user);
    }
	/* End - Manajemen User */ 
	
	/*Begin - Manajemen Category menu*/
	function set_id_category() {
        $cek = $this->db->query("SELECT RIGHT(id_category,4) AS kode FROM tbl_category_menu ORDER BY id_category DESC LIMIT 1");
        if($cek->num_rows() > 0) {
           foreach($cek->result() as $query) {
              $kode = ((int)$query->kode)+1;
           } 
        } else {
            $kode = 1;
        }

       $kodeunik = str_pad($kode,4,"0",STR_PAD_LEFT);
       
           return "CA-".$kodeunik; 
       
    }
	
	function lihat_category_menu() {
        return $this->db->get('tbl_category_menu','ASC');
    }
	
	function add_category_menu($get_id_category,$data_category_menu) {
        
        $this->db->set('id_category',$get_id_category);
        $this->db->insert('tbl_category_menu',$data_category_menu);
        
    }
	
	function delete_category_menu($id_category) {
        $this->db->where('id_category',$id_category);
        $this->db->delete('tbl_category_menu');
    }
	
	function get_id_category_menu($id_category) {
		$this->db->select("*");
        $this->db->where('id_category',$id_category);
        return $this->db->get('tbl_category_menu');
    }
	
	function update_category_menu($id_category,$data_category_menu) {
        $this->db->where('id_category',$id_category);
        $this->db->update('tbl_category_menu',$data_category_menu);
    }
	
	/*End - Manajemen Category menu*/
	
	/*Begin - Menu Makanan dan Minuman*/
	function get_id_menu_details($id_menu) {
		
		return $query = $this->db->query("SELECT m.id_menu, m.nama_menu, c.category_menu, m.harga, m.foto
                FROM tbl_menu as m, tbl_category_menu as c 
                WHERE m.id_category=c.id_category and m.id_menu='$id_menu'
				ORDER BY m.nama_menu ASC")->result();
    }
	
	function lihat_menu() {
        return $query = $this->db->query("SELECT m.id_menu, m.nama_menu, c.category_menu, m.harga, m.foto
                FROM tbl_menu as m, tbl_category_menu as c 
                WHERE m.id_category=c.id_category 
				ORDER BY m.nama_menu ASC")->result();
    }
	
	function setID_menu() {
        $cek = $this->db->query("SELECT RIGHT(id_menu,4) AS kode FROM tbl_menu ORDER BY id_menu DESC LIMIT 1");
        if($cek->num_rows() > 0) {
           foreach($cek->result() as $query) {
              $kode = ((int)$query->kode)+1;
           } 
        } else {
            $kode = 1;
        }

       $kodeunik = str_pad($kode,4,"0",STR_PAD_LEFT);
       
           return "MEN-".$kodeunik; 
       
    }
	
	function add_menu($data) {
        $this->db->insert('tbl_menu',$data);        
    }
	
	function delete_menu($id_menu) {
        $this->db->where('id_menu',$id_menu);
        $this->db->delete('tbl_menu');
    }
	
	function get_id_menu($id_menu) {
		$this->db->select('*');
        $this->db->where('id_menu',$id_menu);
        return $this->db->get('tbl_menu');
    }
	
	function get_menu_row($id_menu){
		$this->db->where('id_menu',$id_menu);
		return $this->db->get('tbl_menu')->row();
	}
	
	function update_menu($id_menu,$data_menu) {
        $this->db->where('id_menu',$id_menu);
        $this->db->update('tbl_menu',$data_menu);
    }	
	/*End - Menu Makanan dan Minuman*/
	
	/*Begin - Biaya Lain-lain*/
	
	function lihat_biaya_lain() {
        return $query = $this->db->query("SELECT id_biaya_lain, nama_biaya_lain, kuantitas, harga, date_format(tanggal,'%d %M %Y') as tgl_pengeluaran
                FROM tbl_biaya_lain               
				ORDER BY tanggal ASC")->result();
    }	
	
	function add_biaya_lain($data) {
        $this->db->insert('tbl_biaya_lain',$data);        
    }
	
	function get_id_biaya_lain($id_biaya_lain){		
        $this->db->where('id_biaya_lain',$id_biaya_lain);
        return $this->db->get('tbl_biaya_lain');
    }
	
	function update_biaya_lain($id_biaya_lain,$data_biaya_lain) {
        $this->db->where('id_biaya_lain',$id_biaya_lain);
        $this->db->update('tbl_biaya_lain',$data_biaya_lain);
    }
	
	function delete_biaya_lain($id_biaya_lain) {
        $this->db->where('id_biaya_lain',$id_biaya_lain);
        $this->db->delete('tbl_biaya_lain');
    }
	/*End - Biaya Lain-lain*/	
	
	function fungsi($foto){
		foreach($foto as $lol) {
					$data = $lol->foto;
				}
		return $data;
	}
	
	function fungsi2($foto){
		foreach($foto as $lol) {
			$data = $lol->foto;
			unlink('./assets/image/foto_pegawai/'.$data); 
			}
		return $data;
	}
	function fungsi3($foto){
		foreach($foto as $lol) {
			$data = $lol->foto;
			unlink('./assets/image/foto_menu/'.$data); 
			}
		return $data;
	}
}
?>
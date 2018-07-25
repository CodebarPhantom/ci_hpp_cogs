<?php if(!defined('BASEPATH')) exit ('No direct script access allowed');
class M_hpp extends CI_Model{
	
	/*Begin - Data Resep */
	function lihat_resep($id_menu) {
        return $query = $this->db->query("SELECT r.id_resep, r.id_menu, r.id_biaya, b.nama_biaya
                FROM tbl_resep as r, tbl_daftar_biaya as b
                WHERE r.id_biaya=b.id_biaya AND r.id_menu='$id_menu'
				ORDER BY b.nama_biaya ASC")->result();
		/*$this->db->where('id_menu',$id_menu);
		return $this->db->get('tbl_resep')->result();*/
    }
	
	function add_resep($data_resep){
		
        $this->db->insert('tbl_resep',$data_resep); 
    }
	
	
	
	function delete_resep($id_resep) {
        $this->db->where('id_resep',$id_resep);
        $this->db->delete('tbl_resep');
    }
	/*End - Data Resep */
	
	/* Begin - HPP*/
	
	function tampil_nama_menu($id_menu){
		return $query = $this->db->query("select id_menu, nama_menu from tbl_menu where id_menu = '$id_menu'")->result();
		
	}
	function bahan_baku($id_menu,$bulan,$tahun) {
		
        return $query = $this->db->query("SELECT r.id_menu, r.id_biaya, b.nama_biaya, b.golongan_biaya, SUM(m.jumlah) as total 
							FROM tbl_resep as r, tbl_daftar_biaya as b, tbl_modal as m 
							WHERE r.id_menu='$id_menu' and r.id_biaya=b.id_biaya and b.golongan_biaya = 'Biaya Bahan Baku' and r.id_biaya=m.id_biaya and MONTH(m.tanggal) = '$bulan' and YEAR(m.tanggal)='$tahun'
							GROUP by b.nama_biaya ASC")->result();
    }
	
	function total_bahan_baku($id_menu,$bulan,$tahun) {
		
        return $query = $this->db->query("SELECT SUM(m.jumlah) as total 
							FROM tbl_resep as r, tbl_daftar_biaya as b, tbl_modal as m 
							WHERE r.id_menu='$id_menu' and r.id_biaya=b.id_biaya and b.golongan_biaya = 'Biaya Bahan Baku' and r.id_biaya=m.id_biaya and MONTH(m.tanggal) = '$bulan' and YEAR(m.tanggal)='$tahun'
							")->result();		
    }
	
	function tkl($bulan,$tahun) {
	
        return $query = $this->db->query("SELECT b.nama_biaya, b.golongan_biaya, SUM(m.jumlah) as total 
		FROM tbl_daftar_biaya as b, tbl_modal as m 
		WHERE b.golongan_biaya = 'Biaya Tenaga Kerja Langsung' and b.id_biaya=m.id_biaya and MONTH(m.tanggal) = '$bulan' and YEAR(m.tanggal)='$tahun'
		GROUP by b.nama_biaya ASC")->result();
    }
	
	function total_tkl($bulan,$tahun) {
		
        return $query = $this->db->query("SELECT SUM(m.jumlah) as total 
		FROM tbl_daftar_biaya as b, tbl_modal as m 
		WHERE b.golongan_biaya = 'Biaya Tenaga Kerja Langsung' and b.id_biaya=m.id_biaya and MONTH(m.tanggal) = '$bulan' and YEAR(m.tanggal)='$tahun'
		")->result();
    }
	
	
	function bahan_penolong($id_menu,$bulan,$tahun) {
	
        return $query = $this->db->query("SELECT r.id_menu, r.id_biaya, b.nama_biaya, b.golongan_biaya, SUM(m.jumlah) as total 
							FROM tbl_resep as r, tbl_daftar_biaya as b, tbl_modal as m 
							WHERE r.id_menu='$id_menu' and r.id_biaya=b.id_biaya and b.golongan_biaya = 'Biaya Bahan Penolong' and r.id_biaya=m.id_biaya and MONTH(m.tanggal) = '$bulan' and YEAR(m.tanggal)='$tahun'
							GROUP by b.nama_biaya ASC")->result();
    }
	
	function total_bahan_penolong($id_menu,$bulan,$tahun) {
		
        return $query = $this->db->query("SELECT SUM(m.jumlah) as total 
							FROM tbl_resep as r, tbl_daftar_biaya as b, tbl_modal as m 
							WHERE r.id_menu='$id_menu' and r.id_biaya=b.id_biaya and b.golongan_biaya = 'Biaya Bahan Penolong' and r.id_biaya=m.id_biaya and MONTH(m.tanggal) = '$bulan' and YEAR(m.tanggal)='$tahun'
							")->result();		
    }
	
	function tktl($bulan,$tahun) {
		
        return $query = $this->db->query("SELECT b.nama_biaya, b.golongan_biaya, SUM(m.jumlah) as total 
		FROM tbl_daftar_biaya as b, tbl_modal as m 
		WHERE b.golongan_biaya = 'Biaya Tenaga Kerja Tak Langsung' and b.id_biaya=m.id_biaya and MONTH(m.tanggal) = '$bulan' and YEAR(m.tanggal)='$tahun'
		GROUP by b.nama_biaya ASC")->result();
    }
	
	function total_tktl($bulan,$tahun) {
		
        return $query = $this->db->query("SELECT SUM(m.jumlah) as total 
		FROM tbl_daftar_biaya as b, tbl_modal as m 
		WHERE b.golongan_biaya = 'Biaya Tenaga Kerja Tak Langsung' and b.id_biaya=m.id_biaya and MONTH(m.tanggal) = '$bulan' and YEAR(m.tanggal)='$tahun'
		")->result();
    }
	
	function pemeliharaan($bulan,$tahun) {
		
        return $query = $this->db->query("SELECT b.nama_biaya, b.golongan_biaya, SUM(m.jumlah) as total 
		FROM tbl_daftar_biaya as b, tbl_modal as m 
		WHERE b.golongan_biaya = 'Biaya Reparasi dan Pemeliharaan' and b.id_biaya=m.id_biaya and MONTH(m.tanggal) = '$bulan' and YEAR(m.tanggal)='$tahun'
		GROUP by b.nama_biaya ASC")->result();
    }
	
	function total_pemeliharaan($bulan,$tahun) {
		
        return $query = $this->db->query("SELECT SUM(m.jumlah) as total 
		FROM tbl_daftar_biaya as b, tbl_modal as m 
		WHERE b.golongan_biaya = 'Biaya Reparasi dan Pemeliharaan' and b.id_biaya=m.id_biaya and MONTH(m.tanggal) = '$bulan' and YEAR(m.tanggal)='$tahun'
		")->result();
    }
	
	function bop_lain($bulan,$tahun) {
	
        return $query = $this->db->query("SELECT b.nama_biaya, b.golongan_biaya, SUM(m.jumlah) as total 
		FROM tbl_daftar_biaya as b, tbl_modal as m 
		WHERE b.golongan_biaya = 'Biaya Overhead Pabrik Lain' and b.id_biaya=m.id_biaya and MONTH(m.tanggal) = '$bulan' and YEAR(m.tanggal)='$tahun'
		GROUP by b.nama_biaya ASC")->result();
    }
	
	function total_bop_lain($bulan,$tahun) {
		
        return $query = $this->db->query("SELECT SUM(m.jumlah) as total 
		FROM tbl_daftar_biaya as b, tbl_modal as m 
		WHERE b.golongan_biaya = 'Biaya Overhead Pabrik Lain' and b.id_biaya=m.id_biaya and MONTH(m.tanggal) = '$bulan' and YEAR(m.tanggal)='$tahun'
		")->result();
    }
	
	function hasil_produksi($bulan,$tahun,$id_menu){
		return $query = $this->db->query("select ifnull((SELECT sum(pes.qty) as total
		from tbl_pesanan as pes, tbl_pembeli as bel
		where pes.id_pembeli = bel.id_pembeli AND pes.id_menu = '$id_menu'  AND month(bel.tanggal) = '$bulan' AND YEAR(bel.tanggal)='$tahun'),0) as total")->result();
	}
	
	
	/* End - HPP */
	
	/*Begin - Overhead Pabrik*/
	function lihat_daftar_biaya() {
		
        return $this->db->get('tbl_daftar_biaya');
    }
	
	function set_id_biaya($golongan_biaya){
		
        $cek = $this->db->query("SELECT RIGHT(id_biaya,4) AS kode  FROM tbl_daftar_biaya WHERE golongan_biaya LIKE '%$golongan_biaya%' ORDER BY id_biaya DESC LIMIT 1 ");
        
       if($golongan_biaya == 'Biaya Bahan Baku') {
		   if($cek->num_rows()>0){
				foreach($cek->result() as $query){
					  $kode = ((int)$query->kode)+1;}							 		
				}else{
				  $kode = 1;	
				  }$kodeunik = str_pad($kode,4,"0",STR_PAD_LEFT);
				  return "BBB-".$kodeunik;
	   }else if($golongan_biaya == 'Biaya Tenaga Kerja Langsung') {
		   if($cek->num_rows()>0){
				foreach($cek->result() as $query){
					  $kode = ((int)$query->kode)+1;}							 		
				}else{
				  $kode = 1;	
				  }$kodeunik = str_pad($kode,4,"0",STR_PAD_LEFT);
				  return "TKL-".$kodeunik; 	
	   }else if($golongan_biaya == 'Biaya Bahan Penolong') {
		   if($cek->num_rows()>0){
				foreach($cek->result() as $query){
					  $kode = ((int)$query->kode)+1;}							 		
				}else{
				  $kode = 1;	
				  }$kodeunik = str_pad($kode,4,"0",STR_PAD_LEFT);
				  return "BBP-".$kodeunik; 
	   }else if($golongan_biaya == 'Biaya Tenaga Kerja Tak Langsung') {
		   if($cek->num_rows()>0){
				foreach($cek->result() as $query){
					  $kode = ((int)$query->kode)+1;}							 		
				}else{
				  $kode = 1;	
				  }$kodeunik = str_pad($kode,4,"0",STR_PAD_LEFT);
				  return "TEN-".$kodeunik; 	  
	   }else if($golongan_biaya == 'Biaya Reparasi dan Pemeliharaan') {
 		   if($cek->num_rows()>0){
				foreach($cek->result() as $query){
					  $kode = ((int)$query->kode)+1;}							 		
				}else{
				  $kode = 1;	
				  }$kodeunik = str_pad($kode,4,"0",STR_PAD_LEFT);
				  return "REP-".$kodeunik; 	  
	   }else if($golongan_biaya == 'Biaya Overhead Pabrik Lain') {
		   if($cek->num_rows()>0){
				foreach($cek->result() as $query){
					  $kode = ((int)$query->kode)+1;}							 		
				}else{
				  $kode = 1;	
				  }$kodeunik = str_pad($kode,4,"0",STR_PAD_LEFT);
				  return "BOL-".$kodeunik; 	}
	
	}	
	
	function add_biaya($get_id_biaya,$data_biaya) {
        
        $this->db->set('id_biaya',$get_id_biaya);
        $this->db->insert('tbl_daftar_biaya',$data_biaya);
        
    }
	
	function delete_biaya($id_biaya) {
        $this->db->where('id_biaya',$id_biaya);
        $this->db->delete('tbl_daftar_biaya');
    }
	
	function get_id_biaya($id_biaya) {
		
        $this->db->where('id_biaya',$id_biaya);
        return $this->db->get('tbl_daftar_biaya');
    }
	
	function update_biaya($id_biaya,$data_biaya) {
        $this->db->where('id_biaya',$id_biaya);
        $this->db->update('tbl_daftar_biaya',$data_biaya);
    }
	
	/*End - Overhead Pabrik*/
	
		/*Begin - Modal Harian*/
	function lihat_modal_harian($tanggal) {		
        return $query = $this->db->query("SELECT  mo.id_modal, da.nama_biaya, da.golongan_biaya, mo.kuantitas, mo.jumlah, mo.harga, mo.tanggal, da.satuan		
		FROM tbl_daftar_biaya as da, tbl_modal as mo 
		WHERE da.id_biaya=mo.id_biaya AND mo.tanggal='$tanggal'
		ORDER BY da.nama_biaya ASC");
    }
	
	function total_modal_harian($tanggal) {		
        return $query = $this->db->query("SELECT SUM(jumlah) as total
		FROM tbl_modal WHERE tanggal='$tanggal'");
    }
	
	function total_omzet_harian($tanggal) {		
        return $query = $this->db->query("SELECT SUM(pesan.price*pesan.qty) as total 
		FROM tbl_pesanan as pesan, tbl_pembeli as beli 
		WHERE pesan.id_pembeli=beli.id_pembeli AND beli.tanggal='$tanggal' AND beli.status='paid'");
    }
	
	function total_transaksi($tanggal) {		
        return $query = $this->db->query("SELECT count(id_pembeli) as total_transaksi 
		from tbl_pembeli 
		where tanggal='$tanggal'")->result();
    }
	
		
	function add_modal($data) {
        $this->db->insert('tbl_modal',$data);
    }
	
	function get_id_modal($id_modal) {      
        $this->db->where('id_modal',$id_modal);
        return $this->db->get('tbl_modal');
    }
	
	function get_modal_row($id_modal){
		$this->db->where('id_modal',$id_modal);
		return $this->db->get('tbl_modal')->row();
	}
	
	function update_modal($id_modal,$data) {
        $this->db->where('id_modal',$id_modal);
        $this->db->update('tbl_modal',$data);
    }
	
	function get_modal($awal,$akhir){
		$query = $this->db->query("
		SELECT  mo.id_modal, da.nama_biaya, da.golongan_biaya, mo.kuantitas, mo.jumlah, mo.harga, mo.tanggal, da.satuan		
		FROM tbl_daftar_biaya as da, tbl_modal as mo 
		WHERE da.id_biaya=mo.id_biaya AND mo.tanggal >='".$awal."' AND mo.tanggal <='".$akhir."'
		ORDER BY da.nama_biaya ASC");
		return $query->result();
	}
	
	function total_modal($awal,$akhir) {		
        return $query = $this->db->query("SELECT SUM(jumlah) as total_modal
		FROM tbl_modal 
		WHERE tanggal >='".$awal."' AND tanggal <='".$akhir."'");
    }	
	/*End - Modal Harian*/
	
	/*Begin - Keuntungan */
	function hitung_bbb_bbp($bulan,$tahun) {		
        return $query = $this->db->query("SELECT b.golongan_biaya, SUM(m.jumlah) as total 
		FROM tbl_resep as r, tbl_daftar_biaya as b, tbl_modal as m, tbl_menu as me 
		WHERE r.id_menu=me.id_menu AND r.id_biaya=b.id_biaya and b.golongan_biaya = 'Biaya Bahan Baku'&'Biaya Bahan Penolong' and r.id_biaya=m.id_biaya and MONTH(m.tanggal) = '$bulan' and YEAR(m.tanggal)='$tahun' 
		GROUP BY b.golongan_biaya")->result();
    }
	function total_bbb_bbp($bulan,$tahun) {		
        return $query = $this->db->query("SELECT SUM(m.jumlah) as total 
		FROM tbl_resep as r, tbl_daftar_biaya as b, tbl_modal as m, tbl_menu as me 
		WHERE r.id_menu=me.id_menu AND r.id_biaya=b.id_biaya and b.golongan_biaya = 'Biaya Bahan Baku'&'Biaya Bahan Penolong' and r.id_biaya=m.id_biaya and MONTH(m.tanggal) = '$bulan' and YEAR(m.tanggal)='$tahun' 
		")->result();
    }
	
	function hitung_bop_dll($bulan,$tahun){
		return $query = $this->db->query("SELECT b.golongan_biaya, SUM(m.jumlah) as total 
		FROM tbl_daftar_biaya as b, tbl_modal as m 
		WHERE b.golongan_biaya not in ('Biaya Bahan Baku', 'Biaya Bahan Penolong') and b.id_biaya=m.id_biaya and MONTH(m.tanggal) = '$bulan' and YEAR(m.tanggal)='$tahun' 
		GROUP by b.golongan_biaya")->result();		
	}
	
	function total_bop_dll($bulan,$tahun){
		return $query = $this->db->query("SELECT SUM(m.jumlah) as total 
		FROM tbl_daftar_biaya as b, tbl_modal as m 
		WHERE b.golongan_biaya not in ('Biaya Bahan Baku', 'Biaya Bahan Penolong') and b.id_biaya=m.id_biaya and MONTH(m.tanggal) = '$bulan' and YEAR(m.tanggal)='$tahun' 
		")->result();		
	}
	
	function total_penjualan($bulan,$tahun) {		
        return $query = $this->db->query("SELECT SUM(pesan.price*pesan.qty) as total 
		FROM tbl_pesanan as pesan, tbl_pembeli as beli 
		WHERE pesan.id_pembeli=beli.id_pembeli AND MONTH(beli.tanggal) = '$bulan' and YEAR(beli.tanggal)='$tahun' AND beli.status='paid'
		")->result();
    }
	
	function biaya_lain($bulan,$tahun){
		return $query=$this->db->query("select nama_biaya_lain, sum(kuantitas*harga) as total 
		from tbl_biaya_lain where MONTH(tanggal)='$bulan' AND YEAR(tanggal)='$tahun' 
		GROUP by nama_biaya_lain")->result();
	}
	
	function total_biaya_lain($bulan,$tahun){
		return $query=$this->db->query("select sum(kuantitas*harga) as total 
		from tbl_biaya_lain where MONTH(tanggal)='$bulan' AND YEAR(tanggal)='$tahun' 
		")->result();
	}
	/* END - Keuntungan */
	/* Dashboard */
	function tot_bbb_bbp($tanggal) {		
        return $query = $this->db->query("SELECT b.golongan_biaya, SUM(m.jumlah) as total 
		FROM tbl_resep as r, tbl_daftar_biaya as b, tbl_modal as m, tbl_menu as me 
		WHERE r.id_menu=me.id_menu AND r.id_biaya=b.id_biaya and b.golongan_biaya = 'Biaya Bahan Baku'&'Biaya Bahan Penolong' and r.id_biaya=m.id_biaya and m.tanggal='$tanggal' 
		GROUP BY b.golongan_biaya")->result();
    }
	
	function tot_bop_dll($tanggal){
		return $query = $this->db->query("SELECT SUM(m.jumlah) as total 
		FROM tbl_daftar_biaya as b, tbl_modal as m 
		WHERE b.golongan_biaya not in ('Biaya Bahan Baku', 'Biaya Bahan Penolong') and b.id_biaya=m.id_biaya and m.tanggal = '$tanggal' 
		")->result();		
	}
	
	function tot_penjualan($tanggal) {		
        return $query = $this->db->query("SELECT SUM(pesan.price*pesan.qty) as total 
		FROM tbl_pesanan as pesan, tbl_pembeli as beli 
		WHERE pesan.id_pembeli=beli.id_pembeli and beli.tanggal = '$tanggal'  AND beli.status='paid'
		")->result();
    }
	
	function tot_biaya_lain($tanggal){
		return $query=$this->db->query("select sum(kuantitas*harga) as total 
		from tbl_biaya_lain where tanggal = '$tanggal' 
		")->result();
	}
	
	
	
}
?>
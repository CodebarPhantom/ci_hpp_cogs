<?php if(!defined('BASEPATH')) exit ('No direct script access allowed');
	class M_keuntungan extends CI_Model{
		function total_penjualan_april(){
		$tahun = date('Y');
        return $query = $this->db->query("SELECT SUM(pesan.price*pesan.qty) as total 
		FROM tbl_pesanan as pesan, tbl_pembeli as beli 
		WHERE pesan.id_pembeli=beli.id_pembeli AND MONTH(beli.tanggal) = '04' and YEAR(beli.tanggal)='$tahun' AND beli.status='paid'")->result();
		}
		
		function total_modal_april(){
		$tahun = date('Y');
		return	$query = $this->db->query("SELECT SUM(jumlah) as total
		FROM tbl_modal WHERE MONTH(tanggal) = '04' and YEAR(tanggal)='$tahun'")->result();
		}
	
	
	}
		
		
?>
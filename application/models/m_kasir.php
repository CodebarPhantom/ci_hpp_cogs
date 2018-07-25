<?php if(!defined('BASEPATH')) exit ('No direct script access allowed');
class M_kasir extends CI_Model{
	
		
	/* Copyright by: Laboratorim UNSIKA */
	/* Author: Divisi Software */
	/* Beginninh of file: m_admin.php */
	
	/* Begin - Dashboard*/
	function total_users(){
		return $this->db->count_all('tbl_users');
	}
	
	function total_posting($id_user){
		$this->db->where('id_user',$id_user);
       $cek = $this->db->get('tbl_posting');
       return $cek->num_rows();
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
	
	public function pie_chart(){		
		$tahun = date('Y');
		$bulan = date('m');
		return $query = $this->db->query("		
		select pesan.nama_menu, sum(pesan.qty) as total 
		from tbl_pesanan as pesan, tbl_pembeli as beli 
		where pesan.id_pembeli = beli.id_pembeli AND MONTH(tanggal)='$bulan' AND YEAR(tanggal)='$tahun' GROUP by pesan.nama_menu")->result();
		
	
	}
	
	function status(){
		$tanggal= date('Y-m-d');
		return $query= $this->db->query("select (select count(status) from tbl_pembeli where STATUS='paid' and tanggal='$tanggal') as paid,
		(select count(status) from tbl_pembeli where STATUS='unpaid' and tanggal='$tanggal') as unpaid,
		(SELECT count(status) from tbl_pembeli where tanggal='$tanggal') as total")->result();
	}
	
	
	/* End - Dashboard */
	
	/* Begin - Manajemen User */ 
	
    function get_id_user($id_user) {
		
        $this->db->where('id_user',$id_user);
        return $this->db->get('tbl_users');
    }	
	/* End - Manajemen User */ 
	
	function lihat_menu() {
        return $this->db->get('tbl_menu','ASC');
    }
	
	function get_id_menu($id_menu){
		$this->db->where('id_menu',$id_menu);
		return $this->db->get('tbl_menu')->row();
	}
	
	function process($antrian)
	{
		$pembeli = array(
			'tanggal' => date('Y-m-d'),			
			'status' => 'unpaid',
			'antrian' => $antrian,
			'no_meja' => $this->input->post('no_meja',true),			
			'keterangan' => $this->input->post('keterangan',true),
		);
		$this->db->insert('tbl_pembeli', $pembeli);
		$id_pembeli = $this->db->insert_id();
		
		foreach($this->cart->contents() as $item)
		{
			$data = array(
					'id_pembeli' => $id_pembeli,
					'id_menu' => $item['id'],
					'nama_menu' => $item['name'],
					'qty' 		=> $item['qty'],
					'price' 	=> $item['price'],					
			);
			$this->db->insert('tbl_pesanan',$data);
		}
		
		$this->cart->destroy();
		$this->session->set_flashdata('pemesanan','pesan');
		redirect('kasir/pemesanan');
		
		return TRUE;
	}
	
	function lihat_pembayaran($tanggal) {		
        return $query = $this->db->query("SELECT  *	
		FROM tbl_pembeli 
		WHERE tanggal like '%$tanggal%'
		ORDER BY id_pembeli")->result();
    }
	
	function detail_pembayaran($id_pembeli){
		$this->db->where('id_pembeli',$id_pembeli);
		return $this->db->get('tbl_pesanan')->result();
	}
	
	function keterangan_pembeli($id_pembeli){
		return $query = $this->db->query("SELECT pesan.id_pembeli, beli.id_pembeli, beli.no_meja, beli.status, beli.keterangan, beli.bayar 
		FROM tbl_pembeli as beli, tbl_pesanan as pesan 
		WHERE pesan.id_pembeli='$id_pembeli' AND beli.id_pembeli='$id_pembeli'		
		LIMIT 1
		")->result();
	}
	
	function total_pembelian($id_pembeli) {		
        return $query = $this->db->query("SELECT SUM(price*qty) as total, id_pembeli FROM tbl_pesanan WHERE id_pembeli like '$id_pembeli'")->result();
    }
	
	function update_pembayaran($id_pembeli,$bayar) {
		$query = $this->db->query("UPDATE tbl_pembeli SET bayar='$bayar', status = 'paid' WHERE tbl_pembeli.id_pembeli = '$id_pembeli'");
       
    }
	
	function hasil_rekap_pembayaran($awal,$akhir){
		$query = $this->db->query("
		SELECT  id_pembeli,date_format(tanggal,'%d %M %Y') as tgl, keterangan, status		
		FROM tbl_pembeli
		WHERE tanggal >='".$awal."' AND tanggal <='".$akhir."'
		");
		return $query->result();
	}
	
	
	

}
?>
<?php if(!defined('BASEPATH')) exit ('No direct script access allowed');
class M_login extends CI_Model{
		
	/* Copyright by: VPNKrw */
/* Author: Eryan Fauzan */
/* End of file: m_login.php */
function cek_user($data) {
			$query = $this->db->get_where('tbl_users', $data);
			return $query;
		}
function get_user($data) {
			$query = $this->db->get_where('tbl_users', $data);
			foreach($query->result() as $ceklogin){
				$data['id_user'] = $ceklogin->id_user;
				$data['username']=$ceklogin->username;
				$data['level']=$ceklogin->level;
				$data['foto'] = $ceklogin->foto;			
				$this->session->set_userdata($data);
			}		

			return $data;
		}
	}
?>
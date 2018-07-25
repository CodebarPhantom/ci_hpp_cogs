<?php if(!defined('BASEPATH')) exit ('No direct script access allowed');

class Hak_akses extends CI_Controller {

	function index() {
		echo "<script>alert('Anda Tidak Memiliki Akses Kesini')</script>";
		echo "<script>history.go(-1)</script>";
	}
	function warning() {
		echo "<script>alert('Anda Harus Login Terlebih Dahulu')</script>";
            redirect('auth','refresh');
	}
}

/* Copyright by: VPNKrw */
/* Author: Eryan Fauzan */
/* End of file: hak_akses.php */?>
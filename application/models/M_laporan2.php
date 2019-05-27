<?php 
 
class M_laporan extends CI_Model{

	function get_lap_bulan(){
		$hsl=$this->db->query("SELECT DISTINCT DATE_FORMAT(tk_tanggal,'%M %Y') AS bulan FROM tbl_transaksi_keluar");
		return $hsl;
	}

	function get_total_jasa_perbulan() {
		
	}



















}
<?php 

class M_paket extends CI_Model{

	function tampil_paket(){
		$hsl=$this->db->query("SELECT paket_id , paket_nama, paket_satuan,paket_harga FROM tbl_paket");
		return $hsl;
	}

	function get_paket($kopak){
		$hsl=$this->db->query("SELECT * FROM tbl_paket WHERE paket_id ='$kopak'");
		return $hsl;
	}  


}



 ?>
<?php 

class M_pengeluaran extends CI_Model{

	function tampil_paket(){
		$hsl=$this->db->query("SELECT pengeluaran_id , pengeluaran_tanggal, pengeluaran_nama,pengeluaran_harga, pengeluaran_keterangan FROM tbl_pengeluaran");
		return $hsl;
	}

	function get_paket($kopak){
		$hsl=$this->db->query("SELECT * FROM tbl_pengeluaran WHERE pengeluaran_id ='$kopak'");
		return $hsl;
	}  

	function input_data($data,$table){
        $this->db->insert($table,$data);
    }
    function hapus_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
    }
    
    function edit_data($where,$table){
        return $this->db->get_where($table,$where);
    }
    function update_data($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }


}



 ?>
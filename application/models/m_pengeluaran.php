<?php 

class M_pengeluaran extends CI_Model{

	function tampil_paket(){
		return $this->db->get('tbl_pengeluaran');
    }
	function input_data($data,$table){
        $this->db->insert($table,$data);
    }
    function update_data($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }
    function hapus_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
    }
    
    function edit_data($where,$table){
        return $this->db->get_where($table,$where);
    }
   
}
 ?>
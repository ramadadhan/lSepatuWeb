<?php 

class M_paket extends CI_Model{

	function get_data_barang_bykode($kode){
        $hsl=$this->db->query("SELECT * FROM barang WHERE kode='$kode'");
        if($hsl->num_rows()>0){
            foreach ($hsl->result() as $data) {
                $hasil=array(
                    'kode' => $data->kode,
                    'nama_barang' => $data->nama_barang,
                    'harga' => $data->harga,
                    'satuan' => $data->satuan,
                    );
            }
        }
        return $hasil;
    }

	function tampil_paket(){
		$hsl=$this->db->query("SELECT paket_id , paket_nama, paket_satuan,paket_harga FROM tbl_paket");
		return $hsl;
	}

	function get_paket($kopak){
		$hsl=$this->db->query("SELECT * FROM tbl_paket WHERE paket_id ='$kopak'");
		return $hsl;
    }  
    
    // function get_paket_id(){
	// 	$q = $this->db->query("SELECT MAX(paket_id) AS kd_max FROM tbl_paket");
    //     $kd = "";
    //     $tm = "PK";
    //     if($q->num_rows()>0){
    //         foreach($q->result() as $k){
            	
    //             $tmp = ((int)$k->kd_max)+1;
    //             $kd = sprintf("%04s", $tmp );
    //         }
    //     }else{
    //         $kd = "01";
    //     }
	// }

	// function get_member($idmember){
	// 	$hsl=$this->db->query("SELECT * FROM tbl_user WHERE user_id ='$idmember'");
	// 	return $hsl;
	// }

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

<?php 

class Transaksi_keluar extends CI_Controller{
	function __construct(){
		parent::__construct();

		
		//$this->load->model('m_paket');
	
		$this->load->model('m_penjualan');
	}



	function index () {

		$data['data'] = $this->m_penjualan->tampil_transaksi_masuk();
		$kode_tm=$this->input->post('kode_tm');
		$data['kode_dtm']=$this->m_penjualan->get_detail_transaksi_masuk($kode_tm);
		$data['kode_tm']=$this->m_penjualan->get_transaksi_masuk($kode_tm);
		$this->load->view('admin/v_transaksi_keluar',$data);
		//$this->load->view('admin/v_penjualan');

	}

	
	// function get_detail_transaksi_masuk2(){
 //        $kode_tm=$this->input->post('kode_tm');
 //        $data=$this->m_penjualan->get_detail_transaksi_masuk($kode_tm);
 //        echo json_encode($data);
 //    }
	// function get_transaksi_masuk2(){
 //        $kode_tm=$this->input->post('kode_tm');
 //        $data=$this->m_penjualan->get_transaksi_masuk($kode_tm);
 //        echo json_encode($data);
 //    }


}

 ?>
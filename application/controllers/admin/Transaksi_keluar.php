
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

	function simpan_transaksi_keluar () {
		$total=$this->input->post('total');
		$total_sepatu=$this->input->post('total_sepatu');
		$keterangan=$this->input->post('keterangan');
		$id_member =$this->input->post('id_member');
		$nama=$this->input->post('nama');
		$alamat=$this->input->post('alamat');
		$no_telp=$this->input->post('no_telp');

		$tk_nofak=$this->m_penjualan->get_tk_nofak();
		$this->session->set_userdata('tk_nofak',$tk_nofak);

		$order_proses=$this->m_penjualan->simpan_transaksi_keluar($tm_nofak,$total,$total_sepatu,$keterangan,$id_member,$nama,$alamat,$no_telp);

		if($order_proses){
			$this->cart->destroy();
			//$this->load->view('admin/alert/alert_sukses');
			redirect('admin/transaksi_masuk');
		} else {

			redirect('admin/transaksi_masuk');
		}



}
}

 ?>
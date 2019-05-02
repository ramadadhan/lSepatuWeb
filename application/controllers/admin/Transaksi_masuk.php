<?php 

class Transaksi_masuk extends CI_Controller{
	function __construct(){
		parent::__construct();

		
		$this->load->model('m_paket');
	
		$this->load->model('m_penjualan');
	}


	function index () {

		$data['data'] = $this->m_paket->tampil_paket();
		$this->load->view('admin/v_Transaksi_masuk',$data);
		//$this->load->view('admin/v_Transaksi_masuk');

	}
	function get_paket() {

		$kopak=$this->input->post('kode_paket');
		$x['paket']=$this->m_paket->get_paket($kopak);
		$this->load->view('admin/v_detail_paket',$x);

	}

	function add_to_cart(){

		$kopak=$this->input->post('kode_paket');
		$paket=$this->m_paket->get_paket($kopak);
		$i=$paket->row_array();
		$data = array(
				'id'       => $i['paket_id'],
      		  	'name'     => $i['paket_nama'],
               	'satuan'   => $i['paket_satuan'],
	           'price'   => $i['paket_harga'],
	           //'price'    => str_replace(",", "", $this->input->post('paket_harga')),
	         
	           'qty'      => $this->input->post('qty'),
	          // 'amount'	  => str_replace(",", "", $this->input->post('paket_harga'))
	           //'amount'	  =>$i['paket_harga']
		);

		// if( !empty($this->cart->total_items()) ){
		// 	foreach ($this->cart->contents() as $items){
		// 		$items['id'];
		// 		$qtylama=$items['qty'];
		// 		$rowid=$items['rowid'];
		// 		$kopak=$this->input->post('kode_paket');
		// 		$qty=$this->input->post('qty');
		// 		if($id==$kopak){
		// 			$up=array(
		// 				'rowid'=> $rowid,
		// 				'qty'=>$qtylama+$qty
		// 				);
		// 		$this->cart->update($up);
		// 	}else{
		// 		$this->cart->insert($data);
		// 	}
		// 	}

		// } else { 
		// 	$this->cart->insert($data);
		// }
		$this->cart->insert($data);
		redirect('admin/transaksi_masuk');
	}
	function remove(){
	
		$row_id=$this->uri->segment(4);
		$this->cart->update(array(
               'rowid'      => $row_id,
               'qty'     => 0
            ));
		redirect('admin/transaksi_masuk');
	
        
    
	}

	function simpan_transaksi_masuk () {
		$total=$this->input->post('total');
		$total_sepatu=$this->input->post('total_sepatu');
		$keterangan=$this->input->post('keterangan');
		$id_member =$this->input->post('id_member');
		$nama=$this->input->post('nama');
		$alamat=$this->input->post('alamat');
		$no_telp=$this->input->post('no_telp');

		$tm_nofak=$this->m_penjualan->get_tm_nofak();
		$this->session->set_userdata('tm_nofak',$tm_nofak);

		$order_proses=$this->m_penjualan->simpan_transaksi_masuk($tm_nofak,$total,$total_sepatu,$keterangan,$id_member,$nama,$alamat,$no_telp);

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
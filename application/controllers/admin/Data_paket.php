<?php 

    class Data_paket extends CI_Controller{
        function __construct(){
            parent::__construct();
            $this->load->model('M_paket');
        }
    
    
        function index () {

           
            $data['paket'] = $this->m_paket->tampil_paket()->result();    
            $this->load->view('admin/v_data_paket', $data);
        }

        
        function tambah(){
            $this->load->view('admin/v_tambah_paket');
        }
        function tambah_aksi(){
            $paket_nama = $this->input->post('paket_nama');
            $paket_satuan = $this->input->post('paket_satuan');
            $paket_harga = $this->input->post('paket_harga');
    
            $data = array(
                'paket_nama' => $paket_nama,
                'paket_satuan' => $paket_satuan,
                'paket_harga' => $paket_harga
                );
           
            $paket_id=$this->m_paket->get_paket_id();    
            $this->m_paket->input_data($data,'tbl_paket');
            redirect('admin/data_paket/index');
        }
    
        function hapus($paket_id){
            $where = array('paket_id' => $paket_id);
            $this->m_paket->hapus_data($where,'tbl_paket');
            $data['tbl_paket'] = $this->m_paket->hapus_data($where,'tbl_paket')->result();
            redirect('admin/data_paket/index');
        }

        function edit($paket_id){
            $where = array('id' => $paket_id);
            $data['tbl_paket'] = $this->m_paket->edit_data($where,'tbl_paket')->result();
            $this->load->view('v_edit',$data);
        }

        function update(){
            $paket_id = $this->input->post('id');
            $paket_nama = $this->input->post('paket_nama');
            $paket_satuan = $this->input->post('paket_satuan');
            $paket_harga = $this->input->post('paket_harga');
        
            $data = array(
                'paket_nama' => $paket_nama,
                'paket_satuan' => $paket_satuan,
                'paket_harga' => $paket_harga
            );
        
            $where = array(
                'id' => $paket_id
            );
        
            $this->m_paket->update_data($where,$data,'tbl_paket');
            redirect('data_paket/index');
        }


    }

 ?>
<?php 

    class Data_paket extends CI_Controller{
       
    
    
        function index () {

            $this->load->model('M_paket');
            $data['paket'] = $this->m_paket->tampil_paket()->result();    
            $this->load->view('admin/v_data_paket', $data);
        }

        
        function tambah(){
            $this->load->view('v_input');
        }
        function tambah_aksi(){
            $paket_nama = $this->input->post('nama paket');
            $paket_satuan = $this->input->post('satuan');
            $paket_harga = $this->input->post('harga');
    
            $data = array(
                'nama paket' => $paket_nama,
                'satuan' => $paket_satuan,
                'harga' => $paket_harga
                );
            $this->m_user->input_data($data,'tbl_paket');
            redirect('data_paket/index');
        }
    
        function hapus($paket_id){
            $where = array('id' => $paket_id);
            $this->m_user->hapus_data($where,'tbl_paket');
            redirect('admin/data_paket/index');
        }

        function edit($paket_id){
            $where = array('id' => $paket_id);
            $data['tbl_paket'] = $this->m_user->edit_data($where,'tbl_paket')->result();
            $this->load->view('v_edit',$data);
        }

        function update(){
            $paket_id = $this->input->post('id');
            $paket_nama = $this->input->post('nama paket');
            $paket_satuan = $this->input->post('satuan');
            $paket_harga = $this->input->post('harga');
        
            $data = array(
                'nama paket' => $paket_nama,
                'satuan' => $paket_satuan,
                'harga' => $paket_harga
            );
        
            $where = array(
                'id' => $paket_id
            );
        
            $this->m_user->update_data($where,$data,'tbl_paket');
            redirect('data_paket/index');
        }


    }

 ?>
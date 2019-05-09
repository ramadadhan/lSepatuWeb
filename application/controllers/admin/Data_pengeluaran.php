<?php 

    class Data_pengeluaran extends CI_Controller{
       
    
    
        function index () {

            $this->load->model('m_pengeluaran');
            $data['pengeluaran'] = $this->m_pengeluaran->tampil_paket()->result();    
            $this->load->view('admin/v_data_pengeluaran', $data);
        }

        
        function tambah(){
            $this->load->view('v_input');
        }
        function tambah_aksi(){
            $pengeluaran_nama = $this->input->post('nama ppengeluaran');
            $pengeluaran_harga = $this->input->post('harga');
            $pengeluaran_keterangan = $this->input->post('keterangan');
    
            $data = array(
                'nama pengeluaran' => $pengeluaran_nama,
                'harga' => $pengeluaran_harga,
                'keterangan' => $pengeluaran_keterangan
                );
            $this->m_user->input_data($data,'tbl_pengeluaran');
            redirect('data_pengeluaran/index');
        }
    
        function hapus($pengaluaran_id){
            $where = array('id' => $pengaluaran_id);
            $this->m_user->hapus_data($where,'tbl_pengaluaran');
            redirect('admin/data_pengeluaran/index');
        }

        function edit($pengaluaran_id){
            $where = array('id' => $pengaluaran_id);
            $data['tbl_pengeluaran'] = $this->m_user->edit_data($where,'tbl_pengeluaran')->result();
            $this->load->view('v_edit',$data);
        }

        function update(){
            $pengaluaran_id = $this->input->post('id');
            $pengeluaran_nama = $this->input->post('nama pengeluaran');
            $pengeluaran_harga = $this->input->post('harga');
            $pengeluaran_keterangan = $this->input->post('keterangan');
        
            $data = array(
                'nama pengeluaran' => $pengeluaran_nama,
                'harga' => $pengeluaran_harga,
                'keterangan' => $pengeluaran_keterangan
            );
        
            $where = array(
                'id' => $pengaluaran_id
            );
        
            $this->m_user->update_data($where,$data,'tbl_pengeluaran');
            redirect('data_pengeluaran/index');
        }


    }

 ?>
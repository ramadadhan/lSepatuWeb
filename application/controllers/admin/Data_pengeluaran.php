<?php 

    class Data_pengeluaran extends CI_Controller{
        function __construct(){
            parent::__construct();
               
            $this->load->model('m_pengeluaran');
                $this->load->helper('url');
            }
    
    
        function index () {
            $data['pengeluaran'] = $this->m_pengeluaran->tampil_paket()->result();    
            $this->load->view('admin/v_pengeluaran/v_data_pengeluaran', $data);
        }

        function tambah(){
            $this->load->view('admin/v_pengeluaran/v_tambah');
        }
        function tambah_aksi(){
            $pengeluaran_nama = $this->input->post('pengeluaran_nama');
            $pengeluaran_harga = $this->input->post('pengeluaran_harga');
            $pengeluaran_keterangan = $this->input->post('pengeluaran_keterangan');
    
            $data = array(
                'pengeluaran_nama' => $pengeluaran_nama,
                'pengeluaran_harga' => $pengeluaran_harga,
                'pengeluaran_keterangan' => $pengeluaran_keterangan
                );
            $this->m_pengeluaran->input_data($data,'tbl_pengeluaran');
            redirect('admin/data_pengeluaran');
        }
    
        function hapus($pengaluaran_id){
            $where = array('pengeluaran_id' => $pengaluaran_id);
            $this->m_pengeluaran->hapus_data($where,'tbl_pengeluaran');
            redirect('admin/data_pengeluaran/index');
        }

        function edit($pengaluaran_id){
            $where = array('pengeluaran_id' => $pengaluaran_id);
            $data['tbl_pengeluaran'] = $this->m_pengeluaran->edit_data($where,'tbl_pengeluaran')->result();
            $this->load->view('admin/v_pengeluaran/v_edit',$data);
        }

        function update(){
            $pengaluaran_id = $this->input->post('pengeluaran_id');
            $pengeluaran_nama = $this->input->post('pengeluaran_nama');
            $pengeluaran_harga = $this->input->post('pengeluaran_harga');
            $pengeluaran_keterangan = $this->input->post('pengeluaran_keterangan');
        
            $data = array(
                'pengeluaran_nama' => $pengeluaran_nama,
                'pengeluaran_harga' => $pengeluaran_harga,
                'pengeluaran_keterangan' => $pengeluaran_keterangan
            );
        
            $where = array(
                'pengeluaran_id' => $pengaluaran_id
            );
        
            $this->m_pengeluaran->update_data($where,$data,'tbl_pengeluaran');
            redirect('data_pengeluaran/index');
        }


    }

 ?>
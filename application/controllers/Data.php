<?php

    class Data extends CI_Controller{

        public function __construct()
        {
            parent::__construct();
            $this->load->model('Data_model');
        }

        public function index()
        {
            $data['judul'] = 'Data Karyawan';
            $data['data'] = $this->Data_model->getAllData();
            $this->form_validation->set_rules('nik', 'Nik', 'required|numeric');
            $this->form_validation->set_rules('nama', 'Nama', 'required');
            $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required');
            $this->form_validation->set_rules('alamat', 'Alamat', 'required');
            $this->form_validation->set_rules('divisi', 'Divisi', 'required');
            if ($this->form_validation->run() == false) {
                $this->load->view('templates/header', $data);
                $this->load->view('data/index');
                $this->load->view('templates/footer');
            }else{
                $this->Data_model->tambahData();
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Data berhasil ditambahkan!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></button></div>');
                redirect('data');
            }
        }

        public function hapusData($id)
        {
            $this->Data_model->hapus($id);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Data berhasil dihapus!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></button></div>');
            redirect('data');
        }

        public function rubahData(){
            $this->form_validation->set_rules('nik', 'Nik', 'required|numeric');
            $this->form_validation->set_rules('nama', 'Nama', 'required');
            $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required');
            $this->form_validation->set_rules('alamat', 'Alamat', 'required');
            $this->form_validation->set_rules('divisi', 'Divisi', 'required');

            if ($this->form_validation->run() == false) {
                redirect('data');
            } else {
                $this->Data_model->rubah();
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        Data berhasil dirubah!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button></div>');
                redirect('data');
            }
        }

        public function getEditData()
        {
            $this->Data_model->getData();
        }
    }

?>
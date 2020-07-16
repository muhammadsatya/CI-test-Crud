<?php

    class Data_model extends CI_model{
        public function getAllData()
        {
            return $this->db->get('tbl_karyawan')->result_array();
            
        }

        public function tambahData()
        {
            $data = 
            [
                'nik' => $this->input->post('nik', true),
                'nama' => $this->input->post('nama', true),
                'jenis_kelamin' => $this->input->post('jk',true),
                'alamat' => $this->input->post('alamat', true),
                'divisi' => $this->input->post('divisi', true)
            ];

            $this->db->insert('tbl_karyawan', $data);
        }

        public function hapus($id)
        {
            $this->db->where('id', $id);
            $this->db->delete('tbl_karyawan');
        }

        public function rubah()
        {
                $this->db->set('nik', $this->input->post('nik', true));
                $this->db->set('nama', $this->input->post('nama', true));
                $this->db->set('jenis_kelamin', $this->input->post('jk', true));
                $this->db->set('alamat', $this->input->post('alamat', true));
                $this->db->set('divisi', $this->input->post('divisi', true));
                $this->db->where('id', $this->input->post('id', true));
                $this->db->update('tbl_karyawan');
        }

        public function getData()
        {
            echo json_encode($this->db->get_where('tbl_karyawan', ['id' => $this->input->post('id')])->row_array());
        }
    }

?>
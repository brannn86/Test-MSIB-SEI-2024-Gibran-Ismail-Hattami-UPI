<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Input extends CI_Controller {

    public function lokasi() {
        $this->load->view('input_lokasi');
    }

    public function proyek() {
        $this->load->view('input_proyek');
    }

    public function submit_lokasi() {
        $this->load->library('curl');
        $data = array(
            'namaLokasi' => $this->input->post('namaLokasi'),
            'negara' => $this->input->post('negara'),
            'provinsi' => $this->input->post('provinsi'),
            'kota' => $this->input->post('kota')
        );
        $insert = $this->curl->simple_post('http://localhost:8080/lokasi', $data);
        if ($insert) {
            redirect('home');
        }
    }

    public function submit_proyek() {
        $this->load->library('curl');
        $data = array(
            'namaProyek' => $this->input->post('namaProyek'),
            'client' => $this->input->post('client'),
            'tglMulai' => $this->input->post('tglMulai'),
            'tglSelesai' => $this->input->post('tglSelesai'),
            'pimpinanProyek' => $this->input->post('pimpinanProyek'),
            'keterangan' => $this->input->post('keterangan')
        );
        $insert = $this->curl->simple_post('http://localhost:8080/proyek', $data);
        if ($insert) {
            redirect('home');
        }
    }
}
?>
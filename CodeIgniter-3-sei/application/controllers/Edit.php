<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Edit extends CI_Controller {

    public function lokasi($id) {
        $this->load->library('curl');
        $data['lokasi'] = json_decode($this->curl->simple_get('http://localhost:8080/lokasi/' . $id));
        $this->load->view('edit_lokasi', $data);
    }

    public function proyek($id) {
        $this->load->library('curl');
        $data['proyek'] = json_decode($this->curl->simple_get('http://localhost:8080/proyek/' . $id));
        $this->load->view('edit_proyek', $data);
    }

    public function submit_lokasi() {
        $this->load->library('curl');
        $data = array(
            'id' => $this->input->post('id'),
            'namaLokasi' => $this->input->post('namaLokasi'),
            'negara' => $this->input->post('negara'),
            'provinsi' => $this->input->post('provinsi'),
            'kota' => $this->input->post('kota')
        );
        $update = $this->curl->simple_put('http://localhost:8080/lokasi/' . $data['id'], $data);
        if ($update) {
            redirect('home');
        }
    }

    public function submit_proyek() {
        $this->load->library('curl');
        $data = array(
            'id' => $this->input->post('id'),
            'namaProyek' => $this->input->post('namaProyek'),
            'client' => $this->input->post('client'),
            'tglMulai' => $this->input->post('tglMulai'),
            'tglSelesai' => $this->input->post('tglSelesai'),
            'pimpinanProyek' => $this->input->post('pimpinanProyek'),
            'keterangan' => $this->input->post('keterangan')
        );
        $update = $this->curl->simple_put('http://localhost:8080/proyek/' . $data['id'], $data);
        if ($update) {
            redirect('home');
        }
    }
}
?>
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProyekController extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('restclient');
    }

    public function index() {
        $data['proyek'] = $this->restclient->get('/proyek');
        $this->load->view('ListProyek', $data);
    }

    public function create() {
        if ($this->input->post()) {
            $data = array(
                'namaProyek' => $this->input->post('nama_proyek'),
                'client' => $this->input->post('client'),
                'tglMulai' => $this->input->post('tgl_mulai'),
                'tglSelesai' => $this->input->post('tgl_selesai'),
                'pimpinanProyek' => $this->input->post('pimpinan_proyek'),
                'keterangan' => $this->input->post('keterangan')
            );

            $response = $this->restclient->post('/proyek', $data);

            if ($response && !isset($response['error'])) {
                $this->session->set_flashdata('message', 'Proyek berhasil ditambahkan.');
                redirect('/');
            } else {
                $this->session->set_flashdata('error', 'Gagal menambahkan proyek. ' . (isset($response['error']) ? $response['error'] : 'Unknown error.'));
            }
        } else {
            $this->load->view('CreateProyek');
        }
    }

    public function edit($id) {
        if ($this->input->post()) {
            $data = array(
                'namaProyek' => $this->input->post('nama_proyek'),
                'client' => $this->input->post('client'),
                'tglMulai' => $this->input->post('tgl_mulai'),
                'tglSelesai' => $this->input->post('tgl_selesai'),
                'pimpinanProyek' => $this->input->post('pimpinan_proyek'),
                'keterangan' => $this->input->post('keterangan')
            );
            $this->restclient->put('/proyek/' . $id, $data);
            redirect('/');
        } else {
            $data['proyek'] = $this->restclient->get('/proyek/' . $id);

            $this->load->view('EditProyek', $data);
        }
    }




    public function delete($id) {
        $response = $this->restclient->delete('/proyek/' . $id);

        if ($response && !isset($response['error'])) {
            $this->session->set_flashdata('message', 'Proyek berhasil dihapus.');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus proyek. ' . (isset($response['error']) ? $response['error'] : 'Unknown error.'));
        }

        redirect('/');
    }
}

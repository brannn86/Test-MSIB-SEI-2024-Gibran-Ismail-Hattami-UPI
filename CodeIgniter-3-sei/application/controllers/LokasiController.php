<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LokasiController extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('restclient2', array('base_url' => 'http://localhost:8080'));
    }

    public function index() {
        $data['lokasi'] = $this->restclient2->get('/lokasi');
        $this->load->view('ListLokasi', $data);
    }

    public function create() {
        if ($this->input->post()) {
            $data = array(
                'namaLokasi' => $this->input->post('namaLokasi'),
                'negara' => $this->input->post('negara'),
                'provinsi' => $this->input->post('provinsi'),
                'kota' => $this->input->post('kota')
            );

            $response = $this->restclient2->post('/lokasi', $data);

            if ($response && !isset($response['error'])) {
                $this->session->set_flashdata('message', 'Lokasi berhasil ditambahkan.');
                redirect('/');
            } else {
                $this->session->set_flashdata('error', 'Gagal menambahkan lokasi. ' . (isset($response['error']) ? $response['error'] : 'Unknown error.'));
            }
        } else {
            $this->load->view('CreateLokasi');
        }
    }

    public function edit($id) {
        $response = $this->restclient2->get('/lokasi/' . $id);
        $data['lokasi'] = $response;
        $this->load->view('EditLokasi', $data);
    }

    public function update() {
        if ($this->input->post()) {
            $data = array(
                'id' => $this->input->post('id'),
                'namaLokasi' => $this->input->post('namaLokasi'),
                'negara' => $this->input->post('negara'),
                'provinsi' => $this->input->post('provinsi'),
                'kota' => $this->input->post('kota')
            );

            $response = $this->restclient2->put('/lokasi/' . $data['id'], $data);

            if ($response && !isset($response['error'])) {
                $this->session->set_flashdata('message', 'Lokasi berhasil diperbarui.');
                redirect('/');
            } else {
                $this->session->set_flashdata('error', 'Gagal memperbarui lokasi. ' . (isset($response['error']) ? $response['error'] : 'Unknown error.'));
            }
        } else {
            redirect('/');
        }
    }

    public function delete($id) {
        $this->restclient2->delete('/lokasi/' . $id);
        redirect('/');
    }
}

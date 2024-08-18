<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller {

    public function index() {
        $this->load->library('curl');
        $data['lokasi'] = json_decode($this->curl->simple_get('http://localhost:8080/lokasi'));
        $data['proyek'] = json_decode($this->curl->simple_get('http://localhost:8080/proyek'));
        $this->load->view('home', $data);
    }
}
?>
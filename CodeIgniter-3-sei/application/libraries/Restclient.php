<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RestClient {
    private $ci;
    private $base_url;

    public function __construct() {
        $this->ci =& get_instance();
        $this->base_url = 'http://localhost:8080'; // URL base dari REST API
    }

    private function request($method, $endpoint, $data = null) {
        $url = $this->base_url . $endpoint;
        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Set headers
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

        if ($method === 'POST') {
            curl_setopt($ch, CURLOPT_POST, true);
            if ($data) {
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
            }
        } elseif ($method === 'PUT') {
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
            if ($data) {
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
            }
        } elseif ($method === 'DELETE') {
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        }

        $response = curl_exec($ch);
        if (curl_errno($ch)) {
            $response = array('error' => curl_error($ch));
        }
        curl_close($ch);
        return json_decode($response, true);
    }


    public function get($endpoint) {
        return $this->request('GET', $endpoint);
    }

    public function post($endpoint, $data) {
        return $this->request('POST', $endpoint, $data);
    }

    public function put($endpoint, $data) {
        return $this->request('PUT', $endpoint, $data);
    }

    public function delete($endpoint) {
        return $this->request('DELETE', $endpoint);
    }
}
?>
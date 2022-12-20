<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function index()
    {
        $data['cars'] = $this->db->get('cars')->result_array();
        $data['types'] = $this->db->get('types')->result_array();

        $this->load->view('home', $data);
    }
}

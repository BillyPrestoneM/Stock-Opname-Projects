<?php
class Home extends CI_Controller
{

    function index()
    {
        $data['user'] = $this->db->get_where('user', ['Email' => $this->session->userdata('Email')])->row_array();
        $this->load->view('templates/header');
        $this->load->view('home', $data);
        $this->load->view('templates/footer');
    }
}

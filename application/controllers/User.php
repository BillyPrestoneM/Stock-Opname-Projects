<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['Email' => $this->session->userdata('Email')])->row_array();
        $data['persons'] = $this->User_model->all_data()->result();
        $this->load->view('templates/header');
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

    public function profile()
    {
        $data['user'] = $this->db->get_where('user', ['Email' => $this->session->userdata('Email')])->row_array();
        $this->load->view('templates/header');
        $this->load->view('user/profile', $data);
        $this->load->view('templates/footer');
    }

    function edit()
    {
        $data['user'] = $this->db->get_where('user', ['Email' => $this->session->userdata('Email')])->row_array();
        $data['result1'] = $this->edit_person();
        $data['result2'] = $this->edit_user();
        if ($data != null) {
            $this->load->view('templates/header');
            $this->load->view('user/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $this->load->view('templates/header');
            $this->load->view('user/index', $data);
            $this->load->view('templates/footer');
        }
    }

    function edit_person()
    {
        $PersonKey = $this->uri->segment(3);
        $result = $this->User_model->get_person_key($PersonKey);
        if ($result->num_rows() > 0) {
            $i = $result->row_array();
            $data = array(
                'PersonKey' => $i['PersonKey'],
                'Nama' => $i['Nama'],
                'DateofBirth' => $i['DateofBirth'],
                'PlaceofBirth' => $i['PlaceofBirth'],
                'HomeAddress' => $i['HomeAddress'],
                'WorkAddress' => $i['WorkAddress']
            );
            return $data;
        }
    }

    function edit_user()
    {
        $Email = $this->uri->segment(3);
        $result = $this->User_model->get_email($Email);
        if ($result->num_rows() > 0) {
            $i = $result->row_array();
            $data = array(
                'PersonKey' => $i['PersonKey'],
                'Email' => $i['Email'],
                'Password' => $i['Password']
            );
            return $data;
        }
    }

    function update()
    {
        $PersonKey = $this->input->post('PersonKey');
        $Email = $this->input->post('Email');
        $Password = $this->input->post('Password');
        $Nama = $this->input->post('Nama');
        $DateofBirth = $this->input->post('DateofBirth');
        $PlaceofBirth = $this->input->post('PlaceofBirth');
        $HomeAddress = $this->input->post('HomeAddress');
        $WorkAddress = $this->input->post('WorkAddress');
        $this->User_model->update($PersonKey, $Email, $Password, $Nama, $DateofBirth, $PlaceofBirth, $HomeAddress, $WorkAddress);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Congratulation! Data has been edited
            </div>');
        redirect('user');
    }

    function get_delete()
    {
        $data['result1'] = $this->delete_person();
        $data['result2'] = $this->delete_user();
        if ($data != null) {
            $this->load->view('user/index', $data);
        }
    }

    function delete_person()
    {
        $PersonKey = $this->uri->segment(3);
        $result = $this->User_model->get_person_key($PersonKey);
        if ($result->num_rows() > 0) {
            $i = $result->row_array();
            $data = array(
                'PersonKey' => $i['PersonKey'],
                'Nama' => $i['Nama'],
                'DateofBirth' => $i['DateofBirth'],
                'PlaceofBirth' => $i['PlaceofBirth'],
                'HomeAddress' => $i['HomeAddress'],
                'WorkAddress' => $i['WorkAddress']
            );
            return $data;
        }
    }

    function delete_user()
    {
        $PersonKey = $this->uri->segment(3);
        $result = $this->User_model->get_email($PersonKey);
        if ($result->num_rows() > 0) {
            $i = $result->row_array();
            $data = array(
                'PersonKey' => $i['PersonKey'],
                'Email' => $i['Email'],
                'Password' => $i['Password']
            );
            return $data;
        }
    }

    function delete()
    {
        $PersonKey = $this->uri->segment(3);
        $this->User_model->delete($PersonKey);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Congratulation! Data deleted successfully
            </div>');
        redirect('user');
    }
}

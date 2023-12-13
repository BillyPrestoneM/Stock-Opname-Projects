<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->form_validation->set_rules('Email', 'email', 'trim|required|valid_email');
        $this->form_validation->set_rules('Password', 'password', 'trim|required');
        if ($this->form_validation->run() == false) {
            $this->load->view('auth/login');
        } else {
            // validasinya success
            $this->_login();
        }
    }

    private function _login()
    {
        $Email = $this->input->post('Email');
        $Password = $this->input->post('Password');
        $user = $this->db->get_where('user', ['Email' => $Email])->row_array();

        // jika usernya ada
        if ($user) {
            // cek password
            if ($user['Password'] == $Password) {
                // jika benar
                $data = [
                    'Email' => $user['Email'],
                    'Password' => $user['Password']
                ];
                $this->session->set_userdata($data);
                redirect('home');

                // jika salah
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Wrong password!
                </div>');
                redirect('auth');
            }

            // jika usernya tidak ada
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Email is not registered!
            </div>');
            redirect('auth');
        }
    }

    public function registration()
    {
        $this->form_validation->set_rules('PersonKey', 'personkey', 'required|trim|integer|is_unique[person.PersonKey]', [
            'integer' => 'Must be enter a number',
            'is_unique' => 'This key has already registered!'
        ]);
        $this->form_validation->set_rules('Nama', 'nama', 'required|trim');
        $this->form_validation->set_rules('DateofBirth', 'dateofbirth', 'required|trim');
        $this->form_validation->set_rules('PlaceofBirth', 'placeofbirth', 'required|trim');
        $this->form_validation->set_rules('HomeAddress', 'homeaddress', 'required|trim');
        $this->form_validation->set_rules('WorkAddress', 'workaddress', 'required|trim');
        $this->form_validation->set_rules('Email', 'email', 'required|trim|valid_email|is_unique[user.Email]', [
            'is_unique' => 'This email has already registered!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password dont match!',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        // jika pendaftarannya gagal
        if ($this->form_validation->run() == false) {
            $this->load->view('auth/registration');

            // jika pendaftarannya sukses
        } else {
            $data1 = [
                'Email' => htmlspecialchars($this->input->post('Email', true)),
                'PersonKey' => $this->input->post('PersonKey'),
                'Password' => $this->input->post('password1')
            ];
            $this->db->insert('user', $data1);
            $data2 = [
                'PersonKey' => $this->input->post('PersonKey'),
                'Nama' => $this->input->post('Nama'),
                'DateofBirth' => $this->input->post('DateofBirth'),
                'PlaceofBirth' => $this->input->post('PlaceofBirth'),
                'HomeAddress' => $this->input->post('HomeAddress'),
                'WorkAddress' => $this->input->post('WorkAddress')
            ];
            $this->db->insert('person', $data2);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Congratulation! your account has been created. Please Login
            </div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('Email');
        $this->session->unset_userdata('Password');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            You have been logged out!
            </div>');
        redirect('auth');
    }
}

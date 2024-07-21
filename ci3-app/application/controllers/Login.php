<?php

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Login';

        $this->form_validation->set_rules('email', 'email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('user/login');
            $this->load->view('templates/footer');
        } else {
            if ($this->User_model->login()) {
                $this->session->set_flashdata('login-success', 'Login success');
                redirect('home');
            } else {
                $this->session->set_flashdata('login-failed', 'Login failed');
                redirect('login');
            }
        }
    }
}

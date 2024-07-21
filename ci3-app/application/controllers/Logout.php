<?php

class Logout extends CI_Controller
{
    public function index()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('password');
        $this->session->set_flashdata('logout', 'Logout success');
        redirect('login');
    }
}

<?php

class User_model extends CI_Model
{
    public function register()
    {
        $data = [
            'email' => $this->input->post('email', true),
            'phone_number' => $this->input->post('phone_number', true),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'wallet' => 1000000 // default wallet
        ];

        $this->db->insert('users', $data);
    }

    public function login()
    {
        $email = $this->input->post('email', true);
        $password = $this->input->post('password');

        $user = $this->db->get_where('users', ['email' => $email])->row_array();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $data = [
                    'email' => $user['email'],
                    'password' => $user['password']
                ];

                $this->session->set_userdata($data);
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function getUserByEmail($email)
    {
        return $this->db->get_where('users', ['email' => $email])->row_array();
    }
}

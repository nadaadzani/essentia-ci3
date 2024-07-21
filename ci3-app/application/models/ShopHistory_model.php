<?php

class ShopHistory_model extends CI_Model
{
    public function __construct()
    {
        $this->load->model('User_model');
    }

    public function getShopHistory()
    {
        return $this->db->get('shop_history')->result_array();
    }

    public function checkout($data)
    {
        $current_balance = $this->User_model->getUserByEmail($this->session->userdata('email'))['wallet'];
        $total_price = 0;
        $item_names = [];

        foreach ($data as $item) {
            $total_price += $item['price'];
            $item_names[] = $item['name'];
        }

        if ($current_balance <= $total_price) {
            $this->session->set_flashdata('checkout-failed', 'Insufficient balance');
            redirect('home');
        }

        $result = [
            'receipt' => implode(', ', $item_names),
            'total_items' => count($data),
            'total_price' => $total_price
        ];

        $this->db->where('email', $this->User_model->getUserByEmail($this->session->userdata('email'))['email']);
        $this->db->set('wallet', $current_balance - $total_price);
        $this->db->update('users');

        $this->db->insert('shop_history', $result);
        $this->session->unset_userdata('cart');
    }
}

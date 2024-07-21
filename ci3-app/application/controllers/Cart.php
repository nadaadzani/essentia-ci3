<?php

class Cart extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Product_model');
        $this->load->model('ShopHistory_model');
    }

    public function index()
    {
        if (!$this->session->userdata('email')) {
            $this->session->set_flashdata('login-failed', 'Please login first');
            redirect('login');
        } else {
            $data['title'] = 'Cart';
            $data['items'] = $this->ShopHistory_model->getShopHistory();

            $this->load->view('templates/header', $data);
            $this->load->view('cart/index', $data);
            $this->load->view('templates/footer');
        }
    }

    public function add_cart($slug)
    {
        $product = $this->Product_model->getProductBySlug($slug);

        // Check if the product exists
        if ($product) {
            // Initialize the cart session variable if it doesn't exist
            if (!$this->session->has_userdata('cart')) {
                $this->session->set_userdata('cart', array());
            }

            // Add the product to the cart
            $cart = $this->session->userdata('cart');
            $cart[$product['id']] = $product;
            $this->session->set_userdata('cart', $cart);

            // Redirect
            $this->session->set_flashdata('add-cart-success', 'Product has been added to cart');
            redirect('home');
        } else {
            echo 'Product not found';
        }
    }

    public function checkout()
    {
        $cart = $this->session->userdata('cart');

        $this->ShopHistory_model->checkout($cart);
        $this->session->set_flashdata('checkout-success', 'Checkout successful, your wallet balance is now ' . $this->User_model->getUserByEmail($this->session->userdata('email'))['wallet']);
        redirect('cart');
    }

    public function reset()
    {
        $this->session->unset_userdata('cart');
        redirect('home');
    }
}

<?php

class Products extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Product_model');
        $this->load->library('form_validation');
    }

    public function add()
    {
        $data['title'] = 'Add Product';

        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('image', 'image', 'required');
        $this->form_validation->set_rules('price', 'price', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('products/add');
            $this->load->view('templates/footer');
        } else {
            $this->Product_model->addProduct();
            $this->session->set_flashdata('add-product-success', 'New product has been added');
            redirect('home');
        }
    }

    public function edit($slug)
    {
        $data['title'] = 'Edit Product';
        $data['product'] = $this->Product_model->getProductBySlug($slug);

        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('image', 'image', 'required');
        $this->form_validation->set_rules('price', 'price', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('products/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Product_model->editProduct();
            $this->session->set_flashdata('edit-product-success', 'Product has been edited');
            redirect('home');
        }
    }

    public function delete($slug)
    {
        $this->Product_model->deleteProduct($slug);
        $this->session->set_flashdata('delete-product-success', 'Product has been deleted');
        redirect('home');
    }
}

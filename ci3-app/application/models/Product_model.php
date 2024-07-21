<?php
class Product_model extends CI_Model
{
    public function getAllProduct()
    {
        return $this->db->get('products')->result_array();
    }

    public function getProductBySlug($slug)
    {
        return $this->db->get_where('products', ['slug' => $slug])->row_array();
    }

    public function addProduct()
    {
        $data = [
            'name' => $this->input->post('name', true),
            'slug' => url_title($this->input->post('name', true), '-', true),
            'image' => $this->input->post('image', true),
            'price' => $this->input->post('price', true)
        ];

        $this->db->insert('products', $data);
    }

    public function editProduct()
    {
        $data = [
            'name' => $this->input->post('name', true),
            'slug' => url_title($this->input->post('name', true), '-', true),
            'image' => $this->input->post('image', true),
            'price' => $this->input->post('price', true)
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('products', $data);
    }

    public function deleteProduct($slug)
    {
        $this->db->where('slug', $slug);
        $this->db->delete('products');
    }
}

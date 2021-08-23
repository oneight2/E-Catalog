<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AddProduct extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->library('form_validation');
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('AddProduct_model');
        $this->session->unset_userdata('message');
    }

    public function index()
    {
        $data = array(
            'title' => "Admin",
            'category' => $this->AddProduct_model->category_list(),
            'featured' => $this->AddProduct_model->featured_list()
        );

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('addProduct', $data);
    }

    function save()
    {
        // $data = $this->departemen_model->save_product();
        // echo json_encode($data);
        var_dump($_FILES);
        die();
    }

    function update()
    {
        $data = $this->departemen_model->update_product();
        echo json_encode($data);
    }

    function delete()
    {
        $data = $this->Carousel_model->delete_product();
        echo json_encode($data);
    }
}

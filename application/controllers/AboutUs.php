<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AboutUs extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->library('form_validation');
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('About_model');
    }
    public function index()
    {
        $data = array(
            'title' => "Admin"
        );

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('aboutUs', $data);
    }

    function product_data()
    {
        $data = $this->About_model->product_list();
        echo json_encode($data);
    }


    function update()
    {
        $data = $this->About_model->update_product();
        echo json_encode($data);
    }
}

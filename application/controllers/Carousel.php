<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Carousel extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->library('form_validation');
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('Carousel_model');
        $this->session->unset_userdata('message');
    }
    public function index()
    {
        $data = array(
            'title' => "Admin"
        );

        if (!$_FILES) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('carousel', $data);
        } else {
            $carousel = $_FILES['carousel'];


            if ($carousel = '') {
            } else {
                $config['upload_path'] = './assets/carousel';
                $config['allowed_types'] = 'jpg|png';
                $new_name = date('d-m-y') . '_' . $_FILES['carousel']['name'];
                $config['file_name'] = $new_name;
                $config['encrypt_name'] = TRUE;
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('carousel')) {
                    $carousel = $this->upload->data('file_name');
                } else {
                    echo $this->upload->display_errors();
                }

                $carousels = $carousel;
                $this->db->set('image', $carousels);
                $this->db->insert('carousel');

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Upload Berhasil!</div>');
                redirect('carousel');
            }
        }
    }

    function product_data()
    {
        $data = $this->Carousel_model->product_list();
        echo json_encode($data);
    }

    function save()
    {
        $data = $this->departemen_model->save_product();
        echo json_encode($data);
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

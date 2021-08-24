<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Products extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->library('form_validation');
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('Products_model', 'products');
        $this->load->model('Products_model');
        $this->session->unset_userdata('message');
    }

    public function index()
    {
        $data = array(
            'title' => "Admin",
            'products' => $this->products->product_list()
        );


        // $data['products'] = 
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('products', $data);
    }
    public function addProduct()
    {
        $data = array(
            'title' => "Admin",
            'category' => $this->Products_model->category_list(),
            'featured' => $this->Products_model->featured_list()
        );

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('addProduct', $data);
    }

    function save()
    {


        $data = [];
        $count = count($_FILES['files']['name']);

        for ($i = 0; $i < $count; $i++) {

            if (!empty($_FILES['files']['name'][$i])) {
                $_FILES['file']['name'] = $_FILES['files']['name'][$i];
                $_FILES['file']['type'] = $_FILES['files']['type'][$i];
                $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
                $_FILES['file']['error'] = $_FILES['files']['error'][$i];
                $_FILES['file']['size'] = $_FILES['files']['size'][$i];

                $config['upload_path'] = './assets/product';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['max_size'] = '5000';
                $config['file_name'] = $_FILES['files']['name'][$i];
                $config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('file')) {
                    $uploadData = $this->upload->data();
                    $filename = $uploadData['file_name'];
                    $data['totalFiles'][] = $filename;
                }
            }



            $id_photo = time();
            $image = $filename;
            // Image TBL
            $this->db->set('id_photo', $id_photo);
            $this->db->set('photo', $image);
            $this->db->insert('photo_products');
        }

        $product = array(
            'name_product'     => $this->input->post('name_product'),
            'description'     => $this->input->post('description'),
            'price'    => $this->input->post('price'),
            'weight'    => $this->input->post('weight'),
            'stock'    => $this->input->post('stock'),
            'id_category'    => $this->input->post('id_category'),
            'id_featured'    => $this->input->post('id_featured'),
            'status'    => $this->input->post('status'),
            'id_photos' => $id_photo
        );
        // Product TBL
        $this->db->insert('products', $product);

        // $this->load->view('imageUploadForm', $data); 
        redirect('Products');
    }


    function update($id)
    {
        $data = array(
            'title' => "Admin",
            'category' => $this->Products_model->category_list(),
            'featured' => $this->Products_model->featured_list(),
            'product' => $this->Products_model->product_data($id),
        );


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('updateProduct', $data);
    }

    function delete()
    {
        $data = $this->Products_model->delete_product();
        echo json_encode($data);
    }
}

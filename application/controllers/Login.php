<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->session->userdata('admin')) {
            redirect('user');
        }
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->session->set_userdata('admin');

            $data['title'] = 'Login Page';
            $this->load->view('templates/header', $data);
            $this->load->view('login');
            $this->load->view('templates/footer');
        } else {
            // validasinya success
            $this->_login();
        }
    }


    private function _login()
    {
        // $email = $this->input->post('email');
        $password = $this->input->post('password');

        // $user = $this->db->get_where('user', ['email' => $email])->row_array();
        if($password == 'multimedia123'){
            $data = [
                'admin' => 'admin'
            ];
            $this->session->set_userdata($data);
            redirect('admin');
        }else{
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password!</div>');
            redirect('login');
        }
        
    }


    public function logout()
    {
        $this->session->unset_userdata('admin');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logged out!</div>');
        redirect('login');
    }


    public function blocked()
    {
        $this->load->view('auth/blocked');
    }

}

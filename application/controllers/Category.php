<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->library('form_validation');
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('Category_model');
	}
	public function index()
	{
		$data = array(
			'title' => "Admin"
		);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('category', $data);
	}

	function product_data()
	{
		$data = $this->Category_model->product_list();
		echo json_encode($data);
	}

	function save()
	{
		$name_category = $this->input->post('nama');
		$icon = $_FILES['icon'];


		$config['upload_path'] = './assets/category';
		$config['allowed_types'] = 'jpg|png';
		$new_name = date('d-m-y') . '_' . $_FILES['icon']['name'];
		$config['file_name'] = $new_name;
		$config['encrypt_name'] = TRUE;
		$this->load->library('upload', $config);
		if ($this->upload->do_upload('icon')) {
			$icon = $this->upload->data('file_name');
		} else {
			echo $this->upload->display_errors();
		}
		$this->db->set('name_category', $name_category);
		$this->db->set('icon', $icon);
		$this->db->insert('category');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Upload Berhasil!</div>');
		redirect('category');
	}

	function update()
	{
		// $data = $this->Category_model->update_product();
		// echo json_encode($data);

		$id_category = $this->input->post('id_category');
		$name_category = $this->input->post('nama_edit');
		$icon = $_FILES['icon_category'];


		if (file_exists($_FILES['icon_category']['tmp_name'])) {
			$config['upload_path'] = './assets/category';
			$config['allowed_types'] = 'jpg|png';
			$new_name = date('d-m-y') . '_' . $_FILES['icon_category']['name'];
			$config['file_name'] = $new_name;
			$config['encrypt_name'] = TRUE;
			$this->load->library('upload', $config);
			if ($this->upload->do_upload('icon_category')) {
				$icon = $this->upload->data('file_name');
			} else {
				echo $this->upload->display_errors();
			}
			$this->db->set('name_category', $name_category);
			$this->db->set('icon', $icon);
			$this->db->where('id_category', $id_category);
			$this->db->update('category');
		}

		$this->db->set('name_category', $name_category);
		$this->db->where('id_category', $id_category);
		$this->db->update('category');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Update Berhasil!</div>');
		redirect('category');
	}

	function delete()
	{
		$data = $this->Category_model->delete_product();
		echo json_encode($data);
	}
}

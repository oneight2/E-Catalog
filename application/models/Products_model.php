<?php
class Products_model extends CI_Model
{

    function product_list()
    {
        $query = "SELECT * FROM `products` JOIN `category` ON `products`.`id_category` = `category`.`id_category` ORDER BY `id` DESC ";
        return $this->db->query($query)->result_array();
    }
    function category_list()
    {
        $query = "SELECT * FROM `category` ";
        return $this->db->query($query)->result_array();
    }
    function featured_list()
    {
        $query = "SELECT * FROM `featured_products` ";
        return $this->db->query($query)->result_array();
    }
    function product_data($id)
    {
        $query = "SELECT * FROM `products` WHERE `id` = $id ";
        return $this->db->query($query)->result_array();
    }
    function image_data($id_photo)
    {
        $query = "SELECT * FROM `photo_products` WHERE `id_photo` = $id_photo ";
        return $this->db->query($query)->result_array();
    }

    // function save_product(){
    // 	$data = array(
    // 			'nama_departemen' 	=> $this->input->post('nama_departemen'), 
    // 		);
    // 	$result=$this->db->insert('departemen',$data);
    // 	return $result;
    // }

    // function update_product(){
    // 	$id=$this->input->post('id_departemen');
    // 	$nama=$this->input->post('nama_departemen');

    // 	$this->db->set('nama_departemen', $nama);
    // 	$this->db->where('id_departemen', $id);
    // 	$result=$this->db->update('departemen');
    // 	return $result;
    // }

    function delete_product()
    {
        $id_product = $this->input->post('id_product');
        $id_photos = $this->input->post('id_photos');
        $query = "SELECT * FROM `photo_products` WHERE `id_photo` = $id_photos ";
        $hasil = $this->db->query($query)->result_array();
        foreach ($hasil as $row) :
            unlink('assets/product/' . $row['photo']);
        endforeach;

        $this->db->where('id', $id_product);
        $result = $this->db->delete('products');
        $this->db->where('id_photo', $id_photos);
        $result = $this->db->delete('photo_products');
        return $result;
    }
    function delete_images()
    {
        $id_photo = $this->input->post('id_photo');
        $photo = $this->input->post('photo');
        unlink('assets/product/' . $photo);
        $this->db->where('photo', $photo);
        $result = $this->db->delete('photo_products');
        return $result;
    }
}

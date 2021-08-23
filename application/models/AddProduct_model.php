<?php
class AddProduct_model extends CI_Model
{

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
}

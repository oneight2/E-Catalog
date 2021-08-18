<?php
class Reviews_model extends CI_Model
{

    function product_list()
    {
        $hasil = $this->db->get('reviews');
        return $hasil->result();
    }

    function save_product()
    {
        $data = array(
            'review'     => $this->input->post('review'),
            'name_customer'    => $this->input->post('name_customer'),
            'type_customer'    => $this->input->post('type_customer'),
        );
        $result = $this->db->insert('reviews', $data);
        return $result;
    }

    function update_product()
    {
        $id = $this->input->post('id_review');
        $review = $this->input->post('review');
        $name_customer = $this->input->post('name_customer');
        $type_customer = $this->input->post('type_customer');

        $this->db->set('review', $review);
        $this->db->set('name_customer', $name_customer);
        $this->db->set('type_customer', $type_customer);
        $this->db->where('id_review', $id);
        $result = $this->db->update('reviews');
        return $result;
    }

    function delete_product()
    {
        $id = $this->input->post('id_review');
        $this->db->where('id_review', $id);
        $result = $this->db->delete('reviews');
        return $result;
    }
}

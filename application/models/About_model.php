<?php
class About_model extends CI_Model
{

    function product_list()
    {
        $hasil = $this->db->get('about');
        return $hasil->result();
    }


    function update_product()
    {
        $about = $this->input->post('about');
        $instagram = $this->input->post('instagram');
        $shopee = $this->input->post('shopee');
        $siplah = $this->input->post('siplah');
        $whatsapp = $this->input->post('whatsapp');

        $this->db->set('description', $about);
        $this->db->set('instagram', $instagram);
        $this->db->set('shopee', $shopee);
        $this->db->set('siplah', $siplah);
        $this->db->set('whatsapp', $whatsapp);
        // $this->db->where('id_category', $id);
        $result = $this->db->update('about');
        return $result;
    }
}

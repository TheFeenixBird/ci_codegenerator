<?php

class InputManager extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('form_validation', 'session'));
        $this->load->helper(array('form', 'url'));
    }

    public function insert_file($title, $file)
    {
        $data = array(
            'title' => $title,
            'file_name' => $file,
            'date_upload' => date('Y-m-d H:i:s')
        );
        $query = $this->db->insert('xmlfiles', $data);
        return $query;
    }

    public function get_last_xml_file()
    {
        $this->db->select('file_name');
        $this->db->from('xmlfiles');
        $this->db->order_by('id', 'DESC');
        $this->db->limit('1');
        $result =  $this->db->get();
        return $result->result();
    }
}

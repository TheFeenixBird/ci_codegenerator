<?php

class Auth_Model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function verify_user($username, $password)
    {
        if (password_verify($password, $this->get_password($username))) {
            return true;
        } else {
            return false;
        }
    }

    public function get_password($username)
    {

        $this->db->where('username', $username);
        $result = $this->db->get('user');
        if ($result->num_rows() == 1) {
            return $result->row(0)->password;
        }

    }

    public function get_user($id)
    {

        $this->db->from('user');
        $this->db->where('id', $id);
        return $this->db->get()->row();

    }

    public function get_user_id($username)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('username', $username);
        return $this->db->get()->row('id');
    }
}

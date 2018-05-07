<?php
/**
 * Created by PhpStorm.
 * User: Workspace
 * Date: 02/05/2018
 * Time: 09:42
 */

class Admin_model extends CI_Model
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

}

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
        $this->load->database();
    }

    public function login_database()
    {
        $username = $_POST['username'];
        $password = sha1($_POST['password']);

        $this->db->select('*');
        $this->db->from('user');
        $this->db->where(array('username' => $username, 'password' => $password));
        $request = $this->db->get();

        if ($request->num_rows() === 1) {
            return true;
        } else {
            return false;
        }
    }


}
<?php
/**
 * Created by PhpStorm.
 * User: Workspace
 * Date: 02/05/2018
 * Time: 09:36
 */

class Admin extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model');
        $this->load->helper('url_helper');

    }

    public function register()
    {

        $title['title'] = 'Register';

        // LOAD form_validation LIBRARY
        $this->load->library('form_validation');
        $this->load->library('session');


        if (isset($_POST['register'])) {


            // SET_RULES
            $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|is_unique[user.username]');
            $this->form_validation->set_rules('email', 'Email', 'required|is_unique[user.email]');
            $this->form_validation->set_rules('password', 'Password',
                'required|min_length[8]');

            // IF form_validaton SUCCESS
            if ($this->form_validation->run() == TRUE) {
                $this->load->view('templates/header');
                $this->load->view('admin/success');

                // ADDS USER IN DATABASE
                $data = array(
                    'username' => $_POST['username'],
                    'email' => $_POST['email'],
                    'password' => sha1($_POST['password']),
                );

                $this->db->insert('user', $data);

                $this->session->set_flashdata('message', 'Registered !');
            }

        }
        /*
        if ($this->form_validation->run() ==true){
            die('Something wrong there. Try again please');
        }
        */

        // lOAD VIEWS
        $this->load->view('templates/header', $title);
        $this->load->view('admin/register', $title);
        $this->load->view('templates/footer', $title);

    }

    public function login()
    {
        // LOAD session | form_validation library
        $this->load->library('session');
        $this->load->library('form_validation');

        //SET_RULES
        $this->form_validation->set_rules('username', 'Username',
            'required|min_length[5]');
        $this->form_validation->set_rules('password', 'Password',
            'required|min_length[8]');

        // $_POST


        if ($this->form_validation->run() == TRUE) {

            $username = $_POST['username'];
            $password = sha1($_POST['password']);

            // Select USER in db
            $this->db->select('*');
            $this->db->from('user');
            $this->db->where(array('username' => $username, 'password' => $password));
            $request = $this->db->get();


            $user = $request->row();

            // Check if user exists
            if ($user->email) {
                $this->session->set_flashdata('success', 'You are now logged in');

                $_SESSION['logged'] = TRUE;
                $_SESSION['username'] = $user->username;

            } else {
                $this->set_flashdata('error', 'You are not registered');

            }


        }

        $data['title'] = 'Login';
        $this->load->view('templates/header', $data);
        $this->load->view('admin/login', $data);
        $this->load->view('templates/footer', $data);

    }


}

<?php
/**
 * Created by PhpStorm.
 * User: Workspace
 * Date: 02/05/2018
 * Time: 09:36
 */

class Admin extends CI_Controller
{

    /*
     *
     * CONSTRUCT
     *
     */

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model');
        $this->load->helper('url_helper');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');

    }

    /*
    *
    * USER REGISTER
    *
    */

    public function register()
    {

        $title['title'] = "Register";

        if (isset($_POST['register'])) {

            //  VERIFICATIONS
            $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|is_unique[user.username]');
            $this->form_validation->set_rules('email', 'Email', 'required|is_unique[user.email]');
            $this->form_validation->set_rules('password', 'Password',
                'required|min_length[5]');

            //  IF form_validaton SUCCESS
            if ($this->form_validation->run() == TRUE) {

                //  ADDS USER IN DATABASE
                $data = array(
                    'username' => $_POST['username'],
                    'email' => $_POST['email'],
                    'password' => password_hash($_POST['password'], PASSWORD_BCRYPT)
                );

                $this->db->insert('user', $data);
                $this->session->set_flashdata('success', "<div class='container'><div class='alert alert-success'><p>You successfully registered ! You can now login</p></div></div>");

            }

        }

        //  lOAD VIEWS
        $this->load->view('templates/header', $title);
        $this->load->view('admin/register', $title);
        $this->load->view('templates/footer', $title);

    }

    /*
    *
    * USER LOGIN
    *
    */

    public function login()
    {
        $title['title'] = "Login";
        $this->load->view('templates/header', $title);
        $this->load->view('admin/login', $title);
        $this->load->view('templates/footer', $title);


        //  verify
        $this->form_validation->set_rules('username', 'Username',
            'required');
        $this->form_validation->set_rules('password', 'Password',
            'required');

        if ($this->form_validation->run()) {

            $username = $_POST['username'];
            $password = $_POST['password'];

            $this->load->model('admin_model');


            if ($username && $this->admin_model->verify_user($username, $password)) {
                

                $this->session->set_flashdata('success', "<div class='container'><div class='alert alert-success'><p>You are now logged in</p></div></div>");

            } else {

                $this->session->set_flashdata('error', "<div class='container'><div class='alert alert-danger'><p> $username, $password Wrong username and/or password </p></div></div>" . $_POST['password']);
                redirect('admin/login');

            }
        }
    }

    public function enter()
    {
        if ($this->session->userdata('username') != '') {

            $this->load->view('admin/success2');
        } else {

            redirect(base_url() . 'admin/login');
        }
    }
}
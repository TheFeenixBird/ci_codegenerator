<?php
/**
 * Created by PhpStorm.
 * User: Workspace
 * Date: 02/05/2018
 * Time: 09:36
 */

class Admin extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model');
        $this->load->helper('url_helper');
    }

    public function register(){

        $data['title'] = 'Register';

        // LOAD form_validation LIBRARY
        $this->load->library('form_validation');

        // SET_RULES
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        // FUNCTION form_validation
        if ($this->form_validation->run() ==true){
            die('Something wrong there. Try again please');
        }


        // lOAD VIEWS
        $this->load->view('templates/header', $data);
        $this->load->view('admin/register', $data);
        $this->load->view('templates/footer', $data);

    }

    public function login(){

        $data['title'] = 'Login';
        $this->load->view('templates/header', $data);
        $this->load->view('admin/login', $data);
        $this->load->view('templates/footer', $data);

    }

    public function logout(){

    }


}

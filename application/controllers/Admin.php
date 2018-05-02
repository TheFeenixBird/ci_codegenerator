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

        $this->load->database();
        $title['title'] = 'Register';

        // LOAD form_validation LIBRARY
        $this->load->library('form_validation');



        if(isset($_POST['register'])){


            // SET_RULES
            $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]');
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');

            // IF form_validaton SUCCESS
            if($this->form_validation->run() == TRUE){
                $this->load->view('admin/success');

                // ADDS USER IN DATABASE
                $data = array(
                    'username' => $_POST['username'],
                    'email' => $_POST['email'],
                    'password' => $_POST['password']
                );
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

    public function login(){

        $data['title'] = 'Login';
        $this->load->view('templates/header', $data);
        $this->load->view('admin/login', $data);
        $this->load->view('templates/footer', $data);

    }

    public function logout(){

    }


}

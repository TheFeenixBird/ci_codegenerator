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
        // model
        $this->load->model('Auth_Model');

        //helper

        $this->load->helper('date');
        $this->load->helper('form');
        $this->load->helper('url_helper');

        //library
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
        $data['title'] = "Register";
        if (isset($_POST['register'])) {
            //  VERIFICATIONS
            $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|is_unique[user.username]');
            $this->form_validation->set_rules('email', 'Email', 'required|is_unique[user.email]');
            $this->form_validation->set_rules(
                'password',
                'Password',
                'required|min_length[5]'
            );
            //  IF form_validaton SUCCESS
            if ($this->form_validation->run() == true) {
                //  ADDS USER IN DATABASE
                $array = array(
                    'username' => $_POST['username'],
                    'email' => $_POST['email'],
                    'password' => password_hash($_POST['password'], PASSWORD_BCRYPT),
                );
                $this->db->insert('user', $array);
                $this->session->set_flashdata('success', "<div class='container'><div class='alert alert-success'><p>You successfully registered ! You can now login</p></div></div>");
            }
        }
        //  lOAD VIEWS
        $this->load->view('templates/header', $data);
        $this->load->view('admin/register', $data);
        $this->load->view('templates/footer', $data);
    }

    /*
     *
     * USER LOGIN
     *
     */

    public function login()
    {
        $data['title'] = "Login";
        //  Templates
        $this->load->view('templates/header', $data);
        $this->load->view('admin/login', $data);
        $this->load->view('templates/footer', $data);

        $this->load->model('Auth_Model');
        $this->load->library('session');

        //  Validation
        $this->form_validation->set_rules(
            'username',
            'Username',
            'required'
        );
        $this->form_validation->set_rules(
            'password',
            'Password',
            'required'
        );

        if ($this->form_validation->run()) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $this->load->model('Auth_Model');

            if ($username && $this->Auth_Model->verify_user($username, $password)) {

                //  Flashdata
                $this->session->set_flashdata('success', "<div class='container'><div class='alert alert-success'><p>You are now logged in</p></div></div>");

                $id = $this->Auth_Model->get_user_id($username);
                $user = $this->Auth_Model->get_user($id);

                $sessionArray = array(
                    'id' => $user->id,
                    'username' => $user->username,
                    'logged_in' => true,

                );
             $this->session->set_userdata($sessionArray);

                //var_dump($session);

                // If session is active

                if ($this->session->userdata('logged_in')) {
                    $this->session->set_flashdata('session_success', "<div class='container'><div class='alert alert-success'><p>Session established</p></div></div>");
                    $this->session->set_flashdata('logout_button', "<button type='submit' name='logout' class='btn btn-light btn-lg'>Logout</button>");
                    redirect('admin/dashboard');
                }
            } else {
                $this->session->set_flashdata('error', "<div class='container'><div class='alert alert-danger'><p>Wrong username and/or password </p></div></div>");
                redirect('admin/login');
            }
        }
    }

    /*
     *
     * USER LOGOUT
     *
     */

    public function logout()
    {
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
            $this->session->unset_userdata('id');
            $this->session->unset_userdata('username');
            $this->session->unset_userdata('logged_in');

            // user logout ok
            $data['title'] = 'You are now logged out';
            $this->load->view('templates/header');
            $this->load->view('admin/logout_success', $data);
            $this->load->view('templates/footer');
        } else {

            // there user was not logged in, we cannot logged him out,
            redirect('');
        }
    }

    /*
     *
     * USER DASHBOARD
     *
     */

    public function dashboard($generate = 'index')
    {
        $data['title'] = 'Generator';
        $data['userdata'] = $this->session->all_userdata();

        $this->load->view('generate/header', $data);
        $this->load->view('generate/' . $generate , $data);
        $this->load->view('generate/footer', $data);

        //var_dump($this->session->all_userdata());
    }
}

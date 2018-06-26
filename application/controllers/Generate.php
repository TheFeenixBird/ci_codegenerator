<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Generate extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->database();
        $this->load->helper(array('form', 'url_helper'));

        $this->load->library('form_validation');

        $this->load->model('InputManager');
        $this->load->model('OutputManager');
        $this->load->model('/input/FileXML');
        $this->load->model('/input/DBMySQL');
    }

    public function view($generate = 'index')
    {
        $data['title'] = ucfirst($generate);
        // Generate main page
        $this->load->view('generate/header.php', $data);
        $this->load->view('generate/' . $generate, $data);
        $this->load->view('generate/footer.php', $data);
    }

    /*
     *
     * INPUT
     *
     */
    public function manageInput()
    {
        // Needed for CORS
        //$this->load->view('generate/file-xml');
        //$input = $this->input->post('file-xml');

        // Switch for each input choice
        switch ($_POST['input']) {
            case 'file-xml':
                $this->load->view('generate/input/file-xml');
                $last_insert = $this->InputManager->get_last_xml_file();
                var_dump($last_insert);
                break;
            case 'db-mysql':
                $this->load->view('generate/input/db-mysql');
                break;
            case 'file-flex':
                echo 'Flex Data in the works';
                break;

        }
    }

    /*
     *
     * OUTPUT
     *
     */

    public function output()
    {
    }
}

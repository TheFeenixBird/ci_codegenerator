<?php

class Input extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->database();

        $this->load->helper(array('form', 'url_helper', 'file'));

        // Library from_validation
        $this->load->library('form_validation');

        // Models / Input option
        $this->load->model('/input/FileXML');
        $this->load->model('/input/DBMySQL');
    }


    // Function to upload XML file
    public function do_upload()
    {
        $this->form_validation->set_rules('title', 'Title', 'required|min_length[3]');

        if ($this->form_validation->run() == true) {
            // XML Config parameters
            $this->config = array(
                 'upload_path' => './assets/uploadXML/',
                 'allowed_types' => 'xml'
             );
            // Bind Config parameters to Upload Library
            $this->load->library('upload', $this->config);


            if (! $this->upload->do_upload()) {
                $error = array('error' => $this->upload->display_errors('<div class="alert alert-danger">', '</div>'));
                die;
            } else {
                $data = array('upload_data' => $this->upload->data());

                $title = $this->input->post('title');
                $file = $data['upload_data']['file_name'];

                $query = $this->InputManager->insert_file($title, $file);
                echo json_decode($query);
            }
        }
    }
}

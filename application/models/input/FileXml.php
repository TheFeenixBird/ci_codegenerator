<?php

// Interface Instance
get_instance()->load->iface('InputParser');

class FileXml extends CI_Model implements InputParser
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('InputManager');
    }
    public function getModel()
    {
        // TODO: Implement getModel() method
        $filename = $this->InputManager->get_last_xml_file();
    }
}

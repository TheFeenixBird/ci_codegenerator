<?php
/**
 * Created by PhpStorm.
 * User: Workspace
 * Date: 01/05/2018
 * Time: 20:10
 */

class Pages extends CI_Controller {

    public function view($page = 'home')
    {
        if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php')){
            // Erreur 404 if page doesn't exists
            show_404();
        }

        $data['title'] = ucfirst($page);

        $this->load->view('templates/header', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer', $data);
    }
}
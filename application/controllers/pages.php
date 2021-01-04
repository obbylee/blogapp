<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pages extends CI_Controller {

	public function view( $page = 'home'){

        if (!file_exists(APPPATH.'views/pages/'.$page.'.php')) { //folder name view 
            show_404();
        }
        $data['title'] = ucfirst($page);
        
        $this->load->view('templates/header');
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer');
	}
}

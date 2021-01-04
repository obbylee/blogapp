<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class category extends CI_Controller {

    public function __construct(){
         
        parent::__construct();
		$this->load->helper('url');
	 	$this->load->model('category_model');
	 	$this->load->model('post_model');
    }

    public function index(){

        $data = array(
            'title' => 'Category',
            'categories' => $this->category_model->get_categories()
        );
        $this->load->view('templates/header');
        $this->load->view('categories/index', $data);
        $this->load->view('templates/footer');
    }

    public function create(){
        //check login   
        if(!$this->session->userdata('logged_in')){
            redirect('users/login');
        }
        $data = array(
            'title' => 'Create Category'
        );

        $this->form_validation->set_rules('name','Name','required');

        if ($this->form_validation->run() === false) {
            $this->load->view('templates/header');
            $this->load->view('categories/create', $data);
            $this->load->view('templates/footer');
        } else {
            $this->category_model->create_category();

            //set messages
            $this->session->set_flashdata('category_created','Category Has Been Created');
            redirect('category/create');
        }
    }

    public function posts($id){
        $data = array(
            'title' => $this->category_model->get_category($id)->name,
            'post' => $this->post_model->get_post_by_category($id)
        );

            $this->load->view('templates/header');
            $this->load->view('post/index', $data);
            $this->load->view('templates/footer');
    }

    public function delete($id){
        if(!$this->session->userdata('logged_in')){
            redirect('users/login');
        }
        $this->category_model->delete_category($id);
        //set message
        $this->session->set_flashdata('category_deleted','Your Category has been deleted');
        redirect('category');
    }
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class post extends CI_Controller {

    public function __construct(){
         
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('pagination');
	 	$this->load->model('post_model');
	 	$this->load->model('comment_model','comment');
    }
    // Below is Part 1
	public function index($offset = 0){

        //pagination config
        $config['base_url'] = base_url().'post/index/';
        $config['total_rows'] = $this->db->count_all('post');
        $config['per_page'] = 3;
        $config['uri_segment'] = 3;
        $config['attributes'] = array('class' => 'pagination-link');
        //init pagination
        $this->pagination->initialize($config);

        $data = array(
               'title' => 'Latest Post',
             'post' => $this->post_model->get_posts(false,$config['per_page'],$offset)
        );
        //print_r($data['post']);
        $this->load->view('templates/header');
        $this->load->view('post/index', $data);
        $this->load->view('templates/footer');
    }
    
    public function view($slug = null){
        $data['post'] = $this->post_model->get_posts($slug);

        $post_id = $data['post']['id'];
        $data['comments'] = $this->comment->get_comments($post_id);

        if (empty($data['post'])) {
            show_404();
        }
        $data['title'] = $data['post']['id'];

        $this->load->view('templates/header');
        $this->load->view('post/view', $data);
        $this->load->view('templates/footer');
    }

    //Below is Part 2
    public function create(){

        //check login   
        if(!$this->session->userdata('logged_in')){
            redirect('users/login');
        }
        $data = array(
            'title' => 'Create Post',
            'categories' => $this->post_model->get_categories() //part 3
        );
        //validation form
        $this->form_validation->set_rules('title', 'Title', 'required');

        $this->form_validation->set_rules('body', 'Body', 'required');

        if ($this->form_validation->run() === false) {
            $this->load->view('templates/header');
            $this->load->view('post/create', $data);
            $this->load->view('templates/footer');
        } else {
            //upload image part 3
            $config['upload_path'] = './assets/images/posts';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = '2048';
            $config['max_width'] = '2000';
            $config['max_height'] = '2000';

            $this->load->library('upload',$config);
            
            if (!$this->upload->do_upload()) {
                $errors = array('error' => $this->upload->display_errors());
                $post_image = 'noimage.png'; 
            } else {
                $data = array('upload_data' => $this->upload->data());
                $post_image = $_FILES['userfile']['name'];
            }
    
            $this->post_model->create_post($post_image);
            //set messages
            $this->session->set_flashdata('post_created','Your Post Has Been Created');
            redirect('post');
        }
    }

    public function delete($id){

        //check login   
        if(!$this->session->userdata('logged_in')){
            redirect('users/login');
        }
        $this->post_model->delete_post($id);
        //set mesasges
        $this->session->set_flashdata('post_deleted','Your Post Has Been Deleted');
        redirect('post');
    }

    public function edit($slug){ //menampilkan menu edit
        //check login   
        if(!$this->session->userdata('logged_in')){
            redirect('users/login');
        }
        $data['post'] = $this->post_model->get_posts($slug);

        if ($this->session->userdata('user_id') != $this->post_model->get_posts($slug)['user_id']) {
            redirect('post');
        } // Cant Edit Other Post Than This ID
        
        if (empty($data['post'])) {
            show_404();
        }
        $data['title'] = 'Edit Post';
        $data['categories'] = $this->post_model->get_categories();

        $this->load->view('templates/header');
        $this->load->view('post/edit', $data);
        $this->load->view('templates/footer');
    }

    public function update(){
        //check login   
        if(!$this->session->userdata('logged_in')){
            redirect('users/login');
        }
        $this->post_model->update_post();

        //set messages
        $this->session->set_flashdata('post_updated','Your Post Has Been Updated');
        redirect('post');
    }
}

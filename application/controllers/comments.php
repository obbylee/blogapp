<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class comments extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('post_model','post');
        $this->load->model('comment_model','comment');
    }

    public function create($id){
        $slug = $this->input->post('slug');

        $data = array(
            'post' => $this->post->get_posts($slug),
            'comments' => $this->comment->get_comments($id)
        );

        $this->form_validation->set_rules('name','Name','required');
        $this->form_validation->set_rules('email','Email','required');
        $this->form_validation->set_rules('cmnt','Comment','required');

        if ($this->form_validation->run() === false) {
            # code...
            $this->load->view('templates/header');
            $this->load->view('post/view',$data);
            $this->load->view('templates/footer');
        } else {
            # code . . .
            $this->comment->create_comment($id);
            redirect('post/'.$slug);
        }
        
    }
}

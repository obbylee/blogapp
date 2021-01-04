<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class users extends CI_Controller {

    public function __construct(){
         
        parent::__construct();
		$this->load->helper('url');
	 	$this->load->model('user_model');
    }

    public function register(){

        $data = array(
            'title' => 'Sign Up'
        );

        $this->form_validation->set_rules('name','Name','required');
        $this->form_validation->set_rules('username','Username','required|callback_check_username_exists'); //call back + function name
        $this->form_validation->set_rules('email','Email pfft','required|callback_check_email_exists');
        $this->form_validation->set_rules('user_pass','Password','required');
        $this->form_validation->set_rules('user_pass2','Confirm Password','matches[user_pass]');
        $this->form_validation->set_rules('zipcode','Zipcode','required');
        
        if ($this->form_validation->run() === false) { //reload view if false
            $this->load->view('templates/header');
            $this->load->view('users/registers',$data);
            $this->load->view('templates/footer');
        } else { //if true continue
            //die('Continue');
            $md5 = md5($this->input->post('user_pass'));
            $this->user_model->register($md5);

            //set message
            $this->session->set_flashdata('user_registered','You Are Registered As"'.$this->input->post('username').'"');
            redirect('post');
        }  
    }

    //log in
    public function login(){

        $data = array(
            'title' => 'Sign In'
        );

        $this->form_validation->set_rules('username','Username','required'); //call back + function name
        $this->form_validation->set_rules('user_pass','Password','required');
        
        if ($this->form_validation->run() === false) { //reload view if false
            $this->load->view('templates/header');
            $this->load->view('users/login',$data);
            $this->load->view('templates/footer');
        } else { //if true continue
            //get username
            $user = $this->input->post('username');
            //get and encrypt
            $pass = md5($this->input->post('user_pass'));

            //Login User
            $user_id = $this->user_model->login($user,$pass);

            if ($user_id) { //if there is user id
                # Create  Session
                #die('success');
                $user_data = array(
                    'user_id' => $user_id,
                    'username' => $username,
                    'logged_in' => true
                );
                $this->session->set_userdata($user_data);

                $this->session->set_flashdata('user_loggedin','Login Attempt Successfuly');
                redirect('post');
            } else {
            //set message
                $this->session->set_flashdata('login_failed','Login Attempt Failed');
                redirect('users/login');
            } 
        }  
    }
    //log out
    public function logout(){
        //unset user data
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('logged_in');
        $this->session->set_flashdata('user_loggedout','Logged Out');
                redirect('users/login');
    }

    public function check_username_exists($username){
        $this->form_validation->set_message('check_username_exists','Username Taken');
        
        if ($this->user_model->check_username_exists($username)) {
            # code...
            return true;
        } else {
            # code...
            return false;
        }   
    }
    public  function check_email_exists($email){
        $this->form_validation->set_message('check_email_exists','Email Taken');
        
        if ($this->user_model->check_email_exists($email)) {
            # code...
            return true;
        } else {
            # code...
            return false;
        }   
    }
}

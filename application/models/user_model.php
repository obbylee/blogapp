<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class user_model extends CI_Model{

        public function __construct(){

            $this->load->database();
        }

        public function register($pass){
            //user data array
            $data = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'username' => $this->input->post('username'),
                'user_pass' => $pass,
                'zipcode' => $this->input->post('zipcode')
            );
            //do insert
            return $this->db->insert('users',$data); //need validation
        }

        public function login($user,$pass){
            $this->db->where('username',$user);
            $this->db->where('user_pass',$pass);

            $result = $this->db->get('users');

            if ($result->num_rows() == 1) { //true
                return $result->row(0)->id;
            } else { //false
                return false;
            }
            
        }

        //check username exists
        public function check_username_exists($username){
            $query = $this->db->get_where('users',array('username' => $username));

            if (empty($query->row_array())) {
                # code...
                return true;
            } else {
                # code...
                return false;
            }
        }
        //check email exists
        public function check_email_exists($email){
            $query = $this->db->get_where('users',array('email' => $email));

            if (empty($query->row_array())) {
                # code...
                return true;
            } else {
                # code...
                return false;
            }
        }
    }

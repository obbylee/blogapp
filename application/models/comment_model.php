<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class comment_model extends CI_Model{

        public function __construct(){

            $this->load->database();
        }

        public function create_comment($id){
            $data = array(
                'post_id' => $id,
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'body' => $this->input->post('cmnt')
            );
            return $this->db->insert('comments',$data);
        }

        public function get_comments($id){
            $query = $this->db->get_where('comments',array('post_id' => $id));
            return $query->result_array();
        }
    }

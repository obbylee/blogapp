<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class post_model extends CI_Model{

        public function __construct(){

            $this->load->database();
        }

        public function get_posts($slug  = false,$limit = false,$offset = false){
            if ($limit) { // pagination
                $this->db->limit($limit,$offset);
            }
            if ($slug === false) {
                $this->db->order_by('post.id','desc');
                $this->db->join('categories','categories.id = post.category_id');
                $query = $this->db->get('post');
                return $query->result_array();
            }
            $query = $this->db->get_where('post', array('slug' => $slug));
            return $query->row_array();
        }

        public function create_post($post_image){
            
            $slug = url_title($this->input->post('title'));

            $data = array(
                'title' => $this->input->post('title'),
                'slug' => $slug,
                'body' => $this->input->post('body'),
                'category_id' => $this->input->post('category_id'),
                'user_id' => $this->session->userdata('user_id'),
                'post_image' => $post_image
            );
            return $this->db->insert('post',$data);
        }

        public function delete_post($id){
            //delete image directory and file
            $image_file_name = $this->db->select('post_image')->get_where('post',array('id'=>$id))->row()->post_image;
            $cwd = getcwd(); //save the current working directory
            $image_file_path = $cwd."\\assets\\images\\posts";
            chdir($image_file_path);
            unlink($image_file_name);
            chdir($cwd); //restore previous working directory
            
            $this->db->where('id',$id);
            $this->db->delete('post');
            return true;
        }

        public function update_post(){
            //echo $this->input->post('id');die(); test variable
            $slug = url_title($this->input->post('title'));

            $data = array(
                'title' => $this->input->post('title'),
                'slug' => $slug,
                'body' => $this->input->post('body'),
                'category_id' => $this->input->post('category_id')
            );
            $this->db->where('id',$this->input->post('id'));
            return $this->db->update('post',$data);
        }
    
        public function get_categories(){
            $this->db->order_by('name');
            $query = $this->db->get('categories');
            return $query->result_array();
        }

        public function get_post_by_category($id){
            $this->db->order_by('post.id','desc');
            $this->db->join('categories','categories.id = post.category_id');
            $query = $this->db->get_where('post',array('category_id' => $id));
            return $query->result_array();
        }
    }

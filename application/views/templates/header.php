<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Hello World!</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="http://cdn.ckeditor.com/4.11.2/standard/ckeditor.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="<?php echo base_url();?>">MyBlog</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="<?php echo base_url();?>">Home</a></li>
      <li><a href="<?php echo base_url('about');?>">About</a></li>
      <li><a href="<?php echo base_url('post');?>">Blog</a></li>
      <li><a href="<?php echo base_url('category');?>">Category</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <?php if(!$this->session->userdata('logged_in')):?>
        <li class="active"><a href="<?php echo base_url();?>users/login">Login</a></li> 
        <li class="active"><a href="<?php echo base_url();?>users/register">Register</a></li> 
      <?php endif;?>
      <?php if($this->session->userdata('logged_in')):?>
        <li class="active"><a href="<?php echo base_url();?>post/create">Create Post</a></li> 
        <li class="active"><a href="<?php echo base_url();?>category/create">Create Category</a></li>  
        <li class="active"><a href="<?php echo base_url();?>users/logout">Log Out</a></li>  
      <?php endif;?>
    </ul>
  </div>
</nav>

    <div class="container">
    <!-- Flash Messages -->
    <?php if($this->session->flashdata('user_registered')):?>
      <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_registered').'</p>';?>
    <?php endif;?>
    <?php if($this->session->flashdata('post_created')):?>
      <?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_created').'</p>';?>
    <?php endif;?>
    <?php if($this->session->flashdata('post_updated')):?>
      <?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_updated').'</p>';?>
    <?php endif;?>
    <?php if($this->session->flashdata('post_deleted')):?>
      <?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_deleted').'</p>';?>
    <?php endif;?>
    <?php if($this->session->flashdata('category_created')):?>
      <?php echo '<p class="alert alert-success">'.$this->session->flashdata('category_created').'</p>';?>
    <?php endif;?>
    <?php if($this->session->flashdata('login_failed')):?>
      <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('login_failed').'</p>';?>
    <?php endif;?>
    <?php if($this->session->flashdata('user_loggedin')):?>
      <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_loggedin').'</p>';?>
    <?php endif;?>
    <?php if($this->session->flashdata('user_loggedout')):?>
      <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_loggedout').'</p>';?>
    <?php endif;?>
    <?php if($this->session->flashdata('category_deleted')):?>
      <?php echo '<p class="alert alert-success">'.$this->session->flashdata('category_deleted').'</p>';?>
    <?php endif;?>
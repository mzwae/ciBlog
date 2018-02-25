<html>
  <head>
    <title>ciBlog</title>
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/styles.css">
    <script src="http://cdn.ckeditor.com/4.8.0/standard/ckeditor.js"></script>
  </head>
  <body>

    <nav class="navbar navbar-inverse">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="container">
      <div class="navbar-header">
          <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?=base_url()?>">ciBlog</a>
      </div>
      <!-- Collection of nav links and other content for toggling -->
      <div id="navbarCollapse" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
              <li class="nav-item"><a href="<?=base_url()?>">Home</a></li>
              <li class="nav-item"><a href="<?=base_url()?>about">About</a></li>
              <li class="nav-item"><a href="<?=base_url()?>posts">Blog</a></li>
              <li class="nav-item"><a href="<?=base_url()?>categories">Categories</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <?php if (!$this->session->userdata('logged_in')) : ?>
              <li><a href="<?=base_url();?>/users/login">Login</a></li>
              <li><a href="<?=base_url();?>/users/register">Register</a></li>
            <?php endif; ?>
            <?php if ($this->session->userdata('logged_in')) : ?>
              <li><a href="<?=base_url();?>/posts/create">Creat Post</a></li>
              <li><a href="<?=base_url();?>/categories/create">Creat Category</a></li>
              <li><a href="<?=base_url();?>/users/logout">Logout</a></li>
            <?php endif; ?>
          </ul>
      </div>
    </div>
</nav>

<div class="container">
  <!-- Flash messages -->
  <?php

  if ($this->session->flashdata('user_registered')) {
      echo '<p class="alert alert-success">' . $this->session->flashdata('user_registered') . '</p>';
  }
  if ($this->session->flashdata('post_created')) {
      echo '<p class="alert alert-success">' . $this->session->flashdata('post_created') . '</p>';
  }
  if ($this->session->flashdata('post_updated')) {
      echo '<p class="alert alert-success">' . $this->session->flashdata('post_updated') . '</p>';
  }
  if ($this->session->flashdata('post_deleted')) {
      echo '<p class="alert alert-success">' . $this->session->flashdata('post_deleted') . '</p>';
  }
  if ($this->session->flashdata('category_created')) {
      echo '<p class="alert alert-success">' . $this->session->flashdata('category_created') . '</p>';
  }
  if ($this->session->flashdata('login_failed')) {
      echo '<p class="alert alert-danger">' . $this->session->flashdata('login_failed') . '</p>';
  }
  if ($this->session->flashdata('user_loggedin')) {
      echo '<p class="alert alert-success">' . $this->session->flashdata('user_loggedin') . '</p>';
  }
  if ($this->session->flashdata('user_loggedout')) {
      echo '<p class="alert alert-success">' . $this->session->flashdata('user_loggedout') . '</p>';
  }
  if ($this->session->flashdata('category_deleted')) {
      echo '<p class="alert alert-success">' . $this->session->flashdata('category_deleted') . '</p>';
  }

    ?>

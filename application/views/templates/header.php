<html>
  <head>
    <title>ciBlog</title>
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/styles.css">
  </head>
  <body>

    <nav class="navbar navbar-inverse">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
          <a class="navbar-brand" href="<?php echo base_url(); ?>">ciBlog</a>
    </div>
    <!-- Collection of nav links and other content for toggling -->
    <div id="navbarCollapse" class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
            <li class="nav-item"><a href="<?php echo base_url(); ?>">Home</a></li>
            <li class="nav-item"><a href="<?php echo base_url(); ?>about">About</a></li>
            <li class="nav-item"><a href="<?php echo base_url(); ?>posts">Blog</a></li>
        </ul>
        <!-- <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Login</a></li>
        </ul> -->
    </div>
</nav>

<div class="container">

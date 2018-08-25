<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Limatschool.com</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->

    <link href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
</head>



<body class="skin-blue layout-top-nav">
<div class="wrapper">

<header class="main-header">
    <nav class="navbar navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <a href="<?php echo base_url(); ?>" class="navbar-brand">Home</a>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                    <i class="fa fa-bars"></i>
                </button>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="<?php echo base_url(); ?>welcome/managestudents">Student</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>welcome/manageteachers">Teacher</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>welcome/managesubjects">Subject</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>site/mark.html">Marks</a>
                    </li>
					<li>
                        <a href="<?php echo base_url(); ?>site/settings.html">Settings</a>
                    </li>
                </ul>
                <form class="navbar-form navbar-left" role="search">
                    <div class="form-group">
                        <input type="text" class="form-control" id="navbar-search-input" placeholder="Search">
                    </div>
                </form>
            </div><!-- /.navbar-collapse -->
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- User Account Menu -->
                    <li class="dropdown user user-menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <!-- The user image in the navbar-->
                            <img src="<?php echo base_url(); ?>dist/img/user2-160x160.jpg" class="user-image" alt="User Image"/>
                            <!-- hidden-xs hides the username on small devices so only the image appears. -->
                            <span class="hidden-xs"><?php echo $this->session->userdata('username'); ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- The user image in the menu -->
                            <li class="user-header">
                                <img src="<?php echo base_url(); ?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
                                <p>
                                    <?php echo $this->session->userdata('username'); ?>
                                </p>
                            </li>
                            <!-- Menu Body -->
                            <li class="user-body">
                                <div class="col-xs-6 text-center">
                                    <a href="<?php echo base_url(); ?>site/settings.html">Settings</a>
                                </div>
                                <div class="col-xs-6 text-center">
                                    <a href="<?php echo base_url(); ?>">Grid</a>
                                </div>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="<?php echo base_url(); ?>site/profile.html" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <a href="<?php echo base_url(); ?>welcome/logout" class="btn btn-default btn-flat">Sign out</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-custom-menu -->
        </div><!-- /.container-fluid -->
    </nav>
</header>

<div class="content-wrapper">
    <div class="container">
        <section class="content-header">
            <h1>
                <?php echo $heading ;?>
            </h1>
        </section>


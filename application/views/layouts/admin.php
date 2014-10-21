<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Inovation Products | Admin Panel</title>

        <!-- Bootstrap Core CSS -->
        <link href="<?php echo base_url(); ?>assets/admin/css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="<?php echo base_url(); ?>assets/admin/css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="<?php echo base_url(); ?>assets/admin/css/sb-admin-2.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="<?php echo base_url(); ?>assets/admin/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <!-- jQuery Version 1.11.0 -->
        <script src="<?php echo base_url(); ?>assets/admin/js/jquery-1.11.0.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="<?php echo base_url(); ?>assets/admin/js/bootstrap.min.js"></script>

        <!-- Jquery Validate -->
        <script src="<?php echo base_url(); ?>assets/js/jquery.validate.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/additional-methods.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="<?php echo base_url(); ?>assets/admin/js/plugins/metisMenu/metisMenu.min.js"></script>
    </head>

    <body>

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index">Admin Panel v1.0</a>
                </div>
                <!-- /.navbar-header -->

                <ul class="nav navbar-top-links navbar-right">

                    <!-- /.dropdown -->
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">

                            <!-- <li class="divider"></li>-->
                            <li><a href="<?php echo base_url(); ?>admin/login/dologout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                    <!-- /.dropdown -->
                </ul>
                <!-- /.navbar-top-links -->

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <!--                            <li class="sidebar-search">
                                                            <div class="input-group custom-search-form">
                                                                <input type="text" class="form-control" placeholder="Search...">
                                                                <span class="input-group-btn">
                                                                    <button class="btn btn-default" type="button">
                                                                        <i class="fa fa-search"></i>
                                                                    </button>
                                                                </span>
                                                            </div>
                                                             /input-group 
                                                        </li>-->
                            <li>
                                <a class="active" href="<?php echo base_url()?>admin/index"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url()?>admin/products"><i class="fa fa-qrcode fa-fw"></i> Products</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url()?>admin/categories"><i class="fa fa-bars fa-fw"></i> Categories</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url()?>admin/subcategories"><i class="fa fa-bars fa-fw"></i> Sub Categories</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url()?>admin/enquiries"><i class="fa fa-edit fa-fw"></i> Enquiries</a>
                            </li>
                            <!-- <li>
                                     <a href="#"><i class="fa fa-files-o fa-fw"></i> Sample Pages<span class="fa arrow"></span></a>
                                     <ul class="nav nav-second-level">
                                         <li>
                                             <a href="blank">Blank Page</a>
                                         </li>
                                         <li>
                                             <a href="login">Login Page</a>
                                         </li>
                                     </ul>
                                      /.nav-second-level 
                                 </li>-->
                        </ul>
                    </div>
                    <!-- /.sidebar-collapse -->
                </div>
                <!-- /.navbar-static-side -->
            </nav>
            <div id="page-wrapper">
                {content}
            </div>
        </div>
        <!-- /#wrapper -->
        <!-- Morris Charts JavaScript -->
        <!-- <script src="<?php echo base_url(); ?>assets/admin/js/plugins/morris/raphael.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/js/plugins/morris/morris.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/js/plugins/morris/morris-data.js"></script>
-->
        <!-- Custom Theme JavaScript -->
        <script src="<?php echo base_url(); ?>assets/admin/js/sb-admin-2.js"></script>

    </body>
</html>

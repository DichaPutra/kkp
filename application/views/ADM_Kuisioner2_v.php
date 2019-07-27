<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
    <head>
        <meta charset="utf-8">
        <!--<meta http-equiv="X-UA-Compatible" content="IE=edge">-->
        <title>KKP</title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css">

        <!--Font Awesome--> 
        <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/fontawesome/css/font-awesome.min.css">
        <!--Ionicons--> 
        <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/ionicons/css/ionicons.min.css">

        <!-- DataTables -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/datatables/dataTables.bootstrap.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/skins/_all-skins.min.css">
    </head>

    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">

            <!-- Main Header -->
            <header class="main-header">

                <!-- Logo -->
                <a href="#" class="logo" style="background-color: #1A2226;">
                    <!--<img style="margin: 0 auto; height: 80%; margin-top: 2%" class="img-responsive" src="dist/img/pakerin.gif">-->

                    <!--mini logo for sidebar mini 50x50 pixels--> 
                    <span class="logo-mini"><b style="font-size: small; color: white;">I</b><b style="font-size: small; color: #3597E0;">Plan</b></span>
                    <!--logo for regular state and mobile devices--> 
                    <span class="logo-sm">
                        <b style="font-size: small; color: white;">SISTEM APLIKASI</b>
                        <b style="font-size: small; color: #3597E0;"> KKP</b> 
                    </span>
                </a>

                <!-- Header Navbar -->
                <nav class="navbar navbar-static-top" role="navigation">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>
                    <!-- Navbar Right Menu -->
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <li class="dropdown messages-menu">
                                <!-- Menu toggle button -->

                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
<!--                                    <i class="fa fa-envelope-o"></i>
                                    <span class="label label-success">4</span>-->
                                    <?php
                                    echo date('l, d-m-Y');
                                    ;
                                    ?>
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">

                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">

                    <!-- Sidebar user panel (optional) -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="<?php echo base_url(); ?>dist/img/pakerin.gif" alt="User Image">
                        </div>
                        <div class="pull-left info">
                            <p><?php echo $namapic; ?></p>
                            <!-- Status -->
                            <a href="#"><?php echo $bagian; ?></a>
                        </div>
                    </div>

                    <?php include 'ADM_Sidebar.php'; ?>

                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Kuisioner
                        <small></small>
                    </h1>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <button type="button" class="btn btn-sm btn-primary pull-right" data-toggle="modal" data-target="#add">Tambah Kuisioner</button>
                                    <!--<h3 class="box-title">List Division</h3>-->
                                </div>
                                <!-- /.box-header -->


                                <div class="box-body">
                                    <?php echo $pesan; ?>
                                    <h2 class="text-center"><?php echo "$bagianrelasi"; ?></h2><br>
                                    <table id="example" class="table table-striped table-bordered nowrap" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th class="text-center">No</th>
                                                <th class="text-center">Quisioner</th>
                                                <th class="text-center">Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 0;
                                            foreach ($relasi as $key) {
                                                $no++;
                                                ?>
                                                <tr>
                                                    <td class="text-center"><?php echo $no; ?></td>
                                                    <td class="text-center"><?php echo $key->pertanyaan; ?></td>
                                                    <td class="text-center">
                                                        <!--<a href="<?php // echo base_url();          ?>index.php/ADM_Account_c/deleteAccount/<?php // echo $key->bagian;          ?>"><button type="button" class="btn btn-sm btn-danger" onclick="return confirm('Seuruh data kkp dan nilai akan terhapus semua, apakah anda yakin menghapus akun tersebut ?');">&#x274c</button></a>-->
                                                        <a href="<?php echo base_url(); ?>index.php/ADM_Kuisioner_c/deleteKuisioner/<?php echo $key->idkuisioner; ?>/<?php echo $key->bagian; ?>"><button type="button" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus Kuisioner tersebut ?');">&#x274c</button></a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                    <!-- Modal ADD -->
                                    <div id="add" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <form method="POST" action="<?php echo base_url(); ?>index.php/ADM_Kuisioner_c/addKuisioner"> 
                                                    <input name="departemen" type="hidden" value="<?php echo "$bagianrelasi"; ?>">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title">Tambah Kuisioner</h4>
                                                    </div>
                                                    <div class="modal-body">

                                                        <div class="form-group">
                                                            <label for="exampleFormControlSelect1">Isi Kuisioner</label>
                                                            <input class="form-control" type="text" name="kuisioner">
                                                            <!--<select name="bagiandinilai" class="form-control" id="exampleFormControlSelect1"></select>-->
                                                        </div>
                                                        <!--
                                                                                                                <label>Nama Bagian :</label>
                                                                                                                <input name="bagian" type="text" maxlength="50" class="form-control" placeholder="Nama Departemen" value="">
                                                                                                                <label>Nama Kepala Departemen :</label>
                                                                                                                <input name="namapic" type="text" maxlength="50" class="form-control" placeholder="Nama Kepala Departemen" value=""><br><hr>
                                                                                                                <label>Username :</label>
                                                                                                                <input name="username" type="text" maxlength="50" class="form-control" placeholder="User ID" value="">
                                                                                                                <label>Password :</label>
                                                                                                                <input name="pass" type="text" maxlength="50" class="form-control" placeholder="Password" value="">
                                                        -->
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-sm btn-primary" data-toggle="modal">Submit</button>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- /.box-body -->
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </section>

                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->

            <!-- Main Footer -->
            <footer class="main-footer">
                <!-- To the right -->
                <div class="pull-right hidden-xs">

                </div>
                <!-- Default to the left -->
                <strong>Copyright &copy; 2017 TIM KPI <a href="http://pakerin.co.id">PT. PAKERIN</a>.</strong> All rights reserved.
            </footer>
        </div>
        <!-- ./wrapper -->

        <!-- REQUIRED JS SCRIPTS -->


        <!-- jQuery 2.2.3 -->
        <script src="<?php echo base_url(); ?>plugins/jQuery/jquery-2.2.3.min.js"></script>
        <!-- Bootstrap 3.3.6 -->
        <script src="<?php echo base_url(); ?>bootstrap/js/bootstrap.min.js"></script>
        <!-- DataTables -->
        <script src="<?php echo base_url(); ?>plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url(); ?>plugins/datatables/dataTables.bootstrap.min.js"></script>
        <!-- SlimScroll -->
        <script src="<?php echo base_url(); ?>plugins/slimScroll/jquery.slimscroll.min.js"></script>
        <!-- FastClick -->
        <script src="<?php echo base_url(); ?>plugins/fastclick/fastclick.js"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url(); ?>dist/js/app.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="<?php echo base_url(); ?>dist/js/demo.js"></script>


        <!-- page script -->
        <script>
            $(function () {
                $("#example").DataTable({
                    "pageLength": 100
                } );
            });
        </script>
        <script>
            function textCounter(field,field2,maxlimit)
            {
                var countfield = document.getElementById(field2);
                if ( field.value.length > maxlimit ) {
                    field.value = field.value.substring( 0, maxlimit );
                    return false;
                } else {
                    countfield.value = maxlimit - field.value.length;
                }
            }
        </script>

        <!-- Optionally, you can add Slimscroll and FastClick plugins.
             Both of these plugins are recommended to enhance the
             user experience. Slimscroll is required when using the
             fixed layout. -->
    </body>
</html>


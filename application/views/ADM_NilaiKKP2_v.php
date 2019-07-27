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
                        Detil Penilaian 
                        <small></small>
                    </h1>

                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/ADM_NilaiKKP_c">Nilai KKP</a></li>
                        <li class="breadcrumb-item"><a href="#">Detil Penilaian</a></li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <!--<h3 class="box-title">Detil Penilai</h3>--> 
                                                                    <!--<button class="btn btn-default pull-right"> <i class="fa fa-print" aria-hidden="true"></i>  PDF</button>-->
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">



                                    <?php echo $pesan; ?>
                                    <?php // var_dump($improvement);   ?>
                                    <h2 class="text-center">Detil Penilaian <?php echo "$bagiandinilai"; ?></h2>
                                    <h4 class="text-center">Periode <?php echo "$bulan $tahun"; ?></h4>

                                    <h2 class="text-center"> </h2><br>
                                    <table id="example" class="table table-striped table-bordered nowrap" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th class="text-center">Bagian Penilai</th>
                                                <th class="text-center">AVG Nilai</th>
                                                <th class="text-center">Detil Nilai</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
//                                            var_dump($detilnilai);

                                            $no = 0;
                                            foreach ($detilpenilai as $key) {
                                                $no++;
                                                ?>
                                                <tr>
                                                    <td class="text-center"><?php echo $no; ?></td>
                                                    <td><?php echo $key->bagianpenilai; ?></td>
                                                    <td class="text-center" style="color: blue;"><?php echo round($key->average, 2); ?><?php // echo $key->namapic;                                                    ?></td>
                                                    <td class="text-center">
                                                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#detilNilai<?php echo $no; ?>">Detil Nilai</button>
                                                    </td>
                                                </tr>
                                                <!-- Modal Detil -->
                                            <div id="detilNilai<?php echo $no; ?>" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h4 class="modal-title"><?php echo $key->bagianpenilai; ?></h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-5"><h4><b>Kuisioner</b></h4></div>
                                                                <div class="col-md-2"><h4><b>Nilai</b></h4></div>
                                                                <div class="col-md-5"><h4><b>Catatan</b></h4></div>
                                                            </div><hr>
                                                            <div class="row">
                                                                <?php
                                                                $nilaitotal = 0;
                                                                $counter = 0;
                                                                foreach ($detilnilai as $dn) {
                                                                    if ($dn->bagianpenilai == $key->bagianpenilai) {
                                                                        echo "<hr><div class=\"col-md-5\">$dn->pertanyaan</div>";
                                                                        echo "<div class=\"col-md-2\">$dn->nilai</div>";
                                                                        echo "<div class=\"col-md-5\">$dn->catatan</div>";
                                                                        echo '<hr><br>';
                                                                        $nilaitotal += $dn->nilai;
                                                                        $counter++;
                                                                    }
                                                                }
                                                                ?>
                                                            </div><hr>
                                                            <div class="row">
                                                                <div class="col-md-5"><b>Average</b></div>
                                                                <div class="col-md-2"><b><?php echo round($nilaitotal/$counter,2); ?></b></div>
                                                            </div><br>
                                                        </div>
                                                        <div class="modal-footer">
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        <?php } ?>
                                        </tbody>
                                    </table>



                                </div>
                                <!-- /.box-body -->
                            </div>
                            <!-- /.box -->
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
                $("#example").DataTable();
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


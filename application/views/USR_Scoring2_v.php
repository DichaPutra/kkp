<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function bulan($strm) {
    switch ($strm) {
        case 1 :
            return 'Januari';
            break;
        case 2 :
            return 'Februari';
            break;
        case 3 :
            return 'Maret';
            break;
        case 4 :
            return 'April';
            break;
        case 5 :
            return 'Mei';
            break;
        case 6 :
            return 'Juni';
            break;
        case 7 :
            return 'Juli';
            break;
        case 8 :
            return 'Agustus';
            break;
        case 9 :
            return 'September';
            break;
        case 10 :
            return 'Oktober';
            break;
        case 11 :
            return 'November';
            break;
        case 12 :
            return 'Desember';
            break;
    }
}
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

                    <?php include 'USR_Sidebar.php'; ?>

                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Scoring 
                        <small></small>
                    </h1>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title"></h3> 
                                                    <!--<button class="btn btn-default pull-right"> <i class="fa fa-print" aria-hidden="true"></i>  PDF</button>-->
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">

                                    <?php echo $pesan; ?>
                                    <h2 class="text-center"><?php echo "KKP " . $bagiandinilai; ?></h2>
                                    <h4 class="text-center"><?php
                                    if (date('n') == 1) {
                                        $tahun = date('Y') - 1;
                                        echo bulan(12) . ", th." . $tahun;
                                    } else {
                                        echo bulan(date('n') - 1) . ", th." . date('Y');
                                    }
                                    ?></h4><br><br>
                                    <br><br>
                                    <div class="alert alert-info"> <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                                        <strong>Perhatian :</strong><br>
                                        - Masukkan nilai "n/a" apabila kuisioner tidak relefan dengan departemen anda<br>
                                        - Untuk nilai dibawah 60 wajib memberikan alasan.
                                    </div>

                                    <form method="post" action="<?php echo base_url(); ?>index.php/USR_Scoring_c/inputNilaiProses">
                                        <!-- POST bagian penilai dan dinilai --> 
                                        <input type="hidden" name="bagianDinilai" value="<?php echo "$bagiandinilai"; ?>">
                                        <input type="hidden" name="bagianPenilai" value="<?php echo "$bagian"; ?>">

                                        <table id="example" class="table table-striped table-bordered nowrap" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">No</th>
                                                    <th class="text-center">Kuisioner</th>
                                                    <th class="text-center">Nilai</th>
                                                    <th class="text-center">Alasan, Kritik & Saran</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 0;
                                                foreach ($kuisioner as $key) {
                                                    $no++;
                                                    ?>
                                                    <tr>
                                                        <td class="text-center"><?php echo $no; ?></td>
                                                        <td><?php echo $key->pertanyaan; ?></td>
                                                        <td class="text-center"> 
                                                            <div><input type="hidden" name="idKuisioner[]" value="<?php echo $key->idkuisioner; ?>"></div>
                                                            <div><input class="form-control" type="text" size="3" maxlength="3" name="nilai[]" required></div>

                                                        </td>
                                                        <td>
                                                            <div><textarea maxlength="500" style="width: 100%"class="form-control" rows="4" type="text" name="catatan[]"></textarea></div>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>

                                        <button type="submit" class="btn btn-sm btn-primary pull-right" style="margin-left: 10px;">Submit</button>
                                        <a href="<?php echo base_url(); ?>index.php/USR_Scoring_c">
                                            <button type="button" class="btn btn-sm btn-default pull-right">Cancel</button>
                                        </a>
                                    </form>
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
                $("#example").DataTable({
                    "paging": false,"searching": false
                }
            );
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


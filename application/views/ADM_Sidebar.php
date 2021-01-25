<!-- Sidebar Menu -->
<ul class="sidebar-menu">
    <li class="header">Admin KPI</li>
    <!-- Optionally, you can add icons to the links -->
    <li><a href="<?php echo base_url(); ?>index.php/ADM_Dashboard_c"><i class="fa fa-area-chart"></i> <span>Dashboard</span></a></li>
    <li><a href="<?php echo base_url(); ?>index.php/ADM_NilaiKKP_c"><i class="fa fa-tasks"></i> <span>Nilai KKP</span></a></li>
    <li><a href="<?php echo base_url(); ?>index.php/ADM_Pengumpulan_c"><i class="fa fa-tasks"></i> <span>Progress Pengumpulan</span></a></li>

    <li class="treeview">
        <a href="#"><i class="fa fa-area-chart"></i> <span>Catatan, Kritik & Saran</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="<?php echo base_url(); ?>index.php/ADM_Catatan_c">Catatan</a></li>
            <li><a href="<?php echo base_url(); ?>index.php/ADM_KritikSaran_c">Kritik & Saran</a></li>
        </ul>
    </li>
    <!--<li><a href="<?php echo base_url(); ?>index.php/ADM_Catatan_c"><i class="fa fa-tasks"></i> <span>Catatan</span></a></li>-->
    
    <li class="header">Settings</li>
    <li><a href="<?php echo base_url(); ?>index.php/ADM_Relasi_c"><i class="fa fa-sitemap"></i> <span>Relasi Penilaian</span></a></li>
    <li><a href="<?php echo base_url(); ?>index.php/ADM_Kuisioner_c"><i class="fa fa-check-circle"></i> <span>Kuisioner</span></a></li>
    <li><a href="<?php echo base_url(); ?>index.php/ADM_Account_c"><i class="fa fa-user"></i> <span>Account</span></a></li>

    <li class="header"></li>
    <li><a href="<?php echo base_url(); ?>index.php/logout"><i class="fa fa-sign-out"></i> <span>Signout</span></a></li>
</ul>

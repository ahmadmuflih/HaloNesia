<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>HaloNesia Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url()."assets" ?>/bootstrap/css/bootstrap.min.css">


  <!-- Dropzone js -->

  <link rel="stylesheet" href="<?php echo base_url()."assets" ?>/dist/css/dropzone.min.css">
  <link rel="stylesheet" href="<?php echo base_url()."assets" ?>/dist/css/basic.min.css">


  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url()."assets" ?>/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url()."assets" ?>/dist/css/skins/_all-skins.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url()."assets" ?>/plugins/datatables/dataTables.bootstrap.css">
  <!-- Bootstrap time Picker -->
   <link rel="stylesheet" href="<?php echo base_url()."assets" ?>/plugins/timepicker/bootstrap-timepicker.min.css">
   <!-- Select2 -->
   <link rel="stylesheet" href="<?php echo base_url()."assets" ?>/plugins/select2/select2.min.css">
   <!-- daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url()."assets" ?>/plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?php echo base_url()."assets" ?>/plugins/datepicker/datepicker3.css">














    <!-- Fine Uploader New/Modern CSS file
    ====================================================================== -->

      <link rel="stylesheet" href="<?php echo base_url()."assets" ?>/dist/css/fine-uploader-new.css">

    <!-- Fine Uploader JS file
    ====================================================================== -->
    <script src="<?php echo base_url()."assets" ?>/dist/js/fine-uploader.js"></script>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- footer script -->
  <!-- jQuery 2.2.3 -->
  <script src="<?php echo base_url()."assets" ?>/plugins/jQuery/jquery-2.2.3.min.js"></script>
  <!-- Bootstrap 3.3.6 -->
  <script src="<?php echo base_url()."assets" ?>/bootstrap/js/bootstrap.min.js"></script>
  <!-- SlimScroll -->
  <script src="<?php echo base_url()."assets" ?>/plugins/slimScroll/jquery.slimscroll.min.js"></script>
  <!-- FastClick -->
  <script src="<?php echo base_url()."assets" ?>/plugins/fastclick/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo base_url()."assets" ?>/dist/js/app.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?php echo base_url()."assets" ?>/dist/js/demo.js"></script>
  <!-- Sparkline -->
  <script src="<?php echo base_url()."assets" ?>/plugins/sparkline/jquery.sparkline.min.js"></script>
  <!-- DataTables -->
  <script src="<?php echo base_url()."assets" ?>/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url()."assets" ?>/plugins/datatables/dataTables.bootstrap.min.js"></script>
  <!-- iCheck 1.0.1 -->
  <script src="<?php echo base_url()."assets" ?>/plugins/iCheck/icheck.min.js"></script>
  <!-- bootstrap time picker -->
  <script src="<?php echo base_url()."assets" ?>/plugins/timepicker/bootstrap-timepicker.min.js"></script>
  <!-- Select2 -->
  <script src="<?php echo base_url()."assets" ?>/plugins/select2/select2.full.min.js"></script>
  <!-- InputMask -->
  <script src="<?php echo base_url()."assets" ?>/plugins/input-mask/jquery.inputmask.js"></script>
  <script src="<?php echo base_url()."assets" ?>/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
  <script src="<?php echo base_url()."assets" ?>/plugins/input-mask/jquery.inputmask.extensions.js"></script>
  <!-- date-range-picker -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
  <script src="<?php echo base_url()."assets" ?>/plugins/daterangepicker/daterangepicker.js"></script>
  <!-- bootstrap datepicker -->
  <script src="<?php echo base_url()."assets" ?>/plugins/datepicker/bootstrap-datepicker.js"></script>
  <!-- Vue.js -->
  <script src="https://unpkg.com/vue"></script>

  <!-- dropzone js -->

  <script src="<?php echo base_url()."assets" ?>/dist/js/dropzone.min.js"></script>
  <script src="<?php echo base_url()."assets" ?>/dist/js/dropzone-amd-module.min.js"></script>

  <!-- end footer script -->

</head>
<body class="hold-transition skin-green sidebar-mini fixed">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="../../index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>KP</b>Nesia</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Halo</b>Nesia</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <form class="navbar-form navbar-left" role="search">
            <div class="form-group">
              
              </select>
            </div>
          </form>

          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url()."assets\images\admin.png" ?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $this->session->userdata('username');?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo base_url()."assets\images\admin.png"?>" class="img-circle" alt="User Image">

                <p>
                  <?php echo $this->session->userdata('username')." - ".$this->session->userdata('role_name');?>
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
              <!-- Menu Body -->
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url()."Logout"?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->
<script>
var base_url = "<?php echo base_url()."perusahaan/home"?>";
$(document).ready(function() {
  });
$('#select_semester').change(function() {
  var url = window.location.href;
  var url_array = url.split("?");
    var alamat=url_array[0]+"?semesterid="+$('#select_semester').val();
    window.location.href = alamat;
});
</script>


  <?php
  $cek = $this->session->userdata('role');
  if($cek == 'super'){
$this->load->view('sidebar');
}else if($cek == '1'){
  $this->load->view('super/sidebar');
}else if($cek == '2'){
  $this->load->view('region/sidebar');
}else if($cek == '3'){
  $this->load->view('place/sidebar');
}
?>

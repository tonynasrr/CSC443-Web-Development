<!DOCTYPE html>
<?php
	session_start();
	require("include/dbInfo.php");


	if( (isset($_SESSION['created']) && $_SESSION['created']==true) ||  (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']==true)){
$email=$_SESSION["email"];
$inf=$mysqli->prepare("select * from users where email=?");

$inf->bind_param("s",$email);
$inf->execute();
$inf->store_result();
$inf->bind_result($id,$email,$p,$name,$balance,$income,$expense,$wallet,$image);

$inf->fetch();


 ?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>BudgetTracker | Wallet</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="css/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="css/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="css/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="css/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="css/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">

  <div class="wrapper">

    <header class="main-header">
      <!-- Logo -->
      <a href="index.php" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>B</b>T</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Budget</b>Tracker</span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">

            <!-- Tasks: style can be found in dropdown.less -->

            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="<?=$image?>" class="user-image" alt="User Image">
                <span class="hidden-xs"><?= $name ?></span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                  <img src="<?=$image?>" class="img-circle" alt="User Image">

                  <p>
                    Welcome <?= $name ?>

                  </p>
                </li>
                <!-- Menu Body -->

                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="profile.php" class="btn btn-default btn-flat">Profile</a>
                  </div>
                  <div class="pull-right">
                    <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                  </div>
                </li>
              </ul>
            </li>
            <!-- Control Sidebar Toggle Button -->

          </ul>
        </div>
      </nav>
    </header>

    <aside class="main-sidebar">

      <section class="sidebar">

        <ul class="sidebar-menu" data-widget="tree">
            <li >
              <a href="index.php">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                <span class="pull-right-container">
                </span>
              </a>
            </li>
            <li >
              <a href="data.php">
                <i class="fa fa-table"></i> <span>Balance information</span>
                <span class="pull-right-container">
                    </span>
              </a>

            </li>
            <li >
              <a href="balance.php">
                <i class="fa fa-dollar"></i> <span>My Balance</span>
                <span class="pull-right-container">
            </a>

            </li>
            <li class="active">
              <a href="wallet.php">
                <i class="ion ion-card"></i> <span>Wallet</span>
                <span class="pull-right-container">
                </span>
              </a>
            </li>

        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <section class="content-header">
        <h1>
          Wallet
        </h1>
        <ol class="breadcrumb">
    <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active">Wallet</li>
        </ol>
      </section>

      <!-- Content Header (Page header) -->


      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
              <div class="inner">
                <h3><?= $balance ?><sup style="font-size: 20px"></sup></h3>

                <p>Your Balance</p>
              </div>
              <div class="icon">
                <i class="fa fa-dollar"></i>
              </div>

            </div>
          </div>
          <div class="col-xs-6">
            <!-- small box -->
            <div class="small-box bg-purple">
              <div class="inner">
                <h3><?= $wallet ?><sup style="font-size: 20px"></sup></h3>

                <p>Your Wallet</p>
              </div>
              <div class="icon">
                <i class="ion ion-card"></i>
              </div>


            </div>
          </div>












          <div class="row">


          <div class="col-xs-3">

          </div>
          <div class="col-xs-6">
            <div class="box box-primary">
              <div class="box-header">
                <h3 class="box-title">Add/Remove</h3>
              </div>

              <form autocomplete="off" class="" action="walletOp.php" method="post">

              <div class="box-body">

                <div class="form-group">
                  <label>Type</label>
                  <select class="form-control" name="type">
                    <option value="add">Add to the Wallet</option>
                    <option value="remove">Remove from the Wallet</option>

                  </select>
                </div>

              <div class="form-group">
                <label>Ammount in Dollar:</label>

                <div class="input-group">
                  <span class="input-group-addon">  <i class="fa fa-dollar"></i> </span>
                  <input type="number" class="form-control" name="ammount">

                  <div class="input-group-addon">
                    <!-- <i class="fa fa-clock-o"></i> -->
                  </div>
                </div>
            </div>

              </div>
							<input type="number" name="id" value="<?= $id?>" class="hidden">
              <!-- /.box-body -->
              <input type="submit" class="btn btn-block btn-primary btn-lg" value="Submit">
              </form>
            </div>


                <!-- radio -->

              </div>
              <!-- /.box-body -->
              <div class="col-xs-3">

              </div>
          </div>















      </section>
      <!-- /.content -->
    </div>


    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <!-- <div class="control-sidebar-bg"></div> -->
  </div>
  <!-- ./wrapper -->

<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="js/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="js/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<!-- <script src="js/raphael.min.js"></script> -->
<!-- <script src="js/morris.min.js"></script> -->
<!-- Sparkline -->
<script src="js/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="js/jquery-jvectormap-1.2.2.min.js"></script>
<script src="js/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="js/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="js/moment.min.js"></script>
<script src="js/daterangepicker.js"></script>
<!-- datepicker -->
<script src="js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="js/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="js/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="js/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="js/dashboard.js"></script> -->
<!-- AdminLTE for demo purposes -->
<script src="js/demo.js"></script>
<script type="text/javascript">

$("input[name='ammount']").change(()=>{
	if($("input[name='ammount']").val()<0)
	$("input[name='ammount']").val(0);
});
</script>
</body>
</html>
<?php
}
else{
  header("Location:login.php");
}
 ?>

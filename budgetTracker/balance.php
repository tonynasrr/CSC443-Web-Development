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
  <title>BudgetTracker | My Balance</title>
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
  <!-- jvectormap -->
  <link rel="stylesheet" href="css/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->


  <link rel="stylesheet" href="css/all.css">
  <link rel="stylesheet" href="css/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="css/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <link rel="stylesheet" href="css/bootstrap-colorpicker.min.css">
  <link rel="stylesheet" href="css/bootstrap-timepicker.min.css">
  <link rel="stylesheet" href="css/select2.min.css">


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
            <li>
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
            <li class="active">
              <a href="balance.php">
                <i class="fa fa-dollar"></i> <span>My Balance</span>
                <span class="pull-right-container">
            </a>

            </li>
            <li >
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
          My Balance
        </h1>
        <ol class="breadcrumb">
    <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active">My Balance</li>
        </ol>
      </section>

      <!-- Content Header (Page header) -->


      <!-- Main content -->
      <section class="content">
<div class="row">

        <div class="col-xs-12">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?= $balance ?><sup style="font-size: 20px"></sup></h3>

              <p>Your Balance</p>
            </div>
            <div class="icon">
              <i class="ion ion-card"></i>
            </div>
            <a href="data.php" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>


      </div>

      <!-- /.col (left) -->
      <div class="row">


      <div class="col-xs-3">

      </div>
      <div class="col-xs-6">
        <div class="box box-primary">
          <div class="box-header">
            <h3 class="box-title">Income/Spent</h3>
          </div>

          <form autocomplete="off" class="" action="balanceOp.php" method="post">

          <div class="box-body">
            <!-- Date -->


            <div class="form-group">
              <label>Date:</label>

              <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="text" class="form-control pull-right" id="datepicker" name="date">
              </div>
              <!-- /.input group -->
            </div>

            <div class="form-group">
              <label>Reason</label>
              <textarea id="reason" class="form-control" rows="3" name="reason" placeholder="Enter..."></textarea>
            </div>
            <div class="form-group">
              <label>Type</label>
              <select class="form-control" name="type">
                <option value="income">Income</option>
                <option value="expense">Expense</option>

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
					<input class="hidden" type="text" name="id" value="<?= $id ?>">
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

  </div>
  <!-- ./wrapper -->

<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="js/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="js/jquery-ui.min.js"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="js/bootstrap.min.js"></script>
<script src="js/select2.full.min.js"></script>
<script src="js/jquery.inputmask.js"></script>
<script src="js/jquery.inputmask.date.extensions.js"></script>
<script src="js/jquery.inputmask.extensions.js"></script>

 <script src="js/moment.min.js"></script>
<script src="js/daterangepicker.js"></script>
<script src="js/bootstrap-datepicker.min.js"></script>

<script src="js/bootstrap-colorpicker.min.js"></script>
<script src="js/bootstrap-timepicker.min.js"></script>
<script src="js/jquery.slimscroll.min.js"></script>
<script src="js/icheck.min.js"></script>
<script src="js/fastclick.js"></script>
<script src="js/adminlte.min.js"></script>
<script src="js/demo.js"></script>
<script src="js/script.js" charset="utf-8"></script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  })
</script>
</body>
</html>
<?php
}
else {
	header("Location:login.php");
}
 ?>

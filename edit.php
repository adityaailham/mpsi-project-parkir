<?php
  include "config/koneksi.php";

  $tampil = mysqli_query($con, "SELECT * FROM tb_login WHERE id = '$_GET[id]' ");
      $data = mysqli_fetch_array($tampil);
      if($data)
      {
        $usname = $data['username'];
        $pass = $data['password'];
      }

  if(isset($_POST['submit'])) {

        // include database connection file
        include_once("config/koneksi.php");

        // Insert user data into table
        $result = mysqli_query($con, "UPDATE tb_login set
                        username = '$_POST[username]',
                        password = '$_POST[password]'
                       WHERE id = '$_GET[id]'
                       ");

        if($result) //jika edit sukses
      {
        echo "<script>
            alert('Edit data suksess!');
            document.location='home_admin.php';
             </script>";
      }
      else
      {
        echo "<script>
            alert('Edit data GAGAL!!');
            document.location='home_admin.php';
             </script>";
      }
  }
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>E-Parking</title>

	<!-- start: Css -->
	<link rel="stylesheet" type="text/css" href="asset/css/bootstrap.min.css">
	<script type="text/javascript" src="asset/js/jquery.min.js"></script>
	<script type="text/javascript" src="asset/js/bootstrap.min.js"></script>

	<!-- plugins -->
	<link rel="stylesheet" type="text/css" href="asset/css/plugins/font-awesome.min.css"/>
	<link rel="stylesheet" type="text/css" href="asset/css/plugins/animate.min.css"/>
	<link rel="stylesheet" type="text/css" href="asset/css/plugins/nouislider.min.css"/>
	<link rel="stylesheet" type="text/css" href="asset/css/plugins/select2.min.css"/>
	<link rel="stylesheet" type="text/css" href="asset/css/plugins/ionrangeslider/ion.rangeSlider.css"/>
	<link rel="stylesheet" type="text/css" href="asset/css/plugins/ionrangeslider/ion.rangeSlider.skinFlat.css"/>
	<link rel="stylesheet" type="text/css" href="asset/css/plugins/bootstrap-material-datetimepicker.css"/>
	<link rel="stylesheet" type="text/css" href="asset/css/plugins/simple-line-icons.css"/>
	<link rel="stylesheet" type="text/css" href="asset/css/plugins/mediaelementplayer.css"/>
	<link href="asset/css/style.css" rel="stylesheet">
	<!-- end: Css -->
	<link rel="shortcut icon" href="asset/img/logo.png">
</head>



<body class="dashboard topnav">
	<!-- start: Header -->
        <nav class="navbar navbar-default header navbar-fixed-top bg-dark-red">
          <div class="col-md-12 nav-wrapper">
            <div class="navbar-header" style="width:100%;">
                <div class="navbar-brand" style="margin-left: -10px;" name="home_logo">
                <img src="asset/img/logo.png" class="img-circle" alt="logo" style="float: left;margin-top: -10px;" width="45px"/>
                 <b style="float: left;margin-left: 4px;">E-Parking</b>
                </div>

              <ul class="nav navbar-nav search-nav" style="margin-left: 7%">
                  <li class="active"><a style="font-size: 18pt">Edit Data User</a></li>
              </ul>

              <ul class="nav navbar-nav navbar-right user-nav">
                <li class="user-name"><span>Admin</span></li>
                  <li class="dropdown avatar-dropdown">
                   <img src="asset/img/petugas.png" class="img-circle avatar" alt="username" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="cursor: pointer;" />
                   <ul class="dropdown-menu user-dropdown">
                     <li>
                      <ul>
                        <a href="?logout">
                          <li style="float: left;"><span class="fa fa-power-off "></span></li>
                          <li style="color: black; float: left;margin-left: 10px">Log Out</li>
                        </a>
                      </ul>
                    </li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      <!-- end: Header -->

	<!-- Content-Admin -->
	<div id="content">
      <div class="col-md-5" style="margin-top: 30px">
                  <div class="col-md-10 panel">
                    <div class="col-md-12 panel-heading bg-dark-red">
                      <h4 style="color: white;font-size: 20pt;">Edit Data</h4>
                    </div>
                    <div class="col-md-12 panel-body" style="padding-bottom:25px;">
                      <div class="col-md-12">
                        <form class="cmxform" method="POST">
                          <div class="col-md-12">
                            <div class="form-group" style="margin-top:25px !important;">
                              <label>Username</label>
                              <input type="text" name="username" value="<?=$usname?>" class="form-control" required>
                            </div>
                            <div class="form-group" style="margin-top:25px !important;">
                              <label>Password</label>
                              <input type="text" name="password" value="<?=$pass?>" class="form-control" required>
                            </div>
                          </div>
                          <input class="btn btn-danger col-md-12" type="submit" value="Submit" style="height: 40px" id="submit" style="height: 40px" name="submit">
                      </form>
                    </div>
                  </div>
                </div>
              </div>
  </div>
	<!-- end: Content-Admin -->
</body>
</html>
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

<?php 
include 'config/koneksi.php';

if (isset($_POST['btn_baru'])) {
	$username = $_POST['username_baru'];
	$password = $_POST['password_baru'];
	$confirm_password = $_POST['confirm_password_baru'];

	if ($password == $confirm_password) {
		$query = mysqli_query($con, "INSERT INTO tb_login VALUES('$username','$password')");
		echo "<script>document.location.href='home_admin.php'</script>";
	}else{
		echo "<script>alert('Password Tidak Sama !!')</script>";
	}
}

if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();

    echo "<script>document.location.href='index.php'</script>";
  }

  if (isset($_POST['btn_delete'])) {
  	$query = mysqli_query($con, "TRUNCATE TABLE tb_akses_admin");
  }
 ?>

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
                  <li class="active"><a style="font-size: 18pt">Kelola User</a></li>
                  <li><a href="daftar_kendaraan.php"><span  style="font-size: 18pt">Daftar Kendaraan</a></span></li>
                  <li><a href="lapor_admin.php"><span  style="font-size: 18pt">Laporan Kehilangan</a></span></li>
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
              <!-- Daftar User -->          
                <div class="col-md-12 col-sm-12 col-x-12" style="margin-top: 30px;">
                  <div class="col-md-12 panel">
                    <div class="col-md-12 panel-heading bg-dark-red">
                      <h4 style="color: white;font-size: 20pt;">Daftar User</h4>
                    </div>
                    <div class="panel-body">
                    <div class="table-responsive col-md-12 col-sm-12 col-xs-12">
                    <table class="table table-hover col-md-12 col-sm-12 col-xs-12" width="100%" cellspacing="0" style="margin-top: 30px;">
                      <thead>
                        <tr style="font-size: 13pt">
                        <th>Username</th>
                        <th>Action</th>
                      </tr>
                      </thead>
                      <tbody>
                        <?php 
                          $sql = "SELECT * FROM tb_login";
                          $query = mysqli_query($con, $sql);

                          while ($data = mysqli_fetch_array($query)) {?>
                        <tr style="font-size: 12pt">
                          <td align="left"><?php echo $data['username'] ?></td>
                          <td>
                            <a href="edit.php?id=<?=$data['id'] ?>" class="btn btn-warning"> Edit </a>
                            <a href="hapus.php?id=<?=$data['id'] ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin Menghapus Data?')"> Hapus </a>
                          </td>
                        </tr>
                        <?php } ?>
                      </tbody>
                     
                  </table>
                  </div>
                  </div>
                  </div>
                </div>
              <!-- end:Daftar User --> 

              <!-- Aktivitas User -->
              <form method="post">
              <div class="col-md-12 col-sm-12 col-x-12" style="margin-top: 30px;">
                  <div class="col-md-12 panel">
                    <div class="col-md-12 panel-heading bg-dark-red">
                      <h4 style="color: white;font-size: 20pt;">Aktivitas User</h4>
                    </div>
                    <div class="panel-body">
                    <div class="table-responsive col-md-12 col-sm-12 col-xs-12">
                    <input class="submit btn btn-warning col-md-2" type="submit" style="height: 40px;margin-top: 20px;" value="Delete All" onclick="return confirm('Apakah Anda Yakin Menghapus Semuanya?')" name="btn_delete">
                    <table class="table table-hover col-md-12 col-sm-12 col-xs-12" width="100%" cellspacing="0" style="margin-top: 5px;">
                    <thead>
                     <tr style="font-size: 13pt">
                        <th>Username</th>
                        <th>Jam Login</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                        $sql = "SELECT * FROM tb_akses_admin ORDER BY jam_login DESC";
                        $query = mysqli_query($con, $sql);

                        while ($data = mysqli_fetch_array($query)) {?>

                      <tr style="font-size: 12pt">
                        <td><?php echo $data['username'] ?></td>
                        <td><?php echo $data['jam_login'] . " WIB" ?></td>
                      </tr>

                      <?php } ?>
                    </tbody>
                  </table>
                  </div>
                  </div>
                  </div>
                </div>
              </form>
              <!-- End: Aktivitas User  -->
        </div>
	<!-- end: Content-Admin -->
</body>
</html>
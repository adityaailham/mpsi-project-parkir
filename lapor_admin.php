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
  include "config/koneksi.php";
  $username = $_GET['nama'];
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
                  <li><a href="home_admin.php" style="font-size: 18pt">Kelola User</a></li>
                  <li><a href="daftar_kendaraan.php" style="font-size: 18pt">Daftar Kendaraan</a></li>
                  <li class="active"><a style="font-size: 18pt">Laporan Kehilangan</a></span></li>
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

      <!-- Content -->
      <div id="content">
              
                <div class="col-md-6 col-sm-12 col-xs-12" style="margin-top: 10px;"> 
                  <div class="col-md-12 panel">
                    <div class="col-md-12 panel-heading bg-dark-red">
                      <h4 style="color: white;font-size: 20pt;">Laporan Kehilangan</h4>
                    </div>
                    <div class="panel-body">
                    <div class="table-responsive col-md-12 col-sm-12 col-xs-12">
                    <table class="table" width="100%" cellspacing="0">
                    <thead>
                      <tr style="font-size: 13pt">
                        <th style="max-width: 250px;">Plat Nomor</th>
                        <th>Jenis</th>
                        <th>Merk</th>
                        <th>Lokasi</th>
                        <th style="max-width: 200px;">Jam Masuk</th>
                        <th style="max-width: 200px;">Keterangan</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                        $sql = "SELECT * FROM tb_daftar_parkir WHERE status = '3'";
                        $query = mysqli_query($con, $sql);

                        while ($data = mysqli_fetch_array($query)) {?>
                      <tr style="font-size: 11pt">
                        <td><?php echo $data['plat_nomor'] ?></td>
                        <td><?php echo $data['jenis'] ?></td>
                        <td><?php echo $data['merk'] ?></td>
                        <td><?php echo $data['lokasi'] ?></td>
                        <td><?php echo $data['jam_masuk']. " WIB" ?></td>
                        <td><?php echo $data['keterangan'] ?></td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                  </div>
                  </div>
                  </div>
                </div>                  
              
      </div>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
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
date_default_timezone_set("Asia/Jakarta");
$waktu = date('H:i');

 if (isset($_POST['keluar'])) {
    $plat = $_POST['plat-keluar'];
    $kode = $_POST['kode'];

    $query = mysqli_query($con, "SELECT * FROM tb_daftar_parkir WHERE plat_nomor = '$plat' AND kode = '$kode'");
    $row = mysqli_fetch_array($query);

    if ($row['plat_nomor'] == $plat && $row['kode'] == $kode) {

        $query = mysqli_query($con, "UPDATE tb_daftar_parkir SET jam_keluar = '$waktu', status = '2' WHERE kode = '$kode'");

        if($query) 
      	{
        echo "<script>
            alert('Anda Sudah Keluar Parkiran, Terima Kasih');
            document.location='keluar.php';
             </script>";
      	}
      	
      }else{
           echo "<script>
            alert('Gagal Keluar Parkiran');
            document.location='keluar.php';
             </script>";
    }
  }

?>

<body style="overflow-x: hidden;" class="dashboard topnav">
      <!-- start: Header -->
        <nav class="navbar navbar-default header navbar-fixed-top bg-teal">
          <div class="col-md-12 nav-wrapper">
            <div class="navbar-header" style="width:100%;">
                <div class="navbar-brand" style="margin-left: -10px;" name="home_logo">
                <img src="asset/img/logo.png" class="img-circle" alt="logo" style="float: left;margin-top: -10px;" width="45px"/>
                 <b style="float: left;margin-left: 4px;">E-Parking</b>
                </div>

               <ul class="nav navbar-nav navbar-right user-nav">
                <li class="user-name"><span>Keluar Parkir</span></li>
              </ul>
            </div>
          </div>
        </nav>
      <!-- end: Header -->

      <!-- Content -->
      <div id="content">

              <!-- Keluar Parkir -->
              <div class="col-md-5" style="margin-top: 30px">
                  <div class="col-md-10 panel">
                    <div class="col-md-12 panel-heading bg-teal">
                      <h4 style="color: white;font-size: 20pt;">Keluar Parkir</h4>
                    </div>
                    <div class="col-md-12 panel-body" style="padding-bottom:25px;">
                      <div class="col-md-12">
                        <form class="cmxform" method="POST">
                          <div class="col-md-12">
                            <div class="form-group form-animate-text" style="margin-top:25px !important;">
                              <input type="text" class="form-text" name="plat-keluar" id="kode_keluar" required>
                              <span class="bar"></span>
                              <label>Masukan Plat Kendaraan</label>
                            </div>
                            <div class="form-group form-animate-text" style="margin-top:25px !important;">
                              <input type="text" class="form-text" name="kode" id="kode_keluar" required>
                              <span class="bar"></span>
                              <label>Masukan Kode</label>
                            </div>
                          </div>
                          <input class="btn btn-primary col-md-12" type="submit" value="Konfirmasi" style="height: 40px" id="btnKeluar" style="height: 40px" name="keluar">
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <!-- end:Keluar Parkir -->             
      </div>
      <!-- end: Content -->

</body>
</html>
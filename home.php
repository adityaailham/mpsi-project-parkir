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
$username = $_GET['nama'];

session_start();
$_SESSION['username'] = $row['username'];

if(($_SESSION['role'] != "petugas")){
  echo "<script>alert('Login Dulu Haked');document.location.href='index.php'</script>";
}

  $kode = "EP" . rand(100,999);

  $query = mysqli_query($con, "SELECT * FROM tb_daftar_parkir WHERE status = '1'");
  $cek_isi = mysqli_num_rows($query);
  $cek_sisa = 200-$cek_isi;

  if (isset($_GET['logout'])){
    session_destroy();

    echo "<script>document.location.href='index.php'</script>";
  }

  if (isset($_POST['btn_masuk'])) {
    
    $plat_nomor = $_POST['plat_nomor'];
    $merk = $_POST['merk'];
    $jam_masuk = date('H:i');
    $jenis = $_POST['jenis'];
    $lokasi = $_POST['lokasi'];

    $select_isi = mysqli_num_rows($query);
    if ($select_isi >= 200) {
      echo "<script>alert('Parkiran Sudah Penuh')</script>";
    }
    else{
      $sisa = 200 - $seleksi_isi;
      $cek_kode = mysqli_num_rows(mysqli_query($con, "SELECT kode FROM tb_daftar_parkir WHERE kode='$kode'"));
      $cek_plat = mysqli_num_rows(mysqli_query($con, "SELECT plat_nomor FROM tb_daftar_parkir WHERE plat_nomor='$plat_nomor'"));

      if($cek_kode>=1) {
        $kode = "EP" . rand(100,999);
      }elseif ($cek_plat>=1) {
        echo "<script>alert('Kendaraan Tersebut Sudah Ada di Dalam Parkiran')</script>";
      }else{
        $sql = "INSERT INTO tb_daftar_parkir(kode, plat_nomor, jenis, merk, jam_masuk, status, lokasi) VALUES('$kode', '$plat_nomor', '$jenis', '$merk', '$jam_masuk', '1', '$lokasi')";
        $query = mysqli_query($con, $sql);        
        echo "<script>document.location.href='print.php?nama=$username&plat_nomor=$plat_nomor'</script>";
      }
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

                <ul class="nav navbar-nav search-nav" style="margin-left: 7%">
                  <li class="active"><a style="font-size: 18pt">Masuk Parkiran</a></li>
                  <li><a href="lapor.php?nama=<?=$username?>"><span  style="font-size: 18pt">Lapor Kehilangan</a></span></li>
              </ul>

               <ul class="nav navbar-nav navbar-right user-nav">
                <li class="user-name"><span><?php echo $username ?></span></li>
                  <li class="dropdown avatar-dropdown">
                   <img src="asset/img/avatar-admin.png" class="img-circle avatar" alt="username" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="cursor: pointer;" />
                   <ul class="dropdown-menu user-dropdown">
                     <li>
                      <ul>
                        <a href="?nama=<?= $username ?>&logout">
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
            <!-- Masuk Parkir -->
                <div class="col-md-7" style="margin-top: 30px;">
                  <div class="col-md-10 panel">
                    <div class="col-md-12 panel-heading bg-teal">
                      <h4 style="color: white;font-size: 20pt;">Masuk Parkir <span class="right" style="color : #f6c700; font-weight: bold; text-align: right; padding-right: 10px;">Empty : <?= $cek_sisa ?></span></h4>
                    </div>
                    <div class="col-md-12 panel-body" style="padding-bottom:25px;">
                      <div class="col-md-12">
                        <form class="cmxform" method="POST">
                          <div class="col-md-6">
                            <div class="form-group form-animate-text" style="margin-top:15px !important;">
                              <input type="text" class="form-text" name="plat_nomor" id="plat_nomor" required>
                              <span class="bar"></span>
                              <label>Plat Nomor</label>
                            </div>

                            <div class="form-group form-animate-text" style="margin-top:10px !important;">
                              <label>Merk Kendaraan</label>
                              <br>
                              <br>
                              <select name="merk">
                                <option value="Yamaha">Yamaha</option>
                                <option value="Honda">Honda</option>
                                <option value="Suzuki">Suzuki</option>
                                <option value="Mitshubishi">Mitshubishi</option>
                                <option value="Toyota">Toyota</option>
                              </select>
                            </div>

                            <div class="form-group form-animate-text" style="margin-top:10px !important;">
                              <label>Lokasi</label>
                              <br>
                              <br>
                              <select name="lokasi">
                                <option value="DPR">DPR</option>
                                <option value="Gedung G">Gedung G</option>
                                <option value="Gedung H">Gedung H</option>
                                <option value="Gedung F">Gedung F</option>
                                <option value="Auditorium">Auditorium</option>
                                <option value="Perpustakaan">Perpustakaan</option>
                                <option value="Gedung D">Gedung D</option>
                              </select>
                            </div>
                          </div>

                          <div class="col-md-6" style="padding-top: 10px">
                            <label><h4>Jenis Kendaraan</h4></label>
                          </div>

                          <div class="col-md-6" style="padding:5px 20px 0 25px" name="jenis_kendaraan">
                
                            <div class="form-animate-radio">
                              <label class="radio">
                                <input id="radio1" type="radio" name="jenis" value="Motor" required/>
                                <span class="outer">
                                  <span class="inner"></span>
                                </span> Motor
                              </label>
                            </div>

                            <div class="form-animate-radio">
                              <label class="radio">
                                <input id="radio2" type="radio" name="jenis" value="Mobil" required/>
                                <span class="outer">
                                  <span class="inner"></span>
                                </span> Mobil
                              </label>
                            </div>

                            <div class="form-animate-radio">
                              <label class="radio">
                                <input id="radio3" type="radio" name="jenis" value="Truk/Bus/Lainnya" required/>
                                <span class="outer">
                                  <span class="inner"></span>
                                </span> Truk / Bus / Lainnya
                              </label>
                            </div>
                          </div>
                          <input class="submit btn btn-primary col-md-12" type="submit" value="Submit" style="height: 40px" name="btn_masuk">
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <!-- end:Masuk Parkir -->            
      </div>
      <!-- end: Content -->

</body>
</html>
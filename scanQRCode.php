<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>BMS | Scan QR Code</title>
  <!---FAVICON ICON FOR WEBSITE--->
  <link rel="shortcut icon" type="image/png" href="images/logo.png">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Font Awesome -->
  <script src="plugins/fontawesome-free/js/font-awesome-ni-erwin.js" crossorigin="anonymous"></script>
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
  
  <style>
    body {
      font-family: 'Roboto', sans-serif;
    }
  </style>
</head>
<body class="hold-transition layout-top-nav">

<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="scanQRCode.php" class="navbar-brand">
        <!-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Barangay Monitoring System</span> -->
        <img src="images/web_logo2.png" class="img-fluid" width="120">
        <span class="brand-text font-weight-light ml-2 ">Barangay Management System</span>
      </a>

      <!-- <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
       
      </div>

      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <li class="nav-item">
            <a href="login.php" class="nav-link">Login</a>
          </li>
      </ul> -->
    </div>
  </nav>
  <!-- /.navbar -->

  <div class="content-wrapper bg-info" style="background-image: url('images/Background.png'); background-repeat: no-repeat; background-size:     cover;background-repeat:   no-repeat;background-position: center center;">
    
    <div class="content ">
      <div class="container ">
        <div class="row d-flex justify-content-center ">

            <div class="col-lg-10 col-md-10 col-12 card m-5 bg-transparent border-none shadow-none">
              <div class="row"  style="min-height: 460px;max-height: 460px;">
                <div class="col-lg-8 col-md-12 col-sm-12 col-12 justify-content-center d-flex bg-transparent p-0">
                  <?php 
                    $fetchpic = mysqli_query($conn, "SELECT * FROM customization WHERE status='Active'");
                    if(mysqli_num_rows($fetchpic) > 0) {
                      while ($pic = mysqli_fetch_array($fetchpic)) {
                        echo '<img src="images-customization/'.$pic['picture'].'" alt="" class="img-fluid" style="border-top-left-radius: 30px; border-bottom-left-radius: 30px;">';
                      }
                    } else {
                      echo '<img src="images/logo.png" alt="" class="img-fluid"  style="height: 100%;width: 70%">';
                    }
                  ?>
              </div>
                <div class="col-lg-4 col-md-12 col-sm-12 col-12 bg-light pb-2" style="border-top-right-radius: 30px; border-bottom-right-radius: 30px;">
                    <div class="card-header text-center justify-content-center d-flex p-0 mt-3">
                      <div class="col-12 p-1">
                        <a  class="h3" ><b>INPUT QR CODE</b></a>
                        <p>Please place the QR Code located at the back of your ID in front of the camera.</p>
                      </div>
                    </div>
                     <form action="processes.php" method="POST" class="form-horizontal">
                        <input type="hidden" name="residentQR" id="residentQR" class="form-control" autofocus>
                     </form>
                  <div class="card-body p-2">
                    <div class="position-relative mt-2">
                      <div class="d-block m-auto bg-dark" id="containerScanner">
                       <video id="preview" width="100%" class="shadow-sm" style="border: 4px solid gray;"></video>
                    </div>
                    </div>
                  </div>
                  <div class="mt-4">
                    <button type="button" class="btn bg-gradient-primary d-block m-auto" id="clickMe" onclick="refreshPage()"><i class="fa-solid fa-camera"></i> RESET CAMERA</button>
                  </div>
                </div>
              </div>
            </div>
        </div>

        </div>
      </div>
    </div>

   

<?php include 'footer.php'; ?>

<script type="text/javascript" src="plugins/instascan.min.js"></script>
<script>

  $(window).on('load', function() {
      document.getElementById("containerScanner").classList.remove("bg-dark");
      let scanner = new Instascan.Scanner({ video: document.getElementById('preview')});
        Instascan.Camera.getCameras().then(function(cameras){
          if(cameras.length > 0 ){
            scanner.start(cameras[0]);
          } else{
            alert('No cameras found');
            document.getElementById("containerScanner").classList.add("bg-dark");
          }

        }).catch(function(e) {
          console.error(e);
        });

        scanner.addListener('scan',function(c){
        document.getElementById('residentQR').value = c;
        document.forms[0].submit();
      });
  })
   

   function load_upmodal() {
    
    document.getElementById("containerScanner").classList.remove("bg-dark");

    let scanner = new Instascan.Scanner({ video: document.getElementById('preview')});
      Instascan.Camera.getCameras().then(function(cameras){
        if(cameras.length > 0 ){
          scanner.start(cameras[0]);
        } else{
          alert('No cameras found');
          document.getElementById("containerScanner").classList.add("bg-dark");
        }

      }).catch(function(e) {
        console.error(e);
      });

      scanner.addListener('scan',function(c){
        document.getElementById('residentQR').value = c;
         document.forms[0].submit();
      });
  } 


  // REFRESH PAGE ON BUTTON CLICK
  function refreshPage() {
    location.reload();
    load_upmodal();
  }
</script>
<?php
include_once '../database/dbConn.php';
session_start();

$studEmail =$_SESSION['studEmail'];
$studId =$_SESSION['studid'];
$studCamp =$_SESSION['campus'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Student Bus Booking</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">


</head>

<body>

  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="index.php">Student Bus Booking</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.php" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a  href="index.php">Home</a></li>

          <li><a class="active" href="book.php">Make booking</a></li>
          <li><a href="viewBooking.php">View Booking</a></li>
          <li><a href="profile.php">Profile</a></li>
          <li><a href="logout.php">logout</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
  <main id="main">


    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">


          <h2 class="text-center">Student Login Portal</h2>



      </div>
    </section>


    <div class="container">
                 <div class="row">
                     <div class="col-lg-10 col-xl-7 mx-auto">
                         <h3 class="text-center">Make Booking</h3>

                         <form action="book.php" method="post">
                             <div class="form-group mb-3">
                               <select class="form-control"   name="fromCampus" style="border-radius: 50px;">
                               <option  value="">From Campus</option>
                               <option value="Arcadia Campus">Arcadia Campus</option>
                               <option value="Pretoria Campus">Pretoria Campus</option>
                               <option value="Soshanguve North Campus">Soshanguve North Campus</option>
                               <option value="Soshanguve South Campus">Soshanguve South Campus</option>
                           </select>
                             </div>
                             <div class="form-group mb-3">
                               <select class="form-control"  name="toCampus" style="border-radius: 50px;">
                                 <option  value="">To Campus</option>
                                 <option value="Arcadia Campus">Arcadia Campus</option>
                                 <option value="Pretoria Campus">Pretoria Campus</option>
                                 <option value="Soshanguve North Campus">Soshanguve North Campus</option>
                                 <option value="Soshanguve South Campus">Soshanguve South Campus</option>
                             </select>
                             </div>
                             <div class="form-group mb-3">
                               <select class="form-control" style="border-radius: 50px;"  name="time">
                                   <option  value="">Time</option>
                                   <option value="06:00">06:00</option>
                                   <option value="06:30">06:30</option>
                                   <option value="07:00">07:00</option>
                                   <option value="07:30">07:30</option>
                                   <option value="08:00">08:00</option>
                                   <option value="08:30">08:30</option>
                                   <option value="09:00">09:00</option>
                                   <option value="09:30">09:30</option>
                                   <option value="10:00">10:00</option>
                                   <option value="10:30">10:30</option>
                                   <option value="11:00">11:00</option>
                                   <option value="11:30">11:30</option>
                                   <option value="12:00">12:00</option>
                                   <option value="12:30">12:30</option>
                                   <option value="13:00">13:00</option>
                                   <option value="13:30">13:30</option>
                                   <option value="14:00">14:00</option>
                                   <option value="14:30">14:30</option>
                                   <option value="15:00">15:00</option>
                                   <option value="15:30">15:30</option>
                                   <option value="16:00">16:00</option>
                                   <option value="16:30">16:30</option>
                                   <option value="17:00">17:00</option>
                                   <option value="17:30">17:30</option>
                                   <option value="18:00">18:00</option>
                                   <option value="18:30">18:30</option>
                                   <option value="19:00">19:00</option>
                                   <option value="19:30">19:30</option>
                                   <option value="20:00">20:00</option>
                                   <option value="20:30">20:30</option>
                                   <option value="21:00">21:00</option>
                                   <option value="21:30">21:30</option>
                               </select>

                             </div>
                             <?php

                                        if (isset($_SESSION['message'])): ?>
                                        <div class="alert alert-<?=$_SESSION['msg_type']?>">

                                          <?php
                                              echo $_SESSION['message'];
                                              unset($_SESSION['message']);
                                          ?>
                                      </div>
                                    <?php endif ?>

                             <div class="col-md-12 text-center ">
                                    <button type="submit" name="book" class="btn btn-primary">Book</button>
                             </div>

                             <div class="text-center d-flex justify-content-between mt-4"></div>
                  </form>
              </div>
      </div>
</div>

  </main>
  <br>
<br>
<br>
  <?php




  if (isset($_POST['book'])&&isset($_SESSION['studid'])&&isset($_SESSION['studEmail']))
  {

  $frmCampus = $_POST['fromCampus'];
  $toCampus = $_POST['toCampus'];
  $time = $_POST['time'];


  if (!empty($frmCampus))
  {
      if (!empty($toCampus))
      {
              if (!empty($time))
              {
                  if ($time>="06:00"&& $time<"21:30")
                  {
                        if ($frmCampus!= $toCampus)
                        {


                              $sql = "SELECT* FROM reservation WHERE  reserveTime = '$time' AND studID = '$studId';";
                              $result = mysqli_query($conn,$sql);
                              $num = mysqli_num_rows($result);


                              if ($num>0)
                              {
                                $_SESSION['message'] = "You have Already book another trip for that time";
                                $_SESSION['msg_type'] = "danger";

                                echo "<script>location.replace('book.php');</script>";
                                exit();
                              }
                              else
                              {
                                      $d = date('d-m-Y');
                                      $sql = "INSERT INTO reservation(reserveFrom,reserveTo,reserveDate,reserveTime,studentID)
                                              VALUES('$frmCampus','$toCampus','$d','$time','$studId')";
                                      mysqli_query($conn,$sql);

                                      $_SESSION['message'] = "You have Successfully book trip";
                                      $_SESSION['msg_type'] = "success";
                                      echo "<script>location.replace('viewBooking.php');</script>";
                                      exit();

                              }

                        }
                        else
                        {
                          $_SESSION['message'] = "You can not select same campus for travel";
                          $_SESSION['msg_type'] = "danger";

                         echo "<script>location.replace('book.php');</script>";
                         exit();
                        }
                  }
              }
              else
              {
                $_SESSION['message'] = "Please select time";
                $_SESSION['msg_type'] = "danger";

               echo "<script>location.replace('book.php');</script>";
               exit();
              }
      }
      else
      {
        $_SESSION['message'] = "Select you going to which campus";
        $_SESSION['msg_type'] = "danger";

       echo "<script>location.replace('book.php');</script>";
       exit();
      }
  }
  else
  {
    $_SESSION['message'] = "Select you from which campus";
    $_SESSION['msg_type'] = "danger";

   echo "<script>location.replace('book.php');</script>";
   exit();
  }



  }


    ?>


  <footer id="footer">
    <div class="container">
      <h3>TUT ONLINE BUS BOOKING</h3>
      <p>TUT Transportes bus tickets. Check all bus schedules, routes, bus stations, and book directly online.</p>
      <div class="social-links">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
      <div class="copyright">
        &copy; Copyright <strong><span>TUT</span></strong> 2021 All Rights Reserved
      </div>
      <div class="credits">
      </div>
    </div>
  </footer>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>

<?php
include_once 'database/dbConn.php';
session_start();


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Student Bus Booking</title>
  <meta content="" name="description">
  <meta content="" name="keywords">


  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">


  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">


  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <link href="assets/css/style.css" rel="stylesheet">


</head>

<body>

  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="index.html">Student Bus Booking</a></h1>


      <nav id="navbar" class="navbar">
        <ul>
          <li><a  href="index.html">Home</a></li>

          <li><a href="register.php">Register</a></li>

          <li><a class="active" href="login.php">Login</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>

    </div>
  </header>

  <main id="main">


    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">


          <h2 class="text-center">Student Login Portal</h2>



      </div>
    </section>

    <div class="container">
<div class="row">
<div class="col-md-5 mx-auto">
<div id="first">
<div class="myform form ">
  <br>
  <br>
  <br>
  <br>
   <div class="logo mb-3">
     <div class="col-md-12 text-center">
      <h3>Sign in</h3>
     </div>
  </div>

           <form action="login.php" method="post" novalidate="novalidate">
                   <div class="form-group">
                      <label for="exampleInputEmail1">Email address</label>
                      <input type="email" name="email"  class="form-control"  style="border-radius: 50px;"  placeholder="Enter email">
                   </div>
                   <div class="form-group">
                      <label for="exampleInputEmail1">Password</label>
                      <input type="password" name="password"   class="form-control" style="border-radius: 50px;"  placeholder="Enter Password">
                   </div>
                   <div class="form-group">
                      <p></p>
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

                       <button class="btn btn-primary" name="btnLogin" type="submit" id="sendMessageButton">Login</button>
                   </div>

                    <a href="register.php">Dont have account?</a>
              </form>
              <br>
              <br>
              <br>
              <br>
</div>
</div>

</div>
</div>
</div>


<?php


 if (isset($_POST['btnLogin']))
 {

         $email = $_POST['email'];
         $pwd = $_POST['password'];


         if (!empty($email))
         {
                 if (filter_var($email, FILTER_VALIDATE_EMAIL))
                 {
                       if (!empty($pwd))
                       {
                               $sql = "SELECT* FROM student WHERE studentEmail = '$email';";
                               $result = mysqli_query($conn,$sql);

                               $num = mysqli_num_rows($result);

                               if ($num == 1)
                               {

                                   $row = mysqli_fetch_assoc($result);
                                   if (password_verify ($pwd,$row['studentPwd']))
                                   {

                                     $_SESSION['studEmail'] = $row['studentEmail'];
                                     $_SESSION['studid'] = $row['studentID'];
                                     $_SESSION['campus'] = $row['studentCampus'];

                                     echo "<script>location.replace('studentData/index.php');</script>";
                                     exit();
                                   }
                                   else
                                   {
                                     $_SESSION['message'] = "Password does not match";
                                     $_SESSION['msg_type'] = "danger";


                                    $_SESSION['em'] = $email;
                                    echo "<script>location.replace('login.php');</script>";
                                    exit();
                                   }

                               }
                               else
                               {
                                 $_SESSION['message'] = "Student is not registered";
                                 $_SESSION['msg_type'] = "danger";

                                $_SESSION['em'] = $email;
                                echo "<script>location.replace('login.php');</script>";
                                exit();
                               }
                       }
                       else
                       {
                         $_SESSION['message'] = "Password is empty";
                         $_SESSION['msg_type'] = "danger";


                        $_SESSION['em'] = $email;
                        echo "<script>location.replace('login.php');</script>";
                        exit();
                       }
                 }
                 else
                 {
                   $_SESSION['message'] = "Email is invalid";
                   $_SESSION['msg_type'] = "danger";


                  $_SESSION['em'] = $email;
                  echo "<script>location.replace('login.php');</script>";
                  exit();
                 }
         }
         else
         {

           $_SESSION['message'] = "Email field is empty";
           $_SESSION['msg_type'] = "danger";


          $_SESSION['em'] = $email;
          echo "<script>location.replace('login.php');</script>";
          exit();
         }

 }

 ?>







  </main>
  <br>


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


  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>


  <script src="assets/js/main.js"></script>

</body>

</html>

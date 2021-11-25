<?php
include_once '../database/dbConn.php';
session_start();

$studEmail =$_SESSION['studEmail'];
$studId =$_SESSION['studid'];
$studCamp =$_SESSION['campus'];



if (isset($_GET['id'])&&isset($_GET['type'])&&isset($_SESSION['studid'])&&isset($_SESSION['studEmail']))
{

            $type = $_GET['type'];


            if ($type == "cancel")
            {
                $id = $_GET['id'];

                $sql = "DELETE FROM reservation WHERE reserveID = '$id' AND studentID	 = '$studId';";
                mysqli_query($conn,$sql);

                $_SESSION['message'] = "Booking Successfully Cancelled";
                $_SESSION['msg_type'] = "success";

                echo "<script>location.replace('viewBooking.php');</script>";
                exit();
            }


}


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

      <h1 class="logo"><a href="index.php">Student Bus Booking</a></h1>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a  href="index.php">Home</a></li>

          <li><a href="book.php">Make booking</a></li>
          <li><a class="active" href="viewBooking.php">View Booking</a></li>
          <li><a href="profile.php">Profile</a></li>
          <li><a href="logout.php">logout</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>

    </div>
  </header>
  <main id="main">


    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">


          <h2 class="text-center">Student Booking</h2>



      </div>
    </section>

    <section id="team" data-stellar-background-ratio="0.5">
      <div class="container">
      <div class="row ">
        <div class="col-lg-12 text-center rounded border light my-5">
          <h4>Manager Bookings</h4>
          <br>
          <?php

                       if (isset($_SESSION['message'])): ?>
                       <div class="alert alert-<?=$_SESSION['msg_type']?>">

                         <?php
                             echo $_SESSION['message'];
                             unset($_SESSION['message']);
                         ?>

                     </div>
                   <?php endif ?>
      </div>
      <div class="col-lg-9">
      <table class="table">
      <thead class="text-center">
      <tr>

      <th scope="col" style="text-align:center">FROM</th>
      <th scope="col" style="text-align:center">TO</th>
      <th scope="col" style="text-align:center">TIME</th>
      <th scope="col" style="text-align:center">Date</th>
      <th scope="col" style="text-align:center"></th>
      <th scope="col" style="text-align:center"></th>




      <th scope="col"></th>


      </tr>
      </thead>
      <tbody class="text-center">
      <?php

              $sql = "SELECT* FROM reservation WHERE studentID = '$studId'";
              $result = mysqli_query($conn,$sql);
              $num = mysqli_num_rows($result);
              $countB = 0;
              if ($num >0)
              {


                while ($row = mysqli_fetch_assoc($result))
                {
                    $tId = $row['reserveID'];
                    $d = $row['reserveDate'];
                    $t = $row['reserveTime'];
                    $toCampus = $row['reserveTo'];
                    $frmCampus = $row['reserveFrom'];
                      $countB = $countB + 1;

                      echo "
                      <tr>

                      <td>
                          $frmCampus
                      </td>
                      <td>
                          $toCampus
                      </td>
                      <td>
                          $t
                      </td>
                      <td>
                          $d
                      </td>
                      <td>

                      </td>
                      <td>

                      <form class='' action='viewBooking.php' method='GET'>
                              <input hidden type='text' name='type' value='cancel'>
                              <input hidden type='text' name='id' value='$tId'>
                              <button onclick='myFunction()'  class='btn btn-danger' type='submit' name='cancel'>Cancel</button>
                          </form>
                      </td>




                      </tr>";
                }
              }
              else
              {
                                 echo "<td colspan='9'>No booking found</td>";
              }


      ?>

      </tbody>
      </table>


      </div>
      <div class="col-lg-3">
      <div class="border bg-light rounded p-4">
                <h6 class="text-center"><?php echo "Number of Booking: ".$countB; ?></h6>

      </div>

      </div>
      </div>
      </div>
      </section>


      <script>
      function myFunction() {
        confirm("Are you sure you want to cancel your booking?");
      }
      </script>


  </main>

  <br>
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

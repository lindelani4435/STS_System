<?php
include_once '../database/dbConn.php';
session_start();

$studEmail =$_SESSION['studEmail'];
$studId =$_SESSION['studid'];
$studCamp =$_SESSION['campus'];


$sql = "SELECT* FROM STUDENT WHERE studentID = '$studId';";
$result = mysqli_query($conn,$sql);
$numR = mysqli_num_rows($result);

if ($numR==1)
{
    $row = mysqli_fetch_assoc($result);
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

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
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
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.php" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a  href="index.php">Home</a></li>

          <li><a  href="book.php">Make booking</a></li>
          <li><a href="viewBooking.php">View Booking</a></li>
          <li><a class="active" href="profile.php">Profile</a></li>
          <li><a href="logout.php">logout</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <main id="main">


    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">


          <h2 class="text-center">Student Update Portal</h2>



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
              <h3>Update</h3>
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
          </div>

                   <form action="profile.php" method="post" novalidate="novalidate">
                           <div class="form-group">
                              <label for="exampleInputEmail1">Student Number*</label>
                              <input type="email" id="studnum" value="<?php echo $row['studentNo']; ?>" readonly onchange="validate()" name="studNo"  class="form-control"  style="border-radius: 50px;"  placeholder="student number">
                           </div>
                           <div class="form-group">
                              <label for="exampleInputEmail1">Student Name*</label>
                              <input type="email" name="studName"  value="<?php echo $row['studentName']; ?>" readonly class="form-control"  style="border-radius: 50px;"  placeholder="name">
                           </div>
                           <div class="form-group">
                              <label for="exampleInputEmail1">Student Surname*</label>
                              <input type="email" name="studSurname" value="<?php echo $row['studentSurname']; ?>"  readonly class="form-control"  style="border-radius: 50px;"  placeholder="surname">
                           </div>
                           <div class="form-group">
                              <label for="exampleInputEmail1">Student Email*</label>
                              <input type="email" id="e" name="studEmail"  value="<?php echo $row['studentEmail']; ?>" readonly class="form-control"  style="border-radius: 50px;"  placeholder="email">
                           </div>

                           <div class="form-group">
                              <label for="exampleInputEmail1">Password</label>
                              <input type="password" name="password"   class="form-control" style="border-radius: 50px;"  placeholder="password">
                           </div>
                           <div class="form-group">
                              <label for="exampleInputEmail1">Corfirm Password</label>
                              <input type="password" name="cpassword"   class="form-control" style="border-radius: 50px;"  placeholder="cornfim password">
                           </div>
                           <div class="form-group">
                              <p></p>
                           </div>

                           <div class="col-md-12 text-center ">

                               <button class="btn btn-primary" name="btnUpdate" type="submit" id="sendMessageButton">Update</button>
                           </div>


                      </form>
                      <br>

        </div>
      </div>

      </div>
    </div>
      </div>

      <?php

            if (isset($_POST['btnUpdate']))
            {
                      $studNo = mysqli_real_escape_string($conn,$_POST['studNo']);
                      $studEmail = mysqli_real_escape_string($conn,$_POST['studEmail']);
                      $studName = mysqli_real_escape_string($conn,ucwords($_POST['studName']));
                      $studSurname = mysqli_real_escape_string($conn,ucwords($_POST['studSurname']));

                      $password= mysqli_real_escape_string($conn,$_POST['password']);
                      $cPassword = mysqli_real_escape_string($conn,$_POST['cpassword']);


                      if (empty($studNo)&&empty($studEmail)&&empty($studName)&&empty($studSurname)&&empty($password))
                      {
                        $_SESSION['message'] = "All field are empty";
                        $_SESSION['msg_type'] = "danger";

                       echo "<script>location.replace('profile.php');</script>";
                       exit();
                      }
                      else
                      {

                        if (!empty($studName))
                         {
                               if (preg_match("/^[a-zA-Z\s]+$/",$studName))
                               {
                                       if (!empty($studSurname))
                                       {
                                               if (preg_match("/^[a-zA-Z]+$/",$studSurname))
                                               {
                                                     if (!empty($studNo))
                                                     {
                                                           if (preg_match("/^[0-9]+$/",$studNo))
                                                           {
                                                                   if (substr($studNo,0,1) == "2")
                                                                   {
                                                                           $year = "20".substr($studNo,1,2);

                                                                           $y = date("Y") ;

                                                                           if (strlen($studNo) == 9)
                                                                           {
                                                                                     if ($year <= $y)
                                                                                     {


                                                                                                                             if (!empty($password)&&!empty($cPassword))
                                                                                                                             {
                                                                                                                                       if ($password == $cPassword)
                                                                                                                                       {
                                                                                                                                         $newPwd = password_hash($cPassword, PASSWORD_DEFAULT);
                                                                                                                                         $sql = "UPDATE student SET studentPwd = '$newPwd' WHERE studentID = '$studId';";
                                                                                                                                         mysqli_query($conn,$sql);
                                                                                                                                         $_SESSION['message'] = "Student Successfully UPDATED";
                                                                                                                                         $_SESSION['msg_type'] = "success";

                                                                                                                                         echo "<script>location.replace('profile.php');</script>";

                                                                                                                                       }
                                                                                                                                       else
                                                                                                                                       {
                                                                                                                                         $_SESSION['message'] = "Password does not match";
                                                                                                                                         $_SESSION['msg_type'] = "danger";



                                                                                                                                        echo "<script>location.replace('profile.php');</script>";
                                                                                                                                        exit();
                                                                                                                                       }
                                                                                                                             }
                                                                                                                             else
                                                                                                                             {
                                                                                                                               $_SESSION['message'] = "Password is empty";
                                                                                                                               $_SESSION['msg_type'] = "danger";



                                                                                                                              echo "<script>location.replace('profile.php');</script>";
                                                                                                                              exit();
                                                                                                                             }





                                                                                     }
                                                                                     else
                                                                                     {
                                                                                       $_SESSION['message'] = "Student number  must less 2022 ";
                                                                                       $_SESSION['msg_type'] = "danger";



                                                                                      echo "<script>location.replace('profile.php');</script>";
                                                                                      exit();
                                                                                     }
                                                                           }
                                                                           else
                                                                           {
                                                                             $_SESSION['message'] = "Student number  must 9 numbers only(216599390)";
                                                                             $_SESSION['msg_type'] = "danger";



                                                                            echo "<script>location.replace('profile.php');</script>";
                                                                            exit();
                                                                           }



                                                                   }
                                                                   else
                                                                   {
                                                                     $_SESSION['message'] = "Student number must begin with 2";
                                                                     $_SESSION['msg_type'] = "danger";



                                                                    echo "<script>location.replace('profile.php');</script>";
                                                                    exit();
                                                                   }

                                                           }
                                                           else
                                                           {
                                                             $_SESSION['message'] = "Student number field must be numbers only";
                                                             $_SESSION['msg_type'] = "danger";


                                                            echo "<script>location.replace('profile.php');</script>";
                                                            exit();
                                                           }
                                                     }
                                                     else
                                                     {
                                                       $_SESSION['message'] = "Student number field is empty";
                                                       $_SESSION['msg_type'] = "danger";


                                                      echo "<script>location.replace('profile.php');</script>";
                                                      exit();
                                                     }
                                               }
                                               else
                                               {
                                                   $_SESSION['message'] = "Surname field must be characters";
                                                   $_SESSION['msg_type'] = "danger";



                                                  echo "<script>location.replace('profile.php');</script>";
                                                  exit();
                                               }
                                       }
                                       else
                                       {
                                         $_SESSION['message'] = "Surname field is empty";
                                         $_SESSION['msg_type'] = "danger";



                                          echo "<script>location.replace('profile.php');</script>";
                                          exit();
                                       }
                               }
                               else
                               {
                                     $_SESSION['message'] = "Name field must be characters";
                                     $_SESSION['msg_type'] = "danger";


                                echo "<script>location.replace('profile.php');</script>";
                                exit();
                               }
                         }
                         else
                         {
                           $_SESSION['message'] = "Name field is empty";
                           $_SESSION['msg_type'] = "danger";



                          echo "<script>location.replace('profile.php');</script>";
                          exit();
                         }




                  }





            }








      ?>



  </main>
<br>






<script type="text/javascript">
                                    function validate() {

                                            var stud = document.getElementById('studnum').value;
                                            if (stud != "")
                                            {
                                                  document.getElementById('e').value = stud+"@tut4life.ac.za";
                                            }
                                            else
                                            {
                                              document.getElementById('e').value = "";
                                            }
                                    }
 </script>
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

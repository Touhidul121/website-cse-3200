<?php
//start
session_start();
//print sess
require_once 'CodeforcesAPI.php';

// Get the constest list
$contests = $cfapi->get('contest.list');
$before = array_filter($contests->result, function ($contest) {
  return $contest->phase == 'BEFORE';
});
// Sort the contests by start time
usort($before, function ($a, $b) {
  return $a->startTimeSeconds - $b->startTimeSeconds;
});

// Get the user info
if(isset($_POST['submit']))
{
  $username = $_POST['username'];
  $email = $_POST['email'];
  $problem = $_POST['problem'];
  
	$connection = mysqli_connect('localhost', 'root', '', 'website');
	$query = "INSERT into contact_us (Username,Email,Problem_Details)";
	$query .= "Values ('$username','$email','$problem')";
	$result = mysqli_query($connection, $query);

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="/css/style.css" <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
    body {
      margin: 0px 0px 0px 0px;
      background-color: #b3b3b3;
    }
  </style>
</head>

<body>
  <!-- Modal -->
  <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Upcoming contests</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <table>
            <tbody>
              <tr>
                <th>Contest Name</th>
                <th>Contest Type</th>
                <th>Contest Duration</th>
                <th>Contest Start Time</th>
              </tr>
              <?php
              date_default_timezone_set('Asia/Dhaka');
              foreach ($before as $contest) {
                $contest_id = $contest->id;
                $contest_name = $contest->name;
                $contest_type = $contest->type;
                // Convert the duration from seconds to hours and minutes
                $contest_duration = gmdate('H:i', $contest->durationSeconds);
                $contest_start_time = date('Y-m-d H:i:s', $contest->startTimeSeconds);
              ?>
                <tr>
                  <td><?php echo $contest_name; ?></td>
                  <td><?php echo $contest_type; ?></td>
                  <td><?php echo $contest_duration; ?></td>
                  <td><?php echo $contest_start_time; ?></td>
                </tr>
              <?php
              }
              ?>
            </tbody>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Understood</button>
        </div>
      </div>
    </div>
  </div>

  <div class="header" id="topheader">
    <nav class="navbar navbar-expand-lg fixed-top">
      <div class="container text-uppercase p-2">
        <a class="navbar-brand font-weight-bold text-white logo" href="index.php"><mark style="background-color: blueviolet;">C</mark>odingHub</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#categories" style="fornt-weight:800">Categories</a>
            <li class="nav-item">
              <a class="nav-link" href="#footerdiv">About</a>
            <li class="nav-item">
              <a class="nav-link" href="#contact">Contact</a>
            </li>
            <?php if (!isset($_SESSION['user_name'])) : ?>
              <li class="nav-item">
                <a class="nav-link" style="font-weight:800;" href="http://localhost:3000/Login_Page.php">LOGIN |</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" style="font-weight: 900;" href="http://localhost:3000/SIGHNUP_Page.php">SIGHNUP</a>
              </li>
            <?php else : ?>
              <li class="nav-item">
                <a class="nav-link" style="font-weight:800;" href="#">
                  <?php echo $_SESSION['user_name']; ?>
                  |</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" style="font-weight: 900;" href="http://localhost:3000/logout.php">LOGOUT</a>
              </li>
            <?php endif; ?>
          </ul>
        </div>
      </div>
    </nav>
    <section class="header-section">
      <div class="center-div">
        <h1 class="font-weight-bold">Welcome to CODINGHUB</h1>
        <p style="font-weight:600;margin-bottom:10px;color: aliceblue;">Coding Hub is an Editorial Website that disusses about</p>
        <p style="font-weight:600;margin-bottom:10px;color:aliceblue;">various Competitive Programming related topics</p>

      </div>
    </section>
  </div>

  <!-- ********header parts end ******** -->
  <!-- ********Three extra header div starts ******-->
  <section class="header-extradiv">
    <div class="container" id="categories">
      <h1>Categories</h1>
      <div class="row">
        <div class="extra-div col-lg-4 colr-md-4 col-12" style="background-color: darkslategray;color:#fff;">
          <a href="/Pages/Number_theory/Number_theory.html"><i class="fas fa-desktop fa-3x"></i></a>
          <a>
            <h2>Number Theory</h2><a>
        </div>

        <div class="extra-div col-lg-4 colr-md-4 col-12" style="background-color: darkslategray;color:#fff;">
          <a href="#"><i class="fas fa-trophy fa-3x"></i></a>
          <h2>Strings</h2>
        </div>

        <div class="extra-div col-lg-4 colr-md-4 col-12" style="background-color: darkslategray;color:#fff;">
          <a href="#"><i class="fas fa-magic fa-3x"></i></a>
          <h2>Dynamic Programming</h2>

        </div>
      </div>

    </div>
  </section>

  <section class="header-extradiv">
    <div class="container">
      <div class="row">
        <div class="extra-div col-lg-4 colr-md-4 col-12" style="background-color: darkslategray;color:#fff;">
          <a href="#"><i class="fas fa-desktop fa-3x"></i></a>
          <h2>Graphs</h2>
        </div>

        <div class="extra-div col-lg-4 colr-md-4 col-12" style="background-color: darkslategray;color:#fff;">
          <a href="#"><i class="fas fa-trophy fa-3x"></i></a>
          <h2>Segment Tree</h2>
        </div>

        <div class="extra-div col-lg-4 colr-md-4 col-12" style="background-color: darkslategray;color:#fff;">
          <a href="#"><i class="fas fa-magic fa-3x"></i></a>
          <h2>Binary Search</h2>

        </div>
      </div>

    </div>
  </section>

  <section class="header-extradiv">
    <div class="container">
      <div class="row">
        <div class="extra-div col-lg-4 colr-md-4 col-12" style="background-color: darkslategray;color:#fff;">
          <a href="#"><i class="fas fa-desktop fa-3x"></i></a>
          <h2>Data Structures</h2>
        </div>

        <div class="extra-div col-lg-4 colr-md-4 col-12" style="background-color: darkslategray;color:#fff;">
          <a href="#"><i class="fas fa-trophy fa-3x"></i></a>
          <h2>Greedy</h2>
        </div>

        <div class="extra-div col-lg-4 colr-md-4 col-12" style="background-color: darkslategray;color:#fff;">
          <a href="#"><i class="fas fa-magic fa-3x"></i></a>
          <h2>Bitwise</h2>

        </div>
      </div>

    </div>
  </section>
  <!-- ********Three extra header div ends ******-->

  <!-- ********Offer section starts ******-->
  <!-- *******Project done ends ***********-->
  <!-- *******Our pricing start s ***********-->

  <!-- *******Our pricing ends ***********-->

  <!-- *******Contact Us starts Here*******-->
  <section class="contactus" id="contact">
    <div class="container headings text-center">
      <h1 class="text-center font-weight-bold">CONTACT US</h1>
      <p class="text-capitalize pt-1">We are here to Help And Answer Any Question You Might Have. We Look Forward To Hearing From You</p>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-log-8 col-md-8 col-10 offset-lg-2 offset-md-2 col-1">
          <form action="index.php" method = "post">
            <div class="form-group">

              <input type="text" class="form-control" placeholder="Enter Username" name="username">
            </div>

            <div class="form-group">

              <input type="email" class="form-control" placeholder="Enter email" name="email">
            </div>
            <div class="form-group">

              <textarea class="form-control" rows="5" placeholder="Enter your message: " name="problem"></textarea>

            </div>
            <div class="d-flex justify-content-center form-button">
              <button name="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
  <!-- *******Contact Us Ends Here*******-->

  <!--Footer starts here-->

  <footer class="footersection" id="footerdiv">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-mid-12 col-12">
          <div>
            <h3>About CODINGHUB</h3>
            <p>It's an attempt by us present editorial in a simpler and easier manner and to provide similer problems and answer to enquiry</p>
          </div>
        </div>

        <div class="col-lg-6 col-mid-12 col-12 pl-4">
          <div>
            <h3>Navigation Links</h3>
            <li><a href="#">Home</a></li>
            <li><a href="#">Catergories</a></li>
            <li><a href="#">Contact Us</a></li>
          </div>
        </div>
      </div>
      <div class="mt-5 text-center">
        <p>Copyright @2022 All rigts reserved | This template is made with love by Touhidul Islam</p>

      </div>
    </div>
  </footer>
  <div class="modal fade" id="simpleModal" role="dialog">
    <div class="modal-dialog">

      <!-----modal content--->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h5 class="modal-title">Welcome to Smart Mind Youtube Channerl</h5>
        </div>
        <div class="model-body">
          <p>Some text in the model.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-deafult" data-dismiss="modal">Close</button>
        </div>

      </div>

    </div>



    <!--Footer ends here-->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js" integrity="sha512-CEiA+78TpP9KAIPzqBvxUv8hy41jyI3f2uHi7DGp/Y/Ka973qgSdybNegWFciqh6GrN2UePx2KkflnQUbUhNIA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js" integrity="sha512-d8F1J2kyiRowBB/8/pAWsqUl0wSEOkG5KATkVV4slfblq9VRQ6MyDZVxWl2tWd+mPhuCbpTB4M7uU/x9FlgQ9Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
      $('.count').counterUp({
        delay: 20,
        time: 3000
      });

      document.addEventListener('DOMContentLoaded', function() {
        $('#staticBackdrop').modal('show');
      });
    </script>
</body>

</html>
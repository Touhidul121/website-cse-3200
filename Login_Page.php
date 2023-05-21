<?php
session_start();
if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $connection = mysqli_connect('localhost', 'root', '', 'website');
  $query = "SELECT Username,Password From user_info where Username='$username';";
  $result = mysqli_query($connection, $query);
  
  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    if (password_verify($password, $row['Password'])) {
      $_SESSION['user_name'] = $username;
      echo "<script> window.location.href = 'index.php'; </script>";
    } else {
      echo "<script> 
      
      document.addEventListener('DOMContentLoaded', function() {
        $('#loginFailedModal').modal('show');
      });
      </script>";
    }
  } else {
    echo "<script> 
    
    document.addEventListener('DOMContentLoaded', function() {
      $('#loginFailedModal').modal('show');
    });
    </script>";
  }
}
?>
<!DOCTYPE html>

<head>
  <link rel="stylesheet" href="/css/Login_page.css">
  <title>Login</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
</head>

<body style="background-color: slategrey;">
  <div class="modal fade" id="loginFailedModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="loginFailedModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="loginFailedModalLabel">Login status</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Login failed. Try again.
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <div class="login-page">
    <div class="form">
      <form action="Login_Page.php" method="post">
        <input type="text" name='username' placeholder="username" />
        <input type="password" name='password' placeholder="password" />
        <button name='submit'>login</button>
        <p class="message">Not registered? <a href="SIGHNUP_Page.php">Create an account</a></p>
      </form>
    </div>
  </div>
  
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js" integrity="sha512-CEiA+78TpP9KAIPzqBvxUv8hy41jyI3f2uHi7DGp/Y/Ka973qgSdybNegWFciqh6GrN2UePx2KkflnQUbUhNIA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js" integrity="sha512-d8F1J2kyiRowBB/8/pAWsqUl0wSEOkG5KATkVV4slfblq9VRQ6MyDZVxWl2tWd+mPhuCbpTB4M7uU/x9FlgQ9Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
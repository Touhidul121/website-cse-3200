<?php
session_start();
if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	//hashing the password
	$password = password_hash($password, PASSWORD_DEFAULT);

	try {
		$connection = mysqli_connect('localhost', 'root', '', 'website');

		if ($connection) {
			// check if email already exist
			$query = "SELECT * FROM user_info WHERE Email='$email'";
			$result = mysqli_query($connection, $query);
			if (mysqli_num_rows($result) > 0) {
				$_SESSION['error'] = "Email already exists";
			} else {
				$query = "INSERT into user_info (Username,Email,Password)";
				$query .= "Values ('$username','$email','$password')";
				$result = mysqli_query($connection, $query);
				$_SESSION['user_name'] = $username;
				echo "<script> window.location.href = 'index.php'; </script>";
			}
		}
	} catch (Exception $e) {
		$_SESSION['error'] = $e->getMessage();
	}
}
?>

<!DOCTYPE html>
<html>

<head>
	<title>SignUp</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="application/x-javascript">
		addEventListener("load", function() {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- Custom Theme files -->
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<!-- //Custom Theme files -->
	<!-- web font -->
	<link href="/css/Signup_page.css" rel="stylesheet">
	<!-- //web font -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
</head>

<body style="background-color:slategrey">
	<!-- main -->
	<div class="main-w3layouts wrapper">
		<h1>SignUp Form</h1>
		<div class="main-agileinfo">
			<div class="agileits-top">
				<form action="SIGHNUP_Page.php" method="post">
					<?php if (isset($_SESSION['error'])) { ?>
						<div class="alert alert-danger" role="alert">
							<?php echo $_SESSION['error']; ?>
						</div>
					<?php
						unset($_SESSION['error']);
					} ?>
					<input class="text" type="text" name="username" placeholder="Username" required="">
					<input class="text email" type="email" name="email" placeholder="Email" required="">
					<input class="text" type="password" name="password" placeholder="Password" required="">
					<input class="text w3lpass" type="password" name="password" placeholder="Confirm Password" required="">
					<div class="wthree-text">
						<label class="anim">
							<input type="checkbox" class="checkbox" required="">
							<span>I Agree To The Terms & Conditions</span>
						</label>
						<div class="clear"> </div>
					</div>
					<input type="submit" name='submit' value="SIGNUP">
				</form>
				<p>Don't have an Account? <a href="Login_Page.php"> Login Now!</a></p>
			</div>
		</div>
	</div>
	<!-- //main -->
</body>

</html>
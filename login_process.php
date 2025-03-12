<?php
session_start();
include("files/functions.php");
$username = $_POST['username'];
$password = $_POST['password'];
$u = get_user_by_username($conn, $username);
if (empty($u)) {
	echo "<script>alert('Invalid User name.);document.location.href='login.php'</script>";
	// message("Username does not exists on database", "danger");
	// header('location: login.php');
	die();
}

$hash = $u['password'];
if (password_verify($password, $hash)) {
	if ($u['block_status'] == 0) {
		// message("Your account was logged in successfully", "success");
		$_SESSION['user'] = $u;
		$d = date("Y-m-d");
		$update_lastseen = mysqli_query($conn, "UPDATE users set last_seen='$d' where username='$username'");
		header("Location:users/index.php");
		die();
	} else {
		echo "<script>alert('Your Account Was Blocked by the Admin,Please Contact for Further Procedures');document.location.href='login.php'</script>";
	// header('location: login.php');

		// message("Your Account Was Blocked by the Admin,Please Contact for Further Procedures ", "danger");
		// header('location: login.php');
	}
} else {
	echo "<script>alert('You entered wrong password.');document.location.href='login.php'</script>";
	// header('location: login.php');
	// message("You entered wrong password.", "danger");
	// header('location: login.php');
	die();
}

?>

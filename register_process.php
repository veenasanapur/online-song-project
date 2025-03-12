<?php
session_start();
include_once("files/functions.php");
$first_name=$_POST["first_name"];
        $last_name=$_POST["last_name"];
        $username=$first_name."_".$last_name;
        $email=$_POST["email"];
        $password=$_POST["password"];
        $phonenumber=$_POST["phonenumber"];
        $gender=$_POST["gender"];


//hashing the password
$password = password_hash($password, PASSWORD_DEFAULT);

$u  = get_user_by_username($conn, $username);
if (!empty($u)) {
	message("User with same username already exists on database", "danger");
	header("Location: login.php");
	die();
}

$last_seen = date('Y-m-d');
$reg_date =
	date('Y-m-d');
$set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
$code = substr(str_shuffle($set), 0, 12);
$sql_1 = "INSERT INTO users (
 				username,
 				last_seen,
 				password,
 				first_name, 
				last_name,
				email,
				phonenumber,
				gender,
				 block_status,
				 reg_date
				
				 
 				) VALUES (
 				'{$username}',
 				'{$last_seen}',
 				'{$password}',
 				'{$first_name}',
				'{$last_name}',
				'{$email}',
				'{$phonenumber}',
				'{$gender}',
				 '0',
				 '$reg_date'
 			)";
// 				 '{$gender}',
// '{$phonenumber}'
if ($conn->query($sql_1)) {
	$uid = mysqli_insert_id($conn);
	$u  = get_user_by_username($conn, $username);
	$subject = "Activate Account";
	$message = "
				<html>
				<head>
				<title>Verification Code</title>
				</head>
				<body>
				<h2>Thank you for Registering.</h2>
				<p>Your Account:</p>
				<p>Email: " . $username . "</p>
				<p>Please click the link below to activate your account.</p>
				<h4><a href='http://localhost/online_melody/activate.php?uid=$uid&code=$code'>Activate My Account</h4>
				</body>
				</html>
				";

	message("Your account was created successfully", "success");
	// $_SESSION['user'] = $u;
	header("Location: index.php");
	die();
} else {
	message("Something went wrong while creating your account. Please try again.", "danger");
	header("Location: login.php");
	die();
}

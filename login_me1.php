<!DOCTYPE html>
<html>
<head>
	<title>Songs Management</title>
<style>
		.container pt-2 pt-md-5{
			background-image: linear-gradient(to left, blue,rgb(0, 5, 19));}
		#login{
			position: absolute;
        display: flex;
        justify-content: center;
        align-items: center;
		left: 350px;
		top: 250px;
		border: 2px solid #fff;
		
    }
	
	#l{
		position: relative;
		top: -140px;
		left: 70px;
	}
	#myvideo{
position: fixed;
display: flex;
bottom: 0;
left: px;
/* right: .020px; */
top: 5px;
	width: 230vh;
	}
	.container pt-2 pt-md-5 tab{

	border: 3px solid black;
	}
</style>
	</head>
	<body>
	
	<?php
include 'files/header.php';

?>
<!-- <video autoplay muted loop id="myvideo"><source src="bg.mp4" type="video/mp4"></video> -->
<?php include 'nevbar.php'; ?>
<div class="container pt-2 pt-md-5 tab" id="tab" >
	
	<div class="row ml-5 mb-3">
		<div class="col-md-6 mt-2 " id="login">
			<h2 class="text-center text-dark mb-2" id="l">Login</h2>
			<form action="login_process.php" method="post">
				<div class="form-group">
					<label for="username">Email</label>
					<input type="text" class="form-control" id="username" name="username" placeholder="Enter Email"
					pattern="[A-Za-z._]{2,}" title="Only alphabets are accepted">
					
				</div>
				<div class="form-group">
					<label for="Password">Password</label>
					<input type="password" class="form-control" id="Password" name="password" placeholder="Password"
					pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="You have to make strong password">
					
				</div>
				

				
				<button type="submit" class="btn btn-primary float-right mt-2">Login</button>
				<div class="form-group">
					<span class="text-primary">New User?</span><a href="register.php">Click here to register</a>
				</div>
				<a class="btn btn-sm btn-primary " href="admin/">Admin</a>
				<!-- <div class="form-group"><a href="changepassword.php">Forget password</a>
</div> -->

			</form>
		</div>

	</div>
	
	
</div>
<!-- <?php require_once("files/footer.php"); ?> -->
</body>
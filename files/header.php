<!DOCTYPE html>
<html>
<head>
	<title>Songs Management</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/password.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<link rel="stylesheet" href="../users/addsongs.css">
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

	</style>

</head>

<body>
	<!-- Navbar -->
	<!-- <nav>
</nav>
	<div class="container">
		<p class="float-right m-3 font-weight-bold text-secondary"> <?php if (isset($_SESSION['user'])) echo $_SESSION['user']['username']; ?></p>
	</div> -->
	<?php if (isset($_SESSION['message'])) { ?>
		<div class="alert alert-<?= $_SESSION['message']['type'] ?>  m-3">
			<?php
			echo ($_SESSION['message']['body']);
			unset($_SESSION['message']);
			?>
		</div>
	<?php	} ?>
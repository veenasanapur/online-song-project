<style>
	body{
		background: url('../img/bg15.jpg');
		background-size: cover;

	}
	#btn{
		color:white;
		font-size: 18px;
		background:linear-gradient(119deg, #FF3CAC 0%, #8604f9 50%, #0293fa 100%); 
		border:none;
	}
	#btn:hover{
            -webkit-text-fill-color:black;
	}
	#artist_photo::-webkit-file-upload-button{
		background: #00000080;
		color: white;
		border: none;

	}
	#cunt{
		margin-left: 290px;
	}
</style>
<body>
<?php
include '../files/header.php';
include 'nevbar.php';

include '../files/functions.php';

if (isset($_SESSION['user'])) {

	$user_id = $_SESSION['user']['user_id'];
} else {
	header("Location: login.php");
	die();
}

if (isset($_POST['artist_name'])) {
	$file_name = "";

	if (isset($_FILES['artist_photo']['error'])) {
		if ($_FILES['artist_photo']['error'] == 0) {

			$target_dir = "../uploads/";

			$file_name = time() . "_" . rand(100000, 10000000) . rand(100000, 10000000) . "_" . $_FILES["artist_photo"]["name"];

			$file_name = str_replace(" ", "_", $file_name);


			$source = $_FILES["artist_photo"]["tmp_name"];
			$destinatin = $target_dir . $file_name;

			if (move_uploaded_file($source, $destinatin)) {
			} else {
				$file_name = "";
			}
		}
	}

	$artist_name = strtolower($_POST['artist_name']);
	$artist_biography = $_POST['artist_biography'];
	$test = mysqli_query($conn, "SELECT * from artist where lower(artist_name) ='$artist_name' and user_id = '$user_id'");
	if (mysqli_num_rows($test) > 0) {
	} else {
		$SQL = "INSERT INTO artist(artist_name,artist_biography,artist_photo,user_id)
			VALUES('{$artist_name}','{$artist_biography}','{$file_name}',{$user_id})";
	}
	$m = mysqli_num_rows($test);
	if ($conn->query($SQL)) {
		echo "<script>alert('artist added');document.location.href='admin_artist.php'</script>";
		// message("$m New artist was created successfully.", "success");
	} else {
		message(" Artist Already Added.", "warning");
	}

	header("Location: admin_artists.php");
	die();
}

?>

<!-- 
 			artist_details 	

 -->
<div class="container col-md-8" id="cunt" >


	<div class="row pl-0" style="margin:150px 100px 100px 50px;">
		<!-- <?php include 'files/admin_side_bar.php'; ?> -->
		<div class="col-md-20" style="color:white;background: #00000040;
		backdrop-filter: blur(15px);
		border-radius: 25px; border: 1px solid white; padding:25px 50px;">
			<h2 style="padding-top:25px">Adding new artist</h2>

			<form method="post" action="" enctype="multipart/form-data">
				<div class="row">
					<div class="col">
						<label for="artist_name" style="padding:5px;font-size: 20px;">Artist name</label>
						<input type="text" name="artist_name" class="form-control" id="artist_name" aria-describedby="emailHelp" placeholder="Enter artist name" style="background: #00000064;color:white;border-radius:10px;border:none" required>
					</div>
					<div class="col">
						<label for="artist_photo" style="padding:5px;font-size: 20px;">Artist photo</label>
						<input type="file" accept=".png,.jpg,.jpeg,.gif" name="artist_photo" class="form-control" id="artist_photo" style="background: #00000064;color:white;border-radius:10px;border:none" required>
					</div>

				</div>
				<div class="form-group">
					<label for="artist_biography" style="padding:5px;font-size: 20px;">Artist biography</label>
					<textarea name="artist_biography" class="form-control" id="artist_biography" style="background:#00000064;color:white;border-radius:10px;border:none" required></textarea>
				</div>

				<button type="submit" class="float-right mt-md-3 btn btn-lg btn-dark" id="btn" style=""><b>Add new artist</b></button>

			</form>

		</div>
	</div>

</div>
</body>
<!-- 
<?php require_once("files/footer.php"); ?> -->
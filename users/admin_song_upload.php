<style>
	body{
		background: url('../img/bg7.jpg');
		background-size: cover;
	}
	#btn{
		color:white;
		font-size: 18px;
		background:linear-gradient(119deg, #FF3CAC 0%, #8604f9 50%, #0293fa 100%); 
		border:none;
	}
	#btn:hover{
            -webkit-text-fill-color: black;
	}
	#file::-webkit-file-upload-button{
		background: #00000080;
		color: white;
		border: none;

	}
	.box{

		color:white;
		background: #00000030;
		backdrop-filter: blur(15px);
		border-radius: 25px;
		 border: 1px solid white; 
		 padding:25px 50px;
		 margin-top:120px
	}

</style>
<body>
	<?php
	include '../files/functions.php';
	include '../files/header.php';
	include 'nevbar.php';


	if (isset($_SESSION['user'])) {
	} else {
		header("Location: login.php");
		die();
	}
	$user_id = $_SESSION['user']['user_id'];
	if (isset($_POST['song_name'])) {
		$file_name = "";

		$song_photo = "";
		$song_mp3 = "";
		print_r($_FILES['song_photo']);
		if (isset($_FILES['song_photo']['error'])) {
			if ($_FILES['song_photo']['error'] == 0) {

				$target_dir = "../uploads/";

				$song_photo = time() . "_" . rand(100000, 10000000) . rand(100000, 10000000) . "_" . $_FILES["song_photo"]["name"];

				$song_photo = str_replace(" ", "_", $song_photo);
				$song_photo = urlencode($song_photo);


				$source = $_FILES["song_photo"]["tmp_name"];
				$destinatin = $target_dir . $song_photo;

				if (move_uploaded_file($source, $destinatin)) {
				} else {
					$song_photo = "";
				}
			}
		}


		if (isset($_FILES['song_mp3']['error'])) {
			if ($_FILES['song_mp3']['error'] == 0) {

				$target_dir = "../uploads/";

				$song_mp3 = time() . "_" . rand(100000, 10000000) . rand(100000, 10000000) . "_" . $_FILES["song_mp3"]["name"];

				$song_mp3 = str_replace(" ", "_", $song_mp3);
				$song_mp3 = urlencode($song_mp3);


				$source = $_FILES["song_mp3"]["tmp_name"];
				$destinatin = $target_dir . $song_mp3;

				if (move_uploaded_file($source, $destinatin)) {
				} else {
					$song_mp3 = "";
				}
			}
		}

		$song_date = time();

		$song_name = $_POST['song_name'];
		$aritst_id = $_POST['aritst_id'];
		$songtype_id = $_POST['type_id'];

		$verify = 0;
		$SQL = "INSERT INTO songs(
						song_mp3,song_photo,aritst_id,song_name,verify,user_id,`type_id`
					)VALUES(
						'$song_mp3','$song_photo','$aritst_id','$song_name','$verify','$user_id','$songtype_id'
					)
				";

		if ($conn->query($SQL)) {
			echo "<script>alert('New song was uploaded successfully.');constcurrentUrl=document.manage_songs,php</script>";
			// message("New song was uploaded successfully.", "success");
		} else {
			$er = mysqli_error($conn);
			message($er . "Something went wrong while uploading New song.", "warning");
		}

		header("Location: admin_songs.php");
		die();
	}

	$artists = get_all_artists($conn, $user_id);
	?>
	<?php require_once("../files/header.php"); ?>

	<div class="container col-md-8 cont">

			<div class="col-md-20 box">
				<h2 style="padding-top:25px">Uploading new song</h2>

				<form method="post" action="admin_song_upload.php" enctype="multipart/form-data" >
					<div class="row" >
						<div class="col" >
							<label for="song_name" style="padding:5px;font-size: 20px;">Song name</label>
							<input type="text" name="song_name" class="form-control" id="song_name"
							placeholder="Enter song name"
							style="background: #00000064;color:white;border-radius:10px;border:none" required>
						</div>


						<div class="col" >
							<label for="aritst_id" style="padding:5px;font-size: 20px;">Artist name</label>
							<select name="aritst_id" required class="form-control"
							style="background: #00000064;color:white;border-radius:10px;border:none">
								<option style="background: black;" value="" required>Artist</option>
								<?php foreach ($artists as $key => $a): ?>
									<option style="background: black;" value="<?php echo $a['artist_id']; ?>"><?php echo $a['artist_name']; ?></option>
								<?php endforeach ?>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="col" >
							<label for="type_id"style="padding:5px;font-size: 20px;">Genre</label>
							<select class="form-control" required id="type_id" name="type_id"
							style="background: #00000064;color:white;border-radius:10px;border:none">
								<option value="" selected  style="background: black;" required >SELECT </option>
								
								<option value="movies" style="background: black;">Movies</option>
								<option value="pop" style="background: black;">Pop</option>
								<option value="rock" style="background: black;">rock</option>
								<option value="Melody" style="background: black;">Melody</option>
							</select>

						</div>
						<div class="col">
							<label for="song_photo" style="padding:5px;font-size: 20px;">Song photo</label>
							<input type="file" name="song_photo" class="form-control customfile" id="file" id="song_photo"
							style="background: #00000064;color:white;border-radius:10px;border:none " required>
						</div>
					</div>



					<div class="row">
						<div class="col">
							<label for="song_mp3" style="padding:5px; font-size: 20px;">Song mp3</label>
							<input type="file" accept=".mp3" name="song_mp3" class="form-control" id="file" id="song_mp3"
							style="background: #00000064;color:white;border-radius:10px;border:none" required>
						</div>
										
					</div>
					<button type="submit" class="float-right mt-md-3 btn btn-lg btn-primary" id="btn"><b>Add
							new song</b></button>

				</form>

			</div>
		</div>

	</div>



	<script>
		$('#type_id').change(function () {
			var type = $(this).val();
			if (type == 'others')
				$('#txt_type_id').prop('hidden', false);
			else
				$('#txt_type_id').prop('hidden', true);
		})
	</script>
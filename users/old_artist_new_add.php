


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
print_r($_FILES['artist_photo']);
	if (isset($_FILES['artist_photo']['error'])) {
        echo "<script>alert('error');</script>";
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
        echo "<script>alert('Name Already Exist');</script>";
	} else {
		$SQL = "INSERT INTO artist(artist_name,artist_biography,artist_photo,user_id)
			VALUES('{$artist_name}','{$artist_biography}','{$file_name}',{$user_id})";
            $m = mysqli_num_rows($test);
            if ($conn->query($SQL)) {
                message("$m New artist was created successfully.", "success");
            } else {
                message("Artist Already Added.", "warning");
            }
        
            header("Location:admin_artists.php");
            die();
	}
	
}

?>
 
<div class="container">


	<div class="row pl-0">
		<!-- <?php include 'files/admin_side_bar.php'; ?> -->
		<div class="col-md-8">
			<h2>Adding new artist</h2>

			<form method="post" action=""  enctype="multipart/form-data">
				<div class="row">
					<div class="col">
						<label for="artist_name">Artist name</label>
						<input type="text" name="artist_name" class="form-control" id="artist_name" aria-describedby="emailHelp" placeholder="Enter artist name">
					</div>
					<div class="col">
						<label for="artist_photo">Artist photo</label>
						<input type="file" accept=".png,.jpg,.jpeg,.gif" name="artist_photo" class="form-control" id="artist_photo" placeholder="Enter email">
					</div>

				</div>
				<div class="form-group">
					<label for="artist_biography">Artist biography</label>
					<textarea name="artist_biography" class="form-control" id="artist_biography"></textarea>
				</div>

				<button type="submit" class="float-right mt-md-3 btn btn-lg btn-dark">Add new artist</button>

			</form>

		</div>
	</div>

</div>


<!-- <?php require_once("files/footer.php"); ?> -->
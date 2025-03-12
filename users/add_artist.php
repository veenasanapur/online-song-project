
<!DOCTYPE html>
<html>
<head>
	

</head>
<?php
include '../files/header.php';
include 'nevbar.php';

include '../files/functions.php';
if (isset($_SESSION['user'])) {

	$user_id = $_SESSION['user']['user_id'];
} else {
	header("Location: ../login.php");
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

    <section>
        
        <div class="container">
            <div class="logo">
                <img src="../logo2.png" alt="">
            </div> 

            <h1 class="form-title">Add songs</h1>
            <form action="" enctype="multipart/form-data" method="post">
                <div class="main-user-info">

                    <div class="user-input-box">
                        <label for="artist_name">Artist_name</label>
                        <input type="text" id="artist_name" name="artist_name" placeholder="Enter artist_name" required />
                    </div>

                    <div class="user-input-box">
                        <label for="artist_biography">Artist_biography</label>
                        <textarea id="artist_biography" name="artist_biography" placeholder="Enter Artist_biography"></textarea>
                    </div>

                    <div class="user-input-box">
                        <label for="artist_details">Artist_details</label>
                        <input type="text" id="artist_details" name="artist_details" placeholder="Enter artist_details"  />
                    </div>

                    <div class="user-input-box">
                        <label for="artist_photo">Artist_photo</label>
                        <input type="file" id="artist_photo" name="artist_photo" required />
                    </div>

                    <!-- <div class="user-input-box">
                        <label for="user_id">User_id</label>
                        <input type="text" id="user_id" name="user_id" />
                    </div> -->

                </div>
                <div class="form-submit-btn">
                    <input type="submit" name="submit" value="Submit">
                </div>

            </form>
        </div>
    </section>

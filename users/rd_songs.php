<body style="background-color:black;">
<?php
include '../files/functions.php';
include '../files/header.php';
include 'nevbar.php';
if (isset($_SESSION['user'])) {
	//echo("<pre>Logged in");
	//print_r($_SESSION['user']); 
} else {
	header("Location: login.php");
	die();
}
$user_id = $_SESSION['user']['user_id'];

$songs = mysqli_query($conn, "SELECT * FROM artist,songs
			WHERE
				songs.aritst_id = artist.artist_id and songs.user_id = '$user_id' and songs.verify = '1'
			ORDER BY artist_name ASC");
?>
<div class="container">

<div class="row">

    <div class="col-md-8" style="color:white;">
        <h2>All Songs</h2>

        <a href="admin_song_upload.php" class="btn btn-dark float-right mt-md-3 mb-md-3" style="background:linear-gradient(119deg, #FF3CAC 0%, #8604f9 50%, #0293fa 100%);">
            Add new song
        </a>
        <ul class="list-group mt-md-3" style="background-color: rgb(15,15,15);">
			<li class="list-group-item" style="background-color: rgb(15,15,15); color:white; margin-bottom:-20px" >
				<h2 class="display-4">All Songs</h2>
			</li>





        </div>
	</div>

</div>


					</body>
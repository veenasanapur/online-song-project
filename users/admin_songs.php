<head>
	<style>
		.btn:hover{

            -webkit-text-fill-color: white;
		}
	
	</style>
</head>

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


	<div class="container" style="max-width: 100%;">

		<div class="list-group mt-md-3">

			<div class="list-group-item" style="color:white;background-color:black; margin:10px">
				<h2><b>All Songs</b></h2>

				<a href="admin_song_upload.php" class="btn btn-dark float-right mt-md-3 mb-md-3" i
					style="color:black;background:linear-gradient(119deg, #FF3CAC 0%, #8604f9 50%, #0293fa 100%);font-size18px; border:none">
					<b>Add new song</b>
				</a>
				
					<table class="table table" style="border:black; border-width:5px solid black; font-size:18px;">
						<thead class="thead-dark" style="background-color: rgb(15,15,15); color:white; font-size:25px;">
							<tr>
								<th scope="col" style="width: 15%;">Profile</th>
								<th scope="col" style="width: 10%;">Song Title</th>
								<th scope="col" style="width: 10%;">Artist</th>
								<th scope="col" style="width: 20%;" >Action</th>
							</tr>
						</thead>
						<tbody class="tab" style=" background-color: rgb(28,28,28);color:white;">
							<?php foreach ($songs as $key => $a): ?>
								<tr>
									<th scope="row"><img class="img-fluid rounded" width="100%"
											src="../uploads/<?php echo $a['song_photo']; ?>" alt=""></th>
									<td>
										<?php
										echo $a['song_name'];
										?>
									</td>
									<td>
										<?php
										echo $a['artist_name'];
										?>
									</td>
									<td>
										<div class="btn-group btn-group-sm" >
											<a target="_blank" href="play.php?song=<?php echo ($a['song_id']); ?>"
												title="<?php echo $a['song_name']; ?> By <?php echo $a['artist_name']; ?>"
												class="btn btn-primary">View</a>
											<a href="admin_edit_song.php?song_id=<?php echo ($a['song_id']); ?>"
												class="btn btn-dark" title="">Edit</a>
											<a href="admin_delete_process.php?song_id=<?php echo ($a['song_id']); ?>"
												class="btn btn-danger" title="">Delete</a>
										</div>
									</td>
								</tr>
							<?php endforeach ?>
						</tbody>
					</table>
				</div>


			</div>
		</center>
		</div>

	</div>


</body>
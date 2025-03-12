<head>
	<style>
		#btn:hover{
            -webkit-text-fill-color: white;
	}

	</style>
</head>
<body style="background-color:black;">
<?php
include '../files/header.php';
include 'nevbar.php';
// if (isset($_SESSION['user'])) {
// 	//echo("<pre>Logged in");
// 	//print_r($_SESSION['user']); 
// } else {
// 	header("Location: login.php");
// 	die();
// }
include '../files/functions.php';
$user_id = $_SESSION['user']['user_id'];
$artists = get_all_artists($conn, $user_id);
?>
<?php require_once("../files/header.php"); ?>

<div class="container" style="width:100%">


	<div class="list-group mt-md-3">
		<!-- <?php include '../files/admin_side_bar.php'; ?> -->
		<div class="list-group-item" style="background-color:black;">
			<h2 style="color:white;">All Artists</h2>

			<a href="artist_new_add.php" class="btn float-right mt-md-3 mb-md-3 add-btn" id="btn"style="color:black;background:linear-gradient(119deg, #FF3CAC 0%, #8604f9 50%, #0293fa 100%); border:none">
				<b>Add new artist</b>
			</a>

			<table class="table table" style="border:black; background-color: rgb(28,28,28);color:white;">
				<thead class="thead-dark"style="background-color: rgb(15,15,15); color:white; font-size:25px;">
					<tr>
						<th scope="col" style="width: 15%;">Profile</th>
						<th scope="col">Name</th>
						<th scope="col" style="width: 20%;">Action</th>
					</tr>
				</thead>
				<tbody  >
					<?php foreach ($artists as $key => $a) : ?>
						<tr >
							<th scope="row"><img class="img-fluid rounded " width="100%" src="../uploads/<?php echo $a['artist_photo']; ?>" alt=""></th>
							<td> <?php
								echo $a['artist_name'];
								?></td>
							<td>
								<div class="btn-group btn-group-sm">
									<a href="artist.php?artist_id=<?php echo $a['artist_id'] ?>" class="btn btn-primary" title="">View</a>

									<a href="admin_artist_delete.php?artist_id=<?php echo $a['artist_id'] ?>" class="btn btn-danger" title="">Delete</a>
								</div>
							</td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>



		</div>
	</div>

</div>
</body>

<!-- <?php require_once("files/footer.php"); ?> -->
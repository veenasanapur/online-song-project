<style>
	#btn:hover{
		-webkit-text-fill-color:white;
            /* -webkit-text-fill-color: rgba(255, 255, 255, 0.747); */
	}
</style>
<body style="background:black;">
<?php
include '../files/functions.php';
include '../files/header.php';
include 'nevbar.php';

if (!isset($_SESSION['user'])) {
	message("Login before you play a song.", "info");
	header("Location: login.php");
	die();
}




$user_id = $_SESSION['user']['user_id'];
if (isset($_GET['song']))
	$song_id = $_GET['song'];
record_view($conn, $song_id, $user_id);





require_once("../files/header.php");

$song = $_GET['song'];
$s = get_top_song_by_song_id($conn, $song);
$artist_id = $s['artist_id'];
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script>
	$(function() {
		var songid = $('#song_id').val();
		var user = $('#user').val();
		console.log(songid);
		console.log(user);
		$('#dislikedbody').prop("hidden", true);
		$('#likedbody').prop("hidden", false);

		$('#liked').click(function() {
			// x.classList.toggle("fa-thumbs-down");
			$('#dislikedbody').prop("hidden", false);
			$('#likedbody').prop("hidden", true);

			$.ajax({
				url: 'likes.php',
				type: 'post',
				data: {
					'liked': 1,
					'songid': songid,
					'user_id': user
				},
				cache: false,
				success: function(dataResult) {
					var dataResult = JSON.parse(dataResult);
					if (dataResult.statusCode == 200) {
						//	$("#butsave").removeAttr("disabled");
						//	$('#fupForm').find('input:text').val('');
						// $("#success").show();
						// $('#success').html('Data added successfully !');
					} else if (dataResult.statusCode == 201) {
						alert("Error occured !");
					}

				}
			});
		});

		$('#disliked').click(function() {
			// x.classList.toggle("fa-thumbs-down");
			$('#dislikedbody').prop("hidden", true);
			$('#likedbody').prop("hidden", false);
			$.ajax({
				url: 'likes.php',
				type: 'post',
				data: {
					'liked': 2,
					'songid': songid,
					'user_id': user
				},
				cache: false,
				success: function(dataResult) {
					var dataResult = JSON.parse(dataResult);
					if (dataResult.statusCode == 200) {
						//	$("#butsave").removeAttr("disabled");
						//	$('#fupForm').find('input:text').val('');
						// $("#success").show();
						// $('#success').html('Data added successfully !');
					} else if (dataResult.statusCode == 201) {
						alert("Error occured !");
					}

				}
			});
		});

	});
</script>
<!-- 
  [artist_id] => 4
    [artist_name] => Sheebah Karungi
    [artist_biography] => Sheebah Karungi is a Ugandan recording artist
    [artist_details] => 
    [artist_photo] => 1592129479_31892627593739_howwebiz_88e723f97cde9c8b7eb0aaaabcacbe51_1464525504_cover.jpg
    [song_id] => 8
    [song_mp3] => 1593507781_25997519201764_Harmonize_&_Sheebah_-_Follow_Me.mp3
    [song_photo] => 1593507781_69484951915618_shebah.png
    [song_date] => 
    [aritst_id] => 4
    [song_name] => Follow Me
    [view_count] => 0
    [download_count] => 0
 -->
<div class="container">
	<ul class="list-group mt-md-3" >
		<li class="list-group-item"style="background-color:rgb(15,15,15); color:white;">
			<h2 class="display-4"><?php echo $s['song_name']; ?></h2>
		</li>
		<li class="list-group-item" style="background-color:rgb(28,28,28); color:white; border-bottom: 1px solid black; border-top: 1.8px solid  black;">
			<div class="row">
				<div class="col-md-2">
					<img class="img-fluid rounded" src="../uploads/<?php echo $s['song_photo']; ?>" alt="">
				</div>
				<div class="col-md-4">
					<div class="row">
						<div class="col-12">
							<b>Song Title:</b> <?php echo $s['song_name']; ?>
						</div>
						<div class="col-12">
							<b>Artist: </b>
							<a class="text-white" href="artist.php?artist_id=<?= $s['artist_id'] ?>" title="<?= $a['artist_name'] ?>">
								<?php echo $s['artist_name']; ?>
							</a>
						</div>
						<div class="col-12">
							<b>Views: </b> <?php echo $s['view_count']; ?>
						</div>
						<div class="col-12">
							<b>Downloads: </b> <?php echo $s['download_count']; ?>
						</div>
						<input type="hidden" value="<?php echo $s['song_id'] ?>" name="" id="song_id">

						<input type="hidden" value="<?php echo $user_id ?>" name="" id="user">

						<div class="col-12">
							<?php
							if (check_likes($conn, $user_id, $song_id)) { ?>
								<span>liked</span>
							<?php
							}
							?>
							<span id="likedbody"><a href="#" id="liked" class="fa fa-thumbs-up"></a></span>
							<span id="dislikedbody"><a href="#" id="disliked" class="fa fa-thumbs-down"></a></span>
						</div>
					</div>
				</div>
				<div class="col-md-4" >
					<audio controls  id="con">
						<source src="horse.ogg" type="audio/ogg">
						<source src="../uploads/<?php echo $s['song_mp3']; ?>" type="audio/mpeg">
						Your browser does not support the audio element.
					</audio>
					<p id="success"></p>
				</div>
				<div class="col-md-2">
					<a class="btn btn-dark btn-block ml-4" id="btn" style="color:black;background:linear-gradient(119deg, #FF3CAC 0%, #8604f9 50%, #0293fa 100%);" target="_blank" href="download.php?song=<?= $song_id ?>"><b>Download Mp3</b></a>
				</div>
			</div>
		</li>




	</ul>







	<!-- Latest songs -->
	
<!-- <?php require_once("files/footer.php"); ?> -->
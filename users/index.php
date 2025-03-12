<head>
	<style>
#preloder{
            
            background-size: 15%;
            height: 100vh;
            width: 100%;
            position: fixed;
            z-index: 100;
            top: 0%;
            background-blend-mode: lineardodge;
         }
            
       
</style>
		</head>

<body style="background-color: black;">
<div class="" id="preloder">
    
    </div>
<?php
include '../files/functions.php';
include '../files/header.php';
include 'nevbar.php';
// require_once("files/header.php");
// include 'users/log_out_nevbar.php';

$top_songs = get_top_songs($conn);

?>
<div class="container">
	<?php
	if (isset($_POST['search'])) {
		
		$ssongs = get_searched_songs($conn, $_POST['search_text']);
		if ($ssongs != false) {

	?>
			<div class="row mt-4 mb-2">
				<div class="col">
					<p class="h4 ">Results of Search : <?php echo $_POST['search_text']  ?></p>
				</div>
			</div>
			<hr>
			<ul class="list-group mt-md-3 table">
				<li class="list-group-item">
					<?php
					$c = 0;
					foreach ($ssongs as $key => $s) :

						$c++;
					?>
				<li class="list-group-item">
					<div class="row">
						<div class="col">
							<img class="img-fluid rounded" width="100" src="../uploads/<?php echo $s['song_photo']; ?>" alt="">
						</div>
						<div class="col">
							<div class="row">
								<div class="col-12">
									<?php echo $s['song_name']; ?>
								</div>
								<div class="col-12">
									<?php echo $s['artist_name']; ?>
								</div>
							</div>
						</div>
						<div class="col">
							<div class="col">
								<div class="row">
									<div class="col-12">
										<?php echo $s['download_count']; ?> Downloads
									</div>
									<div class="col-12">
										<?php echo $s['view_count']; ?> Views
									</div>
									<div class="col-12">
										Uploaded by : <?php $sqll = mysqli_query($conn, "SELECT first_name,last_name from users where user_id='" . $s['user_id'] . "'");
														$res = $sqll->fetch_assoc();
														$name = $res['first_name'] . " " . $res['last_name'];
														echo $name;
														?>
									</div>
									<div class="col-12">
										<?php echo get_likes($conn, $s['song_id']); ?> <i href="#" id="liked" class="fa fa-thumbs-up"></i>
									</div>
								</div>
							</div>
						</div>
						<div class="col text-center">
							gfd
							<a href="play.php?song=<?php echo ($s['song_id']); ?>" title=""><img class="img" width="100" src="../play.png" alt="nfg"></a>
						</div>
					</div>
				</li>


		<?php endforeach;
				} else {
					?><div class='container'><div class='row'><p class='h4 offset-1 text-dark m-4'>OOPs!! No songs Found</div></div>
					<hr>
				<?php }
			} else {


		?>
		<ul class="list-group mt-md-3" style="background-color: rgb(15,15,15);">
			<li  style="background-color: rgb(15,15,15); color:white" class="list-group-item">
				<h2 class="display-4">TOP 10 Hits</h2>
			</li>


			<?php $i = 0;
				foreach ($top_songs as $key => $s) :
					if ($i > 9)
						break;

					$i++;
			?>
								<li style="background-color:rgb(28,28,28); color:white; border-bottom: 1px solid black; border-top: 1.8px solid  black;" class="list-group-item">
					<div class="row">
						<div class="col">
							<img class="img-fluid rounded" width="100" src="../uploads/<?php echo $s['song_photo']; ?>" alt="">
						</div>
						<div class="col">
							<div class="row">
								<div class="col-12">
									<?php echo $s['song_name']; ?>
								</div>
								<div class="col-12">
									<?php echo $s['artist_name']; ?>
								</div>
							</div>
						</div>
						<div class="col">
							<div class="col">
								<div class="row">
									<div class="col-12">
										<?php echo $s['download_count']; ?> Downloads
									</div>
									<div class="col-12">
										<?php echo $s['view_count']; ?> Views
									</div>
									<div class="col-12">
										Uploaded by : <?php $sqll = mysqli_query($conn, "SELECT first_name,last_name from users where user_id='" . $s['user_id'] . "'");
														$res = $sqll->fetch_assoc();
														$name = $res['first_name'] . " " . $res['last_name'];
														echo $name;
														?>
									</div>
									<div class="col-12">
										<?php echo get_likes($conn, $s['song_id']); ?> <i href="#" id="liked" class="fa fa-thumbs-up"></i>
									</div>
								</div>
							</div>
						</div>
						<div class="col text-center">
							<a href="play.php?song=<?php echo ($s['song_id']); ?>" title=""><img width="60" class="mt-3" src="../img/play.png" alt=""></a>
						</div>
					</div>
				</li>


			<?php endforeach ?>

		</ul>



		<!-- Artists -->







		<!-- Latest songs -->
	<?php
			}
	?>
</div>
<script>
    var loader = document.getElementById("preloder");
    window.addEventListener("load",function(){
        loader.style.display="none";
    })
</script>
		</body>

<!-- <?php require_once("files/footer.php"); ?> -->
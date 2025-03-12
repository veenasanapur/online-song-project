
<!DOCTYPE html>
<html>
<head>
	<style>
	#btn:hover{
		-webkit-text-fill-color:white;
            /* -webkit-text-fill-color: rgba(255, 255, 255, 0.747); */
	}
</style>
</head>
<body style="background:black;">
<?php
include '../files/header.php';
include 'nevbar.php';

	
	
	if(!isset($_GET['artist_id'])){
		header("Location: ../index.php");
		die();
	} 

	include '../files/functions.php'; 
	$artist_id = $_GET['artist_id'];
	$artist = get_artist_by_artist_id($conn,$artist_id);
   
	require_once("../files/header.php"); 
 	

?> 
<!-- 
    [artist_id] => 7
    [artist_name] => Apass
    [artist_biography] => Alexander Bagonza, better known by his stage 
    [artist_details] => 
    [artist_photo] => 1593167348_9697153643255_song_pic_(1).png
 -->
<div class="container">  
	<ul class="list-group mt-md-3">
	  <li class="list-group-item" style="background-color:rgb(15,15,15); color:white;">
	  	<h2 class="display-4"><?php echo $artist['artist_name']; ?></h2>
	  </li>
  		  <li class="list-group-item" style="background-color:rgb(28,28,28); color:white; border-bottom: 1px solid black; border-top: 1.8px solid  black;">
		  	<div class="row">
		  		<div class="col-md-6">
		  			<img class="img-fluid rounded"  src="../uploads/<?php echo $artist['artist_photo']; ?>" alt="">
		  		</div>
		  		<div class="col-md-6">
		  			<div class="row">
		  				<div class="col-12">
		  					<b>Artist name:</b> <?php echo $artist['artist_name']; ?>
		  				</div>
		  				<div class="col-12 ">
		  					<b>Biography:</b> <?php echo $artist['artist_biography']; ?>
		  				</div>  
		  			</div>
		  		</div>  
		  	</div>
		  </li>


	
 
	</ul>


 




	<!-- Latest songs -->
	<ul class="list-group mt-md-3">
	  <li class="list-group-item"style="background-color:rgb(15,15,15); color:white;">
		<h2 class="display-4">Songs by <b><?php echo $artist['artist_name']; ?></b></h2>
	  </li>
	 <li class="list-group-item"style="background-color:rgb(28,28,28); color:white;">


	 <!-- Laetset songs -->
	 <div class="row">

	  	<?php 
		  	$latest_songs = get_by_artist_id($conn,$artist_id);

		  	if(empty($latest_songs)){ ?>

		  			<div class="col-12">
		  				<div class="jumbotron">
			  				<h2>Ooopps!</h2>
			  				<hr>
			  				<p>This artist has no song yet!</p>
			  				<a href="index.php" class="btn btn-dark mt-3 mb-4 float-right" title="">Browse All Songs</a>
			  			</div>
		  			</div>

		  	<?php }else{
		  		$i = 0; foreach ($latest_songs as $key => $s): 
			  	if($i>5)
			  		break;
			  	$i++; ?>

				 	<div class="col-6 col-md-2 rounded mt-3">
				 		<a href="play.php?song=<?php echo($s['song_id']); ?>" title=""><img class="img-fluid rounded"   src="../uploads/<?php echo $s['song_photo']; ?>" alt=""></a>
				 	</div>

		 		<?php endforeach ?>
		 <?php } ?>
	 </div>

	</li>

	</ul>


</div>


<!-- <?php require_once("files/footer.php"); ?>  -->
</body>
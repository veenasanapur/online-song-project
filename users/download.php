<head>
<style>
	#btn:hover{
		-webkit-text-fill-color:white;
	}
</style>

</head>


<body style=" background-color: black;">
  <?php

  include '../files/functions.php';
  require_once("../files/header.php");
  include 'nevbar.php';

  if (!isset($_SESSION['user'])) {
    message("Login before you play a song.", "info");
    header("Location: login.php");
    die();
  }




  $user_id = $_SESSION['user']['user_id'];
  $song_id = $_GET['song'];
  record_dowload($conn, $song_id, $user_id);


  $song = $_GET['song'];
  $s = get_top_song_by_song_id($conn, $song);
  ?>
  <!-- 
  [artist_id] => 4
    [artist_name] => Sheebah Karungi
    [artist_biography] => Sheebah Karungi is a Ugandan recording artist
    [artist_details]  => 
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
    <ul class="list-group mt-md-3">
      <li class="list-group-item" style="background-color:rgb(15,15,15); color:white;">
        <h2 class="display-4"><b>Download</b>
          <?php echo $s['song_name']; ?> <b>By</b>
          <?php echo $s['artist_name']; ?>
        </h2>
      </li>
      <li class="list-group-item"
        style="background-color:rgb(28,28,28); color:white; border-bottom: 1px solid black; border-top: 1.8px solid  black;">
        <div class="row">
          <div class="col-md-2">
            <img class="img-fluid rounded" src="../uploads/<?php echo $s['song_photo']; ?>" alt="">
          </div>
          <div class="col-md-4">
            <div class="row">
              <div class="col-12">
                <b>Song Title:</b>
                <?php echo $s['song_name']; ?>
              </div>
              <div class="col-12">
                <b>Artist: </b>
                <a class="text-white" href="artist.php?artist_id=<?= $s['artist_id'] ?>"
                  title="<?= $a['artist_name'] ?>">
                  <?php echo $s['artist_name']; ?>
                </a>
              </div>
              <div class="col-12">
                <b>Views: </b>
                <?php echo $s['view_count']; ?>
              </div>
              <div class="col-12">
                <b>Downloads: </b>
                <?php echo $s['download_count']; ?>
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
            <div class="col-md-6">
            <a class="btn btn-dark btn-block ml-4" id="btn" style="color:black;background:linear-gradient(119deg, #FF3CAC 0%, #8604f9 50%, #0293fa 100%);border:none" href="../uploads/<?php echo $s['song_mp3']  ?>" download=<?php echo $s['song_name']; ?>><b>Download Mp3</b></a>
            </div>
          </div>
      

    </ul>
  </div>

  <!-- <?php require_once("files/footer.php"); ?> -->
</body
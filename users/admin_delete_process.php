<?php
session_start();
include '../files/functions.php';
if (isset($_GET['song_id'])) {
	$song_id = $_GET['song_id'];
	$song =  get_top_song_by_song_id($conn, $song_id);
	$song_photo = "uploads/" . $song['song_photo'];

	//deleting a song photo
	if (file_exists($song_photo)) { // checking if a file exists before I delete
		unlink($song_photo); //Delete a file
	}

	//Deleting a song file
	$song_mp3_location = "uploads/" . $song['song_mp3'];
	if (file_exists($song_mp3_location)) { // checking if a file exists before I delete
		unlink($song_mp3_location); //Delete a file 
	}

	$sql = "DELETE FROM downloads WHERE song_id  = {$song_id}";
	$conn->query($sql);

	$sql = "DELETE FROM views WHERE song_id  = {$song_id}";
	$conn->query($sql);

	$sql = "DELETE FROM songs WHERE song_id  = {$song_id}";
	if ($conn->query($sql)) {
		echo "<script>alert('The song was deleted successfully.');document.location.href='admin_songs.php'</script>";
		// message("The song was deleted successfully.", "success");
	} else {
		message("Something went wrong while deleting the song.", "danger");
	}
	header("Location: admin_songs.php");
	die();
}
if (isset($_GET['music'])) {
	$music_id = $_GET['music'];
	$sql = "DELETE FROM songs WHERE id  = {$music_id}";
	$conn->query($sql);
	if ($conn->query($sql)) {

		echo "<script>alert('was deleted successfully.');document.location.href='add_songs.php'</script>";;
		// message("The Karoke Music was deleted successfully.", "success");
	} else {
		message("Something went wrong while deleting the song.", "danger");
	}
	header("Location: karoke_music.php?op=view");
	die();
}

<?php
session_start();
error_reporting(0);
include('includes/db.php');
if (strlen($_SESSION['alogin']) == 0) {
	header('location:index.php');
} else {
?>
	<!DOCTYPE HTML>
	<html>

	<head>
		<title>Admin manage Users</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<script type="application/x-javascript">
			addEventListener("load", function() {
				setTimeout(hideURLbar, 0);
			}, false);

			function hideURLbar() {
				window.scrollTo(0, 1);
			}
		</script>
		<!-- Bootstrap Core CSS -->
		<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
		<!-- Custom CSS -->
		<link href="css/style.css" rel='stylesheet' type='text/css' />
		<link rel="stylesheet" href="css/morris.css" type="text/css" />
		<!-- Graph CSS -->
		<link href="css/font-awesome.css" rel="stylesheet">
		<!-- jQuery -->
		<script src="js/jquery-2.1.4.min.js"></script>
		<!-- //jQuery -->
		<!-- tables -->
		<link rel="stylesheet" type="text/css" href="css/table-style.css" />
		<link rel="stylesheet" type="text/css" href="css/basictable.css" />
		<script type="text/javascript" src="js/jquery.basictable.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {
				$('#table').basictable();

				$('#table-breakpoint').basictable({
					breakpoint: 768
				});

				$('#table-swap-axis').basictable({
					swapAxis: true
				});

				$('#table-force-off').basictable({
					forceResponsive: false
				});

				$('#table-no-resize').basictable({
					noResize: true
				});

				$('#table-two-axis').basictable();

				$('#table-max-height').basictable({
					tableWrapper: true
				});
			});
		</script>
		<!-- //tables -->
		<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css' />
		<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<!-- lined-icons -->
		<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
		<!-- //lined-icons -->
	</head>

	<body>
		<div class="page-container">
			<!--/content-inner-->
			<div class="left-content">
				<div class="mother-grid-inner">
					<!--header start here-->
					<?php include('./includes/header.php'); ?>
					<div class="clearfix"> </div>
				</div>
				<!--heder end here-->
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.html">Home</a><i class="fa fa-angle-right"></i>Manage Users</li>
				</ol>
				<div class="agile-grids">
					<!-- tables -->

					<div class="agile-tables">
						<div class="w3l-table-info">
							<h2>Manage Users</h2>
							<div class="table-responsive">

								<table id="table">
									<thead>
										<tr>
											<th>#</th>
											<th>Email</th>
											<th>Name</th>
											<th>Registration Date </th>
											<th>Last Seen</th>
											<th></th>
											<th></th>
										</tr>
									</thead>
									<tbody>
										<?php $sql = "SELECT * from users";
										 $query = mysqli_query($conn, $sql);
										 $cnt = 1;
										 if (mysqli_num_rows($query) > 0) {
											while ($result = $query->fetch_assoc()) {				?>
												<tr>
													<td><?php echo htmlentities($cnt); ?></td>
													<td><?php echo htmlentities($result['username']); ?></td>
													<td><?php echo htmlentities($result['first_name']) . " " . htmlentities($result['last_name']); ?></td>
													<td><?php echo htmlentities($result['reg_date']); ?></td>
													<td><?php echo htmlentities($result['last_seen']); ?></td>
													<input type="hidden" id="user_id" value="<?php echo $result['user_id'] ?>">
													<td><a href="delete.php?userid=<?php echo $result['user_id'] ?>" class="btn btn-danger">Delete User</a></td>
													<?php
													if ($result['block_status'] == 0) { ?>
														<td><a href="blockuser.php?user_id=<?php echo $result['user_id'] ?>&block=1"  class="btn btn-danger">Block User</a></td>
													<?php
													} else {
													?>
														<td><a href="blockuser.php?user_id=<?php echo $result['user_id'] ?>&block=0"  class="btn btn-danger">UnBlock User</a></td>

													<?php
													}
													?>
												</tr>
										<?php $cnt = $cnt + 1;
											}
										} ?>
									</tbody>
								</table>
							</div>
						</div>
						</table>


					</div>
					<!-- script-for sticky-nav -->
					<script>
						$(document).ready(function() {
							var navoffeset = $(".header-main").offset().top;
							$(window).scroll(function() {
								var scrollpos = $(window).scrollTop();
								if (scrollpos >= navoffeset) {
									$(".header-main").addClass("fixed");
								} else {
									$(".header-main").removeClass("fixed");
								}
							});

						});
						// $(document).on('click', '#blockuser', function(e) {
						// 	e.preventDefault();
						// 	var user_id = $('#user_id').val();
						// 	var block = 1;
						// 	$.ajax({
						// 		url: "blockuser.php",
						// 		type: "post",

						// 		data: {
						// 			user_id: user_id,
						// 			block: block
						// 		},
						// 		success: function(data) {
						// 			console.log(user_id);
						// 			// window.location = 'manage-users.php';
						// 		}
						// 	});

						// });
						// $(document).on('click', '#unblockuser', function(e) {
						// 	e.preventDefault();
						// 	var user_id = $('#user_id').val();
						// 	var block = 0;
						// 	$.ajax({
						// 		url: "blockuser.php",
						// 		type: "post",

						// 		data: {
						// 			user_id: user_id,
						// 			block: block
						// 		},
						// 		success: function(data) {
						// 			window.location = 'manage-users.php';
						// 		}
						// 	});

						// });
					</script>
					<!-- /script-for sticky-nav -->
					<!--inner block start here-->
					<div class="inner-block">

					</div>
					<!--inner block end here-->
					<!--copy rights start here-->
					<?php include('includes/footer.php'); ?>
					<!--COPY rights end here-->
				</div>
			</div>
			<!--//content-inner-->
			<!--/sidebar-menu-->
			<?php include('includes/sidebarmenu.php'); ?>
			<div class="clearfix"></div>
		</div>
		<script>
			var toggle = true;

			$(".sidebar-icon").click(function() {
				if (toggle) {
					$(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
					$("#menu span").css({
						"position": "absolute"
					});
				} else {
					$(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
					setTimeout(function() {
						$("#menu span").css({
							"position": "relative"
						});
					}, 400);
				}

				toggle = !toggle;
			});
		</script>
		<!--js -->
		<script src="js/jquery.nicescroll.js"></script>
		<script src="js/scripts.js"></script>
		<!-- Bootstrap Core JavaScript -->
		<script src="js/bootstrap.min.js"></script>
		<!-- /Bootstrap Core JavaScript -->

	</body>

	</html>
<?php } ?>
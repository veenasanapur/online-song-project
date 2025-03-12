<style>
	#btn:hover{
		-webkit-text-fill-color:white;
            /* -webkit-text-fill-color: rgba(255, 255, 255, 0.747); */
	}
	ion-icon{
		position: relative;
		top:8px;
		width: 30px;
		margin-right: 5px;
		background: linear-gradient(119deg, #FF3CAC 0%, #784BA0 50%, #2B86C5 100%);
		border-radius: 100%;
		padding:5px

	}

	.contcat h5{
		margin-left: 34px;

	}
</style>
<body style="background:black;">
<?php
include 'files/functions.php';
include 'files/header.php';
include 'nevbar.php';?>

<div class="container">
	<ul class="list-group mt-md-3" >
		<li class="list-group-item"style="background-color:rgb(15,15,15); color:white;">
			<h2 class="display-4">About us</h2>
		</li>
		<li class="list-group-item" style="background-color:rgb(28,28,28); color:white; border-bottom: 1px solid black; border-top: 1.8px solid  black;">
			<div class="row">
				<div class="col-md-2" style="width:100%;font-size:30px">
					<p>With our website, it's easy to find the right music for every moment-on your phone, your computer, your tablet and more.</p>
                    <p>There are maney songs are inour website. So whether you're behind the wheel, working out, partying or relaxing, the right music is always at your fingertips. Choose what you wnat to listen.</p>
                    <p>You can also browse through the collections of artists and songs.</p>
                    <p>Soundtrack your life with Spotlight.listen for free.</p>
				
				</div>
			</div>
		</li>




	</ul>
    <ul class="list-group mt-md-3" >
		<li class="list-group-item" style="background-color:rgb(15,15,15); color:white;">
			<h2 class="display-4">Contact us</h2>
		</li>
		<li class="list-group-item" style="background-color:rgb(28,28,28); color:white; border-bottom: 1px solid black; border-top: 1.8px solid  black; display:flex; padding-left:30px; ">
			<div class="contcat" style="padding-right:100px;position:reletive;">
                <h2><ion-icon name="navigate"></ion-icon>Address</h2>
                <h5>Near Basaveshwra Circle,</h5>
                <h5>Ilkal,Karnataka</h5>
                <h5>587125</h5>
            </div>
            <div class="contcat"  style="padding:0px 100px 0px 50px">
			<h2><ion-icon name="call"></ion-icon>Phone</h2>
                <h5>507-475-60945-6094</h5>
            </div>
            <div  class="contcat" style="padding-right:100px">
                <h2><ion-icon name="mail"></ion-icon>Email</h2>
                <h5>Spotlightsupport@gmail.com</h5>
            </div>

			</div>

		</li>

	</ul>


</div>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

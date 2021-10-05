<?php
session_start();
if (!isset($_SESSION["id"])) {
	header("Location:index.php");
}
date_default_timezone_set('America/Los_Angeles');
include('config.php');
function getnumofrow($Audience)
{
	include('config.php');
	$sql = "SELECT * FROM client_info WHERE `Audience`='$Audience' ";
	$query = mysqli_query($conn, $sql);
	$row = mysqli_num_rows($query);
	return $row;
}
?>
<style>
	@import url('https://fonts.googleapis.com/css?family=Oswald');

	* {
		margin: 0;
		padding: 0;
		border: 0;
		box-sizing: border-box
	}

	body {
		background-color: #dadde6;
		font-family: arial
	}

	.fl-left {
		float: left
	}

	.fl-right {
		float: right
	}

	.container {
		width: 90%;
		/* margin: 100px auto */
	}

	h1 {
		text-transform: uppercase;
		font-weight: 900;
		border-left: 10px solid #fec500;
		padding-left: 10px;
		margin-bottom: 30px
	}

	.row {
		overflow: hidden
	}

	.card {
		display: table-row;
		width: 49%;
		/* background-color: #222; */
		border: 1px solid #000;
		color: #989898;
		margin: 20px 0;
		font-family: 'Oswald', sans-serif;
		text-transform: uppercase;
		border-radius: 4px;
		position: relative
	}

	.card+.card {
		margin-left: 2%
	}

	.date {
		display: table-cell;
		width: 25%;
		position: relative;
		text-align: center;
		border-right: 3px dashed #000;
	}

	.date:before,
	.date:after {
		content: "";
		display: block;
		width: 30px;
		height: 30px;
		background-color: #000;
		position: absolute;
		top: -15px;
		right: -15px;
		z-index: 1;
		border-radius: 50%
	}

	.date:after {
		top: auto;
		bottom: -15px
	}

	.date time {
		display: block;
		position: absolute;
		top: 50%;
		left: 50%;
		-webkit-transform: translate(-50%, -50%);
		-ms-transform: translate(-50%, -50%);
		transform: translate(-50%, -50%)
	}

	.date time span {
		display: block
	}

	.date time span:first-child {
		color: #000;
		font-weight: 600;
		font-size: 250%
	}

	.date time span:last-child {
		text-transform: uppercase;
		font-weight: 600;
		color: black;
		margin-top: -10px
			/* color:#000; */
	}

	.card-cont {
		display: table-cell;
		width: 75%;
		font-size: 85%;
		padding: 10px 10px 30px 50px;
	}

	.card-cont h3 {
		color: #000;
		font-weight: 600;
		font-size: 150%;
	}


	.card-cont>div {
		display: table-row
	}

	.card-cont .even-date i,
	.card-cont .even-info i,
	.card-cont .even-date time,
	.card-cont .even-info p {
		display: table-cell
	}

	.card-cont .even-date i,
	.card-cont .even-info i {
		padding: 5% 5% 0 0
	}

	.card-cont .even-info p {
		padding: 30px 50px 0 0
	}

	.card-cont .even-date time span {
		display: block
	}

	.card-cont a {
		display: block;
		text-decoration: none;
		width: 80px;
		height: 30px;
		color: #fff;
		font-size: 150%;
		background-color: 000;
		text-align: center;
		line-height: 30px;
		border-radius: 2px;
		position: absolute;
		right: 10px;
		bottom: 10px
	}

	.card-cont a:hover {
		text-decoration: none;
		color: #fff;
	}

	.btns {
		border: 2px solid #000;
		color: #000;
		font-size: 20px;
		font-weight: 600;
		padding: 5px 10px;
		width: 120px !important;
		border-radius: 5px;
		text-decoration: none;
	}

	.btns:hover {
		text-decoration: none;
		color: #000;
	}

	@media screen and (max-width: 860px) {
		.card {
			display: block;
			float: none;
			width: 100%;
			margin-bottom: 10px
		}

		.card+.card {
			margin-left: 0
		}

		.card-cont .even-date,
		.card-cont .even-info {
			font-size: 75%
		}
	}
</style>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<section class="container">

	<center><img src="manas.png" class="img-fluid" width="800"></center>
	<br><br>
	<div style="float:right;margin:20px;"><a id="log" class="btns" href="logout"><i class="fas fa-sign-out-alt"></i> Logout </a></div>
	<a class="btns" href="home">Home</a>
	<a class="btns" href="allAudience">Show All</a>
	<a class="btns" href="login">Add New</a>
	<h1>Levels </h1>
	<div class="row">
		<article class="card fl-left" style="background-color:#ccc;" data-href="connectionAudience">
			<section class="date">
				<time datetime="23th feb">
					<span>1</span><span>Level</span>
				</time>
			</section>
			<section class="card-cont">
				<h3>Sent Friend Request/ Connection Request/ Welcome Message</h3>
				<a href="connectionAudience"><?= getnumofrow('1'); ?></a>
			</section>
		</article>
		<article data-href="coldAudience" class="card fl-left" style="background-color:#b8daff;">
			<section class="date">
				<time datetime="23th feb">
					<span>2</span><span>Level</span>
				</time>
			</section>
			<section class="card-cont">
				<h3 style="padding:0 15px 20px 0;">Cold Audience/ Want Info/ Educate</h3>
				<a href="coldAudience"><?= getnumofrow('2'); ?></a>
			</section>
		</article>
	</div>
	<div class="row">
		<article data-href="interestedAudience" class="card fl-left" style="background-color:#ff9900;">
			<section class="date">
				<time datetime="23th feb">
					<span>3</span><span>Level</span>
				</time>
			</section>
			<section class="card-cont">
				<h3 style="padding:0 155px 20px 0 ;">Interested Audience</h3>
				<a href="interestedAudience"><?= getnumofrow('3'); ?></a>
			</section>
		</article>
		<article data-href="warmAudience" class="card fl-left" style="background-color:#ffeeba;">
			<section class="date">
				<time datetime="23th feb">
					<span>4</span><span>Level</span>
				</time>
			</section>
			<section class="card-cont">
				<h3>Warm Audience / Had Interaction/Ready For Call</h3>
				<a href="warmAudience"><?= getnumofrow('4'); ?></a>
			</section>
		</article>
	</div>
	<div class="row">
		<article data-href="hotAudience" class="card fl-left" style="background-color:#c3e6cb;">
			<section class="date">
				<time datetime="23th feb">
					<span>5</span><span>Level</span>
				</time>
			</section>
			<section class="card-cont">
				<h3 style="padding:0 40px 20px 0 ;">Hot Audience /Ready For Offer</h3>
				<a href="hotAudience"><?= getnumofrow('5'); ?></a>
			</section>
		</article>
		<article data-href="matchAudience" class="card fl-left" style="background-color:#f5c6cb;">
			<section class="date">
				<time datetime="23th feb">
					<span>6</span><span>Level</span>
				</time>
			</section>
			<section class="card-cont">
				<h3 style="padding:0 250px 0 0 ;">Nurture / No match<br></h3>
				<a href="matchAudience"><?= getnumofrow('6'); ?></a>
			</section>
		</article>
	</div>
	<div class="row">
		<article data-href="converted" class="card fl-left" style="background-color:#B23CFD;margin-left:25%">
			<section class="date">
				<time datetime="23th feb">
					<span>7</span><span>Level</span>
				</time>
			</section>
			<section class="card-cont">
				<h3 style="padding:0 270px 20px 0 ;">Converted<br></h3>
				<a href="converted"><?= getnumofrow('7'); ?></a>
			</section>
		</article>
	</div>
	</div>
	<script>
		$(document).ready(function() {
			$('article').click(function() {
				window.location.href = $(this).data('href');
			});
		});
	</script>
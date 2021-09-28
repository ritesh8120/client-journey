<?php
session_start();
if (!isset($_SESSION["id"])) {
	header("Location:index.php");
}
date_default_timezone_set('America/Los_Angeles');
include('config.php');
?>
<!DOCTYPE html>
<html>

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<title>Level</title>
	<link rel="stylesheet" type="text/css" href="image.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<style>
		* {
			padding: 0;
			margin: 0;
		}

		.container {
			width: 100%;
			padding-top: 50px;
		}
	</style>
</head>

<body>
	<div class="float-right" style="margin: 116px;"><a id="log" href="logout"><i class="fas fa-sign-out-alt"></i> Logout </a></div>
	<div class="container">
		<img src="manas.png" class="img-fluid" width="800"><br><br><br>
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

		<svg width="600" height="180">
			<a href="connectionAudience">
				<rect width="20" height="20" style="fill:#b8daff;stroke-width:3;" />
				<?php
				$sqls = "SELECT * FROM client_info WHERE `Audience`='0'";
				$querys = mysqli_query($conn, $sqls);
				$rowa = mysqli_num_rows($querys);
				?>
				<text x="30" y="15"> Level 0 - Sent Friend Request/ Connection Request/ Welcome Message</text><text x="535" y="15" style="font-weight: bold;">(<?= $rowa ?>)</text>
			</a>
			</a>
			<a href="coldAudience">
				<rect width="20" height="20" y="30" style="fill:#b8daff;stroke-width:3;" />
				<?php
				$sql1s = "SELECT * FROM client_info WHERE `Audience`='1' and `type`='yoga'";
				$query1s = mysqli_query($conn, $sql1s);
				$rowss = mysqli_num_rows($query1s);
				?>
				<text x="30" y="45"> Level 1 - Cold Audience/ Want Info/ Educate </text><text x="535" y="45" style="font-weight: bold;">(<?= $rowss ?>)</text>
			</a>
			</a>
			<?php
			$sql2s = "SELECT * FROM client_info WHERE `Audience`='2' and `type`='yoga'";
			$query2s = mysqli_query($conn, $sql2s);
			$row2s = mysqli_num_rows($query2s);
			?>
			<a href="interestedAudience">
				<rect width="20" height="20" y="60" style="fill:#ff9900;stroke-width:3;" />
				<text x="30" y="75">Level 2 - Interested Audience </text><text x="530" y="75" style="font-weight: bold;">(<?= $row2s ?>)</text>
			</a>
			<?php
			$sql3s = "SELECT * FROM client_info WHERE `Audience`='3' and `type`='yoga'";
			$query3s = mysqli_query($conn, $sql3s);
			$row3s = mysqli_num_rows($query3s);
			?>
			<a href="warmAudience">
				<rect width="20" height="20" y="90" style="fill:#ffeeba;stroke-width:3;" />
				<text x="30" y="105"> Level 3 - Warm Audience / Had Interaction/Ready For Call </text><text x="530" y="105" style="font-weight: bold;">(<?= $row3s ?>)</text>
			</a>
			<?php
			$sql4s = "SELECT * FROM client_info WHERE `Audience`='4' and `type`='yoga'";
			$query4s = mysqli_query($conn, $sql4s);
			$row4s = mysqli_num_rows($query4s);
			?>
			<a href="hotAudience">
				<rect width="20" height="20" y="120" style="fill:#c3e6cb;stroke-width:3;" />
				<text x="30" y="135"> Level 4 - Hot Audience /Ready For Offer </text><text x="530" y="135" style="font-weight: bold;">(<?= $row4s ?>)</text>
			</a>
			<?php
			$sql5s = "SELECT * FROM client_info WHERE `Audience`='5' and `type`='yoga'";
			$query5s = mysqli_query($conn, $sql5s);
			$row5s = mysqli_num_rows($query5s);
			?>
			<a href="matchAudience">
				<rect width="20" height="20" y="150" style="fill:#f5c6cb;stroke-width:3;" />
				<text x="30" y="165"> Level 5 - No Match </text><text x="530" y="165" style="font-weight: bold;">(<?= $row5s ?>)</text>
			</a>
		</svg>
		<br>
		<center>
			<a class="btn btn-info" style="width:120px;" href="home">Home</a>
			<a class="btn btn-info" style="width:120px;" href="allAudience">Show All</a>
			<a class="btn btn-info" style="width:120px;" href="login">Add New</a>
			<a class="btn btn-info" style="width:120px;" href="coachnotes">Admin Notes</a>
		</center>
	</div>
	</div>
</body>

</html>
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
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="image.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<style>
		* {
			padding: 0;
			margin: 0;
		}

		.btn {
			width: 300px;
		}
	</style>
</head>

<body>
	<div class="float-right" style="margin: 116px;"><a id="log" href="logout"><i class="fas fa-sign-out-alt"></i> Logout </a></div>
	<div class="container">

		<center><img src="manas.png" class="img-fluid" width="800"><br><br>
			<h1 style="color:green;font-weight: 900;font-size: 5rem;">The Green Machine</h1><br><a href="level" class="btn btn-info">Client Journey</a>
			<a href="dashboard" class="btn btn-info">KPI's</a>
			<a href="facebook_group" class="btn btn-info">Facebook Group Marketing/Activity</a>
		</center>
	</div>
	</div>
</body>

</html>
<?php
session_start();
if (!isset($_SESSION["id"])) {
	header("Location:index.php");
}
date_default_timezone_set('America/Los_Angeles');
include('config.php');
if (isset($_REQUEST["delid"])) {
	$delid = $_REQUEST["delid"];
	mysqli_query($conn, "DELETE FROM `business` WHERE client_id='$delid'");
	mysqli_query($conn, "DELETE FROM `personal` WHERE client_id='$delid'");
	$del = "DELETE FROM `client_info` WHERE cid=$delid";
	if (mysqli_query($conn, $del) == true) {
		mysqli_query($conn, "DELETE FROM `clientpogistion` WHERE clientid= '$delid'");
	}
}
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<title>Match Audience</title>
	<link rel="stylesheet" type="text/css" href="image.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<!------ Include the above in your HEAD tag ---------->

	<script language="JavaScript" src="https://code.jquery.com/jquery-1.12.4.js" type="text/javascript"></script>
	<script language="JavaScript" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js" type="text/javascript"></script>
	<script language="JavaScript" src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js" type="text/javascript"></script>
	<script language="JavaScript" src="https://cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.min.js" type="text/javascript"></script>
	<script language="JavaScript" src="https://cdn.datatables.net/responsive/2.1.1/js/responsive.bootstrap.min.js" type="text/javascript"></script>

	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.1.1/css/responsive.bootstrap.min.css" />
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<!------ Include the above in your HEAD tag ---------->

	<!-- Website CSS style -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
	<!-- Website Font style -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.1.1/css/responsive.bootstrap.min.css">
	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&subset=latin-ext" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>

<body>
	<div style="margin: 0 10%">
		<div style="margin: 20px 0;float: right;"><a id="log" href="logout"><i class="fas fa-sign-out-alt"></i> Logout </a></div>
		<center><img src="manas.png" class="img-fluid" width="800"></center>
		<a class="btn btn-info" style="width:150px;margin:5px" href="home">Home</a>
		<a class="btn btn-info" style="width:150px;margin:5px" href="login">Add New</a>
		<h1 style="text-align:center;">No Match</h3>
			<table id="example" class="table table-striped table-bordered" style="width:100%">
				<thead>
					<tr>
						<th class="text-center">No</th>
						<th class="text-center">Start Date</th>
						<th class="text-center">Name</th>
						<th class="text-center">Email</th>
						<th class="text-center">Location</th>
						<th class="text-center">Leadowner</th>
						<th class="text-center">Phone No.</th>
						<!-- <th class="text-center">Map</th> -->
						<th class="text-center">Research</th>
						<th class="text-center">History</th>
						<th class="text-center">Edit</th>
						<th class="text-center">Level transfer</th>
						<th class="text-center">Last Activity</th>
						<th class="text-center">Next Activity</th>
						<th class="text-center">Next Activity Date </th>
						<th class="text-center">Delete</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$qua = "SELECT * FROM client_info WHERE `Audience`='5' ORDER BY `cid` DESC ";
					$querys = mysqli_query($conn, $qua);
					if (mysqli_num_rows($querys) > 0) {
						$i = 1;
						while ($row = mysqli_fetch_array($querys)) {
							$sel = "SELECT * FROM `next_action` WHERE `user_id`='" . $row['cid'] . "'";
							$last_action = "SELECT * FROM `history` WHERE `client_id`='" . $row['cid'] . "'  ORDER BY `id` DESC LIMIT 1";
							$query2 = mysqli_query($conn, $last_action);
							$query1 = mysqli_query($conn, $sel);
							$row1 = mysqli_fetch_array($query1);
							$row2 = mysqli_fetch_array($query2);
					?>
							<tr>
								<td class="text-center"><?php echo $i; ?></td>
								<td class="text-center"><?= date('m/d/y', strtotime($row['date'])); ?></td>
								<td class="text-center"><?php echo $row['firstname'] ?><?php echo " " . $row['lastname']; ?></td>
								<td><?php echo $row['email'] ?></td>
								<td class="text-center"><?php echo $row['address'] ?></td>
								<td class="text-center"><?php echo $row['lead'] ?></td>
								<td class="text-center"><?php echo $row['phone'] ?></td>
								<!-- <td class="text-center"><a href="Detail?upid=<?php echo $row['cid'] ?>"><img src="unnamed.png" height="40"></a></td> -->
								<td class="text-center"><a href="research?id=<?php echo $row['cid'] ?>"><i class="fab fa-searchengin" style="font-size: 30px;"></i></a></td>
								<td class="text-center"><a href="notes?id=<?php echo $row['cid'] ?>"><i class="fa fa-history" aria-hidden="true" style="font-size: 20px;"></i></a></td>
								<td class="text-center"><a href="adit?eid=<?php echo $row['cid'] ?>"><i class="fas fa-pen-square" style="font-size: 25px;"></i></a></td>
								<td class="text-center"><select class="levels" data-id="<?php echo $row['cid'] ?>">
										<option disabled>--Select Level--</option>
										<option <?= ($row['Audience'] == '0') ? "selected='selected'" : ""; ?> value="0">Level 0</option>
										<option <?= ($row['Audience'] == '1') ? "selected='selected'" : ""; ?> value="1">Level 1</option>
										<option <?= ($row['Audience'] == '2') ? "selected='selected'" : ""; ?> value="2">Level 2</option>
										<option <?= ($row['Audience'] == '3') ? "selected='selected'" : ""; ?> value="3">Level 3</option>
										<option <?= ($row['Audience'] == '4') ? "selected='selected'" : ""; ?> value="4">Level 4</option>
										<option <?= ($row['Audience'] == '5') ? "selected='selected'" : ""; ?> value="5">Level 5</option>
									</select></td>
								<td class="text-center"><?php echo $row2['title']; ?></td>
								<td class="text-center"><?php echo $row1['title']; ?></td>
								<td class="text-center"><?php echo date('m/d/y', strtotime($row1['date'])); ?></td>
								<td class="text-center"><a href="matchAudience?delid=<?php echo $row['cid'] ?>" onclick="return confirm('<?php echo $row['firstname']; ?>\n Are you sure you want to delete?')"><img src="garbage.png" height="30px"></a></td>
							</tr>
					<?php $i++;
						}
					}
					?>
				</tbody>
			</table>
	</div>
	<script>
		$(document).ready(function() {
			$('#example').DataTable({
				"order": [
					[0, "desc"]
				]
			});
			$('.levels').change(function() {
				var audience = $(this).val();
				var id = $(this).data('id');
				$.ajax({
					type: "post",
					dataType: "html",
					url: 'changelevel',
					data: {
						audience: audience,
						id: id
					},
					success: function(data) {
						// console.log(data);
					}
				});
			});
		});
	</script>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
	<script src="https://cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.min.js"></script>
	<script src="https://cdn.datatables.net/responsive/2.1.1/js/responsive.bootstrap.min.js"></script>
</body>

</html>
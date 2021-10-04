<?php
session_start();
if (!isset($_SESSION["id"])) {
	header("Location:index.php");
}
$sucees = "";
date_default_timezone_set('America/Los_Angeles');
include('config.php');
// if press submite button so this query is runn
if (isset($_POST['submit'])) {
	// variable value get the form whit post method
	$firstname = $_POST["fname"];
	$lastname = $_POST["lname"];
	$email = $_POST['email'];
	$phoneno = $_POST['pno'];
	$address = $_POST['address'];
	$leadowener = $_POST['leadowener'];
	$source = $_POST['Source'];
	$level = $_POST['level'];
	$date = date('Y-m-d');
	$b = implode(",", $source);
	// 	$dataform = implode(",",$_POST['dataform']);
	$techer = $_POST['techer'];
	$requeststatus = $_POST['requeststatus'];
	$ReplyStatus = $_POST['ReplyStatus'];

	if (empty($phoneno)) {
		$phoneno = '-';
	}
	if (empty($firstname)) {
		$firstname = '-';
	}
	if (empty($lastname)) {
		$lastname = '';
	}

	if (empty($email)) {
		$email = '-';
	}

	if (empty($source)) {
		$b = '-';
	}

	if (empty($address)) {
		$address = '-';
	}

	$query = $conn->query("INSERT INTO `client_info`(`firstname`, `lastname`, `email`, `phone`, `address`, `source`, `lead`, `posion`, `date`, `Audience`, `type`, `dataform`, `level`, `connenction`, `reply`, `link`) VALUES ('$firstname','$lastname','$email','$phoneno','$address','$b','$leadowener','0','$date','$level','$techer','','','$requeststatus','$ReplyStatus','')");
	if ($query === TRUE) {
		$last_id = $conn->insert_id;
		$result = $conn->query("INSERT INTO `clientpogistion`(`clientid`, `checkboxname`, `cstatus`, `img`, `form_no`)VALUES ('$last_id' ,'Optin page 1/2/3/4','0','','1'),('$last_id' ,'Free Swipe file Email (Invite to FB group - PUBLIC)','0','','2'),('$last_id' ,'Masterclass Exclusive VSL Page','0','','3'),('$last_id' ,'Clicked on Purchase now Button','0','','4'),('$last_id' ,'Order Form Page','0','','5'),('$last_id' ,'Order Confirmation Page','0','','6'),    ('$last_id' ,'Click Funnel Members page (ALL VIDEOS)','0','','7'),('$last_id' ,'Welcome message email','0','','8'),('$last_id' ,'Access to facebook group (PRIVATE)','0','','9'),('$last_id' ,'My PortalX Access','0','','10'),('$last_id' ,'Email 1 - video 1','0','','11'),('$last_id' ,'Email 2 - video 2','0','','12'),('$last_id' ,'Email 3 - Video 3','0','','13'),('$last_id', 'Email 4 - video 4', '0', '', '14'),('$last_id', 'Email 5 - video 5', '0', '', '15'),('$last_id', 'Email to book appointment with rajah sharma 30 mins', '0', '', '16'), ('$last_id', 'Testimonial email.', '0', '', '17'),('$last_id', 'Website Audit', '0', '', '18'),('$last_id', 'Social Media Presence Audit', '0', '', '19')");

		$result1 = $conn->query("INSERT INTO `personal`(`client_id`, `ustatus`, `form_name`,`form_no`) VALUES ('$last_id' ,'0','Discover Session','1'),('$last_id' ,'0','Client pondring Sheet','2'),('$last_id' ,'0','Goal setting','3'),('$last_id' ,'0','Action Plan Agreement Sheet','4'),('$last_id' ,'0','What Do You Need To Let Go Of','5'),('$last_id' ,'0','Conflict Belief','6'),('$last_id' ,'0','Stop procrastinating and get it done','7'),('$last_id' ,'0','Daily Success Habits','8'),('$last_id' ,'0','Energy zappers','9'),('$last_id' ,'0','My spark team','10'),('$last_id' ,'0','What Makes My Heart Sing','11'),('$last_id' ,'0','Mentor Magic','12'),('$last_id' ,'0','Golden Image List','13'),('$last_id' ,'0','Monthly Client Review and Feedback','14')");

		$result2 = $conn->query("INSERT INTO `business`(`client_id`, `ustatus`, `form_name`,`form_no`)VALUES ('$last_id' ,'0','A-1 Your business vision','1'),('$last_id' ,'0','A-2 Branding exercise','2'),('$last_id' ,'0','A-3 Client profile','3'),('$last_id' ,'0','A-4 Why people buy what youre Selling','4'),('$last_id' ,'0','A-5 How to talk about your new Avatar','5'),('$last_id' ,'0','B-5 49 Questions + Bio','6'),('$last_id' ,'0','B-14 60 day Launch check list From conceptualization to postmortem','7'),('$last_id' ,'0','A-10 Idea Mapping- Niche tightening','8'),('$last_id' ,'0','B-7 Pre-selling your high end program','9'),('$last_id' ,'0','A-11 client interview approach questionnaire?','10'),('$last_id' ,'0','B-1 The Sales cycle','11'),('$last_id' ,'0','B-2 Self- Promotion strategies','12'),('$last_id' ,'0','B-9 Launch Emails','13'),('$last_id' ,'0','B-3 Know like trust- launch','14'), ('$last_id' ,'0','A-7 Creating the know like & trust factor','15'),('$last_id' ,'0','A-8 Product creation','16'),('$last_id' ,'0','B-6 content structure','17'),('$last_id' ,'0','A-9 Perfect pricing & simple selling','18'),('$last_id' ,'0','B-8 Launch Details','19'),('$last_id' ,'0','A-6 The transformation stepping into the new Avatar','20'),('$last_id' ,'0','B-12 Pulling it all togeather','21'),('$last_id' ,'0','B-10 Getting your client to Finish Line','22')");
		if ($result2 == true) {
			header("Location: ./allAudience");
		}
	}
}
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title></title>
	<link rel="stylesheet" type="text/css" href="image.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<style>
		input[type="text"],
		input[type="email"],
		input[type="number"] {
			font-family: Book Antiqua;
			background: #e6e6ff;
			margin: 5px;
		}

		input[type="submit"] {
			text-decoration: none;
			box-sizing: border-box;
			color: #000;
			background: transparent;
			padding: 3px 10px;
			width: 150px;
			border: #000 2px solid;
			font-size: 20px;
		}

		td {
			text-align: left;
			vertical-align: top;
		}

		table {
			width: 100%;
			overflow-y: scroll
		}

		.btns {
			border: 2px solid #000;
			color: #000;
			font-size: 20px;
			font-weight: 600;
			padding: 5px 10px;
			width: 120px !important;
			text-decoration: none;
		}

		.btns:hover {
			text-decoration: none;
			color: #000;
		}

		.form-control {
			width: 200px;
		}
	</style>
</head>

<body>

	<div class="container">
		<img src="manas.png" class="img-fluid"><br><br><br>
		<div style="float:right">
			<a class="btn btns" href="logout"><i class="fas fa-sign-out-alt"></i> Logout </a>
		</div>
		<a href="home" class="btn btns">Home</a>
		<a href="allAudience" class="btn btns">Show All</a><br><br>
		<h1>New Client Add</h1>
		<form action="" method="post" style="background-color: #d9d9d9; padding: 25px;">
			<?php echo $sucees ?>
			<table>
				<tr>
					<td>
						<div class="form-group"><label>First Name: </label><input type="text" name="fname" autocomplete="autocomplete" class="form-control"></div>
						<div class="form-group"><label>Last Name: </label><input type="text" name="lname" class="form-control" autocomplete="autocomplete"></div>
						<div class="form-group"><label>Email: </label><input type="email" name="email" class="form-control" autocomplete="autocomplete"></div>
						<div class="form-group"><label>Phone No: </label><input type="number" class="form-control" name="pno"></div>
						<div class="form-group"><label>Location: </label><input type="text" name="address" class="form-control" autocomplete="autocomplete"></div>
					</td>
					<td>
						<b>Lead Owner :-</b>
						<div class="form-group">
							<input type="radio" class="mx-2" name="leadowener" value="Rajah Sharma"> Rajah Sharma
						</div>
						<div class="form-group">
							<input type="radio" class="mx-2" name="leadowener" value="Anmol Nagpal" checked> Anmol Nagpal
						</div>
						<div class="form-group">
							<input type="radio" class="mx-2" name="leadowener" value="Courtney Way"> Courtney Way
						</div>
						<div class="form-group">
							<input type="radio" class="mx-2" name="leadowener" value="Sydney Hungeford"> Sydney Hungeford
						</div><br>
						<!-- type -->
						<b>Type :-</b>
						<div class="form-group">
							<input type="radio" class="mx-2" name="techer" value="yoga" checked> Yoga Teachers
						</div>
						<div class="form-group">
							<input type="radio" class="mx-2" name="techer" value="coaching"> Coaching
						</div>
					</td>
					<td>
						<b>Source</b>
						<div class="form-group">
							<input type="checkbox" name="Source[]" value="Facebook" checked><span> Facebook</span>
						</div>
						<div class="form-group">
							<input type="checkbox" name="Source[]" value="Linkedin"><span> Linkedin</span>
						</div>
						<div class="form-group">
							<input type="checkbox" name="Source[]" value="Instagram"><span> Instagram</span>
						</div>
						<div class="form-group">
							<input type="checkbox" name="Source[]" value="Other"><span> Other</span>
						</div>
						<br>
						<b>Friend Request Status :-</b>
						<div class="form-group">
							<input type="radio" class="mx-2" name="requeststatus" value="Sent" checked> Sent
						</div>
						<div class="form-group">
							<input type="radio" class="mx-2" name="requeststatus" value="Accepted"> Accepted
						</div>
						<div class="form-group">
							<input type="radio" class="mx-2" name="requeststatus" value="Pending"> Pending
						</div>
						<br>
						<b>Reply Status</b>
						<div class="form-group">
							<input type="radio" class="mx-2" name="ReplyStatus" value="No" checked> No
						</div>
						<div class="form-group">
							<input type="radio" class="mx-2" name="ReplyStatus" value="Yes"> Yes
						</div>
					</td>
					<td>
						<b>Levels</b>
						<div class="form-group">
							<input type="radio" class="mx-2" name="level" value="0" id="radio1" checked>
							Level 0 - Sent Friend Request/ Connection Request/ Welcome Message
						</div>
						<div class="form-group">
							<input type="radio" class="mx-2" name="level" value="1" id="radio1">
							Level 1 - Cold Audience/ Want Info/ Educate
						</div>
						<div class="form-group">
							<input type="radio" class="mx-2" name="level" value="2" id="radio2">
							Level 2 - Interested Audience
						</div>
						<div class="form-group">
							<input type="radio" class="mx-2" name="level" value="3" id="radio3">
							Level 3 - Warm Audience / Had Interaction/Ready For Call
						</div>
						<div class="form-group">
							<input type="radio" class="mx-2" name="level" value="4" id="radio4">
							Level 4 - Hot Audience /Ready For Offer
						</div>
						<div class="form-group">
							<input type="radio" class="mx-2" name="level" value="5" id="radio5">
							Level 5 - No Match
						</div>
					</td>
				</tr>
			</table>
			<div class="row">
				<div class="col-12">
					<input style="margin-bottom:10px;border-radius: 5px;border: 2px solid #000;font-size: 20px;font-weight: 600;" type="submit" name="submit" value="Submit">
				</div>
				<div class="col-12">
					<button style="border-radius: 5px;margin-bottom:10px;box-sizing: border-box;background:transparent;padding:3px 10px;width: 150px;border: #000 2px solid;">
						<a href="coachnotes" style="text-decoration: none;color: #000;font-size:20px;font-weight: 600;">Coach Notes</a>
					</button>
				</div>
			</div>
		</form>
		<marquee direction="right" style="color:	 #661400 ; background: #ffffb3 ;"> Welcome To Journey</marquee>
	</div>
	<?php
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
	<script>
		$(document).ready(function() {
			$('.example').DataTable();
		});
	</script>
	<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
	<script src="https://cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.min.js"></script>
	<script src="https://cdn.datatables.net/responsive/2.1.1/js/responsive.bootstrap.min.js"></script>
</body>

</html>
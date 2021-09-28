<?php
session_start();
if (!isset($_SESSION["id"])) {
	header("Location:index.php");
}
if (isset($_REQUEST['eid'])) {
	$eid = $_REQUEST['eid'];
	include('config.php');
	$sql = "SELECT * FROM `client_info` WHERE cid='$eid'";
	$res = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($res);
	$a = $row['source'];
	$b = explode(',', $a);
	$d =  $row['lead'];
	$level = $row['Audience'];
	$type = $row['type'];
	$connenction = $row['connenction'];
	$reply = $row['reply'];
	$c = explode(',', $row['dataform']);
}

if (isset($_REQUEST['ok'])) {
	$a = array();
	$fname = $_REQUEST['name'];
	$lname = $_REQUEST['lname'];
	$email = $_REQUEST['email'];
	$number = $_REQUEST['number'];
	$address = $_REQUEST['address'];
	if (!empty($_REQUEST['Source'])) {
		$a = $_REQUEST['Source'];
	}
	$source = implode(",", $a);
	$lead = $_REQUEST['leadowener'];
	$dataform = implode(",", $_POST['dataform']);
	$rj = "UPDATE `client_info` SET `firstname`='$fname',`lastname`='$lname',`email`='$email',`phone`='$number',`address`='$address',`source`='$source',`lead`='$lead', `dataform`='$dataform' WHERE cid=$eid";
	$success = mysqli_query($conn, $rj);
	header('location:login');
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="image.css">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<img src="manas.png" class="img-fluid"><br>
		<a id="log" class="float-right" href="l	ogout"><i class="fas fa-sign-out-alt"></i> Logout </a>
		<a class="btn btn-primary" href="home">Home</a>
		<a href="notes?id=<?= $_REQUEST['eid'] ?>" class='btn btn-primary'>Show History</a>
		<a class="btn btn-primary" href="research?id=<?= $_REQUEST['eid'] ?>">Show Research</a>
		<div class="myform form ">
			<form action="" method="post">
				<div class="row">
					<div class="col-md-3">
						<div class="form-group">
							<label>First Name</label>
							<input type="text" name="name" value="<?php echo $row['firstname'] ?>" class="form-control my-input" id="name" placeholder="Name">
						</div>
						<div class="form-group">
							<label>Last Name</label>
							<input type="text" name="lname" value="<?php echo $row['lastname']; ?>" class="form-control my-input" id="email" placeholder="Email">
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="test" name="email" value="<?php echo $row['email']; ?>" id="phone" class="form-control my-input" placeholder="Phone">
						</div>
						<div class="form-group">
							<label>Contact Number</label>
							<input type="number" name="number" value="<?php echo $row['phone']; ?>" min="0" id="phone" class="form-control my-input" placeholder="Phone">
						</div>
						<div class="form-group">
							<label>Address</label>
							<textarea class="form-control" rows="2" id="comment" name="address"><?php echo $row['address']; ?></textarea>
						</div>
					</div>
					<div class="col-md-3">
						<label class="font-weight-bold">Lead Owener</label>
						<div class="form-check">
							<label class="form-check-label">
								<input type="radio" name="leadowener" value="Rajah Sharma" <?php if (isset($d) && $d == "Rajah Sharma") {
																								echo "checked";
																							} ?> class="form-check-input">Rajah Sharma
							</label>
						</div>
						<div class="form-check">
							<label class="form-check-label">
								<input type="radio" name="leadowener" value="Anmol Nagpal" <?php if (isset($d) && $d == "Anmol Nagpal") {
																								echo "checked";
																							} ?> class="form-check-input">Anmol Nagpal
							</label>
						</div>
						<div class="form-check">
							<label class="form-check-label">
								<input type="radio" name="leadowener" value="Courtney Way" <?php if (isset($d) && $d == "Courtney Way") {
																								echo "checked";
																							} ?> class="form-check-input"> Courtney Way
							</label>
						</div>
						<div class="form-check">
							<label class="form-check-label">
								<input type="radio" name="leadowener" value="Sydney Hungeford" <?php if (isset($d) && $d == "Sydney Hungeford") {
																									echo "checked";
																								} ?> class="form-check-input"> Sydney Hungeford
							</label>
						</div>
						<br><br>
						<label class="font-weight-bold">Type</label>
						<div class="form-check">
							<label class="form-check-label">
								<input type="radio" name="type" value="yoga" <?php if (isset($type) && $type == "yoga") {
																					echo "checked";
																				} ?> class="form-check-input"> Yoga Teachers
							</label>
						</div>
						<div class="form-check">
							<label class="form-check-label">
								<input type="radio" name="type" value="coaching" <?php if (isset($type) && $type == "coaching") {
																						echo "checked";
																					} ?> class="form-check-input"> Coaching
							</label>
						</div>
					</div>
					<div class="col-md-3">
						<label class="font-weight-bold">Source</label>
						<div class="form-check">
							<label class="form-check-label">
								<input type="checkbox" name="Source[]" value="Facebook" <?php if (in_array("Facebook", $b)) {
																							echo "checked";
																						} ?> class="form-check-input">
								Facebook
							</label>
						</div>
						<div class="form-check">
							<label class="form-check-label">
								<input type="checkbox" name="Source[]" value="Linkedin" <?php if (in_array("Linkedin", $b)) {
																							echo "checked";
																						} ?> class="form-check-input">
								Linkedin
							</label>
						</div>
						<div class="form-check">
							<label class="form-check-label">
								<input type="checkbox" name="Source[]" value="Instagram" <?php if (in_array("Instagram", $b)) {
																								echo "checked";
																							} ?> class="form-check-input">
								Instagram
							</label>
						</div>
						<div class="form-check">
							<label class="form-check-label">
								<input type="checkbox" name="Source[]" value="Other" <?php if (in_array("Other", $b)) {
																							echo "checked";
																						} ?> class="form-check-input">Other</label>
						</div>
						<br>
						<label class="font-weight-bold">Friend Request Status </label>
						<div class="form-check">
							<label class="form-check-label">
								<input type="radio" class="form-check-input" name="requeststatus" value="Sent" <?php if (isset($connenction) && $connenction == "Sent") {
																													echo "checked";
																												} ?>> Sent
							</label>
						</div>
						<div class="form-check">
							<label class="form-check-label">
								<input type="radio" class="form-check-input" name="requeststatus" value="Accepted" <?php if (isset($connenction) && $connenction == "Accepted") {
																														echo "checked";
																													} ?>> Accepted
							</label>
						</div>
						<div class="form-check">
							<label class="form-check-label">
								<input type="radio" class="form-check-input" name="requeststatus" value="Pending" <?php if (isset($connenction) && $connenction == "Pending") {
																														echo "checked";
																													} ?>> Pending
							</label>
						</div>
						<br>
						<label class="font-weight-bold">Reply Status</label>
						<div class="form-check">
							<label class="form-check-label">
								<input type="radio" class="form-check-input" name="ReplyStatus" value="No" <?php if (isset($reply) && $reply == "No") {
																												echo "checked";
																											} ?>> No
							</label>
						</div>
						<div class="form-check">
							<label class="form-check-label">
								<input type="radio" class="form-check-input" name="ReplyStatus" value="Yes" <?php if (isset($reply) && $reply == "Yes") {
																												echo "checked";
																											} ?>> Yes
							</label>
						</div>
					</div>
					<div class="col-md-3">
						<label class="font-weight-bold">Level</label>
						<div class="form-check">
							<label class="form-check-label">
								<input type="radio" name="level" value="1" <?php if (isset($level) && $level == "0") {
																				echo "checked";
																			} ?> class="form-check-input"> Level 0 - Sent Friend Request/ Connection Request/ Welcome Message
							</label>
						</div>
						<div class="form-check">
							<label class="form-check-label">
								<input type="radio" name="level" value="1" <?php if (isset($level) && $level == "1") {
																				echo "checked";
																			} ?> class="form-check-input"> Level 1 - Cold Audience/ Want Info/ Educate
							</label>
						</div>
						<div class="form-check">
							<label class="form-check-label">
								<input type="radio" name="level" value="2" <?php if (isset($level) && $level == "2") {
																				echo "checked";
																			} ?> class="form-check-input"> Level 2 - Interested Audience
							</label>
						</div>
						<div class="form-check">
							<label class="form-check-label">
								<input type="radio" name="level" value="3" <?php if (isset($level) && $level == "3") {
																				echo "checked";
																			} ?> class="form-check-input"> Level 3 - Warm Audience / Had Interaction/Ready For Call
							</label>
						</div>
						<div class="form-check">
							<label class="form-check-label">
								<input type="radio" name="level" value="4" <?php if (isset($level) && $level == "4") {
																				echo "checked";
																			} ?> class="form-check-input"> Level 4 - Hot Audience /Ready For Offer
							</label>
						</div>
						<div class="form-check">
							<label class="form-check-label">
								<input type="radio" name="level" value="5" <?php if (isset($level) && $level == "5") {
																				echo "checked";
																			} ?> class="form-check-input"> Level 5 - No Match
							</label>
						</div>
					</div>
					<div class="col-md-12">
						<input type="submit" name="ok" value="Submit" style="color: #ffffff;background: #0000b3; height: 30px; width: 150px;border: #ff8000 1px solid; font-size: 17px;">
					</div>
				</div>
			</form>
		</div>
	</div>
</body>

</html>
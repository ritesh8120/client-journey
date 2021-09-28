<?php
session_start();
if(!isset($_SESSION["id"])) 
{
	header("Location:index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="image.css">
	<!-- <link rel="stylesheet" type="text/css" href="customstyle.css"> -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">	
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="detail.css">
<style>
	.adjust {
    font-size: 5.8px;
    fill: red;
    font-weight: 800;
}
.botom_text {
    font-size: 5px;
    font-weight: 800;
}
/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}
	.text{
            font-size: 10px;
        }
        .container{
            height: auto;
            width: 100%;
         }
        .botom_text{
            font-size: 5px;
            font-weight: 800;
        }
        text:hover + g.tooltip.css {
        opacity:1;
    }
    g.tooltip.css{
        fill: #111;
    }
    g.tooltip.css text{
        font-size: 6px;
        fill: #fff;
    }
    .adjust:hover{
        fill: #000;
        font-size: 6px;
        text-shadow: 2px 2px #ffb3b3;
    }
    .adjust{
        font-size:5.8px;
        fill: red;
        font-weight:800;
    }
</style>
</head>
<body>
	<div class="container">
		<img src="manas.png" class="img-fluid"  >
		<a id="log" class="float-right" href="logout"><i class="fas fa-sign-out-alt"></i> Logout </a>
		<?php 
		$user_id = $_REQUEST['upid'];
		include('config.php');
		$result = $conn->query("SELECT * FROM `client_info` WHERE cid='$user_id'");

  $sql = "SELECT posion FROM `client_info` WHERE cid='$user_id'";
  $result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($rows = $result->fetch_assoc()) {
        if ($rows["posion"] == '1') {
        	$tranfer = "d-block";
        	$Untranfer = "d-none";
        }else{
        	$tranfer = "d-none";
        	$Untranfer = "d-block";
        }
		?>
		<div class="btn btn-primary float-left mx-1 <?= $Untranfer ?>"> Prospect</div>
		<div class="btn btn-primary float-left mx-1 <?= $tranfer ?> ">client</div>

		<a class="btn btn-primary float-left mx-1" href="home">Home</a>
		<a class="btn btn-primary float-left mx-1" href="research?id=<?= $user_id ?>">Show Research</a>
		<a class="btn btn-primary float-left mx-1" href="notes?id=<?= $user_id?>">Show History</a><br><br><br><br>
		<div class="row">
         <div class="col-md-4 mx-auto">
            <div class="myform form ">
<table>
	<?php
if (isset($_REQUEST["upid"]))
{
	$delid = $_REQUEST["upid"];
	/********** 'localhost:3306','myporta7_ritesh','riteshjourny','myporta7_client' ********************/
// $dbconn = mysqli_connect("localhost","root","","client");
$sql = "SELECT * FROM `client_info` WHERE cid='$delid'";
$res = mysqli_query($conn, $sql);
if (mysqli_num_rows($res)>0) {
	while ($row=mysqli_fetch_array($res)) {
?>
	<tr><th>Name - </th>
		<td><?php echo $row['firstname']?><?php echo " ".$row['lastname']; ?></td>
	</tr>
	<tr><th>Email - </th>
		<td><?php echo $row['email']; ?></td>
	</tr>
	<tr><th>Phone - </th>
		<td><?php echo $row['phone']; ?></td>
	</tr>
	<tr><th>Address - </th>
		<td><?php echo $row['address']; ?></td>
	</tr>
	<tr><th>Source - </th>
		<td><?php echo $row['source'];  ?></td>
	</tr>
	<tr><th>Leadowner - </th>
		<td><?php echo $row['lead']; ?></td>
	</tr>
</table>
<br>

<!-- Button to Open the Modal -->
 <div class="tab">
 	<?php if ($row['posion'] =="1") {
 		?>
 		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#piram_id">Client Journey
  </button>
 		<?php
 	}else{
 	?>
 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Client Journey
  </button>
<?php } ?>
  <button id="Tranfer" data="<?php echo $delid; ?>" class="tablinks btn btn-primary <?php echo $row['posion'] =="1" ? 'active': '';?>" onclick="openCity(event, 'piramid')">Tranfer</button>
  <button id="Untranfer" data="<?php echo $delid;  ?>" class="tablinks btn btn-primary <?php echo $row['posion'] =="1" ? '': 'active'; }}} ?>" onclick="openCity(event, 'clientj')">Untranfer</button>
  
</div>
<br>
<?php
$asql = "SELECT Audience FROM `client_info` WHERE cid='$user_id'";
  $aresult = $conn->query($asql);
	while($arow = $aresult->fetch_assoc()) {
?>
<div class="funkyradio">
        <div class="funkyradio-default">
            <input type="radio" name="radio" class="Audience" value="1" id="radio1" <?php if(($arow['Audience'])=='1') echo "checked='checked'"; ?> />
            <label for="radio1" style="font-size: smaller;font-weight: 700;">Cold Audience/ Want Info/ Educate</label>
        </div>
        <div class="funkyradio-primary">
            <input type="radio" name="radio" class="Audience" value="2" id="radio2" <?php if(($arow['Audience'])=='2') echo "checked='checked'"; ?>/>
            <label for="radio2" style="font-size: smaller;font-weight: 700;">Interested Audience</label>
        </div>
        <div class="funkyradio-success">
            <input type="radio" name="radio" class="Audience" value="3" id="radio3" <?php if(($arow['Audience'])=='3') echo "checked='checked'"; ?>/>
            <span for="radio3" style="font-size: smaller;font-weight: 700;">Warm Audience / Had Interaction/Ready For Call</span>
        </div>
        <div class="funkyradio-danger">
            <input type="radio" name="radio" class="Audience" value="4" id="radio4" <?php if(($arow['Audience'])=='4') echo "checked='checked'"; ?>/>
            <label for="radio4" style="font-size: smaller;font-weight: 700;">Hot Audience /Ready For Offer</label>
        </div>
        <div class="funkyradio-danger">
            <input type="radio" name="radio" class="Audience" value="5" id="radio5" <?php if(($arow['Audience'])=='5') echo "checked='checked'"; ?>/>
            <label for="radio5" style="font-size: smaller;font-weight: 700;">No Match</label>
        </div>
    </div>
<?php } ?>
</div></div></div>

  <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h3>Client Journey</h3>
          <a class="btn btn-info font-weight-bold" style="padding: 10px 43px; margin-left: 20px;" href="edit?upid=<?php echo $delid ?>">Edit</a>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
         <form method="post">
			<div class="flex-container">
			<?php 
		
		$result = $conn->query("SELECT * FROM `clientpogistion` WHERE clientid ='$delid' ORDER BY `form_no`");
		if ($result->num_rows >0){
			while ($row = $result->fetch_assoc()) {
			?>	
			<div>
				<input type="checkbox" name="cj[]" class="test_done" data="<?php echo $row['id']; ?>" <?php if(($row['cstatus'])=='1') echo "checked='checked'"; ?> data-toggle="checkbox" value="<?php echo $row['checkboxname'] ?>">
					<?php echo $row['checkboxname']	?>
					</div>           
		<?php  }			
		}
		 ?>		</div>
		 			<input type="submit" id="f1" class="btn btn-warning font-weight-bold" name="btn1" id="btn1" value="submit" style="padding: 10px 30px;"><br><br>
					
	</form>
</div>
        
      </div>
    </div>
  </div>
  
  <!-- The Modal -->
  <div class="modal" id="piram_id">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h3>Client Journey</h3>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        <form method="post">
        	<h3>PERSONAL</h3>
			<div class="flex-container">
				<div>
					<h6>1. DISCOVERY SESSION</h6>
					<?php
			$result = $conn->query("SELECT * FROM `personal` WHERE client_id ='$delid' AND form_name = 'Discover Session' ");
			while ($row = $result->fetch_assoc()) {
			?>	
			<div>
				<input type="checkbox" name="pj[]" class="p_done" data="<?php echo $row['id']; ?>" <?php if(($row['ustatus'])=='1') echo "checked='checked'"; ?> data-toggle="checkbox" value="<?php echo $row['form_name'] ?>">
					<?php echo $row['form_name']; ?>
					</div>           
		<?php  } ?>
				</div>

				<div>
					<h6>2. GOAL SETTING</h6>
					<?php
			$result = $conn->query("SELECT * FROM `personal` WHERE client_id ='$delid' AND form_name = 'Client pondring Sheet' ");
			while ($row = $result->fetch_assoc()) {
			?>	
			<div>
				<input type="checkbox" name="pj[]" class="p_done" data="<?php echo $row['id']; ?>" <?php if(($row['ustatus'])=='1') echo "checked='checked'"; ?> data-toggle="checkbox" value="<?php echo $row['form_name'] ?>">
					<?php echo $row['form_name']; ?>
					</div>           
		<?php  } ?>
		<?php
			$result = $conn->query("SELECT * FROM `personal` WHERE client_id ='$delid' AND form_name = 'Goal setting' ");
			while ($row = $result->fetch_assoc()) {
			?>	
			<div>
				<input type="checkbox" name="pj[]" class="p_done" data="<?php echo $row['id']; ?>" <?php if(($row['ustatus'])=='1') echo "checked='checked'"; ?> data-toggle="checkbox" value="<?php echo $row['form_name'] ?>">
					<?php echo $row['form_name']; ?>
					</div>           
		<?php  } ?>
				</div>
				
				<div>
					<h6>3. ACTION PLAN AGREEMENT</h6>
					<?php
			$result = $conn->query("SELECT * FROM `personal` WHERE client_id ='$delid' AND form_name = 'Action Plan Agreement Sheet' ");
			while ($row = $result->fetch_assoc()) {
			?>	
			<div>
				<input type="checkbox" name="pj[]" class="p_done" data="<?php echo $row['id']; ?>" <?php if(($row['ustatus'])=='1') echo "checked='checked'"; ?> data-toggle="checkbox" value="<?php echo $row['form_name'] ?>">
					<?php echo $row['form_name']; ?>
					</div>           
		<?php  } ?>
				</div>

				<div>
					<h6>4. ADJUST BELIEF & VALUES</h6>
					<?php
			$result = $conn->query("SELECT * FROM `personal` WHERE client_id ='$delid' AND form_name = 'What Do You Need To Let Go Of' ");
			while ($row = $result->fetch_assoc()) {
			?>	
			<div>
				<input type="checkbox" name="pj[]" class="p_done" data="<?php echo $row['id']; ?>" <?php if(($row['ustatus'])=='1') echo "checked='checked'"; ?> data-toggle="checkbox" value="<?php echo $row['form_name'] ?>">
					<?php echo $row['form_name']; ?>
					</div>           
		<?php  } ?>
		<?php
			$result = $conn->query("SELECT * FROM `personal` WHERE client_id ='$delid' AND form_name = 'Conflict Belief' ");
			while ($row = $result->fetch_assoc()) {
			?>	
			<div>
				<input type="checkbox" name="pj[]" class="p_done" data="<?php echo $row['id']; ?>" <?php if(($row['ustatus'])=='1') echo "checked='checked'"; ?> data-toggle="checkbox" value="<?php echo $row['form_name'] ?>">
					<?php echo $row['form_name']; ?>
					</div>           
		<?php  } ?>
				</div>

				<div>
					<h6>5. ENERGY DETOX & SHIELD</h6>
					<?php
			$result = $conn->query("SELECT * FROM `personal` WHERE client_id ='$delid' AND form_name = 'Stop procrastinating and get it done' ");
			while ($row = $result->fetch_assoc()) {
			?>	
			<div>
				<input type="checkbox" name="pj[]" class="p_done" data="<?php echo $row['id']; ?>" <?php if(($row['ustatus'])=='1') echo "checked='checked'"; ?> data-toggle="checkbox" value="<?php echo $row['form_name'] ?>">
					<?php echo $row['form_name']; ?>
					</div>           
		<?php  } ?>
		<?php
			$result = $conn->query("SELECT * FROM `personal` WHERE client_id ='$delid' AND form_name = 'Daily Success Habits' ");
			while ($row = $result->fetch_assoc()) {
			?>	
			<div>
				<input type="checkbox" name="pj[]" class="p_done" data="<?php echo $row['id']; ?>" <?php if(($row['ustatus'])=='1') echo "checked='checked'"; ?> data-toggle="checkbox" value="<?php echo $row['form_name'] ?>">
					<?php echo $row['form_name']; ?>
					</div>           
		<?php  } ?>
		<?php
			$result = $conn->query("SELECT * FROM `personal` WHERE client_id ='$delid' AND form_name = 'Energy zappers' ");
			while ($row = $result->fetch_assoc()) {
			?>	
			<div>
				<input type="checkbox" name="pj[]" class="p_done" data="<?php echo $row['id']; ?>" <?php if(($row['ustatus'])=='1') echo "checked='checked'"; ?> data-toggle="checkbox" value="<?php echo $row['form_name'] ?>">
					<?php echo $row['form_name']; ?>
					</div>           
		<?php  } ?>
		<?php
			$result = $conn->query("SELECT * FROM `personal` WHERE client_id ='$delid' AND form_name = 'My spark team' ");
			while ($row = $result->fetch_assoc()) {
			?>	
			<div>
				<input type="checkbox" name="pj[]" class="p_done" data="<?php echo $row['id']; ?>" <?php if(($row['ustatus'])=='1') echo "checked='checked'"; ?> data-toggle="checkbox" value="<?php echo $row['form_name'] ?>">
					<?php echo $row['form_name']; ?>
					</div>           
		<?php  } ?>
		<?php
			$result = $conn->query("SELECT * FROM `personal` WHERE client_id ='$delid' AND form_name = 'What Makes My Heart Sing' ");
			while ($row = $result->fetch_assoc()) {
			?>	
			<div>
				<input type="checkbox" name="pj[]" class="p_done" data="<?php echo $row['id']; ?>" <?php if(($row['ustatus'])=='1') echo "checked='checked'"; ?> data-toggle="checkbox" value="<?php echo $row['form_name'] ?>">
					<?php echo $row['form_name']; ?>
					</div>           
		<?php  } ?>
				</div>

				<div>
					<h6>6. ACTIVATE PROJECTION POWERS</h6>
					<?php
			$result = $conn->query("SELECT * FROM `personal` WHERE client_id ='$delid' AND form_name = 'Mentor Magic' ");
			while ($row = $result->fetch_assoc()) {
			?>	
			<div>
				<input type="checkbox" name="pj[]" class="p_done" data="<?php echo $row['id']; ?>" <?php if(($row['ustatus'])=='1') echo "checked='checked'"; ?> data-toggle="checkbox" value="<?php echo $row['form_name'] ?>">
					<?php echo $row['form_name']; ?>
					</div>           
		<?php  } ?>
				</div>

				<div>
					<h6>7. EVALUATE RESULTS</h6>
					<?php
			$result = $conn->query("SELECT * FROM `personal` WHERE client_id ='$delid' AND form_name = 'Golden Image List' ");
			while ($row = $result->fetch_assoc()) {
			?>	
			<div>
				<input type="checkbox" name="pj[]" class="p_done" data="<?php echo $row['id']; ?>" <?php if(($row['ustatus'])=='1') echo "checked='checked'"; ?> data-toggle="checkbox" value="<?php echo $row['form_name'] ?>">
					<?php echo $row['form_name']; ?>
					</div>           
		<?php  } ?>
				</div>
				<div>
					<h6>8. RECONCLILE RESULTS</h6>
					<?php
			$result = $conn->query("SELECT * FROM `personal` WHERE client_id ='$delid' AND form_name = 'Monthly Client Review and Feedback' ");
			while ($row = $result->fetch_assoc()) {
			?>	
			<div>
				<input type="checkbox" name="pj[]" class="p_done" data="<?php echo $row['id']; ?>" <?php if(($row['ustatus'])=='1') echo "checked='checked'"; ?> data-toggle="checkbox" value="<?php echo $row['form_name'] ?>">
					<?php echo $row['form_name']; ?>
					</div>           
		<?php  } ?>
				</div>
				<div>
					<h6>9. REJOICE REPEAT</h6>
					<input type="checkbox" name="pj[]" class="p_done" data="<?php echo $row['id']; ?>" data-toggle="checkbox" value="."> .
				</div>

			</div>
			<input type="submit" id="fill1" class="btn btn-warning font-weight-bold" value="submit" data="<?php echo $delid; ?>" style="padding: 10px 30px;"><br><br>		
		</form>
		
		<form method="post">
        	<h3>BUSINESS</h3>
			<div class="flex-container">

				<div>
					<h6>1. YOUR PURPOSE-VISION-MASSAGE</h6>
					<?php
			$result = $conn->query("SELECT * FROM `business` WHERE client_id ='$delid' AND form_name = 'A-1 Your business vision' ");
			while ($row = $result->fetch_assoc()) {
			?>	
			<div>
				<input type="checkbox" name="bj[]" class="b_done" data="<?php echo $row['id']; ?>" <?php if(($row['ustatus'])=='1') echo "checked='checked'"; ?> data-toggle="checkbox" value="<?php echo $row['form_name'] ?>">
					<?php echo $row['form_name']; ?>
					</div>           
		<?php  } ?>
		<?php
			$result = $conn->query("SELECT * FROM `business` WHERE client_id ='$delid' AND form_name = 'A-2 Branding exercise' ");
			while ($row = $result->fetch_assoc()) {
			?>	
			<div>
				<input type="checkbox" name="bj[]" class="b_done" data="<?php echo $row['id']; ?>" <?php if(($row['ustatus'])=='1') echo "checked='checked'"; ?> data-toggle="checkbox" value="<?php echo $row['form_name'] ?>">
					<?php echo $row['form_name']; ?>
					</div>           
		<?php  } ?>
				</div>

				<div>
					<h6>2. YOUR TRIBE-PROBLEM-SOLUTION</h6>
					<?php
						$result = $conn->query("SELECT * FROM `business` WHERE client_id ='$delid' AND form_name = 'A-3 Client profile' ");
						while ($row = $result->fetch_assoc()) {
					?>	
				<div>
				<input type="checkbox" name="bj[]" class="b_done" data="<?php echo $row['id']; ?>" <?php if(($row['ustatus'])=='1') echo "checked='checked'"; ?> data-toggle="checkbox" value="<?php echo $row['form_name'] ?>">
					<?php echo $row['form_name']; ?>
					</div>           
		<?php  } 
			$result = $conn->query("SELECT * FROM `business` WHERE client_id ='$delid' AND form_name = 'A-4 Why people buy what youre Selling' ");
			while ($row = $result->fetch_assoc()) {
			?>	
			<div>
				<input type="checkbox" name="bj[]" class="b_done" data="<?php echo $row['id']; ?>" <?php if(($row['ustatus'])=='1') echo "checked='checked'"; ?> data-toggle="checkbox" value="<?php echo $row['form_name'] ?>">
					<?php echo $row['form_name']; ?>
					</div>           
		<?php  } 
			$result = $conn->query("SELECT * FROM `business` WHERE client_id ='$delid' AND form_name = 'A-5 How to talk about your new Avatar' ");
			while ($row = $result->fetch_assoc()) {
			?>	
			<div>
				<input type="checkbox" name="bj[]" class="b_done" data="<?php echo $row['id']; ?>" <?php if(($row['ustatus'])=='1') echo "checked='checked'"; ?> data-toggle="checkbox" value="<?php echo $row['form_name'] ?>">
					<?php echo $row['form_name']; ?>
					</div>           
		<?php  } 
			$result = $conn->query("SELECT * FROM `business` WHERE client_id ='$delid' AND form_name = 'B-5 49 Questions + Bio' ");
			while ($row = $result->fetch_assoc()) {
			?>	
			<div>
				<input type="checkbox" name="bj[]" class="b_done" data="<?php echo $row['id']; ?>" <?php if(($row['ustatus'])=='1') echo "checked='checked'"; ?> data-toggle="checkbox" value="<?php echo $row['form_name'] ?>">
					<?php echo $row['form_name']; ?>
					</div>           
		<?php  } ?>
				</div>

				<div>
					<h6>3. MARKET VALIDATION-SOFT LAUNCH</h6>
					<?php
						$result = $conn->query("SELECT * FROM `business` WHERE client_id ='$delid' AND form_name = 'B-14 60 day Launch check list From conceptualization to postmortem' ");
						while ($row = $result->fetch_assoc()) {
					?>	
				<div>
				<input type="checkbox" name="bj[]" class="b_done" data="<?php echo $row['id']; ?>" <?php if(($row['ustatus'])=='1') echo "checked='checked'"; ?> data-toggle="checkbox" value="<?php echo $row['form_name'] ?>">
					<?php echo $row['form_name']; ?>
					</div>           
		<?php  } 
			$result = $conn->query("SELECT * FROM `business` WHERE client_id ='$delid' AND form_name = 'A-10 Idea Mapping- Niche tightening' ");
			while ($row = $result->fetch_assoc()) {
			?>	
			<div>
				<input type="checkbox" name="bj[]" class="b_done" data="<?php echo $row['id']; ?>" <?php if(($row['ustatus'])=='1') echo "checked='checked'"; ?> data-toggle="checkbox" value="<?php echo $row['form_name'] ?>">
					<?php echo $row['form_name']; ?>
					</div>           
		<?php  } 
			$result = $conn->query("SELECT * FROM `business` WHERE client_id ='$delid' AND form_name = 'B-7 Pre-selling your high end program' ");
			while ($row = $result->fetch_assoc()) {
			?>	
			<div>
				<input type="checkbox" name="bj[]" class="b_done" data="<?php echo $row['id']; ?>" <?php if(($row['ustatus'])=='1') echo "checked='checked'"; ?> data-toggle="checkbox" value="<?php echo $row['form_name'] ?>">
					<?php echo $row['form_name']; ?>
					</div>           
		<?php  } 
			$result = $conn->query("SELECT * FROM `business` WHERE client_id ='$delid' AND form_name = 'A-11 client interview approach questionnaire?' ");
			while ($row = $result->fetch_assoc()) {
			?>	
			<div>
				<input type="checkbox" name="bj[]" class="b_done" data="<?php echo $row['id']; ?>" <?php if(($row['ustatus'])=='1') echo "checked='checked'"; ?> data-toggle="checkbox" value="<?php echo $row['form_name'] ?>">
					<?php echo $row['form_name']; ?>
					</div>           
		<?php  } ?>
				</div>
				<div>
					<h6>4. CONCEPT DELIVERY</h6>
					<?php
			$result = $conn->query("SELECT * FROM `business` WHERE client_id ='$delid' AND form_name = 'B-1 The Sales cycle' ");
			while ($row = $result->fetch_assoc()) {
			?>	
			<div>
				<input type="checkbox" name="bj[]" class="b_done" data="<?php echo $row['id']; ?>" <?php if(($row['ustatus'])=='1') echo "checked='checked'"; ?> data-toggle="checkbox" value="<?php echo $row['form_name'] ?>">
					<?php echo $row['form_name']; ?>
					</div>           
		<?php  } ?>
		<?php
			$result = $conn->query("SELECT * FROM `business` WHERE client_id ='$delid' AND form_name = 'B-2 Self- Promotion strategies' ");
			while ($row = $result->fetch_assoc()) {
			?>	
			<div>
				<input type="checkbox" name="bj[]" class="b_done" data="<?php echo $row['id']; ?>" <?php if(($row['ustatus'])=='1') echo "checked='checked'"; ?> data-toggle="checkbox" value="<?php echo $row['form_name'] ?>">
					<?php echo $row['form_name']; ?>
					</div>           
		<?php  } ?>
				</div>
				<div>
					<h6>5. MEDIUM & STRATEGY</h6>
					<?php
			$result = $conn->query("SELECT * FROM `business` WHERE client_id ='$delid' AND form_name = 'B-9 Launch Emails' ");
			while ($row = $result->fetch_assoc()) {
			?>	
			<div>
				<input type="checkbox" name="bj[]" class="b_done" data="<?php echo $row['id']; ?>" <?php if(($row['ustatus'])=='1') echo "checked='checked'"; ?> data-toggle="checkbox" value="<?php echo $row['form_name'] ?>">
					<?php echo $row['form_name']; ?>
					</div>           
		<?php  } ?>
		<?php
			$result = $conn->query("SELECT * FROM `business` WHERE client_id ='$delid' AND form_name = 'B-3 Know like trust- launch' ");
			while ($row = $result->fetch_assoc()) {
			?>	
			<div>
				<input type="checkbox" name="bj[]" class="b_done" data="<?php echo $row['id']; ?>" <?php if(($row['ustatus'])=='1') echo "checked='checked'"; ?> data-toggle="checkbox" value="<?php echo $row['form_name'] ?>">
					<?php echo $row['form_name']; ?>
					</div>           
		<?php  } ?>
				</div>

				<div>
					<h6>6. CRAFT COPY & PRODUCTS</h6>
					<?php
						$result = $conn->query("SELECT * FROM `business` WHERE client_id ='$delid' AND form_name = 'A-7 Creating the know like & trust factor' ");
						while ($row = $result->fetch_assoc()) {
					?>	
				<div>
				<input type="checkbox" name="bj[]" class="b_done" data="<?php echo $row['id']; ?>" <?php if(($row['ustatus'])=='1') echo "checked='checked'"; ?> data-toggle="checkbox" value="<?php echo $row['form_name'] ?>">
					<?php echo $row['form_name']; ?>
					</div>           
		<?php  } 
			$result = $conn->query("SELECT * FROM `business` WHERE client_id ='$delid' AND form_name = 'A-8 Product creation' ");
			while ($row = $result->fetch_assoc()) {
			?>	
			<div>
				<input type="checkbox" name="bj[]" class="b_done" data="<?php echo $row['id']; ?>" <?php if(($row['ustatus'])=='1') echo "checked='checked'"; ?> data-toggle="checkbox" value="<?php echo $row['form_name'] ?>">
					<?php echo $row['form_name']; ?>
					</div>           
		<?php  } 
			$result = $conn->query("SELECT * FROM `business` WHERE client_id ='$delid' AND form_name = 'B-6 content structure' ");
			while ($row = $result->fetch_assoc()) {
			?>	
			<div>
				<input type="checkbox" name="bj[]" class="b_done" data="<?php echo $row['id']; ?>" <?php if(($row['ustatus'])=='1') echo "checked='checked'"; ?> data-toggle="checkbox" value="<?php echo $row['form_name'] ?>">
					<?php echo $row['form_name']; ?>
					</div>           
		<?php  } 
			$result = $conn->query("SELECT * FROM `business` WHERE client_id ='$delid' AND form_name = 'A-9 Perfect pricing & simple selling' ");
			while ($row = $result->fetch_assoc()) {
			?>	
			<div>
				<input type="checkbox" name="bj[]" class="b_done" data="<?php echo $row['id']; ?>" <?php if(($row['ustatus'])=='1') echo "checked='checked'"; ?> data-toggle="checkbox" value="<?php echo $row['form_name'] ?>">
					<?php echo $row['form_name']; ?>
					</div>           
		<?php  } ?>
				</div>

				<div>
					<h6>7. SITES-TECH-PAYMENT MECHANSIM</h6>
					<?php  
			$result = $conn->query("SELECT * FROM `business` WHERE client_id ='$delid' AND form_name = 'B-8 Launch Details' ");
			while ($row = $result->fetch_assoc()) {
			?>	
			<div>
				<input type="checkbox" name="bj[]" class="b_done" data="<?php echo $row['id']; ?>" <?php if(($row['ustatus'])=='1') echo "checked='checked'"; ?> data-toggle="checkbox" value="<?php echo $row['form_name'] ?>">
					<?php echo $row['form_name']; ?>
					</div>           
		<?php  } ?>
				</div>
				<div>
					<h6>8. SYNCRONIZED LAUNCH</h6>
					<?php  
			$result = $conn->query("SELECT * FROM `business` WHERE client_id ='$delid' AND form_name = 'A-6 The transformation stepping into the new Avatar' ");
			while ($row = $result->fetch_assoc()) {
			?>	
			<div>
				<input type="checkbox" name="bj[]" class="b_done" data="<?php echo $row['id']; ?>" <?php if(($row['ustatus'])=='1') echo "checked='checked'"; ?> data-toggle="checkbox" value="<?php echo $row['form_name'] ?>">
					<?php echo $row['form_name']; ?>
					</div>           
		<?php  } ?>
		<?php  
			$result = $conn->query("SELECT * FROM `business` WHERE client_id ='$delid' AND form_name = 'B-12 Pulling it all togeather' ");
			while ($row = $result->fetch_assoc()) {
			?>	
			<div>
				<input type="checkbox" name="bj[]" class="b_done" data="<?php echo $row['id']; ?>" <?php if(($row['ustatus'])=='1') echo "checked='checked'"; ?> data-toggle="checkbox" value="<?php echo $row['form_name'] ?>">
					<?php echo $row['form_name']; ?>
					</div>           
		<?php  } ?>
				</div>
				<div>
					<h6>9. EVALUATE & ADJUST</h6>
					<?php  
			$result = $conn->query("SELECT * FROM `business` WHERE client_id ='$delid' AND form_name = 'B-10 Getting your client to Finish Line' ");
			while ($row = $result->fetch_assoc()) {
			?>	
			<div>
				<input type="checkbox" name="bj[]" class="b_done" data="<?php echo $row['id']; ?>" <?php if(($row['ustatus'])=='1') echo "checked='checked'"; ?> data-toggle="checkbox" value="<?php echo $row['form_name'] ?>">
					<?php echo $row['form_name']; ?>
					</div>           
		<?php  } ?>
				</div>

			</div>
			<input type="submit" id="f1" class="btn btn-warning font-weight-bold" value="submit" style="padding: 10px 30px;"><br><br>		
		</form>
		</div>
        
      </div>
    </div>
  </div>


<div id="clientj" class="container <?php echo $Untranfer; ?>"  style="margin-top: 200px;">
	<ul class="progressbar">
<?php 	
// $conn = new mysqli("localhost","root","","client");
		$result = $conn->query("SELECT * FROM `clientpogistion` WHERE clientid ='$delid' ORDER BY `form_no`");
		  if ($result->num_rows >0)
		  {
			while ($row = $result->fetch_assoc()) 
			{
				$result1 = $conn->query("SELECT * FROM `clientpogistion` WHERE clientid ='$delid' AND cstatus = '1' AND form_no ='".$row['form_no']."' ");
		  		if ($result1->num_rows >0)
		  		{
					while ($row1 = $result1->fetch_assoc()) 
					{	?>
						<li class='fill'><a href="update?uid=<?php echo $row1['id']; ?>" style="color: red; text-decoration: none; "><?php echo $row1['checkboxname'] ?></a><br><br> </li>
			<?php 	}
				}else{
						echo "<li class='blank'><br><br></li>";
					}
			}
		  }	 ?>
</ul></div>.
	
<div id="piramid" class="<?php echo $tranfer; ?>" >
<?php }} ?>
	<div class="container">
    <svg viewBox="0 0 400 200">
        <defs>
            <linearGradient id="topcolor" x1="0%" y1="0%" x2="0%" y2="100%">
                <stop offset="0%" stop-color="#006600"></stop>
                <stop offset="100%" stop-color="#996633" stop-opacity="1"></stop>
            </linearGradient>
        </defs>
        <g>
            <polygon points="100,200 170,20 230,200" style="fill:none;stroke:url(#topcolor);"></polygon>
            <polygon points="143,90 170,20 193,90" style="fill:url(#topcolor);stroke:none;"></polygon>
        </g>

        <g>
            <path d="M100 200 L112,170 Q170 140 220 170 L230 200 Z" fill="#4da6ff"></path>
            <path d="M112 170 Q170 140 220 170 Q214 150 210 140 Q170 110 123 140 Q 123 140 112 170 " fill="#00ffff"></path>
            <path d="M123 140 Q170 120 210 140 Q202 118 200 110 Q170 100 135 110 Q132 120 123 140 " fill="#ff8080"></path>
            <path d="M135 110 Q170 100 200 110 Q196 100 193 90 Q170 80 143 90 Q139 100 135 110 " fill="#e6e600"></path>
        <g>
            <text x="155" y="162" style="font-size: 7px; font-weight: bold; fill:#fff;">VICTIM</text>
            <text x="148" y="139" style="font-size: 7px; font-weight: bold;fill:#fff;">BELIEVER</text>
            <text x="143" y="114" style="font-size: 7px; font-weight: bold;fill:#fff;">APPRENTICE</text>
            <text x="145" y="95" style="font-size: 7px; font-weight: bold;fill:#fff;">MANIFESTOR</text>
            <text x="156.5" y="63" style="font-size: 6.7px; font-weight: bold;fill:#fff;">MYSTIC</text>
            <text x="156.5" y="69" style="font-size: 5px; font-weight: bold;fill:#fff;">CREATOR</text>
        </g>
        <g>
            <polygon points="100,200 115,185 215,185 230,200" style="fill:#996633;stroke:none;stroke-width:2"></polygon>
            <text x="112" y="195" class="botom_text">5 SHIFTS IN CONSCIOUSNESS LEVELS</text>
        </g>
        <g>
        	<?php
	     $result1 = $conn->query("SELECT * FROM `personal` WHERE `client_id`='$delid' AND `form_no`='1' ");
	     $result2 = $conn->query("SELECT * FROM `personal` WHERE `client_id`='$delid' AND `form_no`='2' ");
	     $result3 = $conn->query("SELECT * FROM `personal` WHERE `client_id`='$delid' AND `form_no`='3' ");
	     $result4 = $conn->query("SELECT * FROM `personal` WHERE `client_id`='$delid' AND `form_no`='4' ");
	     $result5 = $conn->query("SELECT * FROM `personal` WHERE `client_id`='$delid' AND `form_no`='5' ");
	     $result6 = $conn->query("SELECT * FROM `personal` WHERE `client_id`='$delid' AND `form_no`='6' ");
	     $result7 = $conn->query("SELECT * FROM `personal` WHERE `client_id`='$delid' AND `form_no`='7' ");
	     $result8 = $conn->query("SELECT * FROM `personal` WHERE `client_id`='$delid' AND `form_no`='8' ");
	     $result9 = $conn->query("SELECT * FROM `personal` WHERE `client_id`='$delid' AND `form_no`='9' ");
	     $result10 = $conn->query("SELECT * FROM `personal` WHERE `client_id`='$delid' AND `form_no`='10' ");
	     $result11 = $conn->query("SELECT * FROM `personal` WHERE `client_id`='$delid' AND `form_no`='11' ");
	     $result12 = $conn->query("SELECT * FROM `personal` WHERE `client_id`='$delid' AND `form_no`='12' ");
	     $result13 = $conn->query("SELECT * FROM `personal` WHERE `client_id`='$delid' AND `form_no`='13' ");
	     $result14 = $conn->query("SELECT * FROM `personal` WHERE `client_id`='$delid' AND `form_no`='14' ");
	     $row1 = $result1->fetch_assoc();
	     $row2 = $result2->fetch_assoc();
	     $row3 = $result3->fetch_assoc();
	     $row4 = $result4->fetch_assoc();
	     $row5 = $result5->fetch_assoc();
	     $row6 = $result6->fetch_assoc();
	     $row7 = $result7->fetch_assoc();
	     $row8 = $result8->fetch_assoc();
	     $row9 = $result9->fetch_assoc();
	     $row10 = $result10->fetch_assoc();
	     $row11 = $result11->fetch_assoc();
	     $row12 = $result12->fetch_assoc();
	     $row13 = $result13->fetch_assoc();
	     $row14 = $result14->fetch_assoc();
	    ?>
        <g>
	        <rect x="140" y="20" width="20" height="20" style="fill: #0066cc; stroke:#0059b3;"></rect>
	        <text x="150" y="35" class="text">9</text>
	    </g>
	    <?php if ($row14['ustatus']) { ?>
	    <g>
	        <rect x="130" y="40" width="20" height="20" style="fill: #4dff4d; stroke:#009900;"></rect>
	        <text x="140" y="55" class="text" fill="#009900">8</text>
	    </g>
	<?php }else{ ?>
	    <g>
	        <rect x="130" y="40" width="20" height="20" style="fill: #0066cc; stroke:#0059b3;"></rect>
	        <text x="140" y="55" class="text">8</text>
	    </g>
	<?php } 
		if ($row13['ustatus'] == '1') { ?>
	    <g>
	        <rect x="120" y="60" width="20" height="20" style="fill: #4dff4d; stroke:#009900;"></rect>
	        <text x="130" y="75" class="text" fill="#009900">7</text>
	    </g><?php }else{ ?>
	    <g>
	        <rect x="120" y="60" width="20" height="20" style="fill: #0066cc; stroke:#0059b3;"></rect>
	        <text x="130" y="75" class="text">7</text>
	    </g><?php } 
	    	if ($row12['ustatus'] == '1') { ?>
	    <g>
	        <rect x="110" y="80" width="20" height="20" style="fill: #4dff4d; stroke:#009900;"></rect>
	        <text x="120" y="95" class="text" fill="#009900">6</text>
	    </g>	    	
	    <?php }else{ ?>
	    <g>
	        <rect x="110" y="80" width="20" height="20" style="fill: #0066cc; stroke:#0059b3;"></rect>
	        <text x="120" y="95" class="text">6</text>
	    </g><?php } 
	    	if ($row7['ustatus'] == '1' AND $row8['ustatus'] == '1' AND $row9['ustatus'] == '1' AND
	    $row10['ustatus'] == '1' AND $row11['ustatus'] == '1' ) { ?>
	    <g>
	        <rect x="105" y="100" width="20" height="20" style="fill: #4dff4d; stroke:#009900;"></rect>
	        <text x="115" y="115" class="text" fill="#009900">5</text>
	    </g>
	    <?php }elseif(($row7['ustatus'] == '1' AND $row8['ustatus'] == '1' AND $row9['ustatus'] == '1') or
	    ($row10['ustatus'] == '1' AND $row11['ustatus'] == '1' )){ ?>
	    <g>
	        <rect x="105" y="100" width="20" height="20" style="fill: #ffff4d; stroke:#b3b300;"></rect>
	        <text x="115" y="115" class="text" fill="#b3b300">5</text>
	    </g>)
	    <?php }elseif(($row7['ustatus'] == '1' AND $row8['ustatus'] == '1') or (($row9['ustatus'] == '1') AND
	    ($row10['ustatus'] == '1') or ($row11['ustatus'] == '1'))){ ?>
	    <g>
	        <rect x="105" y="100" width="20" height="20" style="fill: #ff8000; stroke:#cc6600;"></rect>
	        <text x="115" y="115" class="text" fill="#cc6600">5</text>
	    </g>
	    <?php }elseif($row7['ustatus'] == '1'or $row8['ustatus'] == '1' or $row9['ustatus'] == '1' or
	    $row10['ustatus'] == '1' or $row11['ustatus'] == '1'){ ?>
	    <g>
	        <rect x="105" y="100" width="20" height="20" style="fill: #ff3333; stroke:#e60000;"></rect>
	        <text x="115" y="115" class="text" fill="#e60000">5</text>
	    </g>
	    <?php }else{ ?>
	    <g>
	        <rect x="105" y="100" width="20" height="20" style="fill: #0066cc; stroke:#0059b3;"></rect>
	        <text x="115" y="115" class="text">5</text>
	    </g><?php } 
	   		if ($row5['ustatus'] == '1' AND $row6['ustatus'] == '1' ) { ?>
	    <g>
	        <rect x="100" y="120" width="20" height="20" style="fill: #4dff4d; stroke:#009900;"></rect>
	        <text x="105" y="135" class="text" fill="#009900">4</text>
	    </g>
	    <?php }elseif ($row5['ustatus'] == '1' or $row6['ustatus'] == '1') { ?>
	    <g>
	        <rect x="100" y="120" width="20" height="20" style="fill: #ff8000; stroke:#cc6600;"></rect>
	        <text x="105" y="135" class="text" fill="#cc6600">4</text>
	    </g>
	    <?php }else{ ?>
	    <g>
	        <rect x="100" y="120" width="20" height="20" style="fill: #0066cc; stroke:#0059b3;"></rect>
	        <text x="105" y="135" class="text">4</text>
	    </g><?php } 
	    	if ($row4['ustatus'] == '1') { ?>
	    	<g>
	        <rect x="90" y="140" width="20" height="20" style="fill: #4dff4d; stroke:#009900;"></rect>
	        <text x="95" y="155" class="text" fill="#009900">3</text>
	    </g>
		<?php   }else{ ?>
	    <g>
	        <rect x="90" y="140" width="20" height="20" style="fill: #0066cc; stroke:#0059b3;"></rect>
	        <text x="95" y="155" class="text">3</text>
	    </g>
	    <?php } 
	    	if ($row2['ustatus'] == '1' AND $row3['ustatus'] == '1' ) { ?>
	    <g>
	        <rect x="80" y="160" width="20" height="20" style="fill: #4dff4d; stroke:#009900;"></rect>
	        <text x="85" y="175" class="text" fill="#009900">2</text>
	    </g>
	    <?php }elseif ($row2['ustatus'] == '1' or $row3['ustatus'] == '1') { ?>
	    <g>
	        <rect x="80" y="160" width="20" height="20" style="fill: #ff8000; stroke:#cc6600;"></rect>
	        <text x="85" y="175" class="text" fill="#cc6600">2</text>
	    </g>
	<?php }else{ ?>
	    <g>
	        <rect x="80" y="160" width="20" height="20" style="fill: #0066cc; stroke:#0059b3;"></rect>
	        <text x="85" y="175" class="text">2</text>
	    </g><?php } ?>
	    <?php if ($row1['ustatus'] == '1') { ?>
	    	<g><rect x="70" y="180" width="20" height="20" style='fill:#4dff4d;stroke:#009900;'></rect>
	    	<text x="75" y="195" class="text" fill="#009900">1</text>
	    </g>
	    	<?php }else{ ?>
	    <g><rect x="70" y="180" width="20" height="20" style="fill: #0066cc; stroke:#0059b3;"></rect>
	    	<text x="75" y="195" class="text">1</text>
	    </g><?php } ?>
	</g>



<?php
	     $res1 = $conn->query("SELECT * FROM `business` WHERE `client_id`='$delid' AND `form_no`='1' ");
	     $res2 = $conn->query("SELECT * FROM `business` WHERE `client_id`='$delid' AND `form_no`='2' ");
	     $res3 = $conn->query("SELECT * FROM `business` WHERE `client_id`='$delid' AND `form_no`='3' ");
	     $res4 = $conn->query("SELECT * FROM `business` WHERE `client_id`='$delid' AND `form_no`='4' ");
	     $res5 = $conn->query("SELECT * FROM `business` WHERE `client_id`='$delid' AND `form_no`='5' ");
	     $res6 = $conn->query("SELECT * FROM `business` WHERE `client_id`='$delid' AND `form_no`='6' ");
	     $res7 = $conn->query("SELECT * FROM `business` WHERE `client_id`='$delid' AND `form_no`='7' ");
	     $res8 = $conn->query("SELECT * FROM `business` WHERE `client_id`='$delid' AND `form_no`='8' ");
	     $res9 = $conn->query("SELECT * FROM `business` WHERE `client_id`='$delid' AND `form_no`='9' ");
	     $res10 = $conn->query("SELECT * FROM `business` WHERE `client_id`='$delid' AND `form_no`='10' ");
	     $res11 = $conn->query("SELECT * FROM `business` WHERE `client_id`='$delid' AND `form_no`='11' ");
	     $res12 = $conn->query("SELECT * FROM `business` WHERE `client_id`='$delid' AND `form_no`='12' ");
	     $res13 = $conn->query("SELECT * FROM `business` WHERE `client_id`='$delid' AND `form_no`='13' ");
	     $res14 = $conn->query("SELECT * FROM `business` WHERE `client_id`='$delid' AND `form_no`='14' ");
	     $res15 = $conn->query("SELECT * FROM `business` WHERE `client_id`='$delid' AND `form_no`='15' ");
	     $res16 = $conn->query("SELECT * FROM `business` WHERE `client_id`='$delid' AND `form_no`='16' ");
	     $res17 = $conn->query("SELECT * FROM `business` WHERE `client_id`='$delid' AND `form_no`='17' ");
	     $res18 = $conn->query("SELECT * FROM `business` WHERE `client_id`='$delid' AND `form_no`='18' ");
	     $res19 = $conn->query("SELECT * FROM `business` WHERE `client_id`='$delid' AND `form_no`='19' ");
	     $res20 = $conn->query("SELECT * FROM `business` WHERE `client_id`='$delid' AND `form_no`='20' ");
	     $res21 = $conn->query("SELECT * FROM `business` WHERE `client_id`='$delid' AND `form_no`='21' ");
	     $res22 = $conn->query("SELECT * FROM `business` WHERE `client_id`='$delid' AND `form_no`='22' ");
	     $bus1 = $res1->fetch_assoc();
	     $bus2 = $res2->fetch_assoc();
	     $bus3 = $res3->fetch_assoc();
	     $bus4 = $res4->fetch_assoc();
	     $bus5 = $res5->fetch_assoc();
	     $bus6 = $res6->fetch_assoc();
	     $bus7 = $res7->fetch_assoc();
	     $bus8 = $res8->fetch_assoc();
	     $bus9 = $res9->fetch_assoc();
	     $bus10 = $res10->fetch_assoc();
	     $bus11 = $res11->fetch_assoc();
	     $bus12 = $res12->fetch_assoc();
	     $bus13 = $res13->fetch_assoc();
	     $bus14 = $res14->fetch_assoc();
	     $bus15 = $res15->fetch_assoc();
	     $bus16 = $res16->fetch_assoc();
	     $bus17 = $res17->fetch_assoc();
	     $bus18 = $res18->fetch_assoc();
	     $bus19 = $res19->fetch_assoc();
	     $bus20 = $res20->fetch_assoc();
	     $bus21 = $res21->fetch_assoc();
	     $bus22 = $res22->fetch_assoc();
	     ?>
	<g>
		<?php if ($bus22['ustatus'] == '1') { ?>
			<g>
            	<rect x="180" y="20" width="20" height="20" style=" fill:#4dff4d;stroke:#009900;"></rect>
             	<text x="185" y="35" class="text" fill="#009900">9</text>
            </g>
		<?php }else{ ?>
			<g>
            	<rect x="180" y="20" width="20" height="20" style=" fill: #0066cc;stroke: #0059b3;"></rect>
             	<text x="185" y="35" class="text">9</text>
            </g>
            <?php } if ($bus20['ustatus'] == '1' and $bus21['ustatus'] == '1') { ?>
            <g>
                <rect x="190" y="40" width="20" height="20" style=" fill: #4dff4d;stroke: #009900;"></rect>
                <text x="195" y="55" class="text" fill="#009900">8</text>
            </g>	
        <?php }elseif ($bus20['ustatus'] == '1' or $bus21['ustatus'] == '1') { ?>
        	<g>
                <rect x="190" y="40" width="20" height="20" style='fill:#ff8000;stroke:#cc6600;'></rect>
                <text x="195" y="55" class="text" fill="#cc6600">8</text>
            </g>
        <?php }else{ ?>
            <g>
                <rect x="190" y="40" width="20" height="20" style=" fill: #0066cc;
            stroke: #0059b3;"></rect>
                <text x="195" y="55" class="text">8</text>
            </g>
            <?php } if ($bus19['ustatus'] == '1') { ?>
            <g>
                <rect x="200" y="60" width="20" height="20" style=" fill: #4dff4d;stroke: #009900"></rect>
                <text x="207" y="75" class="text" fill="#009900">7</text>
            </g>
            <?php }else{ ?>
            <g>
                <rect x="200" y="60" width="20" height="20" style=" fill: #0066cc;
            stroke: #0059b3;"></rect>
                <text x="207" y="75" class="text">7</text>
            </g>
            <?php } if ($bus15['ustatus'] == '1' AND $bus16['ustatus'] == '1' AND $bus17['ustatus'] == '1' AND $bus18['ustatus'] == '1') { ?>
            <g>
                <rect x="205" y="80" width="20" height="20" style=" fill: #4dff4d;
            stroke: #009900;"></rect>
                <text x="210" y="95" class="text" fill="#009900">6</text>
            </g>
            <?php }elseif (($bus15['ustatus'] == '1' AND $bus16['ustatus'] == '1') AND ($bus17['ustatus'] == '1' or $bus18['ustatus'] == '1')) { ?>
            <g>
                <rect x="205" y="80" width="20" height="20" style='fill:#ffff4d;stroke:#b3b300;'></rect>
                <text x="210" y="95" class="text" fill="#b3b300">6</text>
            </g>
        <?php }elseif (($bus15['ustatus'] == '1' AND $bus16['ustatus'] == '1') or ($bus17['ustatus'] == '1' and $bus18['ustatus'] == '1')) { ?>
            <g>
                <rect x="205" y="80" width="20" height="20" style='fill:#ff8000;stroke:#cc6600;'></rect>
                <text x="210" y="95" class="text" fill="#cc6600">6</text>
            </g>
        <?php }elseif ($bus15['ustatus'] == '1' or $bus16['ustatus'] == '1' or $bus17['ustatus'] == '1' or $bus18['ustatus'] == '1') { ?>
        	<g>
                <rect x="205" y="80" width="20" height="20" style='fill:#ff3333;stroke:#e60000;'></rect>
                <text x="210" y="95" class="text" fill="#e60000">6</text>
            </g>
           <?php }else{ ?>
            <g>
                <rect x="205" y="80" width="20" height="20" style=" fill: #0066cc;stroke: #0059b3;"></rect>
                <text x="210" y="95" class="text">6</text>
            </g>
            <?php } if ($bus13['ustatus'] == '1' AND $bus14['ustatus'] == '1') { ?>
            	<g>
                <rect x="210" y="100" width="20" height="20" style="fill:#4dff4d;stroke: #009900;"></rect>
                <text x="217" y="115" class="text" fill="#009900">5</text>
            </g>
        <?php }elseif ($bus13['ustatus'] == '1' or $bus14['ustatus'] == '1') { ?>
            	<g>
                <rect x="210" y="100" width="20" height="20" style='fill:#ff8000;stroke:#cc6600;'></rect>
                <text x="217" y="115" class="text" fill="#cc6600">5</text>
            </g>
            <?php }else{ ?>
            <g>
                <rect x="210" y="100" width="20" height="20" style=" fill: #0066cc;
            stroke: #0059b3;"></rect>
                <text x="217" y="115" class="text">5</text>
            </g>
            <?php } if ($bus11['ustatus'] == '1' and $bus12['ustatus'] == '1') { ?>
            <g>
                <rect x="220" y="120" width="20" height="20" style=" fill: #4dff4d;
            stroke: #009900;"></rect>
                <text x="227" y="135" class="text" fill="#009900">4</text>
            </g>
            <?php }elseif ($bus11['ustatus'] == '1' or $bus12['ustatus'] == '1'){ ?>
            	<g>
                <rect x="220" y="120" width="20" height="20" style='fill:#ff8000;stroke:#cc6600;'></rect>
                <text x="227" y="135" class="text" fill="#cc6600">4</text>
            </g>
            <?php }else{ ?>
            <g>
                <rect x="220" y="120" width="20" height="20" style=" fill: #0066cc;
            stroke: #0059b3;"></rect>
                <text x="227" y="135" class="text">4</text>
            </g>
            <?php } if ($bus7['ustatus'] == '1' AND $bus8['ustatus'] == '1' AND $bus9['ustatus'] == '1' AND $bus10['ustatus'] == '1') { ?>
            <g>
                <rect x="230" y="140" width="20" height="20" style=" fill: #4dff4d;
            stroke: #009900;"></rect>
                <text x="237" y="155" class="text" fill="#009900">3</text>
            </g>
            <?php }elseif (($bus7['ustatus'] == '1' AND $bus8['ustatus'] == '1') AND ($bus9['ustatus'] == '1' or $bus10['ustatus'] == '1')) { ?>
            <g>
                <rect x="230" y="140" width="20" height="20" style='fill:#ffff4d;stroke:#b3b300;'></rect>
                <text x="237" y="155" class="text" fill="#b3b300">3</text>
            </g>
        <?php }elseif (($bus7['ustatus'] == '1' AND $bus8['ustatus'] == '1') or ($bus9['ustatus'] == '1' and $bus10['ustatus'] == '1')) { ?>
            <g>
                <rect x="230" y="140" width="20" height="20" style='fill:#ff8000;stroke:#cc6600;'></rect>
                <text x="237" y="155" class="text" fill="#cc6600">3</text>
            </g>
        <?php }elseif ($bus7['ustatus'] == '1' or $bus8['ustatus'] == '1' or $bus9['ustatus'] == '1' or $bus10['ustatus'] == '1') { ?>
            <g>
                <rect x="230" y="140" width="20" height="20" style='fill:#ff3333;stroke:#e60000;'></rect>
                <text x="237" y="155" class="text" fill="#e60000">3</text>
            </g>
           <?php }else{ ?>
            <g>
                <rect x="230" y="140" width="20" height="20" style=" fill: #0066cc;
            stroke: #0059b3;"></rect>
                <text x="237" y="155" class="text">3</text>
            </g>
            <?php } if ($bus3['ustatus'] == '1' AND $bus4['ustatus'] == '1' AND $bus5['ustatus'] == '1' AND $bus6['ustatus'] == '1') { ?>
            <g>
                <rect x="240" y="160" width="20" height="20" style=" fill: #4dff4d;
            stroke: #009900;"></rect>
                <text x="247" y="175" class="text" fill="#009900">2</text>
            </g>
            <?php }elseif (($bus3['ustatus'] == '1' AND $bus4['ustatus'] == '1') AND ($bus5['ustatus'] == '1' or $bus6['ustatus'] == '1')) { ?>
            <g>
                <rect x="240" y="160" width="20" height="20" style='fill:#ffff4d;stroke:#b3b300;'></rect>
                <text x="247" y="175" class="text" fill="#b3b300">2</text>
            </g>
        <?php }elseif (($bus3['ustatus'] == '1' AND $bus4['ustatus'] == '1') or ($bus5['ustatus'] == '1' and $bus6['ustatus'] == '1')) { ?>
            <g>
                <rect x="240" y="160" width="20" height="20" style='fill:#ff8000;stroke:#cc6600;'></rect>
                <text x="247" y="175" class="text" fill="#cc6600">2</text>
            </g>
        <?php }elseif ($bus3['ustatus'] == '1' or $bus4['ustatus'] == '1' or $bus5['ustatus'] == '1' or $bus6['ustatus'] == '1') { ?>
            <g>
                <rect x="240" y="160" width="20" height="20" style='fill:#ff3333;stroke:#e60000;'></rect>
                <text x="247" y="175" class="text" fill="#e60000">2</text>
            </g>
           <?php }else{ ?>
            <g>
                <rect x="240" y="160" width="20" height="20" style=" fill: #0066cc;
            stroke: #0059b3;"></rect>
                <text x="247" y="175" class="text">2</text>
            </g><?php }
            	if ($bus1['ustatus'] == '1' and $bus2['ustatus'] == '1') { ?>
            <g>
                <rect x="250" y="180" width="20" height="20" style=" fill: #4dff4d;
            stroke: #009900;"></rect>
                <text x="257" y="195" class="text" fill="#009900">1</text>
            </g>
            <?php }elseif ($bus1['ustatus'] == '1' or $bus2['ustatus'] == '1') { ?>
            <g>
                <rect x="250" y="180" width="20" height="20" style=" fill: #ff8000;
            stroke: #cc6600;"></rect>
                <text x="257" y="195" class="text" fill="#cc6600">1</text>
            </g>	
            <?php }else{ ?>
            <g>
                <rect x="250" y="180" width="20" height="20" style=" fill: #0066cc;
            stroke: #0059b3;"></rect>
                <text x="257" y="195" class="text">1</text>
            </g><?php } ?>
        </g>
        <g>
            <g>
            <path d="M171 11 L171 2 Q173 5 178 2 Q180 1 184 3 L184 11 Q180 9 177 11 Q173 12 170.20 10 L170.20 11" style="stroke:#000; stroke-width:1;fill:none;"></path>
            <line x1="170" y1="20" x2="170" y2="0" style="stroke:#000;stroke-width:1"></line>
            <path class="cls-1" d="M171 2 L171 5 L172 5  L172 3Z"></path>
            <path class="cls-2" d="M171 5 L171 8 L172 8 L172 5Z"></path>
            <path class="cls-1" d="M171 8 L172 8 L172 11 L171 11Z"></path>
            <path class="cls-2" d="M172 3.53 L172 5 L174 5 L174 3.84Z"></path>
            <path class="cls-1" d="M172 5 L172 8 L174 8 L174 5Z"></path>
            <path class="cls-2" d="M172 8 L172 10.70 L174 10.75 L174 8Z"></path>
            <path class="cls-1" d="M174 5 L176 5 L176 3.60 L174 3.84Z"></path>
            <path class="cls-2" d="M174 5 L174 8 L176 8 L176 5Z"></path>
            <path class="cls-1" d="M174 8 L174 11 L176 11 L176 8Z"></path>
            <path class="cls-2" d="M176 5 L178 5 L178 2.30 L176 3.25Z"></path>
            <path class="cls-1" d="M178 5 L178 8 L176 8 L176 5Z"></path>
            <path class="cls-2" d="M176 8 L176 11 L178 10 L178 8Z"></path>
            <path class="cls-1" d="M178 5 L180 5 L180 2.3 L178 2.05Z"></path>
            <path class="cls-2" d="M180 5 L180 8 L178 8 L178 5Z"></path>
            <path class="cls-1" d="M178 8 L178 11 L180 10 L180 8Z"></path>
            <path class="cls-2" d="M180 5 L182 5 L182 2.3 L180 2.05Z"></path>
            <path class="cls-1" d="M182 5 L182 8 L180 8 L180 5Z"></path>
            <path class="cls-2" d="M180 8 L180 9.85 L182 9.7 L182 8Z"></path>
            <path class="cls-1" d="M182 5 L184 5 L184 2.3 L182 2.05Z"></path>
            <path class="cls-2" d="M183.66 5 L183.66 8 L182 8 L182 5Z"></path>
            <path class="cls-1" d="M182 8 L182 10 L183.5 11 L183.5 8Z"></path>


            <defs><style>.cls-1{fill:#010101; stroke:none}.cls-2{fill:#fff; stroke:none}</style></defs>
        </g>
        </g>
        <g>
            <text x="0" y="195" class="adjust">DISCOVERY SESSION</text><g class="tooltip css" transform="translate(20,225)">
          <rect x="-3em" y="-48" width="7em" height="1em"></rect>
          <text x="14" y="-45" dy="1em" text-anchor="middle">
            Discover Session A/B</text>
        </g>
            <text x="0" y="175" class="adjust">GOAL SETTING</text>
            <g class="tooltip css" transform="translate(20,200)">
          <rect x="-3em" y="-45" width="7.5em" height="1.5em"></rect>
          <text x="18" y="-43" dy="1em" text-anchor="middle">   
          Client Pondering Sheet</text>
            <text x="5" y="-36" dy="1em" text-anchor="middle">
            Goal Settings</text>
        </g>

        <text x="0" y="155" class="adjust">ACTION PLAN AGREEMENT</text>
            <g class="tooltip css" transform="translate(20,183)">
          <rect x="-3em" y="-48" width="9em" height="1.25em"></rect>
          <text x="26" y="-45" dy="1em" text-anchor="middle">   
          Action Plan Agreement Sheet</text>
        </g>
        <text x="0" y="135" class="adjust">ADJUST BELIEF &amp; VALUES</text><g class="tooltip css" transform="translate(20,163)">
          <rect x="-3em" y="-48" width="9em" height="1.25em"></rect>
          <text x="1" y="-48" dy="1em" text-anchor="middle">   
          Conflict Belief</text>
          <text x="26" y="-40" dy="1em" text-anchor="middle">   
          What Do You Need To Let Go Of</text>
        </g>
            <text x="0" y="115" class="adjust">ENERGY DETOX &amp; SHIELD</text><g class="tooltip css" transform="translate(120,150)">
          <rect x="-3em" y="-50" width="9em" height="3.25em"></rect>
          <text x="16" y="-48" dy="1em" text-anchor="middle">   
          Stop procrastinating and get it done</text>
          <text x="-3" y="-40" dy="1em" text-anchor="middle">   
          Daily Success Habits</text>
          <text x="-10" y="-33" dy="1em" text-anchor="middle">   
          Energy zappers</text>
          <text x="-11" y="-26" dy="1em" text-anchor="middle">   
          My spark team</text>
          <text x="6" y="-20" dy="1em" text-anchor="middle">   
          What Makes My Heart Sing</text>
        </g>

            <text x="0" y="95" class="adjust">ACTIVATE PROJECTION POWERS</text><g class="tooltip css" transform="translate(20,125)">
          <rect x="-3em" y="-50" width="5em" height="1em"></rect>
          <text x="1" y="-48" dy="1em" text-anchor="middle">   
          Mentor Magic</text>
        </g>
            <text x="0" y="75" class="adjust">EVALUATE RESULTS</text>
            <g class="tooltip css" transform="translate(20,106)">
          <rect x="-3em" y="-50" width="6em" height="1em"></rect>
          <text x="6" y="-48" dy="1em" text-anchor="middle">   
          Golden Image List</text>
        </g>
            <text x="0" y="55" class="adjust">RECONCLILE RESULTS</text>
            <g class="tooltip css" transform="translate(20,88)">
          <rect x="-3em" y="-50" width="8em" height="1em"></rect>
          <text x="8" y="-48" dy="1em" text-anchor="middle">   
          Monthly Client Review and Feedback</text>
        </g>
            
            <text x="0" y="35" class="adjust">REJOICE REPEAT</text>
            <g class="tooltip css" transform="translate(20,68)">
          <rect x="-3em" y="-50" width="8em" height="1em"></rect>
          <text x="8" y="-48" dy="1em" text-anchor="middle">   
          </text>
        </g>
            <text x="0" y="10" style="font-size:10px; fill: #000; font-weight:800;">PERSONAL</text>
        </g>
        <g>
            <text x="275" y="195" class="adjust">YOUR PURPOSE-VISION-MASSAGE</text>
            <g class="tooltip css" transform="translate(215,228)">
          <rect x="-3em" y="-50" width="8em" height="2em"></rect>
          <text x="8" y="-48" dy="1em" text-anchor="middle">A-1 Your business vision   
          </text>
          <text x="5" y="-40" dy="1em" text-anchor="middle">A-2 Branding exercise</text>
        </g>
            <text x="275" y="175" class="adjust">YOUR TRIBE-PROBLEM-SOLUTION</text>
            <g class="tooltip css" transform="translate(215,218)">
          <rect x="-4em" y="-80" width="9em" height="3.5em"></rect>
          <text x="-25" y="-80" dy="1em" text-anchor="middle">A-3 Client profile   
          </text>
          <text x="6" y="-70" dy="1em" text-anchor="middle">A-4 Why people buy what you're Selling</text>
          <text x="5" y="-58" dy="1em" text-anchor="middle">A-5 How to talk about your new Avatar
          </text>
          <text x="-15" y="-48" dy="1em" text-anchor="middle">B-5 49 Questions + Bio</text>
        </g>
            <text x="275" y="155" class="adjust">MARKET VALIDATION-SOFT LAUNCH</text>
            <g class="tooltip css" transform="translate(215,200)">
          <rect x="-4em" y="-80" width="9em" height="3.5em"></rect>
          <text x="2" y="-80" dy="1em" text-anchor="middle">B-14 60 day Launch check list From-    
          </text>
          <text x="6" y="-73" dy="1em" text-anchor="middle">conceptualization to postmortem</text>
          <text x="2" y="-66" dy="1em" text-anchor="middle">A-10  Idea Mapping- Niche tightening
          </text>
          <text x="4" y="-59" dy="1em" text-anchor="middle">B-7 Pre-selling your high end program</text>
          <text x="-5" y="-52" dy="1em" text-anchor="middle">A-11 client interview approach-</text>
          <text x="1" y="-46" dy="1em" text-anchor="middle">questionnaire?</text>
        </g>
            <text x="275" y="135" class="adjust">CONCEPT DELIVERY</text>
            <g class="tooltip css" transform="translate(215,200)">
          <rect x="-2em" y="-80" width="7em" height="1.5em"></rect>
          <text x="4" y="-78" dy="1em" text-anchor="middle">B-1 The Sales cycle   
          </text>
          <text x="17" y="-70" dy="1em" text-anchor="middle">B-2 Self- Promotion strategies</text>
        </g>

            <text x="275" y="115" class="adjust">MEDIUM &amp; STRATEGY</text>
            <g class="tooltip css" transform="translate(215,180)">
          <rect x="-2em" y="-80" width="7em" height="2.5em"></rect>
          <text x="12" y="-80" dy="1em" text-anchor="middle">A-4 Why people buy what   
          </text>
          <text x="8" y="-73" dy="1em" text-anchor="middle">you're Selling</text>
          <text x="3" y="-65" dy="1em" text-anchor="middle">B-9 Launch Emails</text>
          <text x="14" y="-58" dy="1em" text-anchor="middle">B-3 Know like trust- launch</text>
        </g>

            <text x="275" y="95" class="adjust">CRAFT COPY &amp; PRODUCTS</text>
            <g class="tooltip css" transform="translate(215,150)">
          <rect x="-2em" y="-80" width="7em" height="3.5em"></rect>
          <text x="17" y="-80" dy="1em" text-anchor="middle">A-7 Creating the know like &amp; -   
          </text>
          <text x="4" y="-73" dy="1em" text-anchor="middle">trust factor</text>
          <text x="4" y="-67" dy="1em" text-anchor="middle">A-8 Product creation</text>
          <text x="5" y="-59" dy="1em" text-anchor="middle">B-6 content structure</text>
          <text x="5" y="-52" dy="1em" text-anchor="middle">A-9 Perfect pricing &amp; -</text>
          <text x="5" y="-47" dy="1em" text-anchor="middle">simple selling</text>
        </g>
            <text x="275" y="75" class="adjust">SITES-TECH-PAYMENT MECHANSIM</text>
            <g class="tooltip css" transform="translate(215,145)">
          <rect y="-80" width="5em" height="1em"></rect>
          <text x="29" y="-78" dy="1em" text-anchor="middle">B-8 Launch Details 
          </text>
        </g>

            <text x="275" y="55" class="adjust">SYNCRONIZED LAUNCH</text>
            <g class="tooltip css" transform="translate(215,125)">
          <rect x="-2em" y="-80" width="7em" height="2em"></rect>
          <text x="10" y="-78" dy="1em" text-anchor="middle">A-6 The transformation-- 
          </text>
          <text x="19" y="-72" dy="1em" text-anchor="middle">stepping into the new Avatar
          </text>
          <text x="14" y="-64" dy="1em" text-anchor="middle">B-12 Pulling it all togeather
          </text>
        </g>
            <text x="275" y="35" class="adjust">EVALUATE &amp; ADJUST</text>
            <g class="tooltip css" transform="translate(215,100)">
          <rect x="-2em" y="-80" width="7em" height="1.3em"></rect>
          <text x="13" y="-80" dy="1em" text-anchor="middle">B-10 Getting your client to
          </text>
          <text x="2" y="-72" dy="1em" text-anchor="middle">Finish LIne
          </text>
        </g>
            <text x="275" y="10" style="font-size:10px; fill:#000; font-weight:800;">BUSINESS</text>
        </g>
        <g>
        	<rect x="345" y="0" width="9" height="10" style='fill: #0066cc; stroke:#0059b3;'></rect>
        	<text x="350" y="10" dy="1em" text-anchor="middle" style="font-size:4px;font-weight:bold;">0%</text>
        	<rect x="357" y="0" width="9" height="10" style='fill:#ff3333;stroke:#e60000;'></rect>
        	<text x="361" y="10" dy="1em" text-anchor="middle" style="font-size:4px;font-weight:bold;">25%</text>
        	<rect x="368" y="0" width="9" height="10" style='fill:#ff8000;stroke:#cc6600;'></rect>
        	<text x="372" y="10" dy="1em" text-anchor="middle" style="font-size:4px;font-weight:bold;">50%</text>
        	<rect x="379" y="0" width="9" height="10" style='fill:#ffff4d;stroke:#b3b300;'></rect>
        	<text x="383" y="10" dy="1em" text-anchor="middle" style="font-size:4px;font-weight:bold;">75%</text>
        	<rect x="390" y="0" width="9" height="10" style='fill:#4dff4d;stroke:#009900;'></rect>
        	<text x="395" y="10" dy="1em" text-anchor="middle" style="font-size:4px;font-weight:bold;">100%</text>
        </g>
        <g>
        	<rect x="60" y="0" width="9" height="10" style='fill: #0066cc; stroke:#0059b3;'></rect>
        	<text x="65" y="10" dy="1em" text-anchor="middle" style="font-size:4px;font-weight:bold;">0%</text>
        	<rect x="72" y="0" width="9" height="10" style='fill:#ff3333;stroke:#e60000;'></rect>
        	<text x="77" y="10" dy="1em" text-anchor="middle" style="font-size:4px;font-weight:bold;">25%</text>
        	<rect x="85" y="0" width="9" height="10" style='fill:#ff8000;stroke:#cc6600;'></rect>
        	<text x="90" y="10" dy="1em" text-anchor="middle" style="font-size:4px;font-weight:bold;">50%</text>
        	<rect x="97" y="0" width="9" height="10" style='fill:#ffff4d;stroke:#b3b300;'></rect>
        	<text x="103" y="10" dy="1em" text-anchor="middle" style="font-size:4px;font-weight:bold;">75%</text>
        	<rect x="110" y="0" width="9" height="10" style='fill:#4dff4d;stroke:#009900;'></rect>
        	<text x="115" y="10" dy="1em" text-anchor="middle" style="font-size:4px;font-weight:bold;">100%</text>
        </g>

    </g></svg>
</div>

</div>
<!-- <div class="statusbar"></div> -->


</div>

<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>
<script>
$(document).ready(function(){
    $("#fill1").click(function(){
    	var val = $(this).attr('data');
    	// alert(val);
    	$.ajax({
    		type : "post",
    		url : "value",
    		data:{val:val},
    		success: function(result){
    			// alert(result);
    		}
    	});
    });

    $('.Audience').change(function(){
    	var audience = $(this).val();
    	var cid = <?php echo $user_id; ?>;
    	$.ajax({ type: "POST", 
	        url: "check", 
	        data: {audience:audience,cid:cid} 
        });
    });

    $(".test_done").click(function(){
    var val = $(this).attr('data');
         if($(this).is(':checked')){
         $.ajax({ type: "POST", 
         url: "check", 
         data: {val:val,apply:'1'} 
         });
         }
         else
         {
         $.ajax({ type: "POST", 
         url: "check", 
         data: {val:val,apply:'0'} 
         });
         }
      });

    $(".p_done").click(function(){
    var val = $(this).attr('data');
         if($(this).is(':checked')){
         $.ajax({ type: "POST",
         url: "check",
         data: {val:val,app:'1'},
         success: function(result){
    			console.log(result);
    		}
         });
         }
         else
         {
         $.ajax({ type: "POST", 
         url: "check", 
         data: {val:val,app:'0'} ,
         success: function(result){
    			console.log(result);
    		}
         });
         }
      });
    $(".b_done").click(function(){
    var val = $(this).attr('data');
         if($(this).is(':checked')){
         $.ajax({ type: "POST",
         url: "check",
         data: {val:val,bus:'1'},
         success: function(result){
    			console.log(result);
    		}
         });
         }
         else
         {
         $.ajax({ type: "POST", 
         url: "check", 
         data: {val:val,bus:'0'} ,
         success: function(result){
    			console.log(result);
    		}
         });
         }
      });
    $("#Tranfer").click(function(){
    var val = $(this).attr('data');
    	$.ajax({
    		type: "post",
    		url: "Tranfer",
    		data: {val:val,apply:'1'},
    		success: function(result){
    			console.log(result);
    			location.reload(true);
       		}
    	});
    });
    $("#Untranfer").click(function(){
    var val = $(this).attr('data');
    	$.ajax({
    		type: "post",
    		url: "Tranfer",
    		data: {val:val,apply:'0'},
    		success: function(result){
    			console.log(result);
    			location.reload(true);
       		}
       	});
    });
   });
</script>

</body>
</html>
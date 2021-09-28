<?php
 include('config.php');
 $delid = $_POST['val'];
 
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


if ($row1['ustatus'] == '1') {
	$sql= "INSERT INTO `steps`(`client_id`, `form_no`, `ustatus`, `form_name`) VALUES ('$delid','1','1','DISCOVERY SESSION')";
	$conn->query($sql);
 }else{
 	$sql= "DELETE FROM `steps` WHERE `client_id`='$delid' AND `form_no`='1' ";
	$conn->query($sql);
 }

 if ($row2['ustatus'] == '1' AND $row3['ustatus'] == '1' ) {
	$sql= "INSERT INTO `steps`(`client_id`, `form_no`, `ustatus`, `form_name`) VALUES ('$delid','2','1','GOAL SETTING')";
	$conn->query($sql);
 	}else{
 	$sql= "DELETE FROM `steps` WHERE `client_id`='$delid' AND `form_no`='2' ";
	$conn->query($sql);
	}

	if ($row4['ustatus'] == '1') {
	$sql= "INSERT INTO `steps`(`client_id`, `form_no`, `ustatus`, `form_name`) VALUES ('$delid','3','1','ACTION PLAN AGREEMENT')";
	$conn->query($sql);
 }else{
 	$sql= "DELETE FROM `steps` WHERE `client_id`='$delid' AND `form_no`='3' ";
	$conn->query($sql);
 }

 if ($row5['ustatus'] == '1' AND $row6['ustatus'] == '1' ) {
 	$sql= "INSERT INTO `steps`(`client_id`, `form_no`, `ustatus`, `form_name`) VALUES ('$delid','4','1','ADJUST BELIEF & VALUES')";
	$conn->query($sql);
 }else{
 	$sql= "DELETE FROM `steps` WHERE `client_id`='$delid' AND `form_no`='4' ";
	$conn->query($sql);
 }

 if ($row7['ustatus'] == '1' AND $row8['ustatus'] == '1' AND $row9['ustatus'] == '1' AND
	    $row10['ustatus'] == '1' AND $row11['ustatus'] == '1' ) {
 	$sql= "INSERT INTO `steps`(`client_id`, `form_no`, `ustatus`, `form_name`) VALUES ('$delid','5','1','ENERGY DETOX & SHIELD')";
	$conn->query($sql);
 }else{
 	$sql= "DELETE FROM `steps` WHERE `client_id`='$delid' AND `form_no`='5' ";
	$conn->query($sql);
 }

 if ($row12['ustatus'] == '1') {
$sql= "INSERT INTO `steps`(`client_id`, `form_no`, `ustatus`, `form_name`) VALUES ('$delid','6','1','ACTIVATE PROJECTION POWERS')";
	$conn->query($sql);
 }else{
 	$sql= "DELETE FROM `steps` WHERE `client_id`='$delid' AND `form_no`='6' ";
	$conn->query($sql);
 }

 if ($row13['ustatus'] == '1') {
$sql= "INSERT INTO `steps`(`client_id`, `form_no`, `ustatus`, `form_name`) VALUES ('$delid','7','1','EVALUATE RESULTS')";
	$conn->query($sql);
 }else{
 	$sql= "DELETE FROM `steps` WHERE `client_id`='$delid' AND `form_no`='7' ";
	$conn->query($sql);
 }
 if ($row14['ustatus'] == '1') {
$sql= "INSERT INTO `steps`(`client_id`, `form_no`, `ustatus`, `form_name`) VALUES ('$delid','8','1','RECONCLILE RESULTS')";
	$conn->query($sql);
 }else{
 	$sql= "DELETE FROM `steps` WHERE `client_id`='$delid' AND `form_no`='8' ";
	$conn->query($sql);
 }

 if ($bus1['ustatus'] == '1' and $bus2['ustatus'] == '1') {
	$sql= "INSERT INTO `steps`(`client_id`, `form_no`, `ustatus`, `form_name`) VALUES ('$delid','10','1','YOUR PURPOSE-VISION-MASSAGE')";
	$conn->query($sql);
 }else{
 	$sql= "DELETE FROM `steps` WHERE `client_id`='$delid' AND `form_no`='10' ";
	$conn->query($sql);
 }

 if ($bus3['ustatus'] == '1' AND $bus4['ustatus'] == '1' AND $bus5['ustatus'] == '1' AND $bus6['ustatus'] == '1') {
 	$sql= "INSERT INTO `steps`(`client_id`, `form_no`, `ustatus`, `form_name`) VALUES ('$delid','11','1','YOUR TRIBE-PROBLEM-SOLUTION')";
	$conn->query($sql);
 	}else{
 	$sql= "DELETE FROM `steps` WHERE `client_id`='$delid' AND `form_no`='11' ";
	$conn->query($sql);
 }

 if ($bus7['ustatus'] == '1' AND $bus8['ustatus'] == '1' AND $bus9['ustatus'] == '1' AND $bus10['ustatus'] == '1') {
 	$sql= "INSERT INTO `steps`(`client_id`, `form_no`, `ustatus`, `form_name`) VALUES ('$delid','12','1','MARKET VALIDATION-SOFT LAUNCH')";
	$conn->query($sql);
 	}else{
 	$sql= "DELETE FROM `steps` WHERE `client_id`='$delid' AND `form_no`='12' ";
	$conn->query($sql);
 }

 if ($bus11['ustatus'] == '1' and $bus12['ustatus'] == '1') {
 	$sql= "INSERT INTO `steps`(`client_id`, `form_no`, `ustatus`, `form_name`) VALUES ('$delid','13','1','CONCEPT DELIVERY')";
	$conn->query($sql);
 	}else{
 	$sql= "DELETE FROM `steps` WHERE `client_id`='$delid' AND `form_no`='13' ";
	$conn->query($sql);
 }

 if ($bus13['ustatus'] == '1' AND $bus14['ustatus'] == '1') {
 	$sql= "INSERT INTO `steps`(`client_id`, `form_no`, `ustatus`, `form_name`) VALUES ('$delid','14','1','MEDIUM & STRATEGY')";
	$conn->query($sql);
 	}else{
 	$sql= "DELETE FROM `steps` WHERE `client_id`='$delid' AND `form_no`='14' ";
	$conn->query($sql);
 }

 if ($bus15['ustatus'] == '1' AND $bus16['ustatus'] == '1' AND $bus17['ustatus'] == '1' AND $bus18['ustatus'] == '1') {
 	$sql= "INSERT INTO `steps`(`client_id`, `form_no`, `ustatus`, `form_name`) VALUES ('$delid','15','1','CRAFT COPY & PRODUCTS')";
	$conn->query($sql);
 	}else{
 	$sql= "DELETE FROM `steps` WHERE `client_id`='$delid' AND `form_no`='15' ";
	$conn->query($sql);
 }

 if ($bus19['ustatus'] == '1') {
 	$sql= "INSERT INTO `steps`(`client_id`, `form_no`, `ustatus`, `form_name`) VALUES ('$delid','16','1','SITES-TECH-PAYMENT MECHANSIM')";
	$conn->query($sql);
 	}else{
 	$sql= "DELETE FROM `steps` WHERE `client_id`='$delid' AND `form_no`='16' ";
	$conn->query($sql);
 }

if ($bus20['ustatus'] == '1' and $bus21['ustatus'] == '1') {
	$sql= "INSERT INTO `steps`(`client_id`, `form_no`, `ustatus`, `form_name`) VALUES ('$delid','17','1','SYNCRONIZED LAUNCH')";
	$conn->query($sql);
 	}else{
 	$sql= "DELETE FROM `steps` WHERE `client_id`='$delid' AND `form_no`='17' ";
	$conn->query($sql);
 }
 if ($bus22['ustatus'] == '1') {
 	$sql= "INSERT INTO `steps`(`client_id`, `form_no`, `ustatus`, `form_name`) VALUES ('$delid','18','1','EVALUATE & ADJUST')";
	$conn->query($sql);
 	}else{
 	$sql= "DELETE FROM `steps` WHERE `client_id`='$delid' AND `form_no`='18' ";
	$conn->query($sql);
 }
?>
<?php

include('config.php');

if($_POST['apply']=='1')

{

$val = $_POST['val'];   

$conn->query("update clientpogistion set cstatus='1' where id='$val'");

}

else

{

$val = $_POST['val'];   

$conn->query("update clientpogistion set cstatus='0' where id='$val'");

}



if ($_POST['app'] == '1') {

	$val = $_POST['val'];   

$conn->query("update personal set ustatus='1' where id='$val'");

}else{

	$val = $_POST['val'];   

$conn->query("update personal set ustatus='0' where id='$val'");

}



if ($_POST['bus'] == '1') {

	$val = $_POST['val'];   

$conn->query("update business set ustatus='1' where id='$val'");

}else{

	$val = $_POST['val'];   

$conn->query("update business set ustatus='0' where id='$val'");

}

if (isset($_POST['audience'])) 
{
	$audience = $_POST['audience'];
	$cid = $_POST['cid'];
	$fggroup = $_POST['fggroup'];
	$description = $_POST['description'];
	$conn->query("update client_info SET `Audience`=$audience,`description`='$description',`fggroup`='$fggroup' where `cid`='$cid'");
}

$conn->close();

?>
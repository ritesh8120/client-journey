<?php
include('config.php');
if (isset($_POST['cid'])) {
	$clientID = $_POST['cid'];
	$details = $_POST['notes'];
	$title = $_POST['title2'];


	$date = date('Y-m-d');

	$sql = "INSERT INTO `history`(`client_id`, `notes`, `date`,`title`) VALUES ('$clientID','$details','$date','$title')";

	if ($conn->query($sql) === TRUE) {

		$historyMember = $conn->query("SELECT * FROM `history` WHERE `client_id`='$clientID'");

		if ($historyMember->num_rows > 0) {
			$listView = "";

			$i = 1;

			while ($history = $historyMember->fetch_assoc()) { ?>

				<tr>

					<td width="100"><?= $i ?></td>

					<td width="200"><?php echo date("m/d/Y", strtotime($history['date'])) ?></td>

					<td width="500"><?php echo nl2br($history['notes']) ?></td>

					<td width="100"><a href="">Edit</a></td>

					<td width="100"><a href="">Delet</a></td>

				</tr>

<?php

				$i++;
			}
		}

		$response['data'] = $listView;
	} else {

		$response['status'] = 0;

		$response['message'] = 'Error while adding notes.';

		$response['data'] = "";
	}
}



// delete table

if (isset($_POST['notes_id'])) {

	$notes_id = $_POST['notes_id'];

	$deletequery = "DELETE FROM `history` WHERE `id`='$notes_id' ";

	$conn->query($deletequery);
}

if (isset($_POST['clients_id'])) {
	$user_id = $_POST['clients_id'];
	$deletequery = "DELETE FROM `next_action` WHERE `user_id`='$user_id'";
	$conn->query($deletequery);
}


// update 

if (isset($_POST['notesd_id'])) {

	$notesd_id = $_POST['notesd_id'];

	$query = "SELECT * FROM `history` WHERE `id`='$notesd_id'";

	if (!$result = $conn->query($query)) {

		// exit(mysqli_error());

	}

	$response = array();



	if ($result->num_rows > 0) {

		while ($row = $result->fetch_assoc()) {

			$response = $row;
		}
	} else {

		$response['status'] = 200;

		$response['message'] = "Data not found!";
	}

	echo json_encode($response);
} else {

	$response['status'] = 200;

	$response['message'] = "Invailid Request!";
}



/**************** update form *****************/



if (isset($_POST['notes'])) {
	$notes = $_POST['notes'];
	$id = $_POST['id'];
	$title3 = $_POST['title3'];

	$query = "UPDATE `history` SET `notes`='$notes',`title`='$title3' WHERE `id`='$id'";

	$conn->query($query);
}



/************* next activity*****************/

if (isset($_POST['next_id'])) {

	$user_id = $_POST['next_id'];

	$next_notes = $_POST['val'];

	$date = $_POST['date'];
	$title = $_POST['title'];


	$seletquery = "SELECT * FROM `next_action` WHERE `user_id`='$user_id' ";

	$result = $conn->query($seletquery);

	if ($result->num_rows > 0) {

		$query = "UPDATE `next_action` SET `next_notes`='$next_notes' , `date`='$date' ,`title`='$title', `status`='1' WHERE `user_id`='$user_id'";

		$conn->query($query);
	} else {

		$query = "INSERT INTO `next_action`(`next_notes`, `date`, `status`, `user_id`,`title`) VALUES ('$next_notes','$date','1','$user_id','$title')";

		$conn->query($query);
	}
}



if (isset($_POST['_id'])) {

	$id = $_POST['_id'];

	$status = $_POST['_status'];

	$conn->query("UPDATE `next_action` SET `status`='$status' WHERE `user_id`='$id'");
}



/********************* research ******************************/

if (isset($_POST['search_id'])) {

	$id = $_POST['search_id'];
	$search = $_POST['search'];
	$fbprolink = $_POST['fbprolink'];
	$fbpagelink = $_POST['fbpagelink'];
	$weblink = $_POST['weblink'];
	$intalink = $_POST['intalink'];
	$desiglink = $_POST['desiglink'];
	$belief1 = $_POST['belief1'];
	$belief2 = $_POST['belief2'];
	$belief3 = $_POST['belief3'];
	$keyphra1 = $_POST['keyphra1'];
	$keyphra2 = $_POST['keyphra2'];
	$keyphra3 = $_POST['keyphra3'];
	$problem1 = $_POST['problem1'];
	$problem2 = $_POST['problem2'];
	$problem3 = $_POST['problem3'];

	if ($search != '') {

		$seletquery = "SELECT * FROM `research` WHERE `user_id`='$id' ";

		$result = $conn->query($seletquery);

		if ($result->num_rows > 0) {

			$query = "UPDATE `research` SET `search`='$search',`fbprolink`='$fbprolink',`fbpagelink`='$fbpagelink',`weblink`='$weblink',`intalink`='$intalink',`desiglink`='$desiglink',`belief1`='$belief1',`belief2`='$belief2',`belief3`='$belief3',`keyphra1`='$keyphra1',`keyphra2`='$keyphra2',`keyphra3`='$keyphra3',`problem1`='$problem1',`problem2`='$problem2',`problem3`='$problem3' WHERE `user_id`='$id'";

			$conn->query($query);
		} else {

			$query = "INSERT INTO `research`(`search`, `user_id`,`fbprolink`,`fbpagelink`,`weblink`,`intalink`,`desiglink`,`belief1`,`belief2`,`belief3`,`keyphra1`,`keyphra2`,`keyphra3`,`problem1`,`problem2`,`problem3`) VALUES ('$search','$id','$fbprolink','$fbpagelink','$weblink','$intalink','$desiglink','$belief1','$belief2','$belief3','$keyphra1','$keyphra2','$keyphra3','$problem1','$problem2','$problem3')";

			$conn->query($query);
		}
	}
}



$conn->close();

?>
<?php
session_start();
if (!isset($_SESSION["id"])) {
	header("Location:index.php");
}
include('config.php');
date_default_timezone_set("UTC");
$id = $_GET['id'];

$result = $conn->query("SELECT * FROM `client_info` WHERE cid='$id'");

if ($result->num_rows > 0) {

	while ($row = $result->fetch_assoc()) {

		$name = $row['firstname'] . "" . $row['lastname'];
	}
}

$listView = " ";

$historyMember = $conn->query("SELECT * FROM `history` WHERE `client_id`='$id' ORDER BY id DESC");

if ($historyMember->num_rows > 0) {
	$i = $historyMember->num_rows;

	while ($history = $historyMember->fetch_assoc()) {

		$listView .= "<tr>

							<td width='100' >" . $i . "</td>

                            <td width='200'>" . date("m/d/Y", strtotime($history['date'])) . "</td>

                            <td width='500'>" . nl2br($history['notes']) . "</td>

                            <td width='100'><button onclick='getnotes(" . $history['id'] . ")' class='btn btn-success editbtn'>Edit</button></td>

                            <td width='100'><button onclick='deletenoted(" . $history['id'] . ")' class='btn btn-danger' >Delete</button></td>

                        </tr>";

		$i--;
	}
} else {

	$listView = "<tr><td class='text-danger'>0 results</td></tr>";
}

?>



<!DOCTYPE html>

<html>

<head>

	<title><?php echo $name; ?></title>

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

	<script src="https://use.fontawesome.com/6c6c4c0fcc.js"></script>

	<style>
		input[type="checkbox"] {

			position: absolute;

			opacity: 0;

			cursor: pointer;

			height: 0;

			width: 0;

		}



		.checkmark {

			position: absolute;

			top: 20px;

			right: 20px;

			height: 20px;

			width: 20px;

			background-color: transparent;

			border: 2px solid #ff5c33;

			border-radius: 3px;

		}



		.check1 input[type="checkbox"]:checked~.checkmark {

			background-color: #fff;

			border: 2px solid #33cc33;

		}



		.check1 {

			cursor: pointer;

			font-size: 22px;

			-webkit-user-select: none;

			-moz-user-select: none;

			-ms-user-select: none;

			user-select: none;

		}



		.checkmark:after {

			content: "";

			position: absolute;

			display: none;

		}



		.check1 input[type="checkbox"]:checked~.checkmark:after {

			display: block;

		}



		.check1 .checkmark:after {

			left: 6px;

			top: 2px;

			width: 5px;

			height: 10px;

			border: solid #33cc33;

			border-width: 0 2px 2px 0;

			-webkit-transform: rotate(45deg);

			-ms-transform: rotate(45deg);

			transform: rotate(45deg);

		}



		.check {

			position: relative;

			top: 5px;

		}

		.btns {
			border: 2px solid #000;
			color: #000;
			font-size: 20px;
			font-weight: 600;
			padding: 5px 10px;
			/* width: 120px !important; */
		}
	</style>

</head>

<body>

	<div class="container">
		<br>
		<a class="btn btns" href="home">Home</a>
		<a class="btn btns" href="research?id=<?= $id ?>">Show Research</a>
		<a class="btn btns" href="allAudience">Show All</a>
		<a class="btn btns" href="login">Add New</a>
		<a class="btn btns" href="level">Levels List</a>
		<a id="log" class="float-right" href="logout"><i class="fas fa-sign-out-alt"></i> Logout </a>
		<a class='btns btn' href="javascript:history.back()">Back</a>
		<div class="row">

			<div class="col-md-6">

				<form class="form-horizontal">

					<div class="panel panel-default">

						<div class="panel-heading">

							<h3 class="panel-title">Name:- <?= $name ?></h3>

						</div><br>

						<div class="panel-body">

							<div class="form-group">

								<label class="col-md-12 col-xs-12 control-label">Complete by Day</label>

								<div class="col-md-12 col-xs-12">

									<div class="input-group">

										<span class="input-group-addon bg-info">

											<span class="fa fa-calendar p-2"></span>

										</span>

										<input type="text" class="form-control" value="<?php echo date("m/d/Y"); ?>" required disabled style="color: #ccc;">

									</div>

								</div>

							</div>
							<div class="form-group">
								<label class="col-md-3 col-xs-12 control-label">Title</label>

								<div class="col-md-12 col-xs-12">
									<input type="text" name="title" class="form-control" id="title2">
								</div>
							</div>
							<div class="form-group">

								<label class="col-md-12 col-xs-12 control-label">Notes</label>

								<div class="col-md-12 col-xs-12">

									<textarea name="historyNotes" id="historyNotes" class="form-control" rows="5"></textarea>

								</div>

							</div>

							<div class="form-group">

								<div class="col-md-12 col-xs-12">

									<button id="addHistory" type="button" class="btn btn-primary" data-id="<?php echo $id; ?>">Save Notes</button><br>

								</div>

							</div>

						</div>

					</div>

				</form>

			</div>

			<?php

			$result = $conn->query("SELECT * FROM `next_action` WHERE `user_id`='$id'");

			$row = $result->fetch_assoc();



			if ($row['status'] == 0) {

				$checked = "checked='checked'";
			} else {

				$checked = "";
			}

			?>

			<div class="col-md-6">

				<form class="form-horizontal">

					<div class="panel panel-default">

						<div class="panel-heading">

							<h3 class="panel-title">Next Action</h3>

						</div>

						<div class="check">

							<label class="check1">

								<input type="checkbox" <?= $checked ?> value="<?php echo $id; ?>" id="rememberMe">

								<span class="checkmark"></span>

							</label>

						</div>

						<div class="panel-body">

							<div class="form-group">

								<label class="col-md-12 col-xs-12 control-label">Due Date</label>

								<div class="col-md-12 col-xs-12">

									<div class="input-group">

										<span class="input-group-addon bg-info">

											<span class="fa fa-calendar p-2"></span>

										</span>

										<?php if ($row['date'] != "") { ?>

											<input type="date" class="form-control" id="date" required style="color: #000;" value="<?php echo date("Y-m-d", strtotime($row['date'])); ?>">

										<?php } else { ?>

											<input type="date" class="form-control" id="date" value="<?php echo date("Y-m-d"); ?>" required style="color: #000;">

										<?php } ?>

									</div>

								</div>

							</div>

							<div class="form-group">

								<label class="col-md-3 col-xs-12 control-label">Title</label>

								<div class="col-md-12 col-xs-12">
									<input type="text" name="title" class="form-control" id="titles" value="<?php echo $row['title'] ?>">
								</div>
							</div>
							<div class="form-group">

								<label class="col-md-3 col-xs-12 control-label">Notes</label>

								<div class="col-md-12 col-xs-12">

									<textarea name="nextnotes" id="nextnotes" data-id="<?php echo $id; ?>" class="form-control" rows="5"><?= $row['next_notes'] ?></textarea>

								</div>

							</div>
							<input type="submit" id="nextnotessubmit" value="Save" class="btn btn-primary">
							<?php if ($row['date'] != "") { ?>
								<input type="button" name="delete" id="nextnotes_delet" data-id="<?php echo $id; ?>" value="Delete" class="btn btn-danger float-right">
							<?php } ?>


						</div>

					</div>

				</form>

			</div>

		</div>

		<!------------------------------------------------------------------->

		<div class="panel-body">

			<table class="table table-striped table-bordered" width="100%">

				<tr class="table-primary">

					<th width="100">No</th>

					<th width="200">Date</th>

					<th width="500">Notes</th>

					<th width="100">Edit</th>

					<th width="100">Delete</th>

				</tr>
				<?php echo $listView; ?>
			</table>

		</div>

		<!------------------------------------------------------------------->

		<!-- update model -->

		<!-- The Modal -->

		<div class="modal" id="myModal">

			<div class="modal-dialog">

				<div class="modal-content">



					<!-- Modal Header -->

					<div class="modal-header">

						<h4 class="modal-title">Edit Nots</h4>

						<button type="button" class="close" data-dismiss="modal">&times;</button>

					</div>



					<!-- Modal body -->

					<div class="modal-body">

						<input type="hidden" name="" id="notes_id">
						<div class="form-group"><input type="text" id="title3" class="form-control"></div>
						<div class="form-group">
							<textarea style="width: 100%" id="notes"></textarea>
						</div>

					</div>



					<!-- Modal footer -->

					<div class="modal-footer">

						<input type="submit" name="submit" value="Edit" class="btn btn-warning" onclick="updatedetail()">

						<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

					</div>



				</div>

			</div>

		</div>

	</div>



	<script>
		function urlify(text) {
			var urlRegex = /(https?:\/\/[^\s]+)/g;
			return text.replace(urlRegex, function(url) {
				return '<a href="' + url + '" target="_blank">' + url + '</a>';
			})
			// or alternatively
			// return text.replace(urlRegex, '<a href="$1">$1</a>')
		}


		$(document).ready(function() {

			$('#rememberMe').change(function() {

				var _status = $(this).is(":checked") ? "0" : "1";

				var _id = $(this).val();

				$.post("history_notes",

					{
						_status: _status,
						_id: _id
					},

					function(data, status) {

						location.reload(true);

					});

			});



			$('#nextnotessubmit').click(function() {

				var next_id = $('#nextnotes').attr('data-id');

				var val = $('#nextnotes').val();

				var date = $("#date").val();
				var title = $('#titles').val();

				$.ajax({

					url: "history_notes",

					data: {
						"next_id": next_id,
						"val": val,
						"date": date,
						"title": title
					},

					type: "POST",

					success: function(data) {

						location.reload(true);

					}

				});

			});

			$('#nextnotes_delet').click(function() {
				var clients_id = $(this).attr('data-id');

				$.ajax({
					url: "history_notes",
					data: {
						"clients_id": clients_id,
						'delete': 'Delete'
					},
					type: "POST",
					dataType: "html",
					success: function(response) {
						location.reload(true);
					}
				});
			});

			$("#addHistory").click(function() {
				var cid = $(this).attr('data-id');
				var title2 = $("#title2").val();
				var notes = $("#historyNotes").val();
				var html = urlify(notes);
				console.log(html);
				if ($.trim(notes) == "")

				{

					alert("Please enter notes.");

					$("#historyNotes").focus();

					return false;

				} else {

					$.ajax({

						url: "history_notes",

						data: {
							"cid": cid,
							"notes": html,
							"title2": title2
						},

						type: "POST",

						dataType: "html",

						success: function(response)

						{

							$("#tbHistoryNotes").html(response);

							location.reload(true);

						}

					});

				}

			});

		});



		function deletenoted(notes_id) {

			var conf = confirm("Are You Sure");

			if (conf == true) {

				$.ajax({

					url: "history_notes",

					type: "POST",

					data: {
						notes_id: notes_id
					},

					success: function(data, status) {

						location.reload(true);

					}

				});

			}

		}



		function getnotes(notesd_id) {

			$('#notes_id').val(notesd_id);

			$.post("history_notes",

				{
					notesd_id: notesd_id
				},

				function(data, status) {

					var user = JSON.parse(data);

					$('#notes').val(user.notes);
					$('#title3').val(user.title);

				});

			$('#myModal').modal('show');

		}



		function updatedetail() {

			var notes = urlify($('#notes').val());
			var title3 = urlify($('#title3').val());

			var id = $('#notes_id').val();

			$.post("history_notes", {
					notes: notes,
					title3: title3,
					id: id

				},

				function(data, status) {

					$('#myModal').modal('hide');

					location.reload(true);

				}

			);

		}
	</script>

</body>

</html>
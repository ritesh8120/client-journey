<?php
session_start();
if (!isset($_SESSION["id"])) {
    header("Location:index.php");
}
$page = "Post History";
include('fheader.php');
include('config.php');
date_default_timezone_set("UTC");
$id = $_GET['id'];

$listView = " ";
$historyMember = $conn->query("SELECT * FROM `post_history` WHERE `user_id`='$id'");

if ($historyMember->num_rows > 0) {
    $i = $historyMember->num_rows;

    while ($history = $historyMember->fetch_assoc()) {

        $listView .= "<tr>
                    <td width='100'>" . $i . "</td>
                    <td width='200'>" . date("m/d/Y", strtotime($history['fld_date'])) . "</td>
                    <td width='500'>" . nl2br($history['abouttitle']) . "</td>
                    <td width='500'>" . nl2br($history['contenttext']) . "</td>
                    <td width='500'><a href='" . nl2br($history['contentLink']) . "' target='_blank'>" . nl2br($history['contentLink']) . "</a></td>
                    <td width='500'>" . nl2br($history['comment']) . "</td>
                    <td width='500'><img alt='Image Not Found' src='" . $history['Contentimage'] . "' width='100'></td>
                    <td width='500'><video width='120' height='90' controls>
                        <source src='" . $history['Contentvideo'] . "' type='video/mp4'>
                        <source src='" . $history['Contentvideo'] . "' type='video/ogg'>
                        Your browser does not support the video tag.
                        </video>
                    </td>
                    <td width='100'><button onclick='getnotes(" . $history['fld_id'] . ")' class='btn btn-success editbtn'>Edit</button></td>
                    <td width='100'><button onclick='deletenoted(" . $history['fld_id'] . ")' class='btn btn-danger' >Delete</button></td>
                    </tr>";

        $i--;
    }
} else {

    $listView = "<tr><td class='text-danger'>0 results</td></tr>";
}

?>
<link rel="stylesheet" type="text/css" href="image.css">
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
</style>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <form class="form-horizontal" id="posthistory">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">Complete By Day</h4>
                    </div><br>
                    <div class="panel-body">
                        <div class="form-group">
                            <label>Date</label>
                            <div class="input-group">
                                <span class="input-group-addon bg-info">
                                    <span class="fa fa-calendar p-2"></span>
                                </span>
                                <input type="text" class="form-control" value="<?php echo date("m/d/Y"); ?>" required disabled style="color: #ccc;">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>About/Title</label>
                            <div>
                                <input type="text" name="abouttitle" class="form-control" id="abouttitle">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 col-xs-12 control-label">Post Content/Text</label>
                            <div>
                                <textarea name="contenttext" id="contenttext" class="form-control" rows="2"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 col-xs-12 control-label">Post Content/Link</label>
                            <div>
                                <textarea name="contentLink" id="contentLink" class="form-control" rows="2"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 col-xs-12 control-label">Post Content/video</label>
                            <div>
                                <input class="form-control" type="file" id="Contentvideo" name="Contentvideo">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 col-xs-12 control-label">Post Content/Image</label>
                            <div>
                                <input class="form-control" type="file" id="Contentimage" name="Contentimage">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 col-xs-12 control-label"> Comment Details</label>
                            <div>
                                <textarea name="comment" id="comment" class="form-control" rows="2"></textarea>
                            </div>
                        </div>
                        <input type="hidden" value="<?php echo $id; ?>" name="user_id">
                        <div class="form-group">
                            <div>
                                <input class="btn btn-primary" type="submit" value="Save Notes"><br>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <?php

        $result = $conn->query("SELECT * FROM `post_next_action` WHERE `user_id`='$id'");
        $row = $result->fetch_assoc();

        if ($row['status'] == 0) {
            $checked = "checked='checked'";
        } else {
            $checked = "";
        }
        ?>
        <div class="col-md-6">
            <form class="form-horizontal" id="nextaction">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">Next Action</h4>

                        <div class="check">
                            <label class="check1">
                                <input type="checkbox" <?= $checked ?> value="<?php echo $id; ?>" id="rememberMe">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-md-12 col-xs-12 control-label">Due Date</label>
                            <div>
                                <div class="input-group">
                                    <span class="input-group-addon bg-info">
                                        <span class="fa fa-calendar p-2"></span>
                                    </span>
                                    <?php if ($row['fld_date'] != "") { ?>
                                        <input type="date" class="form-control" id="date" name="fld_date" required style="color: #000;" value="<?php echo date("Y-m-d", strtotime($row['fld_date'])); ?>">
                                    <?php } else { ?>
                                        <input type="date" class="form-control" name="fld_date" id="date" value="<?php echo date("Y-m-d"); ?>" required style="color: #000;">
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>About/Title</label>
                            <div>
                                <input type="text" name="abouttitle" class="form-control" id="abouttitle" value="<?= $row['abouttitle']; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 col-xs-12 control-label">Post Content/Text</label>
                            <div>
                                <textarea name="contenttext" id="contenttext" class="form-control" rows="2"><?= $row['contenttext']; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 col-xs-12 control-label">Post Content/Link</label>
                            <div>
                                <textarea name="contentLink" id="contentLink" class="form-control" rows="2"><?= $row['contentLink']; ?></textarea>
                            </div>
                        </div>
                        <?php if ($row['status'] == 0) { ?>
                            <div class="form-group">
                                <label class="col-md-12 col-xs-12 control-label">Post Content/video</label>
                                <div>
                                    <input class="form-control" type="file" id="Contentvideo" name="Contentvideo" value="<?= $row['Contentvideo']; ?>">
                                </div>
                            </div>
                        <?php } else {
                            echo '<div class="form-group">
                                    <label class="col-md-12 col-xs-12 control-label">Post Content/video</label>
                                    <video width="100" height="40" controls>
                        <source src="' . $row['Contentvideo'] . ' " type="ideo/mp4">
                        <source src="' . $row['Contentvideo'] . '" type="video/ogg">
                        Your browser does not support the video tag.
                        </video>
                                </div>';
                        } ?>
                        <?php if ($row['status'] == 0) { ?>
                            <div class="form-group">
                                <label class="col-md-12 col-xs-12 control-label">Post Content/Image</label>
                                <div>
                                    <input class="form-control" type="file" id="Contentimage" name="Contentimage">
                                </div>
                            </div>
                        <?php } else {
                            echo '<div class="form-group">
                            <label class="col-md-12 col-xs-12 control-label">Post Content/Image</label>
                            <img src="' . $row['Contentimage'] . '" width="100" heigth="40" alt="Image Not fond">
                            </div>';
                        } ?>
                        <div class="form-group">
                            <label class="col-md-12 col-xs-12 control-label"> Comment Details</label>
                            <div>
                                <textarea name="comment" id="comment" class="form-control" rows="2"><?= $row['comment']; ?></textarea>
                            </div>
                            <input type="hidden" value="<?php echo $id; ?>" name="user_id">
                        </div>
                        <input type="submit" value="Save Action" class="btn btn-primary">
                        <?php if ($row['fld_date'] != "") { ?>
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
                <th>No</th>
                <th>Date</th>
                <th>About/Title</th>
                <th>Post Content/Text</th>
                <th>Post Content/Link</th>
                <th>Post Content/video</th>
                <th>Post Content/Image</th>
                <th>Comment Details</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <tbody id="tbHistoryNotes">
                <?php echo $listView; ?>
            </tbody>
        </table>
    </div>

    <!------------------------------------------------------------------->

    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Edit Notes</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">

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
        });
    }

    $(document).ready(function() {
        $('#rememberMe').change(function() {
            var _status = $(this).is(":checked") ? "0" : "1";
            var _id = $(this).val();
            $.post("history_notes", {
                    _status: _status,
                    _id: _id
                },
                function(data, status) {
                    location.reload(true);
                });
        });

        $('#nextaction').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: "nextactionpost",
                type: "POST",
                dataType: "html",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    location.reload(true);
                }
            });
        });

        $('#nextnotes_delet').click(function() {
            var clients_id = $(this).attr('data-id');
            $.ajax({
                url: "nextactionpost",
                data: {
                    "clients_id": clients_id,
                    'delete': 'delete'
                },
                type: "POST",
                dataType: "html",
                success: function(response) {
                    location.reload(true);
                }
            });
        });

        $("#posthistory").submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: "post_history_notes",
                type: "POST",
                dataType: "html",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(response) {
                    $("#tbHistoryNotes").html(response);
                    location.reload(true);
                }
            });
        });
    });

    function deletenoted(notes_id) {
        var conf = confirm("Are You Sure");
        if (conf == true) {
            $.ajax({
                url: "history_notes_delete",
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
        var notesd_ids = notesd_id;
        // var notes_id = $('#notes_id').val(notesd_id);
        $.ajax({
            url: "history_notes_select",
            type: "POST",
            dataType: "html",
            data: {
                notes_id: notesd_ids
            },
            success: function(data, status) {
                // location.reload(true);
                $('.modal-body').html(data);
                $('#myModal').modal('show');
            }
        });
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
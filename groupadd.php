<?php
$page = "Facebook Group Add";
include('fheader.php');
?>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<div class="container">
    <center>
        <img src="manas.png" class="img-fluid"><br>
        <h1>New Group Add</h1>
    </center>
    <form action="" method="post" id="facebookgroupadd" style="background-color: #d9d9d9; padding: 25px;">
        <?php // echo $sucees 
        ?>
        <!-- <div class="form-group"> -->
            <!-- <strong>Add New : </strong> -->
            <input type="hidden" name="addnew" class="form-control" autocomplete="autocomplete">
        <!-- </div> -->
        <div class="form-group">
            <strong>Facebook Group Name: </strong>
            <input type="text" name="fbgname" autocomplete="autocomplete" class="form-control">
        </div>
        <div class="form-group">
            <strong>Facebook Group Link: </strong>
            <input type="url" name="fbglink" class="form-control" autocomplete="autocomplete">
        </div>
        <div class="form-group">
            <strong>Admin Name: </strong>
            <input type="text" name="adminname" class="form-control" autocomplete="autocomplete">
        </div>
        <div class="form-group">
            <strong>Admin Profile Link : </strong>
            <input type="url" name="adminplink" class="form-control" autocomplete="autocomplete">
        </div>
        <div class="form-group">
            <strong>Current Members: </strong>
            <input type="number" name="currentm" class="form-control" autocomplete="autocomplete">
        </div>

        <div class="form-group">
            <input type="submit" name="submit" class="btn btn-success" value="Submit" style="margin-bottom:10px">
        </div>
    </form>
</div>
<script>
    $(document).ready(function() {
        $("#facebookgroupadd").submit(function(e) {
            e.preventDefault(); // avoid to execute the actual submit of the form.
            var form = $(this);
            $.ajax({
                type: "POST",
                url: "facebooksubmit",
                data: form.serialize(), // serializes the form's elements.
                success: function(data) {
                    if (data == "success") {
                        window.location.href = 'facebook_group';
                    }
                    // alert(data); // show response from the php script.
                }
            });
        });
    });
</script>
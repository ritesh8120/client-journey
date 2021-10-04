<?php
$page = "Facebook Group List";
include('fheader.php');

date_default_timezone_set('America/Los_Angeles');
include('config.php');
if (isset($_REQUEST["delid"])) {
    $delid = $_REQUEST["delid"];
    mysqli_query($conn, "DELETE FROM `facebookgroup` WHERE `fld_id`='$delid'");
}
?>
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

<div class="container">
    <center><img src="manas.png" class="img-fluid" width="800"></center><br><br><br>
    <h1 style="text-align: center; font-size: 40px;font-weight: 800;">Facebook Group List</h1>

    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">Date</th>
                <th class="text-center">Facebook Group Name</th>
                <th class="text-center">Facebook Group Link</th>
                <th class="text-center">Admin Name</th>
                <th class="text-center">Admin Profile Link</th>
                <th class="text-center">Current Members</th>
                <th class="text-center">History Notes</th>
                <th class="text-center">Next Action Notes</th>
                <th class="text-center">Post History</th>
                <th class="text-center">Edit</th>
                <th class="text-center">Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $querys = mysqli_query($conn, "SELECT * FROM `facebookgroup` ORDER BY `fld_id` DESC ");
            if (mysqli_num_rows($querys) > 0) {
                $i = 1;
                while ($row = mysqli_fetch_array($querys)) {
                    $row_id = $row["fld_id"];
                    $historyMember = $conn->query("SELECT * FROM `post_history` WHERE `user_id`='$row_id'");

                    if ($historyMember->num_rows > 0) {
                        $history = $historyMember->fetch_assoc();
                        $abouttitle = $history['abouttitle'];
                    } else {
                        $abouttitle = "";
                    }
                    $result = $conn->query("SELECT * FROM `post_next_action` WHERE `user_id`='$row_id'");
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $abouttitlenext = $row['abouttitle'];
                    } else {
                        $abouttitlenext = "";
                    }
            ?>
                    <tr>
                        <td class="text-center"><?php echo $i; ?></td>
                        <td class="text-center"><?= date('m/d/y', strtotime($row['date'])); ?></td>
                        <td class="text-center"><?php echo $row['fbgname'] ?></td>
                        <td class="text-center"><a href="<?php echo $row['fbglink'] ?>" target="_blank"><?php echo $row['fbglink'] ?></a></td>
                        <td class="text-center"><?php echo $row['adminname'] ?></td>
                        <td class="text-center"><a href="<?php echo $row['adminplink'] ?>" target="_blank"><?php echo $row['adminplink'] ?></a></td>
                        <td class="text-center"><?php echo $row['currentm'] ?></td>
                        <td class="text-center"><?php echo $abouttitle; ?></td>
                        <td class="text-center"><?php echo $abouttitlenext; ?></td>
                        <td class="text-center"><a href="posthistory?id=<?php echo $row['fld_id'] ?>"><i class="fab fa-searchengin" style="font-size: 30px;"></i></a></td>
                        <td class="text-center"><a href="editfb?id=<?php echo $row['fld_id'] ?>"><i class="fas fa-pen-square" style="font-size: 25px;"></i></a></td>
                        <td class="text-center"><a href="facebook_group?delid=<?php echo $row['fld_id'] ?>" onclick="return confirm('<?php echo $row['addnew']; ?>\n Are you sure you want to delete?')"><img src="garbage.png" height="30px"></a></td>
                    </tr>
            <?php $i++;
                }
            }
            ?>
        </tbody>
    </table>
</div>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.1.1/js/responsive.bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable({
            "order": [
                [0, "desc"]
            ]
        });
    });
</script>
</body>

</html>
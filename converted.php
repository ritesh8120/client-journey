<?php
include 'levelheader.php';
?>
<h3 style="float:right;    font-size: 25px;
    font-weight: 800;">converted</h3>
<table id="example" class="table table-striped table-bordered" style="width:100%;">
    <thead>
        <tr>
            <th class="text-center">No</th>
            <th class="text-center">Start Date</th>
            <th class="text-center">Unique Id</th>
            <th class="text-center">Name</th>
            <th class="text-center">Email</th>
            <th class="text-center">Location</th>
            <th class="text-center">Leadowner</th>
            <th class="text-center">Phone No.</th>
            <th class="text-center">Description</th>
            <th class="text-center">Research</th>
            <th class="text-center">History</th>
            <th class="text-center">Edit</th>
            <th class="text-center">Level transfer</th>
            <th class="text-center">FB Group</th>
            <th class="text-center">Last Activity</th>
            <th class="text-center">Next Activity</th>
            <th class="text-center">Next Activity Date </th>
            <th class="text-center">Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $qua = "SELECT * FROM client_info WHERE `Audience`='7' ORDER BY `cid` DESC ";
        $querys = mysqli_query($conn, $qua);
        if (mysqli_num_rows($querys) > 0) {
            $i = 1;
            while ($row = mysqli_fetch_array($querys)) {
                $sel = "SELECT * FROM `next_action` WHERE `user_id`='" . $row['cid'] . "'";
                $last_action = "SELECT * FROM `history` WHERE `client_id`='" . $row['cid'] . "'  ORDER BY `id` DESC LIMIT 1";
                $query2 = mysqli_query($conn, $last_action);
                $query1 = mysqli_query($conn, $sel);
                $row1 = mysqli_fetch_array($query1);
                $row2 = mysqli_fetch_array($query2);
        ?>
                <tr>
                    <td class="text-center"><?php echo $i; ?></td>
                    <td class="text-center"><?= date('m/d/Y', strtotime($row['date'])); ?></td>
                    <td class="text-center"><a href="research?id=<?php echo $row['cid'] ?>"><?php echo $row['cid']; ?></a></td>
                    <td class="text-center"><a href="research?id=<?php echo $row['cid'] ?>"><?php echo $row['firstname'] ?><?php echo " " . $row['lastname']; ?></a></td>
                    <td><?php echo $row['email'] ?></td>
                    <td class="text-center"><?php echo $row['address'] ?></td>
                    <td class="text-center"><?php echo $row['lead'] ?></td>
                    <td class="text-center"><?php echo $row['phone'] ?></td>
                    <td class="text-center"><?php echo $row['description'] ?></td>
                    <td class="text-center"><a href="research?id=<?php echo $row['cid'] ?>"><i class="fab fa-searchengin" style="font-size: 30px;color:#000"></i></a></td>
                    <td class="text-center"><a href="notes?id=<?php echo $row['cid'] ?>"><i class="fa fa-history" aria-hidden="true" style="font-size: 20px;color:#000"></i></a></td>
                    <td class="text-center"><a href="adit?eid=<?php echo $row['cid'] ?>"><i class="fas fa-pen-square" style="font-size: 25px;color:#000"></i></a></td>
                    <td style="padding: 10px 0 !important;"><select class="levels" style="width: 100%;" data-id="<?php echo $row['cid'] ?>">
                            <option disabled>--Select Level--</option>
                            <option <?= ($row['Audience'] == '1') ? "selected='selected'" : ""; ?> value="1">Level 1</option>
                            <option <?= ($row['Audience'] == '2') ? "selected='selected'" : ""; ?> value="2">Level 2</option>
                            <option <?= ($row['Audience'] == '3') ? "selected='selected'" : ""; ?> value="3">Level 3</option>
                            <option <?= ($row['Audience'] == '4') ? "selected='selected'" : ""; ?> value="4">Level 4</option>
                            <option <?= ($row['Audience'] == '5') ? "selected='selected'" : ""; ?> value="5">Level 5</option>
                            <option <?= ($row['Audience'] == '6') ? "selected='selected'" : ""; ?> value="6">Level 6</option>
                            <option <?= ($row['Audience'] == '7') ? "selected='selected'" : ""; ?> value="7">Level 7</option>
                        </select></td>
                    <td class="text-center"><?= ($row['fggroup'] == '0') ? "Yes" : "No"; ?></td>
                    <td class="text-center"><?php echo $row2['title']; ?></td>
                    <td class="text-center"><?php echo $row1['title']; ?></td>
                    <td class="text-center"><?php echo ($row1['date'] == "") ? " " : date('m/d/y', strtotime($row1['date'])); ?></td>
                    <td class="text-center"><a href="?delid=<?php echo $row['cid'] ?>" onclick="return confirm('<?php echo $row['firstname']; ?>\n Are you sure you want to delete?')"><i class="fas fa-trash" style="font-size: 25px;color:#000"></i></a></td>
                </tr>
        <?php $i++;
            }
        }
        ?>
    </tbody>
</table>
<?php include 'levelfooter.php'; ?>
<?php
$page = "Summary";
include 'header.php';

function getcheck($month, $fld_type, $currentY)
{
    include 'config.php';
    $querys = mysqli_query($conn, "SELECT * FROM `worksheet` WHERE `fld_date`='$month' AND `fld_type`='$fld_type' AND `fld_year`='$currentY'");
    $data = 0;
    while ($row = mysqli_fetch_assoc($querys)) {
        $data += (int)$row['fld_text'];
    }
    return $data;
}

function gettotalsend($month, $year)
{
    include 'config.php';
    $querys = mysqli_query($conn, "SELECT * FROM `worksheet` WHERE `fld_date`='$month' AND `fld_year`='$year'");
    $data = 0;
    while ($row = mysqli_fetch_assoc($querys)) {
        if ($row['fld_type'] == 'a' or $row['fld_type'] == 'c' or $row['fld_type'] == 'e' or $row['fld_type'] == 'g' or $row['fld_type'] == 'i') {
            $data += (int)$row['fld_text'];
        }
    }
    return $data;
}

function gettotalaccept($month, $year)
{
    include 'config.php';
    $querys = mysqli_query($conn, "SELECT * FROM `worksheet` WHERE `fld_date`='$month' AND `fld_year`='$year'");
    $data = 0;
    while ($row = mysqli_fetch_assoc($querys)) {
        if ($row['fld_type'] == 'b' or $row['fld_type'] == 'd' or $row['fld_type'] == 'f' or $row['fld_type'] == 'h' or $row['fld_type'] == 'j') {
            $data += (int)$row['fld_text'];
        }
    }
    return $data;
}

if (isset($_GET['submit'])) {
    $currentYear = $_GET['admission_year'];
} else {
    $currentYear = date('Y');
}

function getweek($m, $fld_type, $currentY)
{
    include 'config.php';
    $querys = mysqli_query($conn, "SELECT * FROM `worksheet` WHERE `fld_day`='$m' AND `fld_type`='$fld_type' AND `fld_year`='$currentY'");
    $data = 0;
    while ($row = mysqli_fetch_assoc($querys)) {
        $data += (int)$row['fld_text'];
    }
    return $data;
}

function getsend($m, $currentY)
{
    include 'config.php';
    $querys = mysqli_query($conn, "SELECT * FROM `worksheet` WHERE `fld_day`='$m' AND `fld_year`='$currentY'");
    $data = 0;
    while ($row = mysqli_fetch_assoc($querys)) {
        if ($row['fld_type'] == 'a' or $row['fld_type'] == 'c' or $row['fld_type'] == 'e' or $row['fld_type'] == 'g' or $row['fld_type'] == 'i') {
            $data += (int)$row['fld_text'];
        }
    }
    return $data;
}

function getaccept($m, $currentY)
{
    include 'config.php';
    $querys = mysqli_query($conn, "SELECT * FROM `worksheet` WHERE `fld_day`='$m' AND `fld_year`='$currentY'");
    $data = 0;
    while ($row = mysqli_fetch_assoc($querys)) {
        if ($row['fld_type'] == 'b' or $row['fld_type'] == 'd' or $row['fld_type'] == 'f' or $row['fld_type'] == 'h' or $row['fld_type'] == 'j') {
            $data += (int)$row['fld_text'];
        }
    }
    return $data;
}


function getDatesFromRange($start, $end)
{
    $dates = array($start);
    while (end($dates) < $end) {
        $dates[] = date('Y-m-d', strtotime(end($dates) . ' +1 day'));
    }
    return $dates;
}
$getdate = getDatesFromRange($currentYear . '-01-01', $currentYear . '-12-31');
?>
<style>
    table {
        width: 100%;
        border-collapse: collapse;
    }

    /* Zebra striping */
    tr:nth-of-type(odd) {
        background: #eee;
    }

    th {
        background: #336600;
        color: white;
        font-weight: bold;
    }

    td,
    th {
        padding: 6px;
        border: 1px solid #ccc;
        text-align: center;
    }

    thead {
        position: sticky;
        top: 0;
    }
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<h1>Savage Prospecting Summary - Monthly Results </h1>
<table style="display: block; overflow-x: auto;height: 70vh; white-space: nowrap;">
    <thead>
        <tr class="defoult">
            <th style="width:100px" rowspan="3">DATE</th>
            <th colspan="5">Revenue Generating Activities (RGA)</th>
            <th colspan="2">PHONE </th>
            <th colspan="3">Intro Call</th>
            <th colspan="3">DISCOVERY CALLS </th>
            <th colspan="1">VSL</th>
            <th colspan="3">SALES CALLS</th>
            <th colspan="2">SELF-REFLECTION </th>
        </tr>
        <tr class="defoult">
            <th colspan="2">Total</th>
            <th colspan="3">Emails </th>
            <th rowspan="2">Calls </th>
            <th rowspan="2">Answered</th>
            <th rowspan="2">Booked</th>
            <th rowspan="2"> Scheduled </th>
            <th rowspan="2"> Taken</th>
            <th rowspan="2">Booked</th>
            <th rowspan="2"> Scheduled </th>
            <th rowspan="2"> Taken</th>
            <th rowspan="2">Sent</th>
            <th rowspan="2"> Booked </th>
            <th rowspan="2"> Called</th>
            <th rowspan="2">Sold</th>
            <th rowspan="2">Name at least one success you had today</th>
            <th rowspan="2">What obstacles or blockers did you encounter today?</th>
        </tr>
        <tr class="defoult">
            <th>Total Sent</th>
            <th>Total Accept</th>
            <th>Sent</th>
            <th>Open</th>
            <th>Click</th>

        </tr>
    </thead>
    <tbody>
        <?php
        for ($i = 1; $i <= 12; $i++) {
            $month = date('M', mktime(0, 0, 0, $i, 10));
            $f = date('F', mktime(0, 0, 0, $i, 10));
        ?>
            <tr>
                <td><?= $f; ?></td>
                <td class="data10"><?= gettotalsend($month, $currentYear); ?></td>
                <td class="data11"><?= gettotalaccept($month, $currentYear); ?></td>
                <td class="data12"><?= getcheck($month, 'k', $currentYear); ?></td>
                <td class="data13"><?= getcheck($month, 'l', $currentYear); ?></td>
                <td class="data14"><?= getcheck($month, 'm', $currentYear); ?></td>
                <td class="data15"><?= getcheck($month, 'n', $currentYear); ?></td>
                <td class="data16"><?= getcheck($month, 'o', $currentYear); ?></td>
                <td class="data17"><?= getcheck($month, 'p', $currentYear); ?></td>
                <td class="data18"><?= getcheck($month, 'q', $currentYear); ?></td>
                <td class="data19"><?= getcheck($month, 'r', $currentYear); ?></td>
                <td class="data20"><?= getcheck($month, 's', $currentYear); ?></td>
                <td class="data21"><?= getcheck($month, 't', $currentYear); ?></td>
                <td class="data22"><?= getcheck($month, 'u', $currentYear); ?></td>
                <td class="data23"><?= getcheck($month, 'v', $currentYear); ?></td>
                <td class="data24"><?= getcheck($month, 'w', $currentYear); ?></td>
                <td class="data25"><?= getcheck($month, 'x', $currentYear); ?></td>
                <td class="data26"><?= getcheck($month, 'y', $currentYear); ?></td>
                <td class="data27"><?= getcheck($month, 'z', $currentYear); ?></td>
                <td class="data28"><?= getcheck($month, 'aa', $currentYear); ?></td>
            </tr>
        <?php } ?>
        <tr>
            <td colspan="30" style="background:#000; color:#fff;padding:15px;font-size:28px;">Savage Prospecting Summary - Weekly Results </td>
        </tr>
        <?php
        $begin = new DateTime((int)$currentYear . '-01-01');
        $end = new DateTime((int)$currentYear . '-12-31');
        $end = $end->modify('+1 day');
        $interval = new DateInterval('P1D');
        $daterange = new DatePeriod($begin, $interval, $end);

        foreach ($daterange as $day) {
            $sunday = date('w', strtotime($day->format("Y-m-d")));
            if ($sunday == 0) { ?>
                <tr>
                    <td><?= $day->format('D, M d')  ?></td>
                    <td><?php echo getsend(strtotime(date("Y-m-d", strtotime('sunday this week', strtotime($day->format('D, M d'))))), $currentYear); ?></td>
                    <td><?php echo getaccept(strtotime(date("Y-m-d", strtotime('sunday this week', strtotime($day->format('D, M d'))))), $currentYear); ?></td>
                    <td><?php echo getweek(strtotime(date("Y-m-d", strtotime('sunday this week', strtotime($day->format('D, M d'))))), 'k', $currentYear);  ?></td>
                    <td><?php echo getweek(strtotime(date("Y-m-d", strtotime('sunday this week', strtotime($day->format('D, M d'))))), 'l', $currentYear);  ?></td>
                    <td><?php echo getweek(strtotime(date("Y-m-d", strtotime('sunday this week', strtotime($day->format('D, M d'))))), 'm', $currentYear);  ?></td>
                    <td><?php echo getweek(strtotime(date("Y-m-d", strtotime('sunday this week', strtotime($day->format('D, M d'))))), 'n', $currentYear);  ?></td>
                    <td><?php echo getweek(strtotime(date("Y-m-d", strtotime('sunday this week', strtotime($day->format('D, M d'))))), 'o', $currentYear);  ?></td>
                    <td><?php echo getweek(strtotime(date("Y-m-d", strtotime('sunday this week', strtotime($day->format('D, M d'))))), 'p', $currentYear);  ?></td>
                    <td><?php echo getweek(strtotime(date("Y-m-d", strtotime('sunday this week', strtotime($day->format('D, M d'))))), 'q', $currentYear);  ?></td>
                    <td><?php echo getweek(strtotime(date("Y-m-d", strtotime('sunday this week', strtotime($day->format('D, M d'))))), 'r', $currentYear);  ?></td>
                    <td><?php echo getweek(strtotime(date("Y-m-d", strtotime('sunday this week', strtotime($day->format('D, M d'))))), 's', $currentYear);  ?></td>
                    <td><?php echo getweek(strtotime(date("Y-m-d", strtotime('sunday this week', strtotime($day->format('D, M d'))))), 't', $currentYear);  ?></td>
                    <td><?php echo getweek(strtotime(date("Y-m-d", strtotime('sunday this week', strtotime($day->format('D, M d'))))), 'u', $currentYear);  ?></td>
                    <td><?php echo getweek(strtotime(date("Y-m-d", strtotime('sunday this week', strtotime($day->format('D, M d'))))), 'v', $currentYear);  ?></td>
                    <td><?php echo getweek(strtotime(date("Y-m-d", strtotime('sunday this week', strtotime($day->format('D, M d'))))), 'w', $currentYear);  ?></td>
                    <td><?php echo getweek(strtotime(date("Y-m-d", strtotime('sunday this week', strtotime($day->format('D, M d'))))), 'x', $currentYear);  ?></td>
                    <td><?php echo getweek(strtotime(date("Y-m-d", strtotime('sunday this week', strtotime($day->format('D, M d'))))), 'y', $currentYear);  ?></td>
                    <td><?php echo getweek(strtotime(date("Y-m-d", strtotime('sunday this week', strtotime($day->format('D, M d'))))), 'z', $currentYear);  ?></td>
                    <td><?php echo getweek(strtotime(date("Y-m-d", strtotime('sunday this week', strtotime($day->format('D, M d'))))), 'aa', $currentYear);  ?></td>
                </tr>
        <?php  } else {
                echo '';
            }
        } ?>
    </tbody>
</table>
<?php
$page = "Dashbord";
include 'header.php';
function getcheck($day, $fld_type)
{
    include 'config.php';
    $querys = mysqli_query($conn, "SELECT * FROM `worksheet` WHERE `fld_current_date`='$day' AND `fld_type`='$fld_type'");
    $data = 0;
    $row = mysqli_fetch_assoc($querys);
    $data = (int)$row['fld_text'];

    return $data;
}
function getmonth($month, $fld_type)
{
    include 'config.php';
    $querys = mysqli_query($conn, "SELECT * FROM `worksheet` WHERE `fld_date`='$month' AND `fld_type`='$fld_type'");
    $data = 0;
    while ($row = mysqli_fetch_assoc($querys)) {
        $data += (int)$row['fld_text'];
    }
    return $data;
}

function getyear($year, $fld_type)
{
    include 'config.php';
    $querys = mysqli_query($conn, "SELECT * FROM `worksheet` WHERE `fld_year`='$year' AND `fld_type`='$fld_type'");
    $data = 0;
    while ($row = mysqli_fetch_assoc($querys)) {
        $data += (int)$row['fld_text'];
    }
    return $data;
}

if (isset($_GET['submit'])) {
    $currentYear = $_GET['admission_year'];
} else {
    $currentYear = date('Y');
}

?>
<style>
    #day,
    #week,
    #month {
        width: 100%;
        border-collapse: collapse;
    }

    /* Zebra striping */
    tr:nth-of-type(odd) {
        background: #eee;
    }

    #day th {
        background: #336600;
        color: white;
        font-weight: bold;
    }

    #week th {
        background: #1266F1;
        color: white;
        font-weight: bold;
    }

    #month th {
        background: #EF5350;
        color: white;
        font-weight: bold;
    }

    #day td,
    #day th,
    #week td,
    #week th,
    #month td,
    #month th {
        padding: 6px;
        border: 1px solid #ccc;
        text-align: center;
    }
</style>
<?php
include 'config.php';
$querys = mysqli_query($conn, "SELECT * FROM `projection` WHERE `fld_year`='$currentYear'");
$row = mysqli_fetch_assoc($querys);
$date = date('M');
switch ($date) {
    case 'Jan':
        $monthgoal = (mysqli_num_rows($querys) > 0) ? round(((int)$row['goal'] / (int)$row['client']) *  0.09) : 1;
        break;
    case 'Feb':
        $monthgoal = (mysqli_num_rows($querys) > 0) ? round(((int)$row['goal'] / (int)$row['client']) *  0.09) : 1;
        break;

    case 'Mar':
        $monthgoal = (mysqli_num_rows($querys) > 0) ? round(((int)$row['goal'] / (int)$row['client']) *  0.09) : 1;
        break;
    case 'Apr':
        $monthgoal = (mysqli_num_rows($querys) > 0) ? round(((int)$row['goal'] / (int)$row['client']) * 0.09) : 1;
        break;
    case 'May':
        $monthgoal = (mysqli_num_rows($querys) > 0) ? round(((int)$row['goal'] / (int)$row['client']) * 0.09) : 1;
        break;
    case 'Jun':
        $monthgoal = (mysqli_num_rows($querys) > 0) ? round(((int)$row['goal'] / (int)$row['client']) * 0.09) : 1;
        break;
    case 'Jul':
        $monthgoal = (mysqli_num_rows($querys) > 0) ? round(((int)$row['goal'] / (int)$row['client']) * 0.09) : 1;
        break;
    case 'Aug':
        $monthgoal = (mysqli_num_rows($querys) > 0) ? round(((int)$row['goal'] / (int)$row['client']) *  0.09) : 1;
        break;
    case 'Sep':
        $monthgoal = (mysqli_num_rows($querys) > 0) ? round(((int)$row['goal'] / (int)$row['client']) *  0.09) : 1;
        break;
    case 'Oct':
        $monthgoal = (mysqli_num_rows($querys) > 0) ? round(((int)$row['goal'] / (int)$row['client']) *  0.09) : 1;
        break;
    case 'Nov':
        $monthgoal = (mysqli_num_rows($querys) > 0) ? round(((int)$row['goal'] / (int)$row['client']) * 0.05) : 1;
        break;
    case 'Dec':
        $monthgoal = (mysqli_num_rows($querys) > 0) ? round(((int)$row['goal'] / (int)$row['client']) * 0.05) : 1;
        break;
}
$discosnum = $monthgoal / 0.21;
$shownum = $monthgoal / 0.85;
$disconum = $shownum + $discosnum;
$reachnum = $disconum / 0.3;
?>
<h1>Savage Prospecting Dashboard</h1>
<table style="width:99%;margin:8px">
    <tr>
        <th></th>
        <td>Monthly Goal</td>
        <td>MTD %</td>
        <td>Difference</td>
    </tr>
    <tr>
        <td><strong>Initital Contact</strong></td>
        <td><?= round($reachnum); ?></td>
        <td><?= getmonth(date('M'), 'q'); ?></td>
        <?php if (round($reachnum) > getmonth(date('M'), 'q')) {
            $data = round($reachnum) - getmonth(date('M'), 'q');
            $css = "style='color:#fff;background-color:#000;'";
        } else {
            $data = round($reachnum) - getmonth(date('M'), 'q');
            $css = "style='color:#fff;background-color:red;'";
        }
        ?>
        <td <?= $css ?>><?php echo $data ?></td>
    </tr>
    <tr>
        <td><strong>Disco Scheduled</strong></td>
        <td><?= round($disconum); ?></td>
        <td><?= getmonth(date('M'), 't'); ?></td>
        <?php if (round($disconum) > getmonth(date('M'), 't')) {
            $data = round($disconum) - getmonth(date('M'), 't');
            $css = "style='color:#fff;background-color:#000;'";
        } else {
            $data = round($disconum) - getmonth(date('M'), 't');
            $css = "style='color:#fff;background-color:red;'";
        }
        ?>
        <td <?= $css ?>><?php echo $data ?></td>
    </tr>
    <tr>
        <td><strong>No Show</strong></td>
        <td><?= round($shownum); ?></td>
        <td><?php $noshowing =   getmonth(date('M'), 's') -  getmonth(date('M'), 't');
            echo $noshowing; ?></td>
        <?php if (round($shownum) > $noshowing) {
            $data = round($shownum) - $noshowing;
            $css = "style='color:#fff;background-color:#000;'";
        } else {
            $data = round($shownum) - $noshowing;
            $css = "style='color:#fff;background-color:red;'";
        }
        ?>
        <td <?= $css ?>><?php echo $data ?></td>
    </tr>
    <tr>
        <td><strong> Disco Made</strong></td>
        <td><?= round($discosnum); ?></td>
        <td><?= getmonth(date('M'), 'u'); ?></td>
        <?php if (round($discosnum) > getmonth(date('M'), 'u')) {
            $data = round($discosnum) - getmonth(date('M'), 'u');
            $css = "style='color:#fff;background-color:#000;'";
        } else {
            $data = round($discosnum) - getmonth(date('M'), 'u');
            $css = "style='color:#fff;background-color:red;'";
        }
        ?>
        <td <?= $css ?>><?php echo $data ?></td>
    </tr>
    <tr>
        <td><strong>Client Converted</strong></td>
        <td><?= $monthgoal; ?></td>
        <td><?= getmonth(date('M'), 'y'); ?></td>
        <?php if (round($monthgoal) > getmonth(date('M'), 'y')) {
            $data = round($monthgoal) - getmonth(date('M'), 'y');
            $css = "style='color:#fff;background-color:#000;'";
        } else {
            $data = round($monthgoal) - getmonth(date('M'), 'y');
            $css = "style='color:#fff;background-color:red;'";
        }
        ?>
        <td <?= $css ?>><?php echo $data ?></td>
    </tr>
</table>
<br>
<h1> Savage Prospecting Dashboard - Today's summary </h1>
<table id="day" style="width:99%;margin:8px">
    <thead>
        <tr>
            <th colspan="3">Intro call </th>
            <th colspan="3">Disco</th>
            <th colspan="2">No Show</th>
            <th>VSL </th>
            <th colspan="3">SALES CALLS</th>
        </tr>
        <tr>
            <th>Scheduled</th>
            <th>Taken</th>
            <th>Rate</th>
            <th>Scheduled</th>
            <th>Taken</th>
            <th>Rate</th>
            <th>No Show</th>
            <th>Rate</th>
            <th>#</th>
            <th>Called</th>
            <th>Sold</th>
            <th>Rate</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?= (getcheck(strtotime(date('M-d-y')), 'q') > 0) ? getcheck(strtotime(date('M-d-y')), 'q') : 0; ?></td>
            <td><?= (getcheck(strtotime(date('M-d-y')), 'r') > 0) ? getcheck(strtotime(date('M-d-y')), 'r') : 0; ?></td>
            <td><?php if (getcheck(strtotime(date('M-d-y')), 'q') > 0 && getcheck(strtotime(date('M-d-y')), 'r') > 0) {
                    $rateintro = getcheck(strtotime(date('M-d-y')), 'q') / getcheck(strtotime(date('M-d-y')), 'r');
                    echo round($rateintro, 2) . "%";
                } else {
                    echo 0;
                } ?></td>
            <td><?= (getcheck(strtotime(date('M-d-y')), 't') > 0) ? getcheck(strtotime(date('M-d-y')), 't') : 0; ?></td>
            <td><?= (getcheck(strtotime(date('M-d-y')), 'u') > 0) ? getcheck(strtotime(date('M-d-y')), 'u') : 0; ?></td>
            <td><?php if (getcheck(strtotime(date('M-d-y')), 't') > 0 && getcheck(strtotime(date('M-d-y')), 'u') > 0) {
                    $rateintro1 = getcheck(strtotime(date('M-d-y')), 't') / getcheck(strtotime(date('M-d-y')), 'u');
                    echo  round($rateintro1, 2) . "%";
                } else {
                    echo 0;
                } ?></td>
            <td><?php if (getcheck(strtotime(date('M-d-y')), 's') > 0 && getcheck(strtotime(date('M-d-y')), 't') > 0) {
                    $noshowing =  getcheck(strtotime(date('M-d-y')), 's') - getcheck(strtotime(date('M-d-y')), 't');
                    echo  $noshowing;
                } else {
                    $noshowing = 0;
                    echo 0;
                } ?></td>
            <td><?php if (getcheck(strtotime(date('M-d-y')), 't') > 0 && $noshowing > 0) {
                    $rateintro2 = getcheck(strtotime(date('M-d-y')), 't') / $noshowing;
                    echo round($rateintro2, 2) . "%";
                } else {
                    echo 0;
                } ?></td>
            <td><?= (getcheck(strtotime(date('M-d-y')), 'v') > 0) ? getcheck(strtotime(date('M-d-y')), 'v') : 0; ?></td>
            <td><?= (getcheck(strtotime(date('M-d-y')), 'x') > 0) ? getcheck(strtotime(date('M-d-y')), 'x') : 0; ?></td>
            <td><?= (getcheck(strtotime(date('M-d-y')), 'y') > 0) ? getcheck(strtotime(date('M-d-y')), 'y') : 0; ?></td>
            <td><?php if (getcheck(strtotime(date('M-d-y')), 'x') > 0 && getcheck(strtotime(date('M-d-y')), 'y') > 0) {
                    $rateintro3 = getcheck(strtotime(date('M-d-y')), 'x') / getcheck(strtotime(date('M-d-y')), 'y');
                    echo round($rateintro3, 2) . "%";
                } else {
                    echo 0;
                } ?></td>
        </tr>
    </tbody>
</table>
<br>
<h1> Savage Prospecting Dashboard - Week summary </h1>
<table id="week" style="width:99%;margin:8px">
    <thead>
        <tr>
            <th colspan="3">Intro call </th>
            <th colspan="3">Disco</th>
            <th colspan="2">No Show</th>
            <th>VSL </th>
            <th colspan="3">SALES CALLS</th>
        </tr>
        <tr>
            <th>Scheduled</th>
            <th>Taken</th>
            <th>Rate</th>
            <th>Scheduled</th>
            <th>Taken</th>
            <th>Rate</th>
            <th>No Show</th>
            <th>Rate</th>
            <th>#</th>
            <th>Called</th>
            <th>Sold</th>
            <th>Rate</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?= (getmonth(date('M'), 'q') > 0) ? getmonth(date('M'), 'q') : 0; ?></td>
            <td><?= (getmonth(date('M'), 'r') > 0) ? getmonth(date('M'), 'r') : 0; ?></td>
            <td><?php if (getmonth(date('M'), 'q') > 0 && getmonth(date('M'), 'r') > 0) {
                    $rateintro = getmonth(date('M'), 'q') / getmonth(date('M'), 'r');
                    echo round($rateintro, 2) . "%";
                } else {
                    echo 0;
                } ?></td>
            <td><?= (getmonth(date('M'), 't') > 0) ? getmonth(date('M'), 't') : 0; ?></td>
            <td><?= (getmonth(date('M'), 'u') > 0) ? getmonth(date('M'), 'u') : 0; ?></td>
            <td><?php if (getmonth(date('M'), 't') > 0 && getmonth(date('M'), 'u') > 0) {
                    $rateintro1 = getmonth(date('M'), 't') / getmonth(date('M'), 'u');
                    echo  round($rateintro1, 2) . "%";
                } else {
                    echo 0;
                } ?></td>
            <td><?php if (getmonth(date('M'), 's') > 0 && getmonth(date('M'), 't') > 0) {
                    $noshowing =  getmonth(date('M'), 's') - getmonth(date('M'), 't');
                    echo  $noshowing;
                } else {
                    $noshowing = 0;
                    echo 0;
                } ?></td>
            <td><?php if (getmonth(date('M'), 't') > 0 && $noshowing > 0) {
                    $rateintro2 = getmonth(date('M'), 't') / $noshowing;
                    echo round($rateintro2, 2) . "%";
                } else {
                    echo 0;
                } ?></td>
            <td><?= (getmonth(date('M'), 'v') > 0) ? getmonth(date('M'), 'v') : 0; ?></td>
            <td><?= (getmonth(date('M'), 'x') > 0) ? getmonth(date('M'), 'x') : 0; ?></td>
            <td><?= (getmonth(date('M'), 'y') > 0) ? getmonth(date('M'), 'y') : 0; ?></td>
            <td><?php if (getmonth(date('M'), 'x') > 0) {
                    $rateintro3 = getmonth(date('M'), 'x') / getmonth(date('M'), 'y');
                    echo round($rateintro3, 2) . "%";
                } else {
                    echo 0;
                } ?></td>
        </tr>
    </tbody>
</table>
<br>
<h1> Savage Prospecting Dashboard - Month summary </h1>
<table id="month" style="width:99%;margin:8px">
    <thead>
        <tr>
            <th colspan="3">Intro call </th>
            <th colspan="3">Disco</th>
            <th colspan="2">No Show</th>
            <th>VSL </th>
            <th colspan="3">SALES CALLS</th>
        </tr>
        <tr>
            <th>Scheduled</th>
            <th>Taken</th>
            <th>Rate</th>
            <th>Scheduled</th>
            <th>Taken</th>
            <th>Rate</th>
            <th>No Show</th>
            <th>Rate</th>
            <th>#</th>
            <th>Called</th>
            <th>Sold</th>
            <th>Rate</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?= (getyear(date('Y'), 'q') > 0) ? getyear(date('Y'), 'q') : 0; ?></td>
            <td><?= (getyear(date('Y'), 'r') > 0) ? getyear(date('Y'), 'r') : 0; ?></td>
            <td><?php if (getyear(date('Y'), 'q') > 0 && getyear(date('Y'), 'r') > 0) {
                    $rateintro = getyear(date('Y'), 'q') / getyear(date('Y'), 'r');
                    echo round($rateintro, 2) . "%";
                } else {
                    echo 0;
                } ?></td>
            <td><?= (getyear(date('Y'), 't') > 0) ? getyear(date('Y'), 't') : 0; ?></td>
            <td><?= (getyear(date('Y'), 'u') > 0) ? getyear(date('Y'), 'u') : 0; ?></td>
            <td><?php if (getyear(date('Y'), 't') > 0 && getyear(date('Y'), 'u') > 0) {
                    $rateintro1 = getyear(date('Y'), 't') / getyear(date('Y'), 'u');
                    echo  round($rateintro1, 2) . "%";
                } else {
                    echo 0;
                } ?></td>
            <td><?php if (getyear(date('Y'), 's') > 0 && getyear(date('Y'), 't') > 0) {
                    $noshowing =  getyear(date('Y'), 's') - getyear(date('Y'), 't');
                    echo  $noshowing;
                } else {
                    $noshowing = 0;
                    echo 0;
                } ?></td>
            <td><?php if (getyear(date('Y'), 't') > 0 && $noshowing > 0) {
                    $rateintro2 = getyear(date('Y'), 't') / $noshowing;
                    echo round($rateintro2, 2) . "%";
                } else {
                    echo 0;
                } ?></td>
            <td><?= (getyear(date('Y'), 'v') > 0) ? getyear(date('Y'), 'v') : 0; ?></td>
            <td><?= (getyear(date('Y'), 'x') > 0) ? getyear(date('Y'), 'x') : 0; ?></td>
            <td><?= (getyear(date('Y'), 'y') > 0) ? getyear(date('Y'), 'y') : 0; ?></td>
            <td><?php if (getyear(date('Y'), 'x') > 0 && getyear(date('Y'), 'y') > 0) {
                    $rateintro3 = getyear(date('Y'), 'x') / getyear(date('Y'), 'y');
                    echo round($rateintro3, 2) . "%";
                } else {
                    echo 0;
                } ?></td>
        </tr>
    </tbody>
</table>
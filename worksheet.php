<?php
$page = "worksheet";
include 'header.php';
include 'config.php';

function getcheck($fld_tableId, $fld_date, $currentY)
{
    include 'config.php';
    $querys = mysqli_query($conn, "SELECT * FROM `worksheet` WHERE `fld_tableId`='$fld_tableId' AND `fld_date`='$fld_date' AND `fld_year`='$currentY'");
    if (mysqli_num_rows($querys) > 0) {
        $row = mysqli_fetch_assoc($querys);
        if ($row['fld_tableId'] != '') {
            $data = $row['fld_text'];
        }
    } else {
        $data = '';
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

if (isset($_GET['submit'])) {
    $currentY = $_GET['admission_year'];
    $m = $_GET['admission_month'];
    if ($m < 10) {
        $month = "0" . $m;
    } else {
        $month = $m;
    }
} else {
    $currentY = date('Y');
    $month = date('m');
}

$getdate = getDatesFromRange($currentY . '-' . $month . '-01', $currentY . '-' . $month . '-31');
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<style>
    #loading {
        position: fixed;
        display: block;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        text-align: center;
        opacity: 0.7;
        background-color: #fff;
        z-index: 99;
    }

    #loading-image {
        position: absolute;
        top: 50%;
        left: 50%;
        z-index: 100;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

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
        /* padding: 6px; */
        border: 1px solid #ccc;
        text-align: center;
    }

    thead {
        position: sticky;
        top: 0;
    }
</style>
<script type="text/javascript">
    $(window).load(function() {
        $("#loading").fadeOut("slow");
    });
</script>
<div id="loading">
    <img id="loading-image" src="Spinner-1s-200px.gif" alt="Loading..." />
</div>
<h1> Daily Prospecting Worksheet 3.0 - <?= $currentY ?></h1>
<table style="display: block; overflow-x: auto;height: 65vh; white-space: nowrap;">
    <thead>
        <tr class="defoult">
            <th style="width:100px" rowspan="3">DATE</th>
            <th colspan="13">Revenue Generating Activities (RGA)</th>
            <th colspan="2">PHONE </th>
            <th colspan="3">Intro Call</th>
            <th colspan="3">DISCOVERY CALLS </th>
            <th colspan="1">VSL</th>
            <th colspan="3">SALES CALLS</th>
            <th colspan="2">SELF-REFLECTION </th>
        </tr>
        <tr class="defoult">
            <th colspan="2">FB Friend Request</th>
            <th colspan="2">FB Messenger</th>
            <th colspan="2">LI Connections </th>
            <th colspan="2">LinkedIn Messages </th>
            <th colspan="2">Instagram </th>
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
            <th>Sent</th>
            <th>Accept</th>
            <th>Sent</th>
            <th>Reply</th>
            <th>Sent</th>
            <th>Accept</th>
            <th>Sent</th>
            <th>Reply</th>
            <th>Sent</th>
            <th>Accept</th>
            <th>Sent</th>
            <th>Open</th>
            <th>Click</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($getdate as $i => $row) {
        ?>
            <tr>
                <td><?= date('D, M j', strtotime($row)); ?></td>
                <td data-cdate="<?= strtotime($row); ?>" data-val="a<?= $i ?>" data-type="a" data-date="<?= date('M', strtotime($row)); ?>" data-year="<?= $currentY ?>" data-day="<?= strtotime(date("Y-m-d", strtotime('sunday this week', strtotime($row)))); ?>" contenteditable="true">
                    <?php echo getcheck('a' . $i, date('M', strtotime($row)), $currentY); ?></td>
                <td data-cdate="<?= strtotime($row); ?>" data-val="b<?= $i ?>" data-type="b" data-date="<?= date('M', strtotime($row)); ?>" data-year="<?= $currentY ?>" data-day="<?= strtotime(date("Y-m-d", strtotime('sunday this week', strtotime($row)))); ?>" contenteditable="true">
                    <?php echo getcheck('b' . $i, date('M', strtotime($row)), $currentY); ?></td>
                <td data-cdate="<?= strtotime($row); ?>" data-val="c<?= $i ?>" data-type="c" data-date="<?= date('M', strtotime($row)); ?>" data-year="<?= $currentY ?>" data-day="<?= strtotime(date("Y-m-d", strtotime('sunday this week', strtotime($row)))); ?>" contenteditable="true">
                    <?php echo getcheck('c' . $i, date('M', strtotime($row)), $currentY); ?></td>
                <td data-cdate="<?= strtotime($row); ?>" data-val="d<?= $i ?>" data-type="d" data-date="<?= date('M', strtotime($row)); ?>" data-year="<?= $currentY ?>" data-day="<?= strtotime(date("Y-m-d", strtotime('sunday this week', strtotime($row)))); ?>" contenteditable="true">
                    <?php echo getcheck('d' . $i, date('M', strtotime($row)), $currentY); ?></td>
                <td data-cdate="<?= strtotime($row); ?>" data-val="e<?= $i ?>" data-type="e" data-date="<?= date('M', strtotime($row)); ?>" data-year="<?= $currentY ?>" data-day="<?= strtotime(date("Y-m-d", strtotime('sunday this week', strtotime($row)))); ?>" contenteditable="true">
                    <?php echo getcheck('e' . $i, date('M', strtotime($row)), $currentY); ?></td>
                <td data-cdate="<?= strtotime($row); ?>" data-val="f<?= $i ?>" data-type="f" data-date="<?= date('M', strtotime($row)); ?>" data-year="<?= $currentY ?>" data-day="<?= strtotime(date("Y-m-d", strtotime('sunday this week', strtotime($row)))); ?>" contenteditable="true">
                    <?php echo getcheck('f' . $i, date('M', strtotime($row)), $currentY); ?></td>
                <td data-cdate="<?= strtotime($row); ?>" data-val="g<?= $i ?>" data-type="g" data-date="<?= date('M', strtotime($row)); ?>" data-year="<?= $currentY ?>" data-day="<?= strtotime(date("Y-m-d", strtotime('sunday this week', strtotime($row)))); ?>" contenteditable="true">
                    <?php echo getcheck('g' . $i, date('M', strtotime($row)), $currentY); ?></td>
                <td data-cdate="<?= strtotime($row); ?>" data-val="h<?= $i ?>" data-type="h" data-date="<?= date('M', strtotime($row)); ?>" data-year="<?= $currentY ?>" data-day="<?= strtotime(date("Y-m-d", strtotime('sunday this week', strtotime($row)))); ?>" contenteditable="true">
                    <?php echo getcheck('h' . $i, date('M', strtotime($row)), $currentY); ?></td>
                <td data-cdate="<?= strtotime($row); ?>" data-val="i<?= $i ?>" data-type="i" data-date="<?= date('M', strtotime($row)); ?>" data-year="<?= $currentY ?>" data-day="<?= strtotime(date("Y-m-d", strtotime('sunday this week', strtotime($row)))); ?>" contenteditable="true">
                    <?php echo getcheck('i' . $i, date('M', strtotime($row)), $currentY); ?></td>
                <td data-cdate="<?= strtotime($row); ?>" data-val="j<?= $i ?>" data-type="j" data-date="<?= date('M', strtotime($row)); ?>" data-year="<?= $currentY ?>" data-day="<?= strtotime(date("Y-m-d", strtotime('sunday this week', strtotime($row)))); ?>" contenteditable="true">
                    <?php echo getcheck('j' . $i, date('M', strtotime($row)), $currentY); ?></td>
                <td data-cdate="<?= strtotime($row); ?>" data-val="k<?= $i ?>" data-type="k" data-date="<?= date('M', strtotime($row)); ?>" data-year="<?= $currentY ?>" data-day="<?= strtotime(date("Y-m-d", strtotime('sunday this week', strtotime($row)))); ?>" contenteditable="true">
                    <?php echo getcheck('k' . $i, date('M', strtotime($row)), $currentY); ?></td>
                <td data-cdate="<?= strtotime($row); ?>" data-val="l<?= $i ?>" data-type="l" data-date="<?= date('M', strtotime($row)); ?>" data-year="<?= $currentY ?>" data-day="<?= strtotime(date("Y-m-d", strtotime('sunday this week', strtotime($row)))); ?>" contenteditable="true">
                    <?php echo getcheck('l' . $i, date('M', strtotime($row)), $currentY); ?></td>
                <td data-cdate="<?= strtotime($row); ?>" data-val="m<?= $i ?>" data-type="m" data-date="<?= date('M', strtotime($row)); ?>" data-year="<?= $currentY ?>" data-day="<?= strtotime(date("Y-m-d", strtotime('sunday this week', strtotime($row)))); ?>" contenteditable="true">
                    <?php echo getcheck('m' . $i, date('M', strtotime($row)), $currentY); ?></td>
                <td data-cdate="<?= strtotime($row); ?>" data-val="n<?= $i ?>" data-type="n" data-date="<?= date('M', strtotime($row)); ?>" data-year="<?= $currentY ?>" data-day="<?= strtotime(date("Y-m-d", strtotime('sunday this week', strtotime($row)))); ?>" contenteditable="true">
                    <?php echo getcheck('n' . $i, date('M', strtotime($row)), $currentY); ?></td>
                <td data-cdate="<?= strtotime($row); ?>" data-val="o<?= $i ?>" data-type="o" data-date="<?= date('M', strtotime($row)); ?>" data-year="<?= $currentY ?>" data-day="<?= strtotime(date("Y-m-d", strtotime('sunday this week', strtotime($row)))); ?>" contenteditable="true">
                    <?php echo getcheck('o' . $i, date('M', strtotime($row)), $currentY); ?></td>
                <td data-cdate="<?= strtotime($row); ?>" data-val="p<?= $i ?>" data-type="p" data-date="<?= date('M', strtotime($row)); ?>" data-year="<?= $currentY ?>" data-day="<?= strtotime(date("Y-m-d", strtotime('sunday this week', strtotime($row)))); ?>" contenteditable="true">
                    <?php echo getcheck('p' . $i, date('M', strtotime($row)), $currentY); ?></td>
                <td data-cdate="<?= strtotime($row); ?>" data-val="q<?= $i ?>" data-type="q" data-date="<?= date('M', strtotime($row)); ?>" data-year="<?= $currentY ?>" data-day="<?= strtotime(date("Y-m-d", strtotime('sunday this week', strtotime($row)))); ?>" contenteditable="true">
                    <?php echo getcheck('q' . $i, date('M', strtotime($row)), $currentY); ?></td>
                <td data-cdate="<?= strtotime($row); ?>" data-val="r<?= $i ?>" data-type="r" data-date="<?= date('M', strtotime($row)); ?>" data-year="<?= $currentY ?>" data-day="<?= strtotime(date("Y-m-d", strtotime('sunday this week', strtotime($row)))); ?>" contenteditable="true">
                    <?php echo getcheck('r' . $i, date('M', strtotime($row)), $currentY); ?></td>
                <td data-cdate="<?= strtotime($row); ?>" data-val="s<?= $i ?>" data-type="s" data-date="<?= date('M', strtotime($row)); ?>" data-year="<?= $currentY ?>" data-day="<?= strtotime(date("Y-m-d", strtotime('sunday this week', strtotime($row)))); ?>" contenteditable="true">
                    <?php echo getcheck('s' . $i, date('M', strtotime($row)), $currentY); ?></td>
                <td data-cdate="<?= strtotime($row); ?>" data-val="t<?= $i ?>" data-type="t" data-date="<?= date('M', strtotime($row)); ?>" data-year="<?= $currentY ?>" data-day="<?= strtotime(date("Y-m-d", strtotime('sunday this week', strtotime($row)))); ?>" contenteditable="true">
                    <?php echo getcheck('t' . $i, date('M', strtotime($row)), $currentY); ?></td>
                <td data-cdate="<?= strtotime($row); ?>" data-val="u<?= $i ?>" data-type="u" data-date="<?= date('M', strtotime($row)); ?>" data-year="<?= $currentY ?>" data-day="<?= strtotime(date("Y-m-d", strtotime('sunday this week', strtotime($row)))); ?>" contenteditable="true">
                    <?php echo getcheck('u' . $i, date('M', strtotime($row)), $currentY); ?></td>
                <td data-cdate="<?= strtotime($row); ?>" data-val="v<?= $i ?>" data-type="v" data-date="<?= date('M', strtotime($row)); ?>" data-year="<?= $currentY ?>" data-day="<?= strtotime(date("Y-m-d", strtotime('sunday this week', strtotime($row)))); ?>" contenteditable="true">
                    <?php echo getcheck('v' . $i, date('M', strtotime($row)), $currentY); ?></td>
                <td data-cdate="<?= strtotime($row); ?>" data-val="w<?= $i ?>" data-type="w" data-date="<?= date('M', strtotime($row)); ?>" data-year="<?= $currentY ?>" data-day="<?= strtotime(date("Y-m-d", strtotime('sunday this week', strtotime($row)))); ?>" contenteditable="true">
                    <?php echo getcheck('w' . $i, date('M', strtotime($row)), $currentY); ?></td>
                <td data-cdate="<?= strtotime($row); ?>" data-val="x<?= $i ?>" data-type="x" data-date="<?= date('M', strtotime($row)); ?>" data-year="<?= $currentY ?>" data-day="<?= strtotime(date("Y-m-d", strtotime('sunday this week', strtotime($row)))); ?>" contenteditable="true">
                    <?php echo getcheck('x' . $i, date('M', strtotime($row)), $currentY); ?></td>
                <td data-cdate="<?= strtotime($row); ?>" data-val="y<?= $i ?>" data-type="y" data-date="<?= date('M', strtotime($row)); ?>" data-year="<?= $currentY ?>" data-day="<?= strtotime(date("Y-m-d", strtotime('sunday this week', strtotime($row)))); ?>" contenteditable="true">
                    <?php echo getcheck('y' . $i, date('M', strtotime($row)), $currentY); ?></td>
                <td data-cdate="<?= strtotime($row); ?>" data-val="z<?= $i ?>" data-type="z" data-date="<?= date('M', strtotime($row)); ?>" data-year="<?= $currentY ?>" data-day="<?= strtotime(date("Y-m-d", strtotime('sunday this week', strtotime($row)))); ?>" contenteditable="true">
                    <?php echo getcheck('z' . $i, date('M', strtotime($row)), $currentY); ?></td>
                <td data-cdate="<?= strtotime($row); ?>" data-val="aa<?= $i ?>" data-type="aa" data-date="<?= date('M', strtotime($row)); ?>" data-year="<?= $currentY ?>" data-day="<?= strtotime(date("Y-m-d", strtotime('sunday this week', strtotime($row)))); ?>" contenteditable="true">
                    <?php echo getcheck('aa' . $i, date('M', strtotime($row)), $currentY); ?></td>
            </tr>
        <?php   }
        ?>
    </tbody>
</table>

<script>
    $(document).ready(function() {
        $('.form-control').change(function() {
            alert((this).val());
        });
        $('td').keyup(function() {
            var data = $(this).text();
            var tableId = $(this).data('val');
            var fld_date = $(this).data('date');
            var type = $(this).data('type');
            var year = $(this).data('year');
            var day = $(this).data('day');
            var cdate = $(this).data('cdate');
            $.ajax({
                type: "post",
                url: 'changelevel',
                data: {
                    fld_date: fld_date,
                    data: data,
                    tableId: tableId,
                    year: year,
                    type: type,
                    day: day,
                    cdate: cdate
                },
                success: function(data) {}
            });
        });
    });
</script>
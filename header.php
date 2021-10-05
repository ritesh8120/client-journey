<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page; ?></title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <style>
        *{
            padding: 0;
            margin: 0;
        }
        h1{
            text-align: center;
            margin-bottom: 20px;
            font-size: 42px;
        }
        td{
            font-size: 23px;
        }
        th{
            font-size: 23px;
            font-weight: 800px;
        }
        .form-control {
            width: 300px;
            padding: 5px 10px;
            border: 1px solid #000;
            border-radius: 5px;
        }

        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #333;
        }

        li {
            float: left;
        }

        li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        li a:hover {
            background-color: #111;
        }

        table,
        th,
        td {
            border: 1px solid #eee;
            border-collapse: collapse;
            padding: 5px 15px;
        }

        .sucess {
            background: green;
        }

        .danger {
            background: chocolate;
        }

        .defoult {
            background: #f2f2f2;
        }

        input[type=submit] {
            border: 1px solid #000;
            padding: 10px 25px;
            background: #333;
            color: #fff;
            border-radius: 5px;
        }
    </style>
    <ul>
        <li><a href="home">Home</a></li>
        <li><a href="kpi">Projection</a></li>
        <li><a href="dashboard">Dashboard</a></li>
        <li><a href="worksheet">Daily worksheet</a></li>
        <li><a href="summarys">Summary-Mth/Wk</a></li>
        <li><a href="logout">Logout</a> </li>

    </ul>
    <form style="margin: 20px;">
    
        <?php
        date_default_timezone_set("UTC");
        if (isset($_GET['submit'])) {
            $currentYear = $_GET['admission_year'];
            if (strstr($_SERVER['REQUEST_URI'], "worksheet")) {
            $admission_month = $_GET['admission_month'];
            }
        } else {
            $currentYear = date('Y');
            if (strstr($_SERVER['REQUEST_URI'], "worksheet")) {
            $admission_month = date('F');
            }
        }
        
        echo '<label> Year: </label><br><select name="admission_year" id="admission_year" class="form-control" data-component="date">';
        echo '<option value="' . $currentYear . '" checked>' . $currentYear . '</option>';
        for ($year = 2000; $year <= 3035; $year++) {
            echo '<option value="' . $year . '">' . $year . '</option>';
        }
        echo "</select></div><br><br>";
        if (strstr($_SERVER['REQUEST_URI'], "worksheet")) {
            echo '<label> Month:</label><br><select name="admission_month" class="form-control" data-component="date">';
            echo '<option value="' . $admission_month . '" checked>' . date('F', mktime(0, 0, 0, $admission_month, 10)) . '</option>';
            for ($i = 1; $i <= 12; $i++) {
                $month = date('F', mktime(0, 0, 0, $i, 10));
                echo '<option value="' . $i . '">' . $month . '</option>';
            }
            echo "</select><br><br>";
        }
        ?>
        <input type="submit" name="submit" value="Submit">
        <a href="home" style="border: 1px solid #000; padding: 10px 25px; background: #333; color: #fff; border-radius: 5px;text-decoration: none;">Home</a>
    </form>
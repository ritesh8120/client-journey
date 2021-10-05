<?php
session_start();
if (!isset($_SESSION["id"])) {
    header("Location:index.php");
}
date_default_timezone_set('America/Los_Angeles');
include('config.php');
if (isset($_REQUEST["delid"])) {
    $delid = $_REQUEST["delid"];
    mysqli_query($conn, "DELETE FROM `business` WHERE client_id='$delid'");
    mysqli_query($conn, "DELETE FROM `personal` WHERE client_id='$delid'");
    $del = "DELETE FROM `client_info` WHERE cid=$delid";
    if (mysqli_query($conn, $del) == true) {
        mysqli_query($conn, "DELETE FROM `clientpogistion` WHERE clientid= '$delid'");
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Interested Audience</title>
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
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <!-- Website CSS style -->
    <!-- <link href="css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
    <!-- Website Font style -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.1.1/css/responsive.bootstrap.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&subset=latin-ext" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i');

        body {
            font-family: 'Roboto', sans-serif !important;
            font-size: 13px !important;
            font-weight: 500 !important;
        }

        select.form-control.input-sm {
            /*background: #00a1ff !important;*/
            border: 0px !important;
            border-radius: 0px !important;
            /*color: #FFF  !important;*/
            font-weight: 500 !important;
            font-size: 13px !important;
            font-family: 'Roboto', sans-serif;
            -webkit-box-shadow: 0px 0px 18px 0px rgba(0, 0, 0, 0.18);
            -moz-box-shadow: 0px 0px 18px 0px rgba(0, 0, 0, 0.18);
            box-shadow: 0px 0px 18px 0px rgba(0, 0, 0, 0.18);
        }

        .pagination>li>a,
        .pagination>li>span {
            /*background: #00a1ff !important;*/
            border: 0px !important;
            border-radius: 0px !important;
            color: #000 !important;
            font-weight: 500 !important;
            font-size: 13px !important;
            font-family: 'Roboto', sans-serif;
            -webkit-box-shadow: 0px 0px 18px 0px rgba(0, 0, 0, 0.18);
            -moz-box-shadow: 0px 0px 18px 0px rgba(0, 0, 0, 0.18);
            box-shadow: 0px 0px 18px 0px rgba(0, 0, 0, 0.18);
        }

        .pagination>.active>a {
            background-color: #000 !important;
            color: #fff !important;
        }

        .pagination>.active>a:hover {
            background-color: #bfbfbf !important;
            color: #fff !important;
        }

        .table-striped>tbody>tr:nth-of-type(odd) {
            /*background-color: #00a1ff!important;*/
            /*color: #FFF!important;*/
            font-size: 13px !important;
            font-family: 'Roboto', sans-serif;
            font-weight: 500 !important;
        }

        tr.even {
            /*   background: #bfbfbf!important;
    color: #000!important;*/
            font-size: 13px !important;
            font-weight: 500 !important;
            font-family: 'Roboto', sans-serif;
        }

        th.sorting,
        .sorting_asc {
            font-family: 'Roboto', sans-serif;
            font-weight: 500 !important;
            border: 1px solid #FFF !important;
            color: #FFF;
            border: 1px solid #93CE37;
            border-bottom: 3px solid #9ED929;
            /* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#30b3ff+0,00a1ff+100 */
            background: rgb(0, 0, 0);
            /* Old browsers */
            background: -moz-linear-gradient(top, rgba(0, 0, 0, 1) 0%, rgba(0, 0, 0, 1) 100%);
            /* FF3.6-15 */
            background: -webkit-linear-gradient(top, rgba(0, 0, 0, 1) 0%, rgba(0, 0, 0, 1) 100%);
            /* Chrome10-25,Safari5.1-6 */
            background: linear-gradient(to bottom, rgba(0, 0, 0, 1) 0%, rgba(0, 0, 0, 1) 100%);
            /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#30b3ff', endColorstr='#00a1ff', GradientType=0);
            /* IE6-9 */

            -webkit-border-top-left-radius: 5px;
            -webkit-border-top-right-radius: 5px;
            -moz-border-radius: 5px 5px 0px 0px;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
        }

        th.sorting,
        .sorting_desc {
            font-family: 'Roboto', sans-serif;
            font-weight: 500 !important;
            border: 1px solid #FFF !important;
            color: #FFF;
            border: 1px solid #93CE37;
            border-bottom: 3px solid #9ED929;
            /* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#30b3ff+0,00a1ff+100 */
            background: rgb(0, 0, 0);
            /* Old browsers */
            background: -moz-linear-gradient(top, rgba(0, 0, 0, 1) 0%, rgba(0, 0, 0, 1) 100%);
            /* FF3.6-15 */
            background: -webkit-linear-gradient(top, rgba(0, 0, 0, 1) 0%, rgba(0, 0, 0, 1) 100%);
            /* Chrome10-25,Safari5.1-6 */
            background: linear-gradient(to bottom, rgba(0, 0, 0, 1) 0%, rgba(0, 0, 0, 1) 100%);
            /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#30b3ff', endColorstr='#00a1ff', GradientType=0);
            /* IE6-9 */

            -webkit-border-top-left-radius: 5px;
            -webkit-border-top-right-radius: 5px;
            -moz-border-radius: 5px 5px 0px 0px;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
        }

        input.form-control.input-sm {
            /*background: #00a1ff !important;*/
            border: 0px !important;
            border-radius: 0px !important;
            /*color: #FFF  !important;*/
            font-weight: 500 !important;
            font-size: 13px !important;
            font-family: 'Roboto', sans-serif;
            -webkit-box-shadow: 0px 0px 18px 0px rgba(0, 0, 0, 0.18);
            -moz-box-shadow: 0px 0px 18px 0px rgba(0, 0, 0, 0.18);
            box-shadow: 0px 0px 18px 0px rgba(0, 0, 0, 0.18);
        }

        #example_wrapper {
            margin-top: 20px;
        }

        div.dataTables_wrapper div.dataTables_length label {
            font-weight: normal;
            text-align: left;
            white-space: break-spaces;
        }

        div.dataTables_wrapper div.dataTables_filter label {
            font-weight: normal;
            white-space: break-spaces;
            text-align: left;
        }

        .btns {
            border: 2px solid #000;
            color: #000;
            font-size: 20px;
            font-weight: 600;
            padding: 5px 10px;
            width: 120px !important;
        }
    </style>
</head>

<body>
    <div style="margin: 0 10%">
        <div style="margin: 20px 0;float: right;"><a class="btn btns" href="logout"><i class="fas fa-sign-out-alt"></i> Logout </a></div>
        <center><img src="manas.png" class="img-fluid" width="800"></center>
        <br>
        <a class="btn btns" style="width:150px;margin:5px" href="home">Home</a>
        <a class="btn btns" style="width:150px;margin:5px" href="allAudience">Show All</a>
        <a class='btns btn' href="javascript:history.back()">Back</a>
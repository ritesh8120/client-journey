<?php
session_start();
if (!isset($_SESSION["id"])) {
    header("Location: ./");
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
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title></title>
    <link rel="stylesheet" type="text/css" href="image.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
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
        * {
            padding: 0;
            margin: 0;
        }

        table tr td {
            line-height: 28px;
            /*width:100px;*/
        }

        input[type="text"],
        input[type="email"],
        input[type="number"] {
            font-family: Book Antiqua;
            background: #e6e6ff;
            margin: 5px;
        }

        h3 {
            color: #000;
        }

        input[type="date"] {
            width: 160px;
        }

        input[type="submit"] {
            text-decoration: none;
            box-sizing: border-box;
            color: #000;
            background: transparent;
            padding: 3px 10px;
            width: 150px;
            border: #000 2px solid;
            font-size: 20px;
        }

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

        .main {
            margin: 0 5px;
        }

        .btns {
            border: 2px solid #000;
            color: #000;
            font-size: 20px;
            font-weight: 600;
            padding: 5px 10px;
            width: 120px !important;
            text-decoration: none;
        }

        .btns:hover {
            text-decoration: none;
            color: #000;
        }

        .form-control {
            border: 2px solid #000;
        }

        td {
            border: 1px solid #000 !important;
        }
    </style>
</head>

<body>
    <div class="main">
        <!--table show-->
        <div style="margin: 20px 0;float: right;"><a class="btn btns" href="logout"><i class="fas fa-sign-out-alt"></i> Logout </a></div>
        <center><img src="manas.png" class="img-fluid" width="800"></center><br>
        <div class="row">
            <div class="col-2" style="padding-left: 50px;">
                <h3>Date Range</h3>
                <div class="form-group">
                    <label class="form-check-label" for="5">From</label>
                    <input type="date" value="2020-05-06" class="form-control ids from">
                </div>
                <div class="form-group">
                    <label class="form-check-label" for="5">To</label>
                    <input type="date" value="2022-05-06" class="form-control ids to">
                </div>
                <!-- level -->
                <h3>Levels</h3>
                <div class="form-check">
                    <input type="checkbox" name="level[]" value="0" id="0" class="ids level" />
                    <label class="form-check-label" for="0">Level 0 </label>
                </div>
                <div class="form-check">
                    <input type="checkbox" name="level[]" value="1" id="1" class="ids level" />
                    <label class="form-check-label" for="1">Level 1 </label>
                </div>
                <div class="form-check">
                    <input type="checkbox" name="level[]" value="2" id="2" class="ids level" />
                    <label class="form-check-label" for="2">Level 2 </label>
                </div>
                <div class="form-check">
                    <input type="checkbox" name="level[]" value="3" id="3" class="ids level" />
                    <label class="form-check-label" for="3">Level 3 </label>
                </div>
                <div class="form-check">
                    <input type="checkbox" name="level[]" value="4" id="4" class="ids level" />
                    <label class="form-check-label" for="4">Level 4 </label>
                </div>
                <div class="form-check">
                    <input type="checkbox" name="level[]" value="5" id="5" class="ids level" />
                    <label class="form-check-label" for="5">Level 5 </label>
                </div>

                <!--sourch-->
                <h3>Source</h3>
                <div class="form-check">
                    <input type="checkbox" name="Source[]" value="Facebook" id="1" class="ids Source" />
                    <label class="form-check-label" for="5">Facebook</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" name="Source[]" value="Linkedin" id="2" class="ids Source" />
                    <label class="form-check-label" for="5">Linkedin</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" name="Source[]" value="Other" id="4" class="ids Source" />
                    <label class="form-check-label" for="5">Other</label>
                </div>

                <!--Lead Owner-->
                <h3>Lead owner</h3>
                <div class="form-check">
                    <input type="checkbox" name="lead[]" value="Rajah Sharma" id="3" class="ids lead" />
                    <label class="form-check-label" for="5">Rajah Sharma</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" name="lead[]" value="Anmol Nagpal" id="4" class="ids lead" />
                    <label class="form-check-label" for="5">Anmol Nagpal</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" name="lead[]" value="Courtney Way" id="5" class="ids lead" />
                    <label class="form-check-label" for="5">Courtney Way</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" name="lead[]" value="Sydney Hungeford" id="5" class="ids lead" />
                    <label class="form-check-label" for="5">Sydney Hungeford</label>
                </div>
            </div>
            <div class="col-8">
                <a class="btn btns" style="width:150px;margin:5px" href="home">Home</a>
                <a class='btns btn' href="javascript:history.back()">Back</a>
                <h3 style="float:right;    font-size: 25px; font-weight: 800;"">Show all</h3>

                <!-- <div class=" table-responsive"> -->
                    <div id="result" style="margin-top: 25px;">
                        <table id="resulttable" class="table table-striped table-bordered" cellspacing="0">
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
                                $empSQL = "SELECT * FROM `client_info` ORDER BY `cid` DESC";

                                $querys = mysqli_query($conn, $empSQL);
                                if (mysqli_num_rows($querys) > 0) {
                                    $i = mysqli_num_rows($querys);
                                    while ($row = mysqli_fetch_array($querys)) {
                                        $sel = "SELECT * FROM `next_action` WHERE `user_id`='" . $row['cid'] . "'";
                                        $last_action = "SELECT * FROM `history` WHERE `client_id`='" . $row['cid'] . "'  ORDER BY `id` DESC LIMIT 1";
                                        $query2 = mysqli_query($conn, $last_action);
                                        $query1 = mysqli_query($conn, $sel);
                                        $row1 = mysqli_fetch_array($query1);
                                        $row2 = mysqli_fetch_array($query2);
                                        // echo date("m/d/y")." ". date('m/d/y', strtotime($row1['date']))."<br>";
                                        if (($row1['date'] == "")) {
                                            $checked = "";
                                        } else {
                                            if (date('m/d/y', strtotime($row1['date'])) > date("m/d/y")) {
                                                $checked = "table-danger";
                                            }
                                        }



                                        if ($row['Audience'] == '1') {
                                            $style = "table-primary";
                                        } elseif ($row['Audience'] == '2') {
                                            $style = "table-info";
                                        } elseif ($row['Audience'] == '3') {
                                            $style = "table-warning";
                                        } elseif ($row['Audience'] == '4') {
                                            $style = "table-success";
                                        } elseif ($row['Audience'] == '5') {
                                            $style = "table-danger";
                                        } else {
                                            $style = "";
                                        } ?>
                                        <tr class="<?= $checked ?><?= $style ?>">
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
                                            <td class="text-center"><?= $row['Audience']; ?></td>
                                            <td class="text-center"><?= ($row['fggroup'] == '0') ? "Yes" : "No"; ?></td>
                                            <td class="text-center"><?php echo $row2['title']; ?></td>
                                            <td class="text-center"><?php echo $row1['title']; ?></td>
                                            <td class="text-center"><?php echo ($row1['date'] == "") ? " " : date('m/d/y', strtotime($row1['date'])); ?></td>
                                            <td class="text-center"><a href="?delid=<?php echo $row['cid'] ?>" onclick="return confirm('<?php echo $row['firstname']; ?>\n Are you sure you want to delete?')"><i class="fas fa-trash" style="font-size: 25px;color:#000"></i></a></td>
                                        </tr>
                                <?php $i--;
                                    }
                                }    ?>
                            </tbody>
                        </table>
                    </div>
                    <div id="getdata"></div>
            </div>
        </div>
    </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#resulttable').DataTable({
                "order": [
                    [0, "desc"]
                ]
            });
            $('.levels').change(function() {
                var audience = $(this).val();
                var id = $(this).data('id');
                $.ajax({
                    type: "post",
                    dataType: "html",
                    url: 'changelevel',
                    data: {
                        audience: audience,
                        id: id
                    },
                    success: function(data) {}
                });
            });
            $('.ids').on('change', function() {
                var level = $('.level:checked').serialize();
                var lead = $('.lead:checked').serialize();
                var Source = $('.Source:checked').serialize();
                var from = $('.from').val();
                var to = $('.to').val();
                if (level || lead || Source || from || to) {
                    $.ajax({
                        type: "POST",
                        cache: false,
                        url: "filter",
                        data: {
                            brandss: level,
                            lead: lead,
                            Source: Source,
                            from: from,
                            to: to
                        },
                        success: function(response) {
                            document.getElementById('getdata').style.display = "block";
                            document.getElementById("getdata").innerHTML = response;
                            $('#result').hide();
                            $('#getdatatable').DataTable({
                                "order": [
                                    [0, "desc"]
                                ]
                            });
                        }
                    });
                } else {
                    document.getElementById('getdata').style.display = "none";
                    $('#result').show();
                    $('#resulttable').DataTable({
                        "order": [
                            [0, "desc"]
                        ]
                    });
                }
            });
        });
    </script>
    <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.1.1/js/responsive.bootstrap.min.js"></script>
</body>

</html>
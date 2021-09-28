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
            background-color: #fff;
            color: #000;
            text-decoration: none;
        }

        li a:active {
            background-color: #fff;
            color: #000;
            text-decoration: none;
        }
    </style>
    <ul>
        <li><a href="home">Home</a></li>
        <li><a href="groupadd">Add New Group</a></li>
        <li><a href="facebook_group">Group List</a></li>
        <li><a href="logout">Logout</a> </li>
    </ul>
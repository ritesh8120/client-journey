<?php 
// connect database
$dbcon = mysqli_connect("localhost","root","","client");

// select kia gaye data ko delet karne ke lia
if  (isset($_REQUEST["delid"]))
{
	$delid = $_REQUEST["delid"];

	$del = "DELETE FROM `client_info` WHERE cid=$delid";
	if(mysqli_query($dbcon,$del) == true){
		mysqli_query($dbcon,"DELETE FROM `clientpogistion` WHERE clientid= '$delid'");
	}
}
?><!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="image.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


<style type="text/css">
*{
	padding: 0;
	margin: 0;
}
h1{
	font-size: 39px;
}

input
{
	display: inline-block;
	font-size: 18px;
	box-sizing: border-box;
	transition: .5s;
}
input[type="text"]{
	background: black;
	color: #fff;
	width: 200px;
	height: 30px;
	border:none;
	outline: none;
	padding: 0 25px;
	border-radius: 25px 0 0 25px;
}
input[type="submit"]
{
	position: relative;
	top:-1px;
	left: -6px;
	border-radius: 0 25px 25px 0;
	width: 100px;
	height: 30px;
	border:none;
	outline: none;
	cursor: pointer;
	background: #ffc107;
	color: #fff;
}
input[type="submit"]:hover
{
	background: #ff5722;
}
</style>
</head>
<body>
	<div class="container">
	<img src="manas.png" class="img-fluid">   
	<form method="post">
		<h1>Search 	</h1>
		<input type="text" name="lead" placeholder="Type ..." >
		<input type="submit" name="searchbox" value="Search" >
	</form>
<a id="log" class="float-right" href="index.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
<h1 class="text-center">Dispay Table</h1>
<br>
<div class="table-responsive">
	<table class="table table-striped table-hover table-bordered">
	<tr>
		<!-- table  heading -->
		<th class="text-center">No</th>
		<th class="text-center">Name</th>
		<th class="text-center">Email</th>
		<th class="text-center">Phone No.</th>
		<th class="text-center">Address</th>
		<th class="text-center">Leadowner</th>
        <th class="text-center">Details</th>
		<th class="text-center">Delete</th>
		<th class="text-center">Edit</th>
	</tr>
	<?php
if (empty($_POST['searchbox'])) 
{
	$sql = "SELECT * FROM client_info";
	$query = mysqli_query($dbcon,$sql);

if (mysqli_num_rows($query)>0) {
	while ($row=mysqli_fetch_array($query)) {
?>
	<tr>
		<td class="text-center"><?php echo $row['cid'] ?></td>
		<td class="text-center"><?php echo $row['firstname']?><?php echo " ".$row['lastname']; ?></td>
		<td ><?php echo $row['email'] ?></td>
		<td class="text-center" ><?php echo $row['phone'] ?></td>
		<td class="text-center" ><?php echo $row['address'] ?></td>
		<td class="text-center" ><?php echo $row['lead'] ?></td>
		<!-- detail janane lia isme detail.php par upid ko send kia jata he  -->
		<td class="text-center" ><a href="Detail.php?upid=<?php echo $row['cid'] ?>"><i class="fa fa-id-card" ></i></a></td>
		<!-- delet karne ke lia delid ko lia gaya he -->
		<td class="text-center" ><a href="display.php?delid=<?php echo $row['cid'] ?>"><img src="del.jpg" height="20px" width="20px"></a></td>
		<!-- eid ke dvara data ko edit kia jata he jo adit.php me hota he -->
		<td class="text-center"><a href="adit.php?eid=<?php echo $row['cid'] ?>"><i class="fas fa-pen-square" ></i></a></td>

<?php }}  ?>
	</tr></table><?php
}else{

	$lead = $_POST['lead'];

	$sql = "SELECT * FROM client_info WHERE lead  like '$lead%' OR source like '%$lead%' ";
	$query = mysqli_query($dbcon,$sql);
	$rowcount = mysqli_num_rows($query);

	for ($i=1; $i<=$rowcount ; $i++) { 
		$row = mysqli_fetch_array($query);
		?>
		<tr>
		<td class="text-center"><?php echo $row['cid'] ?></td>
		<td class="text-center"><?php echo $row['firstname']?><?php echo " ".$row['lastname']; ?></td>
		<td ><?php echo $row['email'] ?></td>
		<td class="text-center" ><?php echo $row['phone'] ?></td>
		<td class="text-center" ><?php echo $row['address'] ?></td>
		<td class="text-center" ><?php echo $row['lead'] ?></td>
		<!-- detail janane lia isme detail.php par upid ko send kia jata he  -->
		<td class="text-center" ><a href="Detail.php?upid=<?php echo $row['cid'] ?>"><i class="fa fa-id-card" ></i></a></td>
		<!-- delet karne ke lia delid ko lia gaya he -->
		<td class="text-center" ><a href="display.php?delid=<?php echo $row['cid'] ?>"><img src="del.jpg" height="20px" width="20px"></a></td>
		<!-- eid ke dvara data ko edit kia jata he jo adit.php me hota he -->
		<td class="text-center"><a href="adit.php?eid=<?php echo $row['cid'] ?>"><i class="fas fa-pen-square" ></i></a></td>
<?php }}  ?>
	</tr>
</table>
</div>
<!-- is button ke se ham new data ko insart kar -->
<a class="btn btn-success float-right my-3" href="login.php">Add New Contact</a>
</div>
</body>
</html>
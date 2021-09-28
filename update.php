<?php
session_start();
if(!isset($_SESSION["id"])) 
{
  header("Location:index.php");
}
  $checkboxid = $_REQUEST['uid'];

 include('config.php');

  $result= $conn->query("SELECT * FROM `clientpogistion` WHERE id ='$checkboxid'");

    $row = $result->fetch_assoc();



 if (isset($_POST['submit'])) {

 $val = $_POST['val'];

 $id = $_POST['id'];

 $img = $_POST['img'];

 if ($val != '' AND $img != '') {

   // echo "string";

   $conn->query("UPDATE `clientpogistion` SET `checkboxname`='$val',

    `img`='$img' WHERE id ='$id'"); 

  header('location: Detail?upid='.$row['clientid']);

 }else{

  echo "Please fill all fild";

 }

} 

?>

<!DOCTYPE html>

<html>

<head>

	<title></title>

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

	<!-- Latest compiled and minified CSS -->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">



<!-- jQuery library -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>



<!-- Popper JS -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>



<!-- Latest compiled JavaScript -->

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

</head>

<body>

<div class="container">

	<div><img src="manas.png" class="img-fluid"></div>
  <a id="log" class="float-right btn btn-danger" href="logout"><i class="fas fa-sign-out-alt"></i> Logout </a>
  <a href="Detail?upid=<?php echo $row['clientid']; ?>" class="btn btn-info">HOME</a><br><br>

	<label class="font-weight-bold h3" > Update New Tag </label><br><br>

	<form action="" method="post">

    <div class="form-group">

      <label for="email">Tag Title</label>

      <input type="hidden" name="id" value="<?php echo $checkboxid?>">

      <input type="text" name="val" value="<?php echo $row['checkboxname'] ?>" class="form-control" style="width: 50%;">

    </div>

    <div class="form-group">

      <label for="pwd">Tag Detail</label>

      <textarea name="img" class="form-control" style="height: 200px"><?php echo $row['img']; ?></textarea>

    </div>

    <input type="submit" name="submit" class="btn btn-success px-5 " >

  </form>

</div>

</body>

</html>
<?php
session_start();
if(!isset($_SESSION["id"])) 
{
  header("Location:index.php");
}
$userid = $_REQUEST["upid"];
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) 
{
  include('config.php');
  $value = $_POST['val'];
  $img = $_POST['img'];
   
  $resultt = $conn->query("SELECT * FROM `clientpogistion` WHERE clientid ='$userid' ORDER BY `form_no` DESC LIMIT 1");
    while ($row = $resultt->fetch_assoc()) 
    {
      $i = $row['form_no']+1;
      $result = mysqli_query($conn,"INSERT INTO `clientpogistion`(`clientid`, `checkboxname`, `cstatus`, `img`, `form_no`) VALUES ('$userid' ,'$value','0','$img','$i')");
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
<style>
  
  .custom-file
  {
  	margin-top: 10px; 
  }
  table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 5px;
  text-align: center;
}
th {
  text-align: center;
}
 	
</style>
</head>
<body>
	<div class="container">
	<div > <img src="manas.png" class="img-fluid"  ></div>
  <div><a href="Detail?upid=<?php echo $userid ?>" class="btn btn-info px-5">Back</a>
    <a id="log" class="float-right btn btn-danger" href="logout"><i class="fas fa-sign-out-alt"></i> Logout </a></div>
	<div class="form">
  <form action="" method="post">
  <label class="font-weight-bold h2"> Add new Tag</label>
    <div class="form-group">
      <label for="email">Tag Title</label>
      <input type="text" name="val" class="form-control" style="width: 50%;">
    </div>
    <div class="form-group">
      <label for="pwd">Tag Detail</label>
      <textarea name="img" class="form-control" style="height: 100px"></textarea>
    </div>
    <input type="submit" name="submit" class="btn btn-success px-5 " >
  </form>
</div>
<div><br>
  <table style="width:100%">
  <tr>
    <th>No.</th>
    <th>Checkbox </th>
    <th>Delete</th> 
    <!-- <th>Update</th> -->
  </tr>
  <?php
include('config.php');
  $sql= $conn->query("SELECT * FROM clientpogistion WHERE clientid = '$userid' ORDER BY `form_no` ");
  if ($sql->num_rows >0){
      while ($row = $sql->fetch_assoc()) {

  ?>
  <tr>
    <td class="pt-3-half formnom" contenteditable="true" data="<?= $row['id']; ?>"><?php echo $row['form_no'];?></td>
    <td class="pt-3-half edit_name" contenteditable="true" data="<?= $row['id']; ?>"><?php echo $row['checkboxname']; ?></td>
    <td><a href="del?delid=<?php echo $row['id'] ?> & clientid=<?php echo $userid  ?>"><i class="fa fa-trash"></i></a></td>
    <!-- <td> <a href="update?uid=<?php echo $row['id'] ?>" class="btn btn-success">Update</a></td> -->
  </tr>
  <?php 
} 
}
  ?>
</table>
</div>
</div>
<script>
  $(document).ready(function(){
    $(".formnom").blur(function(){

      var val = $(this).text();
      var id = $(this).attr('data');
      // alert(id);
    $.ajax({
          type: "POST",
          url: 'changeval',
          data: {val:val,id:id},
          success: function(data)
          {
            // alert(data);
          }
    });
  });
    $('.edit_name').blur(function(){
      var checkboxname = $(this).text();
      var id = $(this).attr("data");
      $.ajax({
          type: "POST",
          url: 'changevals',
          data: {checkboxname:checkboxname,id:id},
          success: function(data)
          {
            // alert(data);
          }
    });
    });
  });
</script>
</body>
</html>
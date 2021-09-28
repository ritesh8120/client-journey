<?php
$conn = mysqli_connect("localhost","root","","client");

$res = "CREATE TABLE `client_info` ( `cid` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
 `firstname` VARCHAR(255) NOT NULL ,
  `lastname` VARCHAR(255) NOT NULL ,
   `email` VARCHAR(255) NOT NULL ,
    `phone` VARCHAR(255) NOT NULL ,
     `address` VARCHAR(255) NOT NULL ,
      `source` VARCHAR(50) NOT NULL ,
       `lead` VARCHAR(50) NOT NULL
   )";
if (mysqli_query($conn,$res)) {
    echo "table created successfully with the name client";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}
?>
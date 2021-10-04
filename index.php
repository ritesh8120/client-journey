<?php
session_start();
$message = "";
if (isset($_POST['submit'])) {
  $username = $_POST['uname'];
  $password = $_POST['pswd'];
  if ($username == 'anmol' && $password == 'anmol') {
    $_SESSION["id"] = "login";
  } else {
    $message = '<div style="color:red;" role="alert">Invalid Username or Password!</div>';
  }
}
if (isset($_SESSION["id"])) {
  header('location:home');
}

?>
<!DOCTYPE html>
<html>

<head>
  <title>Maanas Media</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: sans-serif;
      background: cornflowerblue;
      background-size: cover;
      background-image: url(5005501.jpg);
      background-repeat: no-repeat;
    }

    .box {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      width: 600px;
      height: 500px;
      padding: 40px;
      background: rgba(0, 0, 0, .8);
      box-sizing: border-box;
      box-shadow: 0 15px 25px rgba(0, 0, 0, .5);
      border-radius: 10px;
    }

    .box img {
      margin: -113px 200px 113px;
    }

    .box .inputBox {
      position: relative;
    }

    .box .inputBox input {
      width: 100%;
      padding: 10px 10px;
      font-size: 16px;
      color: #fff;
      letter-spacing: 1px;
      margin-bottom: 30px;
      border: none;
      border-bottom: 1px solid #fff;
      outline: none;
      background: transparent;
      cursor: pointer;
    }

    .box .inputBox label {
      position: absolute;
      top: 0;
      left: 0;
      letter-spacing: 1px;
      padding: 10px 0;
      font-size: 16px;
      color: #fff;
      pointer-events: none;
      transition: .5s;
    }

    .box .inputBox input:focus~label,
    .box .inputBox input:valid~label {
      top: -30px;
      left: 0;
      color: #fff;
      font-size: 12px;
    }

    .box button {
      background: transparent;
      border: none;
      outline: none;
      color: #fff;
      background-color: #03a9f4;
      padding: 10px 20px;
      cursor: pointer;
      border-radius: 5px;
    }
  </style>
</head>

<body>
  <div class="box">
    <img class="img-fluid" src="user.png" width="150" alt="avtar">
    <form action="" method="post" class="needs-validation" novalidate>

      <div class="inputBox">
        <input type="text" id="uname" name="uname" required="" readonly onfocus="this.removeAttribute('readonly');">
        <label for="uname">Username</label>
      </div>
      <div class="inputBox">
        <input type="password" name="pswd" id="pwd" required="" readonly onfocus="this.removeAttribute('readonly');">
        <label for="pwd">Password</label>
      </div>
      <?php echo $message ?><br>
      <button type="submit" name="submit" class="btn btn-primary">Login</button>
    </form>
  </div>
  <script>
    // Disable form submissions if there are invalid fields
    (function() {
      'use strict';
      window.addEventListener('load', function() {
        // Get the forms we want to add validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
          form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
              event.preventDefault();
              event.stopPropagation();
            }
            form.classList.add('was-validated');
          }, false);
        });
      }, false);
    })();
  </script>

</body>

</html>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  			<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
   				<meta charset="utf-8">
  					 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  	<style type="text/css">
  	body{
  		background: url("background.png");
  		background-size: cover;
  		background-position: center;
  	}
	.login-form {
		width: 340px;
    	margin: 50px auto;
    	box-shadow: 10px 10px 10px 10px #888888;
	}
    .login-form form {
    	margin-bottom: 15px;
        background: #f7f7f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
    .login-form h2 {
        margin: 0 0 15px;
    }
    .form-control, .btn {
        min-height: 38px;
        border-radius: 2px;
    }
    .btn {        
        font-size: 15px;
        font-weight: bold;
    }
</style>
	
	<title>LOGIN</title>
</head>
<body>
	<div class="login-form">
    <form method="POST">
        <h3 class="text-center"><i class="fas fa-parking">ARKING</i></h3> <br>
        <p>USERNAME <i class="fas fa-user"></i></p>     
        <div class="form-group">
            <input type="text" class="form-control" placeholder="ENTER USERNAME" name="user" required="required">
        </div>
        <p>PASSWORD <i class="fas fa-key"></i></p>
        <div class="form-group">
            <input type="password" class="form-control" placeholder="ENTER PASSWORD" name="pass" required="required">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Log in</button>
        </div>
    </form>
</div>
<?php
session_start();
require('connect.php');

if (isset($_POST['user']) and isset($_POST['pass'])) {

$email = $_POST['user'];
$password = $_POST['pass'];

$query = "SELECT * FROM admin WHERE username='$email' and password='$password'";
 
$result = mysqli_query($connect, $query) or die(mysqli_error($connect));
$count = mysqli_num_rows($result);

if ($count == 1) {
$_SESSION['email'] = $email;
}
else {
echo "<script type='text/javascript'>alert('Incorrect Admin Credentials, Try Again!')</script>";
}
}

if (isset($_SESSION['email'])) {

$email = $_SESSION['email'];

header('Location: sidebar.php');
 
}
?>

</body> 
</html>
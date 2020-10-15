<?php
  session_start();
  require('connect.php');

  if (!isset($_SESSION['email'])) {
    session_destroy();
    header("Location: login.php");
    exit;
  }
?>
<?php
require('connect.php');
if( isset($_POST['submit']) ) {

$query = "UPDATE parking SET outtime='$_POST[outtime]' WHERE pslot='$_POST[pslot]'";

if($connect->query($query)===TRUE) {
echo "<script type='text/javascript'>alert('Fees Payed Successfully! ')</script>";
}	
else {
echo "Error: " . $query . "<br>" . $connect->error;
}

$intime = $_POST['intime'];
$outtime = $_POST['outtime'];
$parktime = $outtime - $intime;
if($parktime > 0)
{
$fee = 50+($parktime)*10;
}
else
{
$fee = 50;
}
$query = "INSERT INTO fee (pslot,amt,mode) VALUES ('$_POST[pslot]','$fee','$_POST[mode]')";

if($connect->query($query)===TRUE) {
/*  echo "<script type='text/javascript'>alert('Parking Fee: $fee & New Vehicle Fee Created Successfully! $parktime')</script>"; */
} 
else {
    echo "Error: " . $query . "<br>" . $connect->error;
}
$pslot=$_POST['pslot'];
$query = "UPDATE slot SET status='0' WHERE snum='$pslot'";

if($connect->query($query)===TRUE) {
/*echo "<script type='text/javascript'>alert('Slot: $sid Released Successfully!')</script>";*/
echo "<script type='text/javascript'>window.location.href = 'fee.php'</script>";
}	
else {
echo "Error: " . $query . "<br>" . $connect->error;
}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>FEE</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <a href="sidebar.php" class="navbar-brand"><i class="fas fa-home"></i> Home</a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav">
                <a href="slot.php" class="nav-item nav-link"><i class="fas fa-th"></i> Slot</a>
                <a href="npr.php" class="nav-item nav-link"><i class="fas fa-spinner"></i> Npr</a>
                <a href="vehicle.php" class="nav-item nav-link"><i class="fas fa-car"></i> Vehicle</a>
                <a href="parking.php" class="nav-item nav-link"><i class="fas fa-parking"></i> Parking</a>
                <a href="fee.php" class="nav-item nav-link"><i class="fas fa-rupee"></i> Fee</a>
            </div>
            <div class="navbar-nav ml-auto">
                <a href="logout.php" class="nav-item nav-link"><i class="fas fa-close"></i> Logout</a>
            </div>
        </div>
    </nav>
<div class="container">
 <div class="card card-register mx-5 mt-5">
        <div class="card-header"><i class="fas fa-rupee"></i> Rupee</div>
        <div class="card-body">
    <form method="POST">
    	<?php
                  $pslot ='';
                  if(isset($_GET['pslot']))
                  {
                  $pslot = $_GET['pslot'];
                  }
                ?>
		<p>SLOT ID</p>
    	<input type="text" class="form-control" autofocus="autofocus" name="pslot" placeholder="ENTER SLOT ID" value="<?php echo $pslot; ?>" required>
    	<br>
    	    	<?php
                  $intime ='';
                  if(isset($_GET['intime']))
                  {
                  $intime = $_GET['intime'];
                  }
                ?>
    	<p>IN-TIME</p>
    	<input type="text" class="form-control" autofocus="autofocus" name="intime" placeholder="IN-TIME" value="<?php echo $intime; ?>" required> 
    	<br>
    	<?php
		date_default_timezone_set("Asia/Kolkata");
		?>
    	<p>OUT-TIME</p>
    	<input type="text" name="outtime" class="form-control" autofocus="autofocus" placeholder="OUT-TIME" value="<?php echo date("h:i:sa"); ?>" required>
   		<br>
   		<p>PAYMENT MODE</p>
   		<select name="mode" class="form-control" required="required">
   			<option value="#">SELECT PAYMENT MODE:</option>
   			<option value="cash">CASH</option>
   		</select>
   		<br>
   		<center>
        <input type="submit" name="submit" class="btn btn-primary" value="SUBMIT">
              <br><br>
   		<a class="d-block small" href="vf.php">View Fee</a>
   		</center>	
    </form>
  </div>
</div>
</div>
</body>
</html>
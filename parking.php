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
		if(isset($_POST['submit'])){
			$query = "INSERT INTO parking (pslot,vnum,intime,date) VALUES ('$_POST[pslot]','$_POST[vnum]','$_POST[intime]','$_POST[date]')";
			if($connect->query($query)===TRUE) {
					echo "<script type='text/javascript'>alert('Vehicle Parked Successfully!')</script>";
					echo "<script type='text/javascript'>window.location.href = 'parking.php'</script>";
				}			 
		else {
				echo "Error: " . $query . "<br>" . $connect->error;
		}
		$snum=$_POST['pslot'];
		
		$query="UPDATE slot SET status='1' WHERE snum='$snum'";
		
		if($connect->query($query)==TRUE){
			echo "RECORD UPDATED SUCCESSFULLY";
		}
		else{
		echo "Error: " . $query . "<br>" . $connect->error;	
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>PARKING</title>
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
        <div class="card-header"><i class="fas fa-car"></i> Enter Parking Details</div>
        <div class="card-body">
    <form method="POST">
	<p>SELECT PARKING SLOT:</p>
	  <?php
		$query="SELECT * FROM slot WHERE status='0'";
		$result=mysqli_query($connect,$query) or die(mysqli_error($connect));
		if($result->num_rows>0){
			while($row=$result->fetch_assoc()){

				?>
				<input type="text" name="pslot" value="<?php echo $row['snum']; ?>" style="width:100%;" required="required" class="form-control" autofocus="autofocus">
				<?php
				break;
			}
		}
		else{
			echo "NO SLOT AVAILABLE";
		}
		?>
    </select>
	<br>
	<?php
                  $vnum ='';
                  if(isset($_GET['vnum']))
                  {
                  $vnum = $_GET['vnum'];
                  }
                ?>
                <?php
                  $d ='';
                  if(isset($_GET['dor']))
                  {
                  $d = $_GET['dor'];
                  }
                ?>
	<p>VEHICLE NUMBER: </p>
	<input type="text" name="vnum" class="form-control" autofocus="autofocus" style="width:100%;" value= "<?php echo $vnum; ?>" required="required">
	<br>
	<?php
	date_default_timezone_set("Asia/Kolkata");
	?>
	<p>TIME: </p>
	<input type="text" name="intime" class="form-control" autofocus="autofocus" style="width:100%;" value="<?php echo date("h:i:sa");  ?>" required="required">
	<br>
	<p>DATE: </p>
	<input type="text" name="date" class="form-control" autofocus="autofocus" style="width:100%;" value="<?php echo $d; ?>">
	<br>
    <span>
	<center>
		<input type="submit" name="submit" value="SUBMIT" class="btn btn-primary">
		<br><br>
    <a href="vparking.php" class="d-block small">view parking</a>
    <br>
    </center>
    </span>
    </form>
</div>
</div>
</div>
</body>
</html>
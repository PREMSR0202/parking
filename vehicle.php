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

  $snum=$_POST['snum'];
  $result=$connect->query("SELECT snum from slot");
  while($row=mysqli_fetch_array($result)){
    $sdnum=$row['snum'];
    if($snum==$sdnum){
      echo "<script type='text/javascript'>alert('Vehicle Number is Already Registed!')</script>";
      echo "<script type='text/javascript'>window.location.href = 'slot.php'</script>";

    }
    else{
      $query = "INSERT INTO vehicle (vnum,contact,dor) VALUES ('$_POST[vnum]','$_POST[contact]','$date')";

          if($connect->query($query)===TRUE) {
          echo "<script type='text/javascript'>alert('Vehicle Registed Successfully!')</script>";
          echo "<script type='text/javascript'>window.location.href = 'vehicle.php'</script>";
            } 
        else {
            echo "Error: " . $query . "<br>" . $connect->error;
              }
    }

  }

}
?>
<!DOCTYPE html>
<html>
<head>
	<title>VEHICLE</title>
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
  <div class="container">
     <div class="card card-register mx-auto mt-5">
        <div class="card-header">Enter Vehicle Details</div>
        <div class="card-body">
    <form method="POST">
    <p>Enter Vehicle Number:</p>
    <input type="text" name="vnum" id="VehicleNo" class="form-control" placeholder="Vehicle No" required="required" autofocus="autofocus">
   <br>
   <input type="button" id="ReadBtn" class="btn btn-secondary" style="height:40px; width:100%; text-align:center;padding: 5px 32px;" value="Vehicle No">
   <br><br>
    <p>Enter Contact Number:</p>
    <input type="text" name="contact" placeholder="Contact Number" class="form-control" required="required"><br><br>
    <center>
       <input type="submit" class="btn btn-primary btn-block" name="submit" value="Submit"><br><br>
    <span><a href="vvhicle.php" class="d-block small">View Vehicle</a>
    <br>
    <a href="vslot.php" class="d-block small">View Slot</a></span>
  </center>
  </form>
</div>
</div>
</div>

  </div>
</div>


<script>
    const ReadBtn = document.getElementById('ReadBtn');


    ReadBtn.addEventListener('click', () => {
      navigator.clipboard.readText()
        .then(text => {
          document.getElementById('VehicleNo').value = text;
        })
        .catch(err => {
          console.log('Something Went Wrong', err);
        })
    });
    </script>
</body>
</html>
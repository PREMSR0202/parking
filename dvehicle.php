<?php
	require('connect.php');
	$vnum = $_GET['vnum'];
	$query = "DELETE FROM vehicle WHERE vnum = '$vnum'";
	if($connect->query($query)===TRUE) {
	echo "<script type='text/javascript'>alert('Vehicle Data Deleted Successfully!')</script>";
	echo "<script type='text/javascript'>window.location.href = 'vvhicle.php'</script>";
	}	
	else {
    echo "Error: " . $query . "<br>" . $connect->error;
	}
?>
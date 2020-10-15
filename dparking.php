<?php
	require('connect.php');
	$vnum = $_GET['vnum'];
	$query = "DELETE FROM parking WHERE vnum = '$vnum'";
	if($connect->query($query)===TRUE) {
	echo "<script type='text/javascript'>alert('Parked Vehicle Deleted Successfully!')</script>";
	echo "<script type='text/javascript'>window.location.href = 'vparking.php'</script>";
	}	
	else {
    echo "Error: " . $query . "<br>" . $connect->error;
	}
?>
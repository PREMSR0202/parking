<?php
	require('connect.php');
	$snum = $_GET['snum'];
	$query = "DELETE FROM slot WHERE snum = '$snum'";
	if($connect->query($query)===TRUE) {
	echo "<script type='text/javascript'>alert('Slot Deleted Successfully!')</script>";
	echo "<script type='text/javascript'>window.location.href = 'vslot.php'</script>";
	}	
	else {
    echo "Error: " . $query . "<br>" . $connect->error;
	}
?>
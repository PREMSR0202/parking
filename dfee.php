<?php
	require('connect.php');
	$pslot = $_GET['pslot'];
	$query = "DELETE FROM fee WHERE pslot = '$pslot'";
	if($connect->query($query)===TRUE) {
	echo "<script type='text/javascript'>alert('Fee Deleted Successfully!')</script>";
	echo "<script type='text/javascript'>window.location.href = 'vf.php'</script>";
	}	
	else {
    echo "Error: " . $query . "<br>" . $connect->error;
	}
?>
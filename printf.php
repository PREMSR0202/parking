<title>PRINT FEE</title>
<style type="text/css">
	table{
		position: absolute;
		top:20%;
		left:20%;
	}
	.content{
		position: absolute;
		top:45%;
		left:35%;
		text-align: center;
	}
	h4{
		position: absolute;
		top:10%;
		left:35%;
	}
</style>
<table cellpadding="10px" border="1px">
	<h4>RECEIPT</h4>
<?php
	require('connect.php');
	$pslot=$_GET['pslot'];
	$amt=$_GET['amt'];
	$query="SELECT vnum,intime,outtime FROM parking where pslot='$pslot'";
	$result = $connect->query($query);
	?>
	<th>VEHICLE NUMBER</th>
	<th>SLOT-ID</th>
	<th>IN-TIME</th>
	<th>OUT-TIME</th>
	<th>AMOUNT</th>
<?php	
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
    	?>
    	<tr>
    		<td><?php echo $row["vnum"]; ?></td>
    		<td><?php echo $pslot; ?></td>
    		<td><?php echo $row["intime"]; ?></td>
    		<td><?php echo $row["outtime"]; ?></td>
    		<td><?php echo $amt; ?></td>
    	</tr>
        <?php
    }
} else {
    echo "0 results";
}
?>
</table>
<div class="content">
	<input type="button" name="" onclick="MyFunction()" value="PRINT"><br><br>
<a href="vf.php">RETURN TO FEE</a>
</div>
<script type="text/javascript">
		function MyFunction()
		{
			window.print();
		}
</script>
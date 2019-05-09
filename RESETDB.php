<?php
	include('SESSION.php');
	include('CONN.php');
	
	if(!$conn){
		die("Connection failed: ".mysqli_connect_error());
	}
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		
		$sql2="UPDATE CANDIDATE SET VOTE_COUNT=0";
		
		if(mysqli_query($conn,$sql2)) {

			$sql3 = "UPDATE LOGIN SET VOTE=1";
			if(mysqli_query($conn,$sql3)) {
				echo "<script>alert('Database Successfully Reset');</script>";
			}
		}
		
	}
	
?>

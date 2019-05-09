<?php
	include('SESSION.php');
	include('CONN.php');
	
	if(!$conn){
		die("Connection failed: ".mysqli_connect_error());
	}
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		
		$sql2="UPDATE CANDIDATE SET VOTE_COUNT=VOTE_COUNT+1 WHERE UID='".$_POST['selector']."'";
		
		if(mysqli_query($conn,$sql2)) {

			$sql3 = "UPDATE LOGIN SET VOTE=0 WHERE UID = '".$_SESSION['uid']."'";
			if(mysqli_query($conn,$sql3)) {
				echo "<script>alert('successfully Added');</script>";
				$_SESSION['VOTED']=0;
				header("Location: VOTE.php");
			}
		}
		
	}
	
?>

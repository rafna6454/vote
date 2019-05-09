<?php
	$db_host='localhost';
	$db_user='root';
	$db_passwd='root';
	$db_name='voteDB';
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$cid = test_input($_POST["cid"]);
		$cname = test_input($_POST["cname"]);
		$csec = test_input($_POST["csec"]);
		$cgen = test_input($_POST["cgen"]);
		$conn=mysqli_connect($db_host,$db_user,$db_passwd,$db_name);
		
		if(!$conn) {
			die("Connection failed: ".mysqli_connect_error());
		}
		echo "Connection Successful";
		$sql="INSERT INTO CANDIDATE(UID,CNAME,CSEC,GENDER) VALUES('".$cid."','".$cname."','".$csec."','".$cgen."')";
		if(mysqli_query($conn,$sql)) {
			echo "<br/><script>alert('ADDED SUCCESSFULLY');</script>";
		}
		else {
			echo 'FAILED TO ADD CANDIDATE'.mysqli_error($conn);
		}
	}
	
	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	
	mysqli_close($conn);
?>

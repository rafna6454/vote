<?php
	session_start();
	include('CONN.php');
	
	if(!$conn) {
		die("Connection failed: ".mysqli_connect_error());
	}
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$sql="SELECT * FROM LOGIN WHERE UID='".$_POST['uid']."'";
		if($res=mysqli_query($conn,$sql)) {
			if(mysqli_num_rows($res)>0) {
				while($row=mysqli_fetch_array($res)) {
					if($row['PWD']==$_POST['pwd']) {
						if($row['PROFILE']==0) {
							$_SESSION["uid"]=$_POST['uid'];
							$_SESSION["VOTED"]=$row["VOTE"];
							$_SESSION["check"]=1;
							header("Location: VOTE.php");
						}
						if($row['PROFILE']==1){
							
							$_SESSION["uid"]=$_POST['uid'];
							$_SESSION["check"]=1;
							header("Location: ADMIN.php");
						}
					}
				}
				mysqli_free_result($res);
			}
			else {
				echo "<br/><script>alert('NO SUCH UID');</script>";
			}
		}
		else {
			echo "<br/>Error Using Database: ".mysqli_error($conn);
		}
	}
	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
?>

<?php
	session_start();
	if($_SESSION["check"]==0) {
		header("location:LOGIN.html");
	}
	$db_host='localhost';
	$db_user='root';
	$db_passwd='root';
	$db_name='voteDB';
	$conn=mysqli_connect($db_host,$db_user,$db_passwd,$db_name);

	if(!$conn) {
		die("Connection failed: ".mysqli_connect_error());
	}
?>

<html>
<head>
	<meta charset="utf-8">
	<title>Vote Here</title>
	<link rel="stylesheet" href="assets/AVStyle.css">
	
</head>

<body>
	<div class="alert">
		<h1 id='adhead'>ADMIN PANEL<a id='lgbtn' href='LOGOUT.php'> LOGOUT </a><a id='lgbtn' href='RESULTS.php'> RESULTS </a></h1>
	</div>
	
	</br>
	</br>
	
	<center>

	<div class="container2">
	
		<form action="ADDCAN.php" method="POST">
			
			<h2>ADD A CANDIDATE</h2></br></br>
		
			<input type="text" name="cid" value="" placeholder="UID - 2016CSE000" id="cid" /></br></br>
			
			<input type="text" name="cname" value="" placeholder="NAME - John Doe" id="cname" /></br></br>
			
			<input type="text" name="csec" value="" placeholder="SECTION - 6CSE1" id="csec" /></br></br>
			
			<input type="text" name="cgen" value="" placeholder="GENDER : M / F" id="cgen" /></br></br>
			
			<button type="submit">
				<span class="state">ADD CANDIDATE</span>
			</button>
			
		</form>
		
	</br>
	</br>
	
	</div>
	
	<hr>
	<div class="container2">
	
		<form action="RESETDB.php" method="POST">
			
			<h2>RESET DATABASE FOR VOTERS AND CANDIDATES</h2></br></br>
		
			<button type="submit">
				<span class="state">RESET</span>
			</button>
			
		</form>
		
	</br>
	</br>
	
	</div>
	</center>
	

</body>

</html>

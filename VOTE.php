<?php
	include('CONN.php');
	include('SESSION.php');
	if($_SESSION["check"]==0) {
		header("location:LOGIN.html");
	}
	if(!$conn){
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
	<p><?php echo $_SESSION['uid']; ?> : To vote is your Right<a id='lgbtn' href='LOGOUT.php'> LOGOUT </a><a id='lgbtn' href='RESULTS.php'> RESULTS </a></p>
	
	</div>

	<form action="ADDVC.php" method="POST">
	
	<div class="container">	
	
	<h2>Choose your candidate :</h2>
	  
		<ul>
		  
			<?php
		  		$sql2="SELECT * FROM CANDIDATE";
		  		if($_SESSION["VOTED"]==1) {
					if($res2=mysqli_query($conn,$sql2)){
						while($row2=mysqli_fetch_array($res2)){
							echo "<li>";
							echo '<input type="radio" id="'.$row2['UID'].'" name="selector" value='.$row2['UID'].'>';
							echo '<label for="'.$row2['UID'].'">'.$row2['CNAME'].'</label>';
							echo '<div class="check"></div>';
							echo "</li>";
						}
						echo "<p>&nbsp</p>";
						echo "<center>";
						echo '<input type="submit" name="sub" id="sub" value="submit" />';
						echo "</center>";
					}
				} else {
					echo "<h1 id='ty'>THANK YOU FOR VOTING</h1>";
				}
			?>
		</ul>
	
	
	</div>
	
	
	
	</form>
	
</body>

</html>

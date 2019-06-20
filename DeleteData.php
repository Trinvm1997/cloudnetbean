<html>
<link rel="stylesheet" href=/w3.css">
<link rel="stylesheet" href="/font-awesome.min.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<head>
		<title>ATN company - DELETING</title>
	</head>
	
	<div class="w3-top">
		<div class="w3-bar w3-green w3-opacity w3-padding w3-card" style="letter-spacing:4px;">
			<a href="index.php" class="w3-bar-item w3-button">ATN company</a>
			<!-- Right-sided navbar links. Hide them on small screens -->
			<div class="w3-right w3-hide-small">
					<a href="ConnectToDB.php" class="w3-bar-item w3-button">VIEW</a>
					<a href="InsertData.php" class="w3-bar-item w3-button">INSERT</a>
					<a href="UpdateData.php" class="w3-bar-item w3-button">UPDATE</a>
					<a href="DeleteData.php" class="w3-bar-item w3-button">DELETE</a>
			</div>
		</div>
	</div>

	<body>
		<h1>INSERT DATA TO DATABASE</h1>

			<?php
			ini_set('display_errors', 1);

			?>

			<?php
			if (empty(getenv("DATABASE_URL"))){
		    	echo '<p>The DB does not exist</p>';
		    	$pdo = new PDO('pgsql:host=localhost;port=5432;dbname=mydb', 'postgres', '123456');
			} else {
		     	$db = parse_url(getenv("DATABASE_URL"));
		   		$pdo = new PDO("pgsql:" . sprintf(
		        "host=ec2-23-21-129-125.compute-1.amazonaws.com;port=5432;user=lrqgdgzdowigqc;password=8652e83044024491ba444c1d161044f803b99c9101bd7d129e8a6a6db78b5bea;dbname=deh478l9lii3uq",
		        $db["host"],
		        $db["port"],
		        $db["user"],
		        $db["pass"],
		        ltrim($db["path"], "/")
		   		));
			}  

			$sql = "DELETE FROM revenue WHERE shopid = 1";
			$stmt = $pdo->prepare($sql);
			if($stmt->execute() == TRUE){
		    	echo "Record deleted successfully.";
			} else {
		    	echo "Error deleting record: ";
			}

			?>
	</body>

	<footer class="w3-container w3-padding w3-center w3-opacity w3-green w3-bottom w3-xlarge">
  		<i class="fa fa-facebook-official w3-hover-opacity"></i>
  		<i class="fa fa-instagram w3-hover-opacity"></i>
  		<i class="fa fa-snapchat w3-hover-opacity"></i>
  		<i class="fa fa-pinterest-p w3-hover-opacity"></i>
  		<i class="fa fa-twitter w3-hover-opacity"></i>
  		<i class="fa fa-linkedin w3-hover-opacity"></i>
  		<p class="w3-medium">Designed by <a href="https://www.facebook.com/profile.php?id=100005135791217" target="_blank">Nguyen Van Minh Tri</a></p>
	</footer>
</html>

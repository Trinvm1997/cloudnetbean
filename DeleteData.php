<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<head>
		<title>ATN - Inserting</title>
	</head>

	<body>
		<div class="w3-container">
			<div class="w3-bar w3-black w3-card">
				<a href="index.php" class="w3-bar-item w3-button w3-padding-large">HOME</a>
				<a href="ConnectToDB.php" class="w3-bar-item w3-button w3-padding-large w3-right">VIEW</a>
    			<a href="InsertData.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small w3-right">INSERT</a>
    			<a href="UpdateData.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small w3-right">UPDATE</a>
    			<a href="DeleteData.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small w3-right">DELETE</a>
			</div>
		</div>
		
		<div class="w3-container">
			<h1>INSERT DATA TO DATABASE</h1>
			<?php
			ini_set('display_errors', 1);
			echo "Insert database!";
			?>

			<?php
			if (empty(getenv("DATABASE_URL"))){
				echo '<p>The DB does not exist</p>';
				$pdo = new PDO('pgsql:host=localhost;port=5432;dbname=mydb', 'postgres', '123456');
			}
			else{
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

			$sql = "DELETE FROM asm2 WHERE shopid = 'shop01'";
			$stmt = $pdo->prepare($sql);
			if($stmt->execute() == TRUE){
				echo "Record deleted successfully.";
			} else {
				echo "Error deleting record: ";
			}

			?>
		</div>
	</body>
</html>

<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<head>
		<title>ATN - Viewing</title>
	</head>

	<body>
		<div class="w3-container">
			<div class="w3-bar w3-black w3-card">
				<a href="index.php" class="w3-bar-item w3-button w3-padding-large w3-hover-text-blue">HOME</a>
				<a href="ConnectToDB.php" class="w3-bar-item w3-button w3-padding-large w3-right w3-hover-text-blue">VIEW</a>
    			<a href="InsertData.php" class="w3-bar-item w3-button w3-padding-large w3-right w3-hover-text-blue">INSERT</a>
    			<a href="UpdateData.php" class="w3-bar-item w3-button w3-padding-large w3-right w3-hover-text-blue">UPDATE</a>
    			<a href="DeleteData.php" class="w3-bar-item w3-button w3-padding-large w3-right w3-hover-text-blue">DELETE</a>
			</div>
		</div>

		<div class="w3-container">
			<h1>DATABASE CONNECTION</h1>
		</div>

		<?php
		if (empty(getenv("DATABASE_URL"))){
			echo '<p>database not found</p>';
			$pdo = new PDO('pgsql:host=localhost;port=5432;dbname=mydb', 'postgres', '123456');
		}  
		else{
			echo '<p>database found</p>';
			echo getenv("dbname");
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

		$sql = "SELECT * FROM asm2 ORDER BY shopid";
		$stmt = $pdo->prepare($sql);
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		$stmt->execute();
		$resultSet = $stmt->fetchAll();
		echo '<p>Shop Revenue Report:</p>';
		?>

		<div class="w3-responsive w3-container">
			<table class="w3-table w3-striped w3-bordered w3-border w3-hoverable" border="1">
				<thead>
				<tr>
				<th>Shop ID</th>
				<th>Accountant</th>
				<th>Revenue</th>
				<th>Last Time Check</th>
				</tr>
				</thead>
				<tbody>

				<?php
				foreach ($resultSet as $row) {
				?>

				<tr>
				<td scope="row"><?php echo $row['shopid'] ?></td>
				<td><?php echo $row['accountant'] ?></td>
				<td><?php echo $row['revenue'] ?></td>
				<td><?php echo $row['timecheck'] ?></td>
				</tr>

				<?php
				}
				?>

				</tbody>
			</table>
		</div>

		<footer class="w3-container w3-padding w3-center w3-black w3-xlarge">
			<i class="fa fa-facebook-official w3-hover-opacity"></i>
			<i class="fa fa-instagram w3-hover-opacity"></i>
			<i class="fa fa-snapchat w3-hover-opacity"></i>
			<i class="fa fa-pinterest-p w3-hover-opacity"></i>
			<i class="fa fa-twitter w3-hover-opacity"></i>
			<i class="fa fa-linkedin w3-hover-opacity"></i>
			<p class="w3-medium w3-text-white">Designed by <a href="https://www.facebook.com/profile.php?id=100005135791217" target="_blank">Nguyen Van Minh Tri</a></p>
		</footer>
	</body>
</html>

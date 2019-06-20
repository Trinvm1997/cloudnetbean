<html>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<head>
		<title>ATN company - DATABASE</title>
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
		<h1>DATABASE CONNECTION</h1>

		<?php
		ini_set('display_errors', 1);
		?>

		<?php
		if (empty(getenv("DATABASE_URL"))){
    		$pdo = new PDO('pgsql:host=localhost;port=5432;dbname=mydb', 'postgres', '123456');
		} else {
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

		$sql = "SELECT * FROM revenue";
		$stmt = $pdo->prepare($sql);
		//Thiết lập kiểu dữ liệu trả về
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		$stmt->execute();
		$resultSet = $stmt->fetchAll();

		echo "revenue information:<br/>";
		echo "<table>";
		echo "<tr>";
		echo "<th>";
		echo "<b>shop ID<b>";
        echo "</th>";
        echo "<th>";
        echo "<b>revenue<b>";
        echo "</th>";
        echo "<th>";
        echo "<b>toy sold<b>";
        echo "</th>";
        echo "<th>";
        echo "<b>toy left<b>";
        echo "</th>";
        echo "<th>";
        echo "<b>last time check<b>";
        echo "</th>";
        echo "</tr>";
		foreach ($resultSet as $row) {
			echo "<tr>";
			echo "<td>";
			echo $row['shopid'];
	        echo "</td>";
	        echo "<td>";
	        echo $row['revenue'];
	        echo "</td>";
	        echo "<td>";
	        echo $row['toysold'];
	        echo "</td>";
	        echo "<td>";
	        echo $row['toyleft'];
	        echo "</td>";
	        echo "<td>";
	        echo $row['timecheck'];
	        echo "</td>";
	        echo "</tr>";
		}
		echo "</table>";
		?>
	</body>

	<footer class="w3-container w3-padding-64 w3-center w3-opacity w3-light-grey w3-xlarge">
  		<i class="fa fa-facebook-official w3-hover-opacity"></i>
  		<i class="fa fa-instagram w3-hover-opacity"></i>
  		<i class="fa fa-snapchat w3-hover-opacity"></i>
  		<i class="fa fa-pinterest-p w3-hover-opacity"></i>
  		<i class="fa fa-twitter w3-hover-opacity"></i>
  		<i class="fa fa-linkedin w3-hover-opacity"></i>
  		<p class="w3-medium">Designed by <a href="https://www.facebook.com/profile.php?id=100005135791217" target="_blank">Nguyen Van Minh Tri</a></p>
	</footer>
</html>

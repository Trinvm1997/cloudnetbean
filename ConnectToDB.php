<!DOCTYPE html>
<html>
<body>

    

<h1>DATABASE CONNECTION</h1>

<?php
ini_set('display_errors', 1);
echo "Hello Cloud computing class 0818!";
?>

<?php


if (empty(getenv("DATABASE_URL"))){
    echo '<p>The DB does not exist</p>';
    $pdo = new PDO('pgsql:host=localhost;port=5432;dbname=mydb', 'postgres', '123456');
}  else {
     echo '<p>The DB exists</p>';
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

$sql = "SELECT * FROM revenue ORDER BY shopid";
$stmt = $pdo->prepare($sql);
//Thiết lập kiểu dữ liệu trả về
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$stmt->execute();
$resultSet = $stmt->fetchAll();

echo '<p>Revenue information:</p>';
echo "<table>";

while($row = PDOStatement::fetch($resultSet)){   //Creates a loop to loop through results
echo "<tr><td>" . $row['shopid'] . "</td><td>" . $row['revenue'] . "</td><td>" . $row['toysold'] . "</td><td>" . $row['toyleft'] . "</td><td>" . $row['timecheck'] . "</td></tr>";  //$row['index'] the index here is a field name
}

echo "</table>"; //Close the table in HTML

mysql_close(); //Make sure to close out the database connection

/*foreach ($resultSet as $row) {
	echo $row['shopid'];
        echo "    ";
        echo $row['revenue'];
        echo "    ";
        echo $row['toysold'];
        echo "    ";
        echo $row['toyleft'];
        echo "    ";
        echo $row['timecheck'];
        echo "<br/>";
}
*/

?>

</body>
</html>

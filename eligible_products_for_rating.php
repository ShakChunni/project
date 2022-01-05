<style>
.myTable { 
  width: 100%;
  text-align: left;
  background-color: lemonchiffon;
  border-collapse: collapse; 
  }
.myTable th { 
  background-color: goldenrod;
  color: white; 
  }
.myTable td, 
.myTable th { 
  padding: 10px;
  border: 1px solid goldenrod; 
  }
</style>


<?php
$_SESSION["user_id"] = '1';

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";


//queries diye db theke fetch korteso
$sql = "SELECT *  FROM `orders`,`order_productsandaddons`, `product`
WHERE `orders`.`order_id`=`order_productsandaddons`.`order_id` 
AND `order_productsandaddons`.`product_id` = `product`.`product_id` 
AND `orders`.`status` = 'completed'
AND  `orders`.customer_id = '".$_SESSION["user_id"]."'
ORDER BY `orders`.`order_id`";
$result = $conn->query($sql);

$key = 0;
echo "<table class='myTable'>";

echo "<th>ID </th>";
echo "<th>Product Name: </th>";
echo "<th>Orderd On: </th>";
echo "<th>Current Rating: </th>";
echo "<th>Update Rating: </th>";


//pushing values into array
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $x = $row["order_id"];
    echo "<tr><td>" .$row["order_id"] ."</td><td>". $row["name"]."</td><td>".$row["date"]."<br>".$row["time"] ."</td><td>"."<br>" ."<br>". $row['given_rating']."</td><td>". "<li><a href='give_rating.php'>Update Rating</a></li>" ."</td></tr>";
  }
} 
else {
  echo "0 results";
}

echo "</table>";


?>

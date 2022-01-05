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
session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();

$sql = "SELECT *  FROM `orders`,`order_productsandaddons`, `product`
WHERE `orders`.`order_id`=`order_productsandaddons`.`order_id` 
AND `order_productsandaddons`.`product_id` = `product`.`product_id` 
AND `orders`.`status` = 'completed'
AND `orders`.customer_id = '".$_SESSION["user-id"]."' ";
$result = $db_handle->selectQuery($sql);



  if (!empty($result)) {
    echo "<table class='myTable'>";
    echo "<th>ID</th>";
    echo "<th>Orders</th>";
    echo "<th>Orderd On</th>";
    echo "<th>Given Rating</th>";
    foreach($result as $key=>$row){
        echo "<tr><td>".$row['order_id']."</td><td>" . $row["name"] ."</td><td>" .  $row["date"]." <br>Time: ". $row["time"]. "</td><td>". $row["given_rating"]. "</td></tr>" ;
      }

      echo "</table>";
  } 
    else {
      echo "No previous order FOUND!";
  } 

?>


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



//queries diye db theke fetch korteso
$sql = "SELECT *  FROM `orders`,`order_productsandaddons`, `product`
WHERE `orders`.`order_id`=`order_productsandaddons`.`order_id` 
AND `order_productsandaddons`.`product_id` = `product`.`product_id` 
AND `orders`.`status` != 'completed'
AND  `orders`.customer_id = '".$_SESSION["user-id"]."'
ORDER BY `orders`.`order_id`";
$result = $db_handle->selectQuery($sql);



//pushing values into array
if (!empty($result)) {
echo "<table class='myTable'>";
echo "<th>Queue No: </th>";
echo "<th>Product Name: </th>";
echo "<th>Orderd On: </th>";

  // output data of each row
  foreach($result as $key=>$row) {
    echo "<tr><td>" . $key+1 . "</td><td>" .$row["name"] ."</td><td>" .$row["date"]."<br>".$row["time"] ."</td></tr>";
  }
echo "</table>";
} 
else {
  echo "No Ongoing Orders!";
}
?>

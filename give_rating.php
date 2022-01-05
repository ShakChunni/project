<div>
    <div>
        <h1></h1>
        <form action="" method="post">
            <table>
                <tr>
                    <td>Order ID:</td>
                    <td><input type="number" id="order_id" name="order_id" placeholder="Enter your order ID"></td>
                </tr>               
                <tr>
                    <td>Give Rating:</td>
                    <td><input type="number" id="rating" name="rating" min="1" max="5"></td>
                </tr>
                <tr>
                   <td colspan="2">
                       <input type="submit" name="submit" value="Submit Rating">
                   </td> 
                </tr>
            </table>
        </form>
    </div>
</div>

<?php
    
if(isset($_POST['submit'])){
    //button clicked
    //echo "button clicked";

    //form te data nisi
    $order_id = $_POST['order_id'];
    $given_rating = $_POST['rating'];
    //sql query to save data in db
    $sql = "UPDATE `orders`     
    SET `given_rating` = '$given_rating' 
    WHERE `order_id` = '$order_id'
    AND `status` = 'completed'
    AND `customer_id` = ' ".$_SESSION["user-id"]." '
";

    //DB te dhukayy

    // Create connection

    $result = $db_handle->insertQuery($sql);    
}
?>
<?php
require("mysqli_connect.php");
session_start();
if(!isset($_GET["bookid"])){
    if(!$_SESSION["bookid"]){
        echo "<br>Book id is not set!!!!<br>";
       
    }
    else{
         echo "<br>Book id is: " .$_SESSION['bookid'] . "<br>";
    }
}
else{
    
    $_SESSION["bookid"] =  $_GET["bookid"];
   
    //echo "<br>bookid is set<br>";
    
}

if(isset($_POST["submit"])){

//echo $order_id;
function order_check(){

    $sID = intval($_SESSION["bookid"]);

    if(empty($_POST["Fname"]) || empty($_POST["Lname"]) || empty($_POST["Email"]) || empty($_POST["Cnum"])) {
        echo "Please fill required fields!!";
    }
    else{
        echo "updated";
        // Get Item details
        //echo $sID;
        $collectOrder = "SELECT * FROM bookinventory WHERE BookId = {$sID}";
        $getItem = @mysqli_query($dbc, $collectOrder);
        $itemsGot = @mysqli_fetch_array($getItem);
    
        $i_id = $itemsGot["BookId"];
        $i_name = $itemsGot["BookName"];
        $i_aname = $itemsGot["AuthorName"];
        $i_isbn = $itemsGot["ISBN"];
        $i_dFormat = $itemsGot["DelieryFormat"];

        echo $itemsGot["i_id"];
        echo $itemsGot["i_name"];
        // Insert into Order Table
        $orderQuery = "INSERT INTO bookinventoryorder (BookName, AuthorName, ISBN, DeliveryFormat) 
        VALUES ({$i_name}, {$i_aname}, {$i_isbn}, {$i_dFormat})";

        $order_item = @mysqli_query($dbc,$orderQuery);
        $orderedItem = @mysqli_fetch_array($order_item);
//
        echo "<br><b>ordered " . $i_name . "!!";
        // Update Quantiy of perticular item in inventory table
        $updateQuery = "UPDATE bookinventory SET Quantity = Quantity - 1 WHERE BookId= {$sID}";
        $update_table = @mysqli_query($dbc, $updateQuery);

        // session_destroy();

    }
    // function getItems(){
        
    // }

    // function addItems(){
        
    // }

    // function updateItem(){
        
    // }
}


}





?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
</head>
<body>
    <form action= "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <input type="text" name="Fname" id="" placeholder="First Name"> <br><br>
        <input type="text" name="Lname" id="" placeholder="Last Name"> <br><br>
        <input type="email" name="Email" id="" placeholder="Email"> <br><br>
        <input type="number" name="Cnum" id="" placeholder="Card number"> <br><br>
        <input type="submit" value="Purchase" name="submit">
    </form>

<?php
    if(isset($_POST["submit"])){
        order_check();
    }
?>
    
</body>
</html>
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
    // if(isset($_POST["submit"])){
    //     order_check();
    // }
?>
    
</body>
</html>

<?php
require("mysqli_connect.php");
session_start();
if(!isset($_GET["bid"])){
    if(!$_SESSION["bid"]){
        echo "<br>Book id is not set!!!!<br>";
       
    }
    // else{
    //      echo "<br>Book id is: " .$_SESSION['bid'] . "<br>";
    // }
}
else{
    $_SESSION["bid"] =  $_GET["bid"];
    //echo "<br>bookid is set<br>";
}

$sID = intval($_SESSION['bid']);
//echo $order_id;

    //$sID = intval($_SESSION['bid']);
// validating fields!!
    if(empty($_POST["Fname"]) || empty($_POST["Lname"]) || empty($_POST["Email"]) || empty($_POST["Cnum"])) {
        echo "Please fill required fields!!";
    }
    else{
        //echo "updated";
    // Get Item details----------------------------------------------------
        //echo $sID;
        $collectOrder = "SELECT * FROM bookinventory WHERE bookid = {$sID}";
        $getItem = @mysqli_query($dbc, $collectOrder);
        $itemsGot = @mysqli_fetch_array($getItem);
       // print_r($itemsGot);
    
        $i_id = $itemsGot["bookid"];
        $i_name = $itemsGot["bookname"];
        $i_aname = $itemsGot["authorname"];
        $i_isbn = $itemsGot["isbn"];
        $i_dFormat = $itemsGot["deliveryformat"];

        // echo $i_id;
        // echo $i_name;
    // Insert into Order Table---------------------------------------------
            $orderQuery = "INSERT INTO bookinventoryorder (bookname, authorname, isbn, deliveryformat) 
            VALUES ('{$i_name}', '{$i_aname}', '{$i_isbn}', '{$i_dFormat}')";

        $order_item = @mysqli_query($dbc,$orderQuery);
        $orderedItem = @mysqli_fetch_array($order_item);

        echo "<br><b>ordered " . $i_name . "!!";
    // Update Quantiy of perticular item in inventory table-----------------
        $updateQuery = "UPDATE bookinventory SET quantity = quantity - 1 WHERE bookid= {$sID}";
        $update_table = @mysqli_query($dbc, $updateQuery);

        unset ($_SESSION['bid']);
        session_destroy();

    }
   
?>
<?php
// Start the session
session_start();
require("mysqli_connect.php");
?>
<!DOCTYPE html>
<html>
<body>

<?php
// $collectOrder = "SELECT * FROM bookinventory WHERE BookId = 1";
    
// $getItem = @mysqli_query($dbc, $collectOrder);
// $itemsGot = @mysqli_fetch_array($getItem);
// echo $itemsGot["BookId"];
// echo $itemsGot["BookName"]
$_SESSION["bid"] =  $_GET["bid"];
$sID = intval($_SESSION['bid']);
$collectOrder = "SELECT * FROM bookinventory WHERE BookId = 1";
        $getItem = @mysqli_query($dbc, $collectOrder);
        $itemsGot = @mysqli_fetch_array($getItem);
        print_r($itemsGot);
        echo $itemsGot["bookname"]
?>

</body>
</html>

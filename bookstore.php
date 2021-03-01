<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookStore</title>
</head>
<body>
<?php 


require("mysqli_connect.php");
session_start();

//echo "hi";
$query = "SELECT * FROM bookinventory";
$result = @mysqli_query($dbc, $query);


while ($row = mysqli_fetch_array($result)){

    echo "<p><a href='checkout.php?bid={$row['bookid']}'> {$row['bookid']} | {$row['bookname']} | 
    {$row['authorname']} | {$row['isbn']} | 
    {$row['deliveryformat']} | {$row['quantity']} ";
    //| <p><img src='/uploads/{$row['Img']}'></img>
} 
?>
</body>
</html>
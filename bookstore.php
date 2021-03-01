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
//

require("mysqli_connect.php");
session_start();

$query = "SELECT * FROM bookinventory";
$result = @mysqli_query($dbc, $query);


while ($row = mysqli_fetch_array($result)){

    echo "<p><a href='checkout.php?bookid={$row['BookId']}'> {$row['BookId']} | {$row['BookName']} | 
    {$row['AuthorName']} | {$row['ISBN']} | 
    {$row['DeliveryFormat']} | {$row['Quantity']} | <p><img src='/uploads/{$row['Img']}'></img>";
} 

// function getid(){
//     $_SESSION["id"] = $this->BookId;
// }
?>
</body>
</html>
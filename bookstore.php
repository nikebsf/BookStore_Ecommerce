<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title>BookStore</title>
</head>
<body>

<h1 class="text-center">BookStore</h1>
<h4 class="text-center">Buy your favourite book available in the store!</h4>
<?php 


require("mysqli_connect.php");
session_start();

//echo "hi";
$query = "SELECT * FROM bookinventory";
$result = @mysqli_query($dbc, $query);


while ($row = mysqli_fetch_array($result)){

    echo "<div id='main-content' class='card-deck text-center d-inline-flex p-2'  style='margin: 5px 0 0 0'>

    <div class='card bg-light text-dark mb-4 w-25 p-3' style='max-height: auto; max-width: 200px'>
    <a href='checkout.php?bid={$row['bookid']}'>
    <span style='color:red'>{$row['bookid']}</span> <br>
    <span style='font-size:2em; line-height:2'>{$row['bookname']}</span> <br>
    <span>Author: {$row['authorname']}</span> <br>
    <span>ISBN: {$row['isbn']}</span> <br>
    <span>Format: {$row['deliveryformat']}</span> <br>
    <span>In Stock: {$row['quantity']}</span>'</a>
    </div>
    </div>";


    // echo "<div><a href='checkout.php?bid={$row['bookid']}'> {$row['bookid']} | {$row['bookname']} | 
    // {$row['authorname']} | {$row['isbn']} | 
    // {$row['deliveryformat']} | {$row['quantity']} ";
    //| <p><img src='/uploads/{$row['Img']}'></img>
} 
?>
</body>
</html>
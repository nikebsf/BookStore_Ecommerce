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
    <title>Checkout</title>
</head>
<body>
    <form role="form" action= "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" style="margin:auto;width:50%;margin-top:20px">
        <div class="form-group row">
            <label for="inputEmail" class="col-sm-2 col-form-label">FirstName</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="" name="Fname" placeholder="First name">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputEmail" class="col-sm-2 col-form-label">LastName</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="" name="Lname" placeholder="Last name">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="" name="Email" placeholder="Email">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputEmail" class="col-sm-2 col-form-label">Card Number</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="" name="Cnum" placeholder="card number" maxlength="12">
            </div>
        </div>
        <div class="form-group row">
        <div class="offset-sm-2 col-sm-10 text-center">
          <input type="submit" value="Purchase" name="submit" class="btn btn-primary"/>
        </div>
      </div>
        <!-- <input type="text" name="Fname" id="" placeholder="First Name"> <br><br>
        <input type="text" name="Lname" id="" placeholder="Last Name"> <br><br>
        <input type="email" name="Email" id="" placeholder="Email"> <br><br>
        <input type="number" name="Cnum" id="" placeholder="Card number"> <br><br> -->
        <!-- <input type="submit" value="Purchase" name="submit"> -->
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
        echo "<span style='color:red; font-size:2em'>Please fill required fields!!</span>";
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

        echo "  <br><b><span style='color:red;font-size:2em'>". $i_name ." Book Ordered !!</span>";
    // Update Quantiy of perticular item in inventory table-----------------
        $updateQuery = "UPDATE bookinventory SET quantity = quantity - 1 WHERE bookid= {$sID}";
        $update_table = @mysqli_query($dbc, $updateQuery);

        unset ($_SESSION['bid']);
        session_destroy();

    }
   
?>
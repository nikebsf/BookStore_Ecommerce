<?php
require("mysqli_connect.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){
    //

    if(isset($_FILES['upload'])){
        print_r($_FILES);

        $Img = $_FILES['upload']['name'];
        $Img2 = $_FILES['upload']['tmp_name'];

        if(!file_exists("uploads")){
            mkdir("uploads");
        }

        if(move_uploaded_file($_FILES['upload']['tmp_name'],"uploads/$Img")){
            $qry = "update bookinventory set Img = '{$Img}' where BookId = 5";;
            //$qry = "insert into users values(null,'$username','$profile','$Img')";
            mysqli_query($dbc, $qry);
        }
        else
        echo "error";

    }

    else
        echo "Please fill all fields!";
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="uploadImage.php" method="post" enctype="multipart/form-data">
    <input type="file" name="upload" id="">
    <input type="submit" value="upload">
    </form>
</body>
</html>
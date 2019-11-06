<?php 
    ini_set('mysql.connect_timeout',300);
    ini_set('default_socket_timeout',300);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Blog</title>
</head>
<body>
    <?php require "blocks/header.php" ?>
    <div class="container my-5 d-flex align-items-center flex-column">  
        <form name="feedback" method="post" class="w-100" enctype="multipart/form-data">
            <input type="file" name="image" >
            <input type="submit" name="submit" value="Upload">Upload</input>
        </form>
        <?php
            if (isset($_POST['submit'])) {
                if (getimagesize($_FILES['image']['tmp_name']) == FALSE) {
                    echo "Please select an image";
                }else {
                    $image = addslashes($_FILES['image']['tmp_name']);
                    $name = addslashes($_FILES['image']['name']);
                    $image = file_get_contents($image);
                    $image = base64_encode($image);
                    saveImage($name, $image);
                }
            }

            displayImage();

            function saveImage($name, $image) {
                $con = mysql_connect("localhost", "root", "");
                mysql_select_db("mystore", $con);
                //$mysql = new mysqli("localhost", "root", "", "mystore");
                $qry = "insert into images (name, image) VALUES ('$name', '$image')";
                $result = mysql_query($qry, $con);
                if ($result) {
                    //echo "<br/>Image uploaded";
                } else {
                    echo "<br/>Image not uploaded";
                }
            }

            // function displayImage() {
            //     $con = mysql_connect("localhost", "root", "");
            //     mysql_select_db("mystore", $con);
            //     $qry = "select * from images";
            //     $result = mysql_query($qry, $con);
            //     while ($row = mysql_fetch_array($result)) {
            //         echo '<img height="300" width="300" src="data:image;base64,'.$row[2].' ">';
            //     }
            // }
        ?>
    </div>
    <?php require "blocks/footer.php" ?>
</body>
</html>
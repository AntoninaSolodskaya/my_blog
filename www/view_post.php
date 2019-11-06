<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Blog</title>
</head>

<body>
    <?php require "blocks/header.php" ?>
    <div class="container mt-5">

        <h1>post</h1>
        <?php
        $db = mysql_connect("localhost", "root", "");
        mysql_select_db("mystore", $db);



        if (isset($_GET['id'])) // Check id has been passed in URL
            $id = mysql_real_escape_string($_GET['id']); // Prevent injection
        $order = mysql_query("SELECT * FROM posts WHERE id='$id' LIMIT 1");
        $result = mysql_fetch_array($order);
        $title = $result['title'];
        $content = $result['content'];
        $date = $result['date'];
        $image = $result['image'];
        
        ?>
        <div class="container mt-5">
        <h1>Name: <?php echo $title; ?></h1>
        <p>Content: <?php echo $content; ?></p>
        <span>Date: <?php echo $date; ?></span>
        <img style='width: 100%; min-height: 200px' class='card-img-top' src='images/<?php echo $image?>' >
        <a class='btn btn-secondary ml-2 mb-2' role='button' href="index.php">Go Back</a>
        </div>
        <?php require "blocks/footer.php" ?>
</body>

</html>
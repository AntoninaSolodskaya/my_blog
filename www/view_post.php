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
        <h1 class="d-flex justify-content-center">Post № : <?php echo $id ?></h1>
        <div class="row">
            <div class="col-sm-6">
                <img style='width: 100%; min-height: 400px' class='img-thumbnail' src='images/<?php echo $image ?>'>
            </div>
            <div class="col-sm-6 d-flex align-items-start flex-column mb-3">
                <h3 class="mb-4"><?php echo $title; ?></h3>
                <p><?php echo $content; ?></p>
                <div class="d-flex align-items-center justify-content-between w-100 mt-auto p-2">
                    <p class="font-weight-bold my-0">Date: <?php echo $date = date("m.d.y"); ?></p>
                    <a class='btn btn-secondary ml-2 mb-2' role='button' href="index.php">Go Back</a>
                </div>
            </div>
        </div>

    </div>
    <?php require "blocks/footer.php" ?>
</body>

</html>
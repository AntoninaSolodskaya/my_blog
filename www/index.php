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
        <h3 class="mb-5 d-flex justify-content-center">Our Articles</h3>
        <div class="d-flex flex-wrap">

        <?php
            $db = mysqli_connect("localhost", "root", "", "mystore");
            $result = mysqli_query($db, "SELECT * FROM `posts`");
           
            while ($row = mysqli_fetch_array($result)) {
                echo "<div class='card mb-4 shadow-sm'>";
                echo "<div class='card-header'>","<h4 class='my-0 font-weight-normal'>" . $row['title'] . "</h4>","</div>";
                echo "<img height='200' class='img-thumbnail' width='100%' src='images/" . $row['image'] . "' >";
                echo "<div class='card-body'>", "<p>" . $row['content'] . "</p>", "<p>" . $row['date'] . "</p>", "<button type='button' class='btn btn-lg btn-block btn-outline-primary'>", "<a href='view_post.php?pid=$id'>" . More  . "</a>", "</button>", "</div>";
                echo "</div>";
            }
         ?>
        </div>
    </div>
    <?php require "blocks/footer.php" ?>
</body>
</html>
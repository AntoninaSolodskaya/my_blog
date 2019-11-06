<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Blog</title>
</head>
<body>
    <?php require "blocks/header.php" ?>
    <div class="container mt-5">
        <h3 class="mb-5 d-flex justify-content-center">Our Articles</h3>
        <div class="d-flex flex-column align-items-center">
        <?php
            function printResult ($result_set, $result) {
               
                while (($row = $result_set->fetch_assoc()) != false && $row_image = mysql_fetch_array($result)) {
                    $id = $row['id'];
                    $title = $row['title'];
                    $content = $row['content'];
                    $date = $row['date'];
                    
                    echo 
                    "<div class='card mb-4 w-75 shadow-sm'>
                        <div class='card-header'>
                            <h4 class='my-0 font-weight-normal'>$title</h4>
                        </div>
                        <img height='300' width='300' src='data:image;base64,'.$row_image[2].' '>
                        <div class='card-body'>
                            <p>$content</p>
                            <p>$date</>
                            <button type='button' class='btn btn-lg btn-block btn-outline-primary'><a href='view_post.php?pid=$id'>More details</a></button>
                        </div>
                    </div>";
               
                   //}
                }
            }

            $db = new mysqli ("localhost", "root", "", "mystore");
            $db->query ("SET NAMES 'utf8'");
            $result_set = $db->query ("SELECT * FROM `posts`");

            $con = mysql_connect("localhost", "root", "");
            mysql_select_db("mystore", $con);
            $qry = "select * from images";
            $result = mysql_query($qry, $con);

            printResult ($result_set, $result);
                    
            $db->close();
        ?>
        </div>
    </div>
    <?php require "blocks/footer.php" ?>
</body>
</html>
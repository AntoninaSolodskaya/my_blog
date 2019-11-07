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
    <main>
        <div class="container mt-5">
            <div class="row d-flex justify-content-center">
                <?php
                $conn = mysql_connect("localhost", "root", "");
                mysql_select_db("mystore", $conn);

                if (isset($_POST['submit'])) {
                    $name = $_POST['search'];
                    if (empty($name)) {
                        echo "<div class='d-flex flex-column align-items-center'>";
                        echo "<h4 style='color:red'>You must type a word to search!</h4>";
                        echo "<a class='btn btn-secondary mt-2' role='button' href='/'>" . Back  . "</a>";
                        echo "</div>";
                    } else {
                        $make = "<h3 style='color:red';>No match found!</h3>";
                        $sele = "SELECT * FROM posts WHERE title LIKE '%$name%'";
                        $result = mysql_query($sele);
                        if ($mak = mysql_num_rows($result) > 0) {
                            while ($row = mysql_fetch_assoc($result)) {
                                echo "<div class='col-sm-3'>";
                                echo "<div class='card mb-4 shadow w-100' style='height: 350px'>";
                                echo "<img style='width: 100%; min-height: 200px' class='card-img-top' src='images/" . $row['image'] . "' >";
                                echo "<div class='card-body d-flex flex-column justify-content-between'>";
                                echo "<h6 class='card-title font-weight-bold'>" . $row['title'] . "</h6>";
                                echo "<div class='d-flex justify-content-between'>";
                                echo "<p class='d-flex align-items-center my-0'>" . $row['date'] = date("m.d.y")  . "</p>";
                                echo "<a class='btn btn-secondary mr-1' role='button' href='view_post.php?id=" . $row['id'] . " '>" . More  . "</a>";
                                echo "</div>";
                                echo "</div>";
                                echo "</div>";
                                echo "</div>";
                            }
                        } else {
                            echo "$make";
                        }
                        mysql_free_result($result);
                        mysql_close($conn);
                    }
                }
                ?>
            </div>
        </div>
    </main>
    <?php require "blocks/footer.php" ?>
</body>

</html>
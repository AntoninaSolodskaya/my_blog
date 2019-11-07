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
    <div class="container mt-5">
        <h3 class="mb-4 d-flex justify-content-center">Our Articles</h3>
        <div class="row">
            <?php
          
            $db = mysql_connect("localhost","root","");
            mysql_select_db("mystore",$db);
            mysql_query("SET NAMES 'utf8'",$db);
        
            if (isset($_GET['page'])){
                $page = $_GET['page'];
            }else $page = 1;
            
            $kol = 8;  
            $art = ($page * $kol) - $kol;
       
            $res = mysql_query("SELECT COUNT(*) FROM `posts`");
            $row = mysql_fetch_row($res);
            $total = $row[0]; 
           
            $str_pag = ceil($total / $kol);
          
            $result = mysql_query("SELECT * FROM `posts` LIMIT $art,$kol",$db);
            $row = mysql_fetch_array($result);
           
            do{
                $id = $row['id'];
                $title = $row['title'];
                $date = $row['date'];
                $image = $row['image'];
                
                echo "<div class='col-sm-3'>";
                echo "<div class='card mb-4 shadow w-100' style='height: 350px'>";
                echo "<img style='width: 100%; min-height: 200px' class='card-img-top' src='images/" . $row['image'] . "' >";
                echo "<div class='card-body d-flex flex-column justify-content-between'>";
                echo "<h6 class='card-title font-weight-bold'>" . $row['title'] . "</h6>";
                echo "<div class='d-flex justify-content-between'>";
                echo "<p class='d-flex align-items-center my-0'>" . $row['date'] = date("m.d.y")  ."</p>";
                echo "<a class='btn btn-secondary mr-1' role='button' href='view_post.php?id=".$id." '>" . More  . "</a>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            } while ($row = mysql_fetch_array($result));

            for ($i = 1; $i <= $str_pag; $i++){
                echo "<div class='d-flex align-items-center'>";
                echo "<a class='btn btn-secondary ml-2 mb-2' role='button' href=index.php?page=".$i.">  ".$i." </a>";
                echo "</div>";
            }

            ?>
        </div>
    </div>
    <?php require "blocks/footer.php" ?>
</body>

</html>
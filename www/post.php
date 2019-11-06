<?php
    $errors = array('title' => '', 'content' => '');

    if(isset($_POST['submit'])) {
        
        if (getimagesize($_FILES['image']['tmp_name']) == FALSE) {
            echo "Please select an image";
        }else {
            $image = addslashes($_FILES['image']['tmp_name']);
            $name = addslashes($_FILES['image']['name']);
            $image = file_get_contents($image);
            $image = base64_encode($image);
            saveImage($name, $image);
        }

        if(empty($_POST['title'])) {
            $errors['title'] = "Required";  
        }

        if(empty($_POST['content'])) {
            $errors['content'] = "Required";
        } else {

        $title = filter_var(trim($_POST['title']), FILTER_SANITIZE_STRING);
        $content = filter_var(trim($_POST['content']), FILTER_SANITIZE_STRING);
        
        $mysql = new mysqli("localhost", "root", "", "mystore");
        $mysql->query("SET NAMES 'utf8'");
    
        $mysql->query("INSERT INTO `posts` (`title`, `content`, `date`) VALUES ('$title', '$content', '".time ()."')");
        
        $mysql->close();
    
        header('Location: /');
        }
    }
  
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
        <h1>Add Your Post</h1>
        <form name="feedback" action="" method="post" class="w-100" enctype="multipart/form-data">
            <div class="form-group">
                <label for="title">Post Title</label>
                <input type="text" name="title" class="form-control" id="title" placeholder="Write title">
                <span style="color:red"><?php echo $errors['title'];?></span>
            </div>
            <div class="form-group">
                <label for="content">Post Content</label>
                <textarea name="content" class="form-control" id="content" placeholder="Write content" rows="3"></textarea>
                <span style="color:red"><?php echo $errors['content'];?></span>
            </div>
            <input type="file" name="image" >
            <div class="d-flex justify-content-center">
                <button type="submit" name="submit" value="submit" class="btn btn-success">Add Post</button>
            </div>
        </form>
    </div>
    <?php require "blocks/footer.php" ?>
</body>
</html>
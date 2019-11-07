<?php
$errors = array('title' => '', 'content' => '', 'image' => '');
$db = mysqli_connect("localhost", "root", "", "mystore");
$msg = "";

if (isset($_POST['submit'])) {
    if (empty($_POST['title'])) {
        $errors['title'] = "Required";
    }

    if (empty($_POST['image'])) {
        $errors['image'] = "Required";
    }

    if (empty($_POST['content'])) {
        $errors['content'] = "Required";
    } else {
        $image = $_FILES['image']['name'];
        $content = mysqli_real_escape_string($db, $_POST['content']);
        $title = mysqli_real_escape_string($db, $_POST['title']);
        $target = "images/" . basename($image);

        $sql = "INSERT INTO posts (title, image, content, date) VALUES ('$title', '$image', '$content', '" . time() . "')";

        mysqli_query($db, $sql);

        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            $msg = "Image uploaded successfully";
        } else {
            $msg = "Failed to upload image";
        }

        $result = mysqli_query($db, "SELECT * FROM `posts`");
        header('Location: /');
    }
}
$db->close();
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
    <main>
        <div class="container my-5 d-flex align-items-center flex-column">
            <h1>Add Your Post</h1>
            <form action="post.php" method="post" class="w-50" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="title">Post Title</label>
                    <input type="text" name="title" class="form-control" id="title" placeholder="Write title">
                    <span style="color:red"><?php echo $errors['title']; ?></span>
                </div>
                <div class="form-group">
                    <label for="content">Post Content</label>
                    <textarea name="content" class="form-control" id="content" placeholder="Write content" rows="3"></textarea>
                    <span style="color:red"><?php echo $errors['content']; ?></span>
                </div>
                <div class="form-group">
                    <label for="customFile">Choose image</label>
                    <input type="file" name="image" class="form-control-file" id="customFile">
                    <span style="color:red"><?php echo $errors['image']; ?></span>
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" name="submit" value="submit" class="btn btn-success mt-4">Add Post</button>
                </div>
            </form>
        </div>
    </main>
    <?php require "blocks/footer.php" ?>
</body>

</html>
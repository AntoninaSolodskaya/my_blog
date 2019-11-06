<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" rel="stylesheet">
    <title>Blog</title>
</head>
<body>
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-dark border-bottom shadow-sm">
        <h5 class="my-0 mr-md-auto font-weight-normal text-white">Company name</h5>
        <nav class="my-2 my-md-0 mr-md-3">
            <a class="p-2" href="./post.php">Add Post</a>
            <a class="p-2" href="#">Contacts</a>
        </nav>
        <?php
            if ($_COOKIE['user'] == ''):
        ?>
        <a class="btn btn-outline-primary mr-2" href="/register.php">Sign up</a>
        <a class="btn btn-outline-primary" href="/login.php">Sign in</a>
        <?php else: ?>
        <span class="mr-3 text-primary"><i class="fas fa-user icon mr-1"></i><? echo $_COOKIE['user']?></span>
        <a class="btn btn-outline-primary" href="/exit.php">logout</a>
        <?php endif; ?>
    </div>
</body>
</html>

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
        <h1>Login</h1>
        <form name="feedback" action="./validation-form/auth.php" method="post" class="w-100 h-100">
            <div class="form-group">
                <label for="login">Email address</label>
                <input type="text" name="login" class="form-control" id="login" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="pass">Password</label>
                <input type="password" name="pass" class="form-control" id="pass" placeholder="Password">
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-success">Sign In</button>
            </div>
        </form>
    </div>
    <?php require "blocks/footer.php" ?>
</body>
</html>
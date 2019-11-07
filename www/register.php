<?php
$errors = array('login' => '', 'name' => '', 'pass' => '');
$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
$name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
$pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);

if (isset($_POST['submit'])) {

    if (mb_strlen($login) < 5 || mb_strlen($login) > 40 || empty($_POST['login'])) {
        $errors['login'] = "Invalid login length";
    }
    if (mb_strlen($name) < 3 || mb_strlen($name) > 30 || empty($_POST['name'])) {
        $errors['name'] = "Invalid name length";
    }
    if (mb_strlen($pass) < 3 || mb_strlen($pass) > 6 || empty($_POST['pass'])) {
        $errors['pass'] = "Invalid password length(2 to 6 characters)";
    } else {

        $pass = md5($pass . "ghsf2458");
        $db = mysqli_connect("localhost", "root", "", "mystore");
        $db->query("SET NAMES 'utf8'");

        $db->query("INSERT INTO `users` (`login`, `pass`, `name`) VALUES ('$login', '$pass', '$name')");
        $db->close();
        header('Location: /login.php');
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
    <main>
        <div class="container my-5 d-flex align-items-center flex-column">
            <h1>Register</h1>
            <form action="register.php" method="post" class="w-50">
                <div class="form-group">
                    <label for="login">Email address</label>
                    <input type="text" name="login" class="form-control" id="login" placeholder="Enter email">
                    <span style="color:red"><?php echo $errors['login']; ?></span>
                </div>
                <div class="form-group">
                    <label for="name">Your name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter your name">
                    <span style="color:red"><?php echo $errors['name']; ?></span>
                </div>
                <div class="form-group">
                    <label for="pass">Password</label>
                    <input type="password" name="pass" class="form-control" id="pass" placeholder="Password">
                    <span style="color:red"><?php echo $errors['pass']; ?></span>
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" name="submit" value="submit" class="btn btn-success">Sign Up</button>
                </div>
            </form>
        </div>
    </main>
    <?php require "blocks/footer.php" ?>
</body>

</html>
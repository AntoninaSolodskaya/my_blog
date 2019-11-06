<?php
   
    $login =filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
    $name =filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
    $pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);

    if (mb_strlen($login) < 5 || mb_strlen($login) > 40) {
        echo "Invalid login length";
        exit();
    }
    if (mb_strlen($name) < 3 || mb_strlen($name) > 30) {
        echo "Invalid name length";
        exit();
    }
    if (mb_strlen($pass) < 3 || mb_strlen($pass) > 6) {
        echo "Invalid password length(2 to 6 characters)";
        exit();
    }

    $pass = md5($pass."ghsf2458");

    $mysql = new mysqli("localhost", "root", "", "mystore");
    $mysql->query("SET NAMES 'utf8'");

    $mysql->query("INSERT INTO `users` (`login`, `pass`, `name`) VALUES ('$login', '$pass', '$name')");
    
    $mysql->close();

    header('Location: /register.php');
?>
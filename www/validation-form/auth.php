<?php
    $login =filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
    $pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);

    if (mb_strlen($login) < 5 || mb_strlen($login) > 40) {
        echo "Invalid login length";
        exit();
    }

    if (mb_strlen($pass) < 3 || mb_strlen($pass) > 6) {
        echo "Invalid password length(2 to 6 characters)";
        exit();
    }

    $pass = md5($pass."ghsf2458");

    $mysql = new mysqli("localhost", "root", "", "mystore");
    $mysql->query("SET NAMES 'utf8'");

    $result = $mysql->query("SELECT * FROM `users` WHERE `login` = '$login' AND `pass` = '$pass'");

    $user = $result->fetch_assoc();
    if(count($user) == 0) {
        echo "This user is not define";
        exit();
    }
    
    setcookie('user', $user['name'], time() + 3600, "/");

    $mysql->close();

    header('Location: /');
?>
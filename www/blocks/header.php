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
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <a class="navbar-brand" href="/">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item mr-2">
                    <a class="nav-link" href="/">Home<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item mr-2">
                    <a class="nav-link" href="./post.php">Add Post</a>
                </li>
                <?php
                if ($_COOKIE['user'] == '') :
                    ?>
                    <li class="nav-item mr-2">
                        <a class="nav-link" href="/register.php">Sign up</a>
                    </li>
                    <li class="nav-item mr-2">
                        <a class="nav-link" href="/login.php">Sign in</a>
                    </li>

                <?php else : ?>
                    <li class="nav-item mr-2">
                        <span class="nav-link mr-3 text-primary"><i class="fas fa-user icon mr-1"></i><? echo $_COOKIE['user'] ?></span>
                    </li>
                    <li class="nav-item mr-2">
                        <a class="nav-link" href="/exit.php">logout</a>

                    </li>
                <?php endif; ?>
            </ul>
            <form action="search.php" method="post" class="form-inline my-2 my-lg-0">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
                    </div>
                    <input class="form-control" placeholder="" type="text" name="search" id="search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-secondary my-2 my-sm-0" type="submit" name="submit" value="submit">Search</button>

                    </div>
                </div>
            </form>
        </div>
    </nav>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
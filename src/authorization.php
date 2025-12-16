<?php 
                    
                    if(isset($_COOKIE['User'])&& $_COOKIE['User'] !== ''){  
                        $usname= $_COOKIE['User'];

                        $link = mysqli_connect('127.0.0.1', 'root', '123', 'vasilev');
                        $sql = "SELECT id FROM users WHERE username= '$usname'";
                        $res = mysqli_query($link, $sql);
                        if (mysqli_num_rows($res)>0){
                             header('Location: /hello.php'); 
                             exit;
                        } else {
                            header('Location: /index.html');
                        }
                        
                    }   
                ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Васильев Леонид</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- <link rel="stylesheet" href="styles/styles.css"> -->
</head>

<body>
    <div class = "container d-flex justify-content-center align-items-center vh-100">
        <div class = "row">
            <div class = "col-12 text-center">
                <h1 class = "mb-4">Authorization!!!</h1>
                
                <form action="/authorization.php" method="POST" class="d-flex flex-column gap-3">
                    <input type="text" name="login" class="form-control-auth" placeholder="login">
                    <input type="password" name="password" class="form-control-auth" placeholder="password">
                    <button class="btn btn-primary" type="submit" name="submit">Authorize</button>
                   
                </form>
            </div>
        </div>

    </div>
</body>
</html>


<?php
require_once('db.php');

if (isset($_COOKIE['User'])) {
    header("Location: /hello.php");
    exit();
}

$link = mysqli_connect('127.0.0.1', 'root', '123', 'vasilev');

if (isset($_POST['submit'])) {
    $login = $_POST['login'];
    $pass = $_POST['password'];

    if (!$login || !$pass) die("input all parameters");

    $sql = "SELECT * FROM users WHERE username='$login' AND pass='$pass'";
    $result = mysqli_query($link, $sql);

    if (mysqli_num_rows($result) == 1) {
        setcookie("User", $login, time()+7200);
        header("Location: index.html");
    } else {
        echo "incorrect username or password";
    }
}
?>



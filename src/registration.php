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
                <h1 class = "mb-4">Registration!!!</h1>
               
                <form action="/registration.php" method="POST" class="d-flex flex-column gap-3">
                    <input type="text" name="login" class="form-control-reg" placeholder="login">
                    <input type="email" name="email" class="form-control-reg" placeholder="email">
                    <input type="password" name="password" class="form-control-reg" placeholder="password">
                    <button class="btn btn-primary" type="submit" name="submit">Register</button>
                    
                </form>
            </div>
        </div>

    </div>
</body>
</html>

<?php 
    require_once('db.php');
    
    $link = mysqli_connect('127.0.0.1','root','123','vasilev');
    if (isset($_POST['submit'])) {
    $login = $_POST['login'];
    $email = $_POST['email'];
    $pass  = $_POST['password'];

    if (!$login || !$email || !$pass) {
        die("input all parameters");
    }

    $sql = "INSERT INTO users (username, email, pass) 
            VALUES ('$login', '$email', '$pass')";

    if (!mysqli_query($link, $sql)) {
        echo "Error insert table users";
    } else {
        header("Location: /index.html");
        exit();
        }   
    }   
?>

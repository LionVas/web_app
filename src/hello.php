<?php

if (isset($_POST['logout'])) {
    setcookie('User', '', time() - 7200, '/'); 
    header('Location: /index.html');          
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body class="p-4">
<div class="container">
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="m-0">
            <?php echo "Hello, " . $_COOKIE['User']; ?>
        </h1>

        <form method="POST" class="m-0">
            <button type="submit" name="logout" class="btn btn-danger">
                Leave
            </button>
        </form>
    </div>
</div>
</body>
</html>

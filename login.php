<?php
session_start();
include_once 'includes/connection.php';
if (isset($_POST['login'])) {
    $name = mysqli_real_escape_string($conn, $_POST['userName']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    
    if (!empty($name) && !empty($password)) {
        $sql = "SELECT *, COUNT(*) AS numrows FROM users where firstname='$name' LIMIT 1";
        $query = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($query);

        if ($row['numrows'] > 0) {
            if (password_verify($password,$row['password'])) {
                $_SESSION['admin'] = $row['id'];
       echo "<script>
       alert('You are logged in!'); 
       </script>";
       header('location:admin/home.php');
            } else {
                echo  "<script>alert('Wrong password')</script>";
            }
        } else {
            echo  "<script>alert('User not found!')</script>";
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/login.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <title>Dilyerstevens</title>
</head>

<body>
    <div class="wrapper">
        <div class="logo"> <img src="" alt=""> </div>
        <div class="text-center mt-4 name">Admin Panel</div>
        <form class="p-3 mt-3" method="POST">
            <div class="form-field d-flex align-items-center"> <span class="far fa-user"></span> <input type="text" name="userName" id="userName" placeholder="Username"> </div>
            <div class="form-field d-flex align-items-center"> <span class="fas fa-key"></span> <input type="password" name="password" id="pwd" placeholder="Password"> </div>
            <button type="submit" name="login" class="btn mt-3">Login</button></br>
            </br>
            <div class="text-center fs-6"> <a href="index.php">Back to Website</a> </div>
        </form>

    </div>
</body>

</html>
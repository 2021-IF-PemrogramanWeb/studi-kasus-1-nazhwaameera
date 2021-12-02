<?php
session_start();

//jika user udah login, tidak bisa kembali ke halaman login
if( isset($_SESSION["login"]) )
{
    header("Location: index.php"); //kembali ke halaman index
    exit;
}

$conn = mysqli_connect("localhost", "root", "Bolaitubundar1", "housing1");

//cek tombol submit ditekan
if( isset($_POST["login"]) )
{
    $email = $_POST["email"];
    $password = $_POST["password"];

    //cek email ada di databse atau tidak
    $cek = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email'");
    // echo($cek);

    if( mysqli_num_rows($cek) === 1 )
    {
        //cek password
        $row = mysqli_fetch_array($cek); //ambil semua data
        if ( $password == $row["password"] )
        {
            //set session
            $_SESSION["login"] = true;

            //set user email
            $_SESSION['email'] = $email;

            header("Location: index.php"); //diarahkan ke index.php
            // echo('Login Berhasil');
            exit;
        }
    }

    $error = true;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
</head>
<body>
    <div class="container border">
        <div class="logo">
            <img src="images/dummy-logo.png" alt="Logo">
        </div>
        <div class="login-form">
        <form action=" " method="post"
            enctype="multipart/form-data">
            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" id="email" placeholder="Enter email" name="email">
            </div>
            <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
            </div>
                <button type="submit" class="btn btn-dark" name="login">LOGIN</button>
            </form>
        </div>
    </div>
</body>
</html>
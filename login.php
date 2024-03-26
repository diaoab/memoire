<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "user";

session_start();

$data = mysqli_connect($host, $user, $password, $db);

if($data === false){
    die("Erreur de connexion : ".mysqli_connect_error());
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM login WHERE username='$username' AND password='$password'";
    
    $result = mysqli_query($data, $sql);

    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        if($row["usertype"] === "user"){
            $_SESSION["username"] = $username;
            header("location:userhome.php");
        }
        elseif($row["usertype"] === "admin"){
            $_SESSION["username"] = $username;
            header("location:adminhome.php");
        }
    } else {
        echo "Nom d'utilisateur ou mot de passe incorrect";
    }
}

mysqli_close($data);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Login Form</h1>
        <form action="#" method="POST">
            <div>
                <label for="username">Username</label><br>
                <input type="text" id="username" name="username" required>
            </div>
            <div>
                <label for="password">Password</label><br>
                <input type="password" id="password" name="password" required>
            </div>
            <div>
                <input type="submit" value="Login">
            </div>
        </form>
    </div>
</body>
</html>

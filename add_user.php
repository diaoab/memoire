<?php
if(isset($_POST['add_user_button'])){
    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "user";
    $conn = new mysqli($host, $user, $password, $db);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "INSERT INTO login (username, password, usertype) VALUES ('$username', '$password', 'user')";

    if ($conn->query($sql) === TRUE) {
        echo "Utilisateur ajouté avec succès";
    } else {
        echo "Erreur lors de l'ajout de l'utilisateur: " . $conn->error;
    }

    $conn->close();
}
?>

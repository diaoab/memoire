<?php
session_start();

if(!isset($_SESSION["username"])){
   header("location:login.php");
}

require './conn.php'; 

if(isset($_POST['button'])){
    $name = $_POST['name'];
    $img = '';

    if(isset($_FILES['file'])){
        if($_FILES['file']['type'] == 'application/pdf'){
            $img = $_FILES['file']['name'];
            move_uploaded_file($_FILES['file']['tmp_name'], 'images/' . $img);
        } else {
            echo "Ce système ne prend en compte que les fichiers PDF";
            return false;
        }
    }

    if(!empty($name)){
        pdf::insert($name, $img);
    } else {
        pdf::$alerts[] = 'Remplissez ce champ...!';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Memoires</title>
</head>
<body>
    <h1>Page Administrateur</h1>
    <?php echo $_SESSION["username"]; ?>


    <div class="alerts">
        <?php
        if(count(pdf::$alerts) > 0){
            $alert = pdf::$alerts;
            foreach($alert as $value){
                echo '<div class="alert">' . $value . '</div>'; 
            }
        } else {
            echo 'No alerts!';
        }
        ?>
    </div>
    <form action="add_user.php" method="POST">
            <input type="text" name="username" placeholder="Nom d'utilisateur">
            <input type="password" name="password" placeholder="Mot de passe">
            <input type="submit" value="Ajouter" name="add_user_button">
        </form>
    <div class="form">
        <h1>Ajouter un fichier</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="text" name="name" placeholder="Name">
            <input type="file" name="file">
            <input type="submit" value="Ajouter" name="button">
        </form>
    </div>
    <div class="content">
        <div class="title">
            <h1>Fichiers Disponibles</h1>
        </div>
        <div class="files">
            <?php
            if(count(pdf::select())>0){
                $fetch=pdf::select();
                foreach($fetch as $value){
                    ?>
                    <a href="images/<?php echo $value['img']; ?>" download="<?php echo $value['img']; ?>"><?php echo $value['name']; ?></a>
                    <?php
                }
            }
            ?>
        </div>
    </div>
    <a href="logout.php" class="logout-btn">Logout</a>

</body>
</html>

<?php
session_start();

if(!isset($_SESSION["username"])){
    header("location:login.php");
}

$bd = new PDO('mysql:host=localhost;dbname=pdf','root','');
$memoire = $bd->query('SELECT * FROM pdf_table');
if(isset($_GET['s']) && !empty($_GET['s'])){
    $recherche = htmlspecialchars($_GET['s']);
    $memoire = $bd->query("SELECT * FROM pdf_table WHERE img LIKE '%$recherche%'");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rechercher Memoire</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Recherche de Mémoires</h1>

    <form method="GET">
        <input type="search" name="s" placeholder="Rechercher un sujet" autocomplete="off">
        <input type="submit" value="Rechercher">   
    </form>

    <section class="afficher memoire">
        <?php
            if($memoire->rowCount() > 0){
                while($memo = $memoire->fetch()){
                    ?>
                    <a href="images/<?php echo $memo['img']; ?>" download="<?php echo $memo['img']; ?>">
                        <p><?php echo $memo['img']; ?></p>
                    </a>
                    <?php
                }
            } else {
                ?>
                <p>AUCUN SUJET DE MEMOIRE TROUVE</p>
                <?php
            }
        ?>
    </section>
    <a href="logout.php" class="logout-btn">Logout</a>


</body>
</html>

<?php
if(!isset($_SESSION['authenticatedUser'])) {
    header('Location: /');
    die();
}

$imagesStatement = $pdo->prepare('SELECT DISTINCT url FROM images');
$imagesStatement->execute();
$data = $imagesStatement->fetchAll();
if($imagesStatement === false){
    throw new DatabaseException();
}

require_once (__DIR__.'/web/templates/adminNewItemForm.php');

if(isset($_POST['submit'])){
    $category = ($_POST['category']);
    $content = ($_POST['content']);
    $price = ($_POST['price']);
    $img = ($_POST['img']);
    require_once ('connectDB.php');
    $productStatement = $pdo->prepare("INSERT INTO products VALUES(NULL,?,?,?,?)");
    $productStatement->bindParam(1, $category);
    $productStatement->bindParam(2,$content);
    $productStatement->bindParam(3,$img);
    $productStatement->bindParam(4,$price);
    $productStatement->execute();

    echo "<script> alert('Produkt został dodany!')</script>";
}

<?php 

    require_once 'block/header.php';
    require_once 'db/connect.php';
    require_once 'class/Album.php';
   
    $album = new Album($mysqli);
    if(isset($_POST['delete_album'])){
        $album->delete($_POST['id']);
        header('Location: index.php');
        exit;
    }
    $album = new Album($mysqli);
    $albums = $album->list();
    require_once 'templates/index.php';
    require_once 'block/footer.php';
?>

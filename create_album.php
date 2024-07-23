<?php 
    require_once 'block/header.php';
    require_once 'db/connect.php';
    require_once 'class/Album.php';

    if(isset($_POST['add'])){
        $title = $_POST['title'];
        $description = $_POST['description'];
        $album = new Album($mysqli);
        if($album->add($title, $description, $_FILES)){
            header('Location: index.php');
            exit;
        }
    }
    require_once 'templates/add_album.php';

    require_once 'block/footer.php';
?>
<?php 
    require_once 'block/header.php';
    require_once 'db/connect.php';
    require_once 'class/Photo.php';
    $id = intval($_GET['id']);
    if(isset($_POST['add'])){
        $title = $_POST['title'];
        $description = $_POST['description'];
        $album = new Photo($mysqli);
        if($album->add($id, $title, $description, $_FILES)){
            header('Location: detail_album.php?id='.$id);
            exit;
        }

    }
    require_once 'templates/add_photo.php';

    require_once 'block/footer.php';
?>
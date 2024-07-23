<?php 
    require_once 'block/header.php';
    require_once 'db/connect.php';
    require_once 'class/Album.php';
    require_once 'class/Photo.php';
    $photo = new Photo($mysqli);
    $id = intval($_GET['id']);
    if(isset($_POST['delete_photo'])){
      $photo->delete($_POST['id']);
      header('Location: detail_album.php?id='.$id);
      exit;
    }
    
    $alb = new Album($mysqli);
    $alb = $alb->listFromId($id);

    
    $photos_result = $photo->listFromIdAlbum($id);

    

  require_once 'templates/detail_album.php';
  require_once 'block/footer.php';
?>
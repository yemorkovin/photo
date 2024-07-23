<?php 
require_once '../db/connect.php';
$id_photo = $_POST['id_photo'];
$mode = $_POST['mode'];
if($mode == 'add'){
    $name = $_POST['name'];
    $comment = $_POST['comment'];
    $mysqli->query("insert into comments (photo_id, name, comment) values ($id_photo, '$name', '$comment')");
    $com = $mysqli->query("select * from comments where photo_id = $id_photo");
    $res = '';
    while($row = $com->fetch_assoc()){
        $res .=  '
            <div class="comment">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-subtitle mb-2 text-muted">'.$row['name'].' - <i><small>'.$row['created_at'].'</small></i></h6>
                        <p class="card-text">'.$row['comment'].'</p>
                    </div>
                </div>
            </div>
        ';
    }
    echo $res;
}elseif($mode == 'show'){
    $com = $mysqli->query("select * from comments where photo_id = $id_photo");
    $res = '';
    while($row = $com->fetch_assoc()){
        $res .=  '
            <div class="comment">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-subtitle mb-2 text-muted">'.$row['name'].' - <i><small>'.$row['created_at'].'</small></i></h6>
                        <p class="card-text">'.$row['comment'].'</p>
                    </div>
                </div>
            </div>
        ';
    }
    echo $res;
}

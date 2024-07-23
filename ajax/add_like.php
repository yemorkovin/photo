<?php 
require_once '../db/connect.php';
$id_photo = $_POST['id_photo'];
$mode = $_POST['mode'];
$ip = $_SERVER['REMOTE_ADDR'];
if($mode == 'like'){
    
    $isset = $mysqli->query("select * from likes where ip = '$ip'")->num_rows;
    if($isset == 0){
        $mysqli->query("insert into likes (photo_id, type, ip) values ($id_photo, '$mode', '$ip')");
    }else{
        $mysqli->query("delete from likes where ip = '$ip'");
    }
    $res = $mysqli->query("select count(*) as count from likes where photo_id = $id_photo and type = 'like'")->fetch_assoc();

    echo $res['count'];

}
elseif($mode == 'showlike'){
    $res = $mysqli->query("select count(*) as count from likes where photo_id = $id_photo and type = 'like'")->fetch_assoc();

    echo $res['count'];

}
elseif($mode == 'dislike'){
    $isset = $mysqli->query("select * from likes where ip = '$ip'")->num_rows;
    if($isset == 0){
        $mysqli->query("insert into likes (photo_id, type, ip) values ($id_photo, '$mode', '$ip')");
    }else{
        $mysqli->query("delete from likes where ip = '$ip'");
    }

    $res = $mysqli->query("select count(*) as count from likes where photo_id = $id_photo and type = 'dislike'")->fetch_assoc();

    echo $res['count'];

}
elseif($mode == 'showdislike'){
    $res = $mysqli->query("select count(*) as count from likes where photo_id = $id_photo and type = 'dislike'")->fetch_assoc();

    echo $res['count'];

}


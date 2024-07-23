<?php

class Album{
    public $m;
    public function __construct($mysqli){
        $this->m = $mysqli;
    }
    public function add($title, $description, $file){
        $filename = $file['image']['name'];
        $target_file = 'uploads/'.$filename;
        if(move_uploaded_file($file['image']['tmp_name'], $target_file)){
            $this->m->query("insert into albums (title, description, image) values ('$title', '$description', '$target_file')");
            return true;
        }
        return false;
    }

    public function listFromId($id){
        $alb_result = $this->m->query("select * from albums where id = $id");
        return $alb_result->fetch_assoc();
    }

    public function list(){
        return $this->m->query('select * from albums');
    }


    public function delete($id){
        $d = $this->m->query("select * from albums where id = $id")->fetch_assoc();
        if(file_exists($d['image'])){
            unlink($d['image']);
        }
        $p = $this->m->query("select * from photos where album_id = $id");
        $this->m->query("delete from photos where album_id = $id");
        while($row = $p->fetch_assoc()){
            if(file_exists($row['file_name'])){
                unlink($row['file_name']);
            }
            $this->m->query("delete from comments where photo_id = ".$row['id']);
            $this->m->query("delete from likes where photo_id = ".$row['id']);
        }
        return $this->m->query("delete from albums where id = $id");
    }
}
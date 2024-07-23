<?php
 
class Photo{
    public $m;
    public function __construct($mysqli){
        $this->m = $mysqli;
    }
    public function add($album_id, $title, $description, $file){
        $filename = $file['image']['name'];
        $target_file = 'uploads/photos/'.$filename;
        if(move_uploaded_file($file['image']['tmp_name'], $target_file)){
            $this->m->query("insert into photos (album_id, title, description, file_name) values ($album_id,'$title', '$description', '$target_file')");
            return true;
        }
        return false;
    }

    public function listFromIdAlbum($id){
        return $this->m->query("select * from photos where album_id = $id");
    }


    public function delete($id){
      
        $p = $this->m->query("select * from photos where id = $id");
        $this->m->query("delete from photos where id = $id");
        $this->m->query("delete from comments where photo_id = $id");
            $this->m->query("delete from likes where photo_id = $id");
        while($row = $p->fetch_assoc()){
            if(file_exists($row['file_name'])){
                unlink($row['file_name']);
            }
        }
    }
}
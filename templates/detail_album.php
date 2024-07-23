<div class="container">

    <p>
      <a href='index.php' class="btn btn-primary mt-5">Назад</a>
    </p>
    <h1><?=$alb['title']?></h1>
    <p><?=$alb['description']?></p>
    <a href='add_photo.php?id=<?=$alb['id']?>' class="btn btn-primary mb-3">Добавить фото</a>
    <div class="row">
        <?php while($photo = $photos_result->fetch_assoc()){ ?>
            <?php
            $count_like = $mysqli->query("select count(*) as count from likes where photo_id = ".$photo['id'].' and type = "like"')->fetch_assoc();
            $count_dislike = $mysqli->query("select count(*) as count from likes where photo_id = ".$photo['id'].' and type = "dislike"')->fetch_assoc();
            ?>
            <div class="col-md-3">
                <div class="card mb-4 shadow-sm">
                    <img src='<?=$photo['file_name']?>' class="card-img-top">
                    <div class="card-body">
                        <h3><?=$photo['title']?></h3>
                        <p class="card-text"><?=$photo['description']?></p>
                        <div class="d-flex justify-content-betbeen align-items-center">
                            <div class="btn-group">
                                <!--<a data-toggle="modal" data-target="#exampleModal"
                             class="btn btn-sm btn-outline-secondary">Просмотреть</a>-->
                             <button type="button" onclick='changePhoto("<?=$photo['file_name']?>", "<?=$photo['title']?>", <?=$photo['id']?>, "<?=$photo['description']?>")' class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#exampleModal">
    Просмотреть
  </button>
                            </div>
                            <?php 
                              $id_photo = $photo['id'];
                              $res_like = $mysqli->query("select count(*) as count from likes where photo_id = $id_photo and type = 'like'")->fetch_assoc();
                              $res_dislike = $mysqli->query("select count(*) as count from likes where photo_id = $id_photo and type = 'dislike'")->fetch_assoc();

                            ?>
                        </div>
                        <p><small class="text-muted" id='item-photo-like-<?=$id_photo?>'>&nbsp;<?=$res_like['count']?> лайк,</small><small class="text-muted" id='item-photo-dislike-<?=$id_photo?>'> <?=$res_dislike['count']?> дизлайк </small></p>
                        <form method="post">
                          <input type="hidden" name="id" value="<?=$photo['id']?>">
                          <button class="btn btn-primary" name='delete_photo'>Удалить</button>
                      </form>
                    </div>
                </div>
            </div>

        <?php } ?>
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <img id='bodyimg' style='width: 100%'>
          <p id='txt-modal-body'></p>
        </div>
        
        <div class="modal-footer">
          
          
            <button type="button" id='like_btn' name='like' class="btn btn-primary" >
              <i class="bi bi-hand-thumbs-up"></i>
            </button>
            <span id='like_count'>0</span>
            <button type="button" name='dislike' id='dislike_btn' class="btn btn-primary">
              <i class="bi bi-hand-thumbs-down"></i>
            </button>
            <span id='dislike_count'>0</span>
         
        </div> 
        <div class='container'>
          <div class="col-md-12">
          <div class='card'>
            <div class='card-body'>
              <h5 class=card-title>Добавить комментарий</h5>
              <form id='commentForm'>
                <div class="form-group">
                  <label id='name'>Имя:</label>
                  <input type="text" class="form-control" id="nameForm" required>
                </div>
                <div class="form-group">
                  <label for='comment'>Комментарий:</label>
                  <textarea class="form-control" id='comment' rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Добавить</button>
              </form>
            </div>
          </div>
          <div class="comment-box mt-4">
            <h5>комментарии</h5>
            <div id='commentList'>

            </div>
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>
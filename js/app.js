let id_photo;
    function changePhoto(img, title, id, description){
        //alert(img);
        $('#bodyimg').attr('src', img);
        $('#exampleModalLabel').text(title);
        $('#txt-modal-body').text(description);
        id_photo = id;
        $.ajax({
          url: 'ajax/add_like.php',
          method: 'post',
          dataType: 'html',
          data: {id_photo: id_photo, mode: 'showlike'},
          success: function(data){
            $('#like_count').text(data);
          }
        });

        $.ajax({
          url: 'ajax/add_like.php',
          method: 'post',
          dataType: 'html',
          data: {id_photo: id_photo, mode: 'showdislike'},
          success: function(data){
            $('#dislike_count').text(data);
          }
        });
        $.ajax({
        url: 'ajax/add_comment.php',
        method: 'post',
        dataType: 'html',
        data: {id_photo: id_photo, mode: 'show'},
        success: function(data){
          $('#commentList').html(data);
         
        }
      });
    } 




    $('#like_btn').on('click', function(){
      $.ajax({
        url: 'ajax/add_like.php',
        method: 'post',
        dataType: 'html',
        data: {id_photo: id_photo, mode: 'like'},
        success: function(data){
          $('#like_count').text(data);
          $('#item-photo-like-'+id_photo).html('&nbsp;' + data + ' лайк');
          $.ajax({
            url: 'ajax/add_like.php',
            method: 'post',
            dataType: 'html',
            data: {id_photo: id_photo, mode: 'showlike'},
            success: function(data){
              $('#like_count').text(data);
            }
          });
  
          $.ajax({
            url: 'ajax/add_like.php',
            method: 'post',
            dataType: 'html',
            data: {id_photo: id_photo, mode: 'showdislike'},
            success: function(data){
              $('#dislike_count').text(data);
            }
          });
          
        }
      });

    });


    $('#dislike_btn').on('click', function(){
      $.ajax({
        url: 'ajax/add_like.php',
        method: 'post',
        dataType: 'html',
        data: {id_photo: id_photo, mode: 'dislike'},
        success: function(data){
          $('#dislike_count').text(data);
          $('#item-photo-dislike-'+id_photo).html('&nbsp;' + data + ' дизлайк');
          $.ajax({
            url: 'ajax/add_like.php',
            method: 'post',
            dataType: 'html',
            data: {id_photo: id_photo, mode: 'showlike'},
            success: function(data){
              $('#like_count').text(data);
            }
          });
  
          $.ajax({
            url: 'ajax/add_like.php',
            method: 'post',
            dataType: 'html',
            data: {id_photo: id_photo, mode: 'showdislike'},
            success: function(data){
              $('#dislike_count').text(data);
            }
          });
        }
      });

    });

    $('#commentForm').on('submit', function(event){
      event.preventDefault();
      let name = $('#nameForm').val();
      let comment = $('#comment').val();
      $.ajax({
        url: 'ajax/add_comment.php',
        method: 'post',
        dataType: 'html',
        data: {id_photo: id_photo, name: name, comment: comment,mode: 'add'},
        success: function(data){
          $('#commentList').html(data);
          $('#nameForm').val('');
          $('comment').val('');
        }
      });

    });
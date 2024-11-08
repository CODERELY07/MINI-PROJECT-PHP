<?php
    
    session_start();

    if(!isset($_SESSION['token'])){
        header("Location: login.php");
    }


?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
       <h1>This is your dashboard to show content</h1>
       <div class="row">
        <div class="col-3">
            <div class="list-group">
                <a href="#" data-item="stuff" class="list-group-item list-group-item-action" aria-current="true">Stuff</a>
                <a href="#"  data-item="things" class="list-group-item list-group-item-action">Things</a>
                <a href="#"  data-item="content" class="list-group-item list-group-item-action">content</a>
            </div>
        </div>
        <div class="col" id="content"></div>
       </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <script>
        $(function(){
            function getItemsContent(name){
                $.ajax({
                    type:'GET',
                    url: 'get.dashboard.php',
                    data:{
                        token: localStorage.getItem('token'),
                        item: name,
                    }
                }).then(function(res){
                    let data = JSON.parse(res);

                    if(!data.auth){
                        location.href = 'login.php';
                    }
                    $('#content').html(data.content);
                })
            }

            $('a[data-item]').on('click', function(e){
                e.preventDefault();
                let dataItem = $(this).attr('data-item');
                getItemsContent(dataItem);
            })
        })
    </script>
  </body>
  
</html>
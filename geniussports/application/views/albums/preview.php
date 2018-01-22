<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h1 class="page-header">Overview</h1>

    <div class="row placeholders">
        <div class="col-xs-6 col-sm-3 placeholder">
            <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200"
                 height="200" class="img-responsive" alt="Generic placeholder thumbnail">
            <h4>Label</h4>
            <span class="text-muted">Something else</span>
        </div>
        <div class="col-xs-6 col-sm-3 placeholder">
            <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200"
                 height="200" class="img-responsive" alt="Generic placeholder thumbnail">
            <h4>Label</h4>
            <span class="text-muted">Something else</span>
        </div>
        <div class="col-xs-6 col-sm-3 placeholder">
            <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200"
                 height="200" class="img-responsive" alt="Generic placeholder thumbnail">
            <h4>Label</h4>
            <span class="text-muted">Something else</span>
        </div>
        <div class="col-xs-6 col-sm-3 placeholder">
            <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200"
                 height="200" class="img-responsive" alt="Generic placeholder thumbnail">
            <h4>Label</h4>
            <span class="text-muted">Something else</span>
        </div>
    </div>

    <div class="col-lg-12">


    </div>
    <h3 class="sub-header">Previewing album with ID :  <?php echo $id; ?></span><br>
        <br>
        <a class="btn btn-primary btn-lg" href="/album/update/<?php echo $id; ?>" >Edit album</a>
        <a class="btn btn-danger btn-lg" onclick="delete_id(<?php echo $id; ?>)" >Delete album</a>
    </h3>
    <h4><a href="/albums">Back to all albums</a></h4>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 style="padding:10px 0;" class="panel-title"><?php echo $album_info->album_name; ?> </h3>



        </div>
        <div class="panel-body">
            <?php echo $album_info->artist_name; ?>
        </div>
    </div>


</div>
<script type="text/javascript">
    function delete_id(id)
    {
        if(confirm('You are about to delete album with id ' + id + '. Are you sure? ' ))
        {
            window.location.href='/album/delete/' + id;
        }
    }
</script>

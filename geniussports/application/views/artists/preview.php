<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">


    <div class="col-lg-12">
<!---->
<!--    --><?php //var_dump($artist_info) ?>
<!--    --><?php //var_dump($albums_for_artist) ?>
    </div>
    <h3 class="sub-header">Previewing artist with ID :  <?php echo $id; ?></span><br>
        <br>
        <a class="btn btn-primary btn-lg" href="/artist/update/<?php echo $id; ?>" >Edit artist</a>
        <a class="btn btn-danger btn-lg" onclick="delete_id(<?php echo $id; ?>)" >Delete artist</a>
    </h3>
    <h4><a href="/artists   ">Back to all artists</a></h4>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 style="padding:10px 0;" class="panel-title"><strong><?php echo $artist_info->name; ?> </strong></h3>



        </div>
        <div class="panel-body">
           <?php if(($albums_for_artist)): ?>
               <h3>Albums</h3>
               <ul>
                   <?php foreach ($albums_for_artist as $afa): ?>
                       <li><?php echo $afa['name'] ?></li>
                   <?php endforeach; ?>
               </ul>
               <?php else: ?>
               <h3>There are currently no albums assigned to that artist</h3>
            <?php endif; ?>
        </div>
    </div>


</div>
<script type="text/javascript">
    function delete_id(id)
    {
        if(confirm('You are about to delete artist with id ' + id + '. Are you sure? ' ))
        {
            window.location.href='/artists/delete/' + id;
        }
    }
</script>

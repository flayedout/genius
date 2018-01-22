<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">


    <?php if ($this->session->flashdata('message')): ?>
        <h5 class="<?php echo $this->session->flashdata('message')['class']; ?>">
            <strong><?php echo $this->session->flashdata('message')['message']; ?></strong></h5>
    <?php endif; ?>

    <p>Search results:</p>
    <hr>

    <?php if(count($search['album']) > 0): ?>
        <h3>Album name: <?php echo $search['album'][0]['album_name'] ?></h3>
        <?php elseif(count($search['artist']) > 0): ?>
        <h3>Artist name: <a href="/artist/<?php echo $search['artist'][0]['artist_id']; ?>"><?php echo $search['artist'][0]['artist_name']; ?></a></h3>
        <?php if(count($search['artist'][0]['album_name']) > 0): ?>
            <h3>Albums associated to artist:</h3>
            <ul>
                <?php foreach ($search['artist'] as $album): ?>
                    <li><a href="/album/<?php echo $album['album_id'] ?>"><?php echo $album['album_name'] ?></a></li>

                <?php endforeach; ?>
            </ul>
            <?php endif; ?>
    <?php else: ?>
        <h3>No results found</h3>
    <?php endif; ?>
</div>

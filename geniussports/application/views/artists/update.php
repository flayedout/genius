<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h1 class="page-header">Update artist</h1>
    <h3><a href="/artists">Back to artists</a></h3>
    <?php if($this->session->flashdata('message')): ?>
        <h5 class="<?php echo $this->session->flashdata('message')['class']; ?>"><strong><?php echo $this->session->flashdata('message')['message']; ?></strong></h5>
    <?php endif; ?>

    <form action="/artist/update" method="post">
        <div class="form-group ">
            <label for="name">Artist name</label>
            <input type="text" class="form-control" value="<?php echo $artist->name ?>" id="name" name="artist"   >
            <input type="hidden" name="artist_id" value="<?php echo $artist->id; ?>">
        </div>
        <button type="submit" class="btn btn-default">Save</button>
    </form>

</div>
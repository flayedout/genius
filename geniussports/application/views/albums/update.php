<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h1 class="page-header">Update album</h1>
    <?php if($this->session->flashdata('message')): ?>
        <h5 class="<?php echo $this->session->flashdata('message')['class']; ?>"><strong><?php echo $this->session->flashdata('message')['message']; ?></strong></h5>
    <?php endif; ?>
    <form action="/album/update" method="post">
        <div class="form-group ">
            <label for="name">Album name</label>
            <input type="text" class="form-control " id="name" name="album" value="<?php echo $current_album->album_name; ?>" placeholder="Album name">
            <input type="hidden" name="album_id" value="<?php echo $current_album->id; ?>">
            <h5 class="text-danger"> <?php echo form_error('album'); ?></h5>
        </div>
        <button type="submit" class="btn btn-default">Save</button>
    </form>

</div>
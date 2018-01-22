<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h1 class="page-header">Create new artist</h1>
    <?php if($this->session->flashdata('message')): ?>
        <h5 class="<?php echo $this->session->flashdata('message')['class']; ?>"><strong><?php echo $this->session->flashdata('message')['message']; ?></strong></h5>
    <?php endif; ?>
    <form action="/artists/create" method="post">
        <div class="form-group ">
            <label for="artist">Artist name</label>
            <input type="text" class="form-control " id="artist" name="artist" value="<?php echo set_value('artist'); ?>" placeholder="Artist name">
            <h5 class="text-danger"> <?php echo form_error('album'); ?></h5>
        </div>

        <button type="submit" class="btn btn-default">Save</button>
    </form>
</div>
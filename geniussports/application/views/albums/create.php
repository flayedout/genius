<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h1 class="page-header">Create new album</h1>
    <?php if($this->session->flashdata('message')): ?>
        <h5 class="<?php echo $this->session->flashdata('message')['class']; ?>"><strong><?php echo $this->session->flashdata('message')['message']; ?></strong></h5>
    <?php endif; ?>
    <form action="/albums/create" method="post">
        <div class="form-group ">
            <label for="name">Album name</label>
            <input type="text" class="form-control " id="name" name="album" value="<?php echo set_value('album'); ?>" placeholder="Album name">
            <h5 class="text-danger"> <?php echo form_error('album'); ?></h5>
        </div>
        <?php if(isset($artists)): ?>
        <div class="form-group">
            <label for="exampleInputPassword1">Select an artist</label>
            <select class="form-control" name="artist">
                <option value="">Select</option>
                <?php foreach ($artists as $artist): ?>
                    <option value="<?php echo $artist['id']; ?>"><?php echo $artist['name']; ?></option>
                <?php endforeach; ?>
            </select>
            <h5 class="text-danger"> <?php echo form_error('artist');  ?></h5>
        </div>
        <?php endif; ?>
        <button type="submit" class="btn btn-default">Save</button>
    </form>
</div>
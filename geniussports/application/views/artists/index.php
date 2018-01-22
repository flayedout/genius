
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">


    <?php if($this->session->flashdata('message')): ?>
        <h5 class="<?php echo $this->session->flashdata('message')['class']; ?>"><strong><?php echo $this->session->flashdata('message')['message']; ?></strong></h5>
    <?php endif; ?>

    <?php if(count($artists) > 0): ?>
        <h2 class="sub-header">Artists</h2>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Album ID</th>
                    <th>Name</th>

                </tr>
                </thead>
                <tbody>
                <?php foreach ($artists as $artist): ?>
                    <tr>
                        <td><?php echo $artist['id']; ?></td>
                        <td><a href="/artist/<?php echo $artist['id']; ?>"><?php echo $artist['name'] ?></a></td>

                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <h2 class="sub-header">There is no data available.</h2>
    <?php endif; ?>
</div>

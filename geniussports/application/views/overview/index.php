<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <hr>
        <div class="row">
            <div class="col-lg-6">
                <h4>All artists with their count on albums in ascending order</h4>
                <ul>
                    <?php foreach ($artists_albums as $al): ?>
                        <li><?php echo $al->name; ?> - has total albums of - <?php echo $al->total_albums; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="col-lg-6">
                <h4>All artists without any albums</h4>
                <ul>
                    <?php foreach ($artists_without_albums as $artists_without_album): ?>
                        <li><?php echo $artists_without_album->artist; ?> - <?php echo $artists_without_album->total_albums ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
  

</div>

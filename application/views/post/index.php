<h3 onclick="myFunction()"><?= $title?></h3>
<p>An inverted navbar is black instead of gray.</p>
<?php foreach ($post as $p):?>
    <h3><?= $p['title']?></h3>
    <div class="row">
        <div class="col-md-3">
            <img class="img-thumb" src="<?php echo site_url();?>assets/images/posts/<?php echo $p['post_image'];?>">
        </div>
        <div class="col-md-9">
            <small class="post-date">Posted On: <?= $p['created_at']?> in <strong><?= $p['name'];?></strong></small><br/>
            <?= word_limiter($p['body'], 50);?> <!--word limiter for limiting words in paragraphs-->
            <br><br>
            <p><a class="btn btn-default" href="<?php echo site_url('/post/'.$p['slug']);?>">Read More...</a></p>
        </div>
    </div>
<?php endforeach;?>
<div class="pagination-link">
    <?php echo $this->pagination->create_links();;?>
</div>
<script>
function myFunction() {
  alert("<?php echo site_url();?>");
}
</script>

<h1 onclick="myFunction()"><?= $title;?></h1>
<ul class="list-group">
    <?php foreach($categories as $c):?>
        <li class="list-group-item">
            <a href="<?php echo base_url('category/posts/'.$c['id']);?>"><?php echo $c['name'];?></a>
            <?php if($this->session->userdata('user_id') == $c['user_id']):?>
              <form class="cat-delete" action="category/delete/<?php echo $c['id']?>" methog="POST">
                <input type="submit" class="btn-link text-danger" value="[X]">
              </form>
            <?php endif;?>
        </li>
    <?php endforeach;?>
</ul>
<script>
function myFunction() {
  alert("<?php echo site_url() ;?>");
}
</script>
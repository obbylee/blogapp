<h1 onclick="myFunction()"><?php echo $post['title'];?></h1>
<small class="post-date">Posted On: <?php echo $post['created_at'];?></small><br/>
<img class="img-thumb" src="<?php echo site_url() ;?>assets/images/posts/<?php echo $post['post_image'];?>">
<div class="post-body">
    <?php echo $post['body'];?>
</div>
<?php if($this->session->userdata('user_id') == $post['user_id']):?>
  <hr/>
  <a class="btn btn-default pull-left" href="<?= base_url();?>post/edit/<?php echo $post['slug'];?>">Edit</a>
  <?php echo form_open('post/delete/'.$post['id']);?>
      <input type="submit" value="Delete" class="btn btn-danger">
  </form>
<?php endif;?>
<hr>
<h3>Comments</h3>
<?php if($comments):?>
  <?php foreach($comments as $c):?>
    <div class="well">
       <h5><?php echo $c['body'];?> [by <strong><?php echo $c['name'];?></strong>]</h5>
    </div>
  <?php endforeach;?>
<?php else:?>
  <p>No Comment To Display</p>
<?php endif;?>
<hr>
<h3>Add Comment</h3>
<?php echo validation_errors();?>
  <?php echo form_open('comments/create/'.$post['id']);?>
    <div class="form-group">
      <label>Name</label>
      <input type="text" name="name" class="form-control">
    </div>
    <div class="form-group">
      <label>Email</label>
      <input type="email" name="email" class="form-control">
    </div>
    <div class="form-group">
      <label>Body</label>
      <textarea name="cmnt" class="form-control" placeholder = "Your Thoughts . . ."></textarea>
    </div>
    <input type="hidden" name="slug" value="<?php echo $post['slug'];?>">
    <button class="btn btn-primary" type="submit">Submit</button>
  </form>
<script>
function myFunction() {
  alert("<?php echo site_url() ;?>");
}
</script>

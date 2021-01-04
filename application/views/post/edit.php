<h1><?= $title;?></h1>

<?php echo validation_errors();?>
<?php echo form_open('post/update');?>
    <input type="hidden" name="id" value="<?= $post['id'];?>">
    <div class="form-group">
      <label>Title</label>
      <input type="text" class="form-control" name="title" placeholder="Add Title" value="<?= $post['title'];?>">
    </div>
    <div class="form-group">
      <label>Body</label>
      <textarea class="form-control" rows="5" name="body" placeholder="Add Body"><?= $post['body'];?></textarea>
    </div>
    <div class="form-group">
      <label>Body</label>
      <select name='category_id' class="form-control">
      <?php foreach($categories as $c):?>
        <option value="<?php echo $c['id'] ;?>"><?php echo $c['name'] ;?></option>
      <?php endforeach?>
      </select>
    </div>
    <button type="submit" class="btn btn-info">Submit</button>
  </form>
  <script>
   CKEDITOR.replace( 'body' );
  </script>
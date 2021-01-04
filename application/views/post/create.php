<h1><?= $title;?></h1>

<?php echo validation_errors();?>
<?php echo form_open_multipart('post/create');?>
    <div class="form-group">
      <label>Title</label>
      <input type="text" class="form-control" name="title" placeholder="Add Title">
    </div>
    <div class="form-group">
      <label>Body</label>
      <textarea class="form-control" rows="5" name="body" placeholder="Add Body"></textarea>
    </div>
    <div class="form-group">
      <label>Category</label>
      <select name='category_id' class="form-control">
      <?php foreach($categories as $c):?>
        <option value="<?php echo $c['id'] ;?>"><?php echo $c['name'] ;?></option>
      <?php endforeach?>
      </select>
    </div>
    <div class="form-group">
      <label>Upload Image</label>
      <input type="file" name="userfile" size="20">
    </div>
    <button type="submit" class="btn btn-info">Submit</button>
  </form>
        <script>
         CKEDITOR.replace( 'body' );
        </script>
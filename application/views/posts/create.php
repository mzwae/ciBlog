<h2><?php echo $title; ?></h2>
<?php echo validation_errors(); ?>
<?php echo form_open('posts/create');?>
  <div class="form-group">
    <label>Title</label>
    <input type="text" class="form-control" name="title" placeholder="Add title">
  </div>
  <div class="form-group">
    <label>Body</label>
    <textarea rows="10" class="form-control" name="body" placeholder="Add Body"></textarea>
  </div>

  <button type="submit" class="btn btn-default">Post</button>
</form>

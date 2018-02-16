<h2><?php echo $title; ?></h2>
<?php echo validation_errors(); ?>
<?php echo form_open('posts/update');?>
  <div class="form-group">
    <label>Title</label>
    <input type="hidden" name="id" value="<?=$post['id']?>">
    <input type="text" class="form-control" name="title" placeholder="Add title" value="<?=$post['title']?>">
  </div>
  <div class="form-group">
    <label>Body</label>
    <textarea rows="15" class="form-control" name="body" placeholder="Add Body">
      <?=$post['body']?>
    </textarea>
  </div>

  <button type="submit" class="btn btn-default">Update Post</button>
</form>

<h2><?php echo $post['title']; ?></h2>
<small class="post-date">Posted on: <?php echo $post['created_at']; ?> in <strong><?=$post['category_id']?></strong></small> <br>
<div class="cover-container">
  <img class="cover-image" src="<?=site_url()?>assets/images/posts/<?=$post['post_image']?>">
</div>
<div class="post-body">
  <?php echo $post['body']; ?>
</div>

<?php if ($this->session->userdata('user_id') == $post['user_id']): ?>
  <hr>
  <a href="<?=base_url()?>posts/edit/<?=$post['slug']?>" class="btn btn-default pull-left">Edit</a>
  <?php echo form_open('/posts/delete/' . $post['id']); ?>
    <input type="submit" value="Delete" class="btn btn-danger">
  </form>
<?php endif; ?>
<hr>
<h3>Comments</h3>
<?php if ($comments) : ?>
  <?php foreach ($comments as $comment) : ?>
    <div class="well">
      <p><?=$comment['body']?></p>
      <p><small>Added by <b>[<?=$comment['name']?>]</b> on <?=$comment['created_at']?></small></p>
    </div>
  <?php endforeach; ?>
<?php else : ?>
  <p>No Comments To Display</p>
<?php endif; ?>
<hr>
<h3>Add Comment</h3>
<?php echo validation_errors();?>
<?php echo form_open('comments/create/' . $post['id']) ?>
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
    <textarea rows="10" name="body" class="form-control"></textarea>
  </div>
  <input type="hidden" name="slug" value="<?php echo $post['slug'];?>">
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

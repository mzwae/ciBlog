<h2><?php echo $post['title']; ?></h2>
<small class="post-date">Posted on: <?php echo $post['created_at']; ?> in <strong><?= $post['name']?></strong></small> <br>
<img class="cover-image" src="<?=site_url()?>assets/images/posts/<?=$post['post_image']?>">
<div class="post-body">
  <?php echo $post['body']; ?>
</div>

<hr>
<a href="<?=base_url()?>posts/edit/<?=$post['slug']?>" class="btn btn-default pull-left">Edit</a>
<?php echo form_open('/posts/delete/' . $post['id']); ?>
  <input type="submit" value="Delete" class="btn btn-danger">
</form>

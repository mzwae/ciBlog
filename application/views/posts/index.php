<h2><?= $title ?></h2>
<?php foreach($posts as $post) :?>

<h3><?php echo $post['title']; ?></h3>
<div class="row">
  <div class="col-md-3">
    <img class="post-image" src="<?=site_url()?>assets/images/posts/<?=$post['post_image']?>">

  </div>
  <div class="col-md-9">
    <small class="post-date">Posted on: <?=$post['created_at']?> in <strong><?= $post['name']?></strong></small> <br>
    <?php echo word_limiter($post['body'], 50); ?>
  </div>
</div>
<br>
<br>
<p><a class="btn btn-default" href="<?php echo site_url('posts/' . $post['slug']);?>">Read more...</a></p>
<?php endforeach; ?>

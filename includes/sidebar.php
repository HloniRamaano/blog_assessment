
<?php $posts = getPublishedTopPosts(); ?>
<div class="col l4">
	<div class="card">
		<div class="card-header blue">
			<h2>Top Posts</h2>
		</div>
		<div class="card-content">
        <?php foreach ($posts as $post): ?>
            <div class="toppost" style="margin-left: 0px;">            

                <a href="single_post.php?post-slug=<?php echo $post['slug']; ?>">
                    <div class="post_info">
                        <h3><?php echo $post['title'] ?></h3>
                        <div class="info">
                            <span><?php echo date("F j, Y ", strtotime($post["created_at"])); ?></span>
                        </div>
                    </div>
                </a>
                <hr>
            </div>
            
        <?php endforeach ?>
		</div>
	</div>
</div>
<?php require_once('config.php') ?>
<?php require_once( ROOT_PATH . '/includes/public_functions.php') ?>
<?php require_once( ROOT_PATH . '/includes/registration_login.php') ?>

<!-- Retrieve all posts from database  -->
<?php $posts = getPublishedPosts(); ?>

<?php require_once( ROOT_PATH . '/includes/header.php') ?>

<?php
	

?>

	<title>Ramaano Blog | Home </title>
</head>
<body>
	<!-- container -->
	<div class="container">
        <!-- navbar -->
        <?php include('includes/navbar.php') ?>

		<!-- Page content -->
		<div class="content-blog row-padding">
			<hr>

			<div class="col l8">
			
				<?php foreach ($posts as $post): ?>
					<div class="post col l6" style="margin-left: 0px;">
						<img src="<?php echo BASE_URL . '/static/images/' . $post['image']; ?>" class="post_image" alt="">

						<?php if (isset($post['topic']['name'])): ?>
							<a 
								href="<?php echo BASE_URL . 'filtered_posts.php?topic=' . $post['topic']['id'] ?>"
								class="btn category">
								<?php echo $post['topic']['name'] ?>
							</a>
						<?php endif ?>

						<a href="single_post.php?post-slug=<?php echo $post['slug']; ?>">
							<div class="post_info">
								<h3><?php echo $post['title'] ?></h3>
								
								<div class="info">
									<p><?php echo html_entity_decode(substr ($post['body'],0,200))." ... Read More"; ?></p>
									<span><?php echo date("F j, Y ", strtotime($post["created_at"])); ?></span><br/>
									<span class="read_more"><?php echo 'By '.getPostAuthorById($post['user_id']); ?></span>
								</div>
							</div>
						</a>
					</div>
				<?php endforeach ?>
			</div>

			<!-- Right section blogs -->
			<?php include(ROOT_PATH . '/includes/sidebar.php') ?>

			<!-- // right section blogs  -->

		</div>
		<!-- // Page content -->

<!-- footer -->
<?php include('includes/footer.php') ?>


<?php  include('config.php'); ?>
<?php  include('includes/public_functions.php'); ?>
<?php 
	if (isset($_GET['post-slug'])) {
		$post = getPost($_GET['post-slug']);
		$post_id = $post['id'];
	}
	$topics = getAllTopics();

	$query = mysqli_query($conn,"SELECT AVG(rating) as AVGRATE from post_rating where post_id=$post_id");
	$row = mysqli_fetch_array($query);
	$average_rating = $row['AVGRATE'];
	$average_rating = round($average_rating,2);

	if (isset($_POST['rate_btn'])) {
		$rating = 0;
		
		foreach($_POST as $name => $value) {

			if(!empty($value))
			{
				$rating = $value;
				break;
			}
		  }
		  if (isset($_SESSION['user_id']))
		  {
			  $user_id = $_SESSION['user_id'];
		  }
		  else
		  {
			$user_id = 0;
		  }
		  
		  $query = "INSERT INTO post_rating (user_id, post_id, rating) 
		  VALUES('$user_id', '$post_id', '$rating')";
		  mysqli_query($conn, $query);

		  $query = mysqli_query($conn,"SELECT AVG(rating) as AVGRATE from post_rating where post_id=$post_id");
		  $row = mysqli_fetch_array($query);
		  $average_rating = $row['AVGRATE'];
		  $average_rating = round($average_rating,2);
	}
?>
<?php include('includes/header.php'); ?>
<title> <?php echo $post['title'] ?> | Ramaano Blog</title>
</head>
<body>
<div class="container">
	<!-- Navbar -->
		<?php include( ROOT_PATH . '/includes/navbar.php'); ?>
	<!-- // Navbar -->
	
	<div class="content-blog row-padding" >

	
		<div class="post-wrapper">
			
			<div class="full-post-div">
			
			<?php if ($post == false): ?>
				<h2 class="post-title">Sorry... This post has not been published yet</h2>
			<?php else: ?>
				<?php
					$p_id = $post['id'];
					$query = "UPDATE posts SET views = views + 1 WHERE id= $p_id";
					mysqli_query($conn, $query);
				?>
				<h2 class="post-title"><?php echo $post['title']; ?></h2>
				<img src="<?php echo BASE_URL . '/static/images/' . $post['image']; ?>" class="post_image center-image" alt="">
				<div class="post-body-div">
					<?php echo html_entity_decode($post['body']); ?>
				</div>
			<?php endif ?>
			</div>
			<h2>Please rate this article</h2>
			<form method="post" action="single_post.php?post-slug=<?php echo $post['slug']; ?>" >
				<div class="rate">
					<input type="radio" id="star5" name="rate" value="5" />
					<label for="star5" title="text">5 stars</label>
					<input type="radio" id="star4" name="rate" value="4" />
					<label for="star4" title="text">4 stars</label>
					<input type="radio" id="star3" name="rate" value="3" />
					<label for="star3" title="text">3 stars</label>
					<input type="radio" id="star2" name="rate" value="2" />
					<label for="star2" title="text">2 stars</label>
					<input type="radio" id="star1" name="rate" value="1" />
					<label for="star1" title="text">1 star</label>
				</div>
				<button type="submit" class="btn green" name="rate_btn">Submit</button>
				<?php if ($average_rating != 0):?>
				<span>Average rating: <?php echo $average_rating;?></span>
				<?php endif?>
			</form>
		</div>

		
    </div>
</body>

	</div>
</div>
<!-- // content -->

<?php include( ROOT_PATH . '/includes/footer.php'); ?>
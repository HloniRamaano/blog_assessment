<?php $topics = getAllTopics();	?>
<!-- navbar -->
<div class="navbar" >
    <div class="logo_div">
        <a href="index.php"><img src="<?php echo BASE_URL . '/static/images/logo.png'; ?>" class="post_image" alt=""></a>
    </div>
    <div class="flag_div hide-medium">
        <img src="<?php echo BASE_URL . '/static/images/sa_flag.png'; ?>" class="post_image responsive" alt="">
        <span class="text-white responsive"><b><?php echo date('d')." ".date('M')." ".date('Y'); ?></b></span>
        <a href="#" class="fa fa-facebook"></a>
        <a href="#" class="fa fa-twitter"></a>
        <a href="#" class="fa fa-rss"></a>
        <br>
        
    </div>
    
</div>
<div class="navbar navbar-bottom .centered">
    <?php if (empty($topics)): ?>
        <h1>No topics have been created.</h1>
    <?php else: ?>
    <ul>
    <?php foreach ($topics as $key => $topic): ?>
        <li><a href="<?php echo BASE_URL . 'filtered_posts.php?topic=' . $topic['id'] ?>"><?php echo $topic['name']; ?></a></li>
    <?php endforeach ?>

    <li><a href="about.php">About us</a></li>
    <li><a href="contact.php">Contact</a></li>
    <?php if (isset($_SESSION['user'])): ?>
		
        <li><a><span>Welcome <?php echo $_SESSION['user']['username'] ?></span> &nbsp; &nbsp;</a></li>
        <li><a href="<?php echo BASE_URL . 'admin/dashboard.php'; ?>">Dashboard</a></li>
        <li><a href="<?php echo BASE_URL . '/logout.php'; ?>" class="logout-btn">logout</a></li>
        <?php else: ?>
            <li><a href="register.php">Register</a></li>
            <li><a href="login.php">Login</a></li>
	<?php endif ?>
    
    
    
      
    </ul>
    <?php endif ?>
</div>
<!-- // navbar -->
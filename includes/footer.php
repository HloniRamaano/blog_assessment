		<!-- footer -->
		<div class="footer blue">
		<div class="navbar navbar-bottom-footer blue">
			<?php if (empty($topics)): ?>
				<!-- <h1>No topics in the database.</h1> -->
			<?php else: ?>
			<ul>
			<?php foreach ($topics as $key => $topic): ?>
				<li><a href="<?php echo BASE_URL . 'filtered_posts.php?topic=' . $topic['id'] ?>"><?php echo $topic['name']; ?></a></li>
			<?php endforeach ?>

			<li><a href="#about">About us</a></li>
			<li><a href="#contact">Contact</a></li>
			
			</ul>
			<?php endif ?>
		</div>
			<p>Ramaano Blog &copy; <?php echo date('Y'); ?></p>
		</div>
		<!-- // footer -->

	</div>
	<!-- // container -->
</body>
</html>
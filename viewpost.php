<?php 
include_once('config/config.php'); 
include_once('meta.php');
include_once('header.php');
?>

<!-- CONTENT -->
<div class="content-body">
	<div class="container">
		<div class="row">
			<main class="col-md-8">

				<!-- ARTICLE -->
				<article class="post post-1">
					<?php
						$data = $post->show();
						foreach($data as $row){
					?>
					<header class="entry-header">
						<h1 class="entry-title">
							<a href="viewpost.php?id=<?php echo $row['id_post']; ?>">
								<?php echo $row['post_title']; ?>
							</a>
						</h1>
						<div class="entry-meta">
							<!-- <span class="post-category"><a href="#">Web Design</a></span> -->
							<span class="post-date">
								<a href="#"><time class="entry-date">
								<?php echo date('jS M Y H:i:s', strtotime($row['post_date'])); ?></time></a>
							</span>
							<!-- <span class="post-author"><a href="#">Albert Einstein</a></span> -->
							<!-- <span class="comments-link"><a href="#">4 Comments</a></span> -->
						</div>
					</header>
					<div class="entry-content clearfix">
						<p><?php echo $row['post_cont']; ?></p>
					</div>
					<?php } ?>
				</article>
			</main>
<?php
include_once('sidebar.php');
include_once('footer.php')
?>
<?php 
include_once('../config/config.php'); 
include_once('header.php');
include_once('meta.php');
?>

<body>
<?php
	$data = $post->show();
	foreach($data as $row){
?>

<div class="content-body">
	<div class="container">
		<div class="row">
			<article class="post post-1">
				<form action='edit-post-save.php' method='POST'>
					<input type='hidden' name='id_post' value='<?php echo $row['id_post'];?>'>
					<h1 class="entry-title"><label>Title</label>
					<input type='text' name='post_title' class="jqte-test" value='<?php echo $row['post_title'];?>'></h1><br>
					<h1 class="entry-title"><label>Description</label></h1>
					<textarea name='post_descrip' class="jqte-test"><?php echo $row['post_descrip'];?></textarea><br>
					<h1 class="entry-title"><label>Content</label></h1>
					<textarea name='post_cont' class="jqte-test"><?php echo str_replace('"',"'", $row['post_cont'])?></textarea>
					<p><input type='submit' class="btn btn-lg btn-danger" name='submit' value='Update'></p>
				</form>
			</article>
		</div>
	</div>
</div>
<?php } ?>

<script>
	$('.jqte-test').jqte();
	
	// settings of status
	var jqteStatus = true;
	$(".status").click(function()
	{
		jqteStatus = jqteStatus ? false : true;
		$('.jqte-test').jqte({"status" : jqteStatus})
	});
</script>

<?php
include_once('../footer.php')
?>
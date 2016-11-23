<?php 
include_once('../config/config.php'); 
include_once('header.php');
include_once('meta.php');
?>

<body>
<div class="content-body">
	<div class="container">
		<div class="row">
			<article class="post post-1">
				<form action='add-post-save.php' method='POST'>
					<h1 class="entry-title"><label>Title</label>
					<input type='text' name='post_title' class="jqte-test" value=''></h1><br>
					<h1 class="entry-title"><label>Description</label></h1>
					<textarea name='post_descrip' class="jqte-test"></textarea><br>
					<h1 class="entry-title"><label>Content</label></h1>
					<textarea name='post_cont' class="jqte-test"></textarea>
					<p><input type='submit' class="btn btn-lg btn-danger" name='submit' value='Posting'></p>
				</form>
			</article>
		</div>
	</div>
</div>

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
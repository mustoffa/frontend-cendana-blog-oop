<?php 
include_once('../config/config.php');

//if not logged in redirect to login page
if(!$user->is_logged_in()){
	header('Location: login.php'); 
}

$post->delPost();

include_once('header.php');
include_once('meta.php');
?>

<body>
<script language="JavaScript" type="text/javascript">
	function delpost(id, title){
		if (confirm("Are you sure you want to delete '" + title + "'")){
		window.location.href = 'index.php?delpost=' + id;
	 	}
	}
</script>

<?php 	
$data = $post->showAll(); 
?>

<div class="content-body">
	<div class="container">
		<div class="row">
			<article class="post post-1">
				<table class="table">
					<tr class="alert-danger">
						<th>Title</th>
						<th>Date</th>
						<th>Action</th>
					</tr>
					<?php foreach($data as $row){ ?>
					<tr>
						<td><?php echo $row['post_title']; ?></td>
						<td><?php echo date('jS M Y H:i:s', strtotime($row['post_date'])); ?></td>
						<td>
							<a href="edit-post.php?id=<?php echo $row['id_post'];?>">Edit</a> | 
							<a href="javascript:delpost('<?php echo $row['id_post'];?>','<?php echo $row['post_title'];?>')">Delete</a>
						</td>
					</tr>
					<?php } ?>
				</table>
			</article>
		</div>
	</div>
</div>

<?php
include_once('../footer.php')
?>
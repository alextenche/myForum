<?php include('includes/header.php'); ?>

<ul id="topics">
	<li id="main-topic" class="topic topic">
		<div class="row">
			<div class="col-md-2">
				<div class="user-info">
					<img class="avatar pull-left" src="<?php echo BASE_URI;?>images/avatars/<?php echo $topic->avatar; ?>"/>
					<ul>
						<li><strong><?php echo $topic->username; ?></strong></li>
						<li><?php echo userPostCount($topic->user_id);?> Posts</li>
						<li><a href="<?php echo BASE_URI;?>topics.php?user=<?php echo $topic->user_id; ?>">View Topics</a></li>
					</ul>
				</div>
			</div>
			<div class="col-md-10">
				<div class="topic-content pull-right">
					<p><?php echo $topic->body; ?></p>
				</div>
			</div>
		</div>
	</li>
			
	<?php foreach($replies as $reply) : ?>
	<li class="topic topic">
		<div class="row">
			<div class="col-md-2">
				<div class="user-info">
					<img class="avatar pull-left" src="<?php echo BASE_URI;?>images/avatars/<?php echo $reply->avatar; ?>"/>
					<ul>
						<li><strong><?php echo $reply->username; ?></strong></li>
						<li><?php echo userPostCount($reply->user_id);?> Posts</li>
						<li><a href="<?php echo BASE_URI;?>topics.php?user=<?php echo $reply->user_id; ?>">View Topics</a></li>
					</ul>
				</div>
			</div>
			<div class="col-md-10">
				<div class="topic-content pull-right">
					<p><?php echo $reply->body; ?></p>
				</div>
			</div>
		</div>
	</li>
	<?php endforeach ; ?>
							
	
							
</ul>
						
<h3>Reply To Topic</h3>
<form role="form">
	<div class="form-group">
		<textarea id="reply" rows="10" col="80" class="form-control" name="rely"></textarea>
			<script> CKEDITOR.replace('reply');</script>
	</div>
	<button type="submit" class="btn btn-default">Submit</button>
</form>

<?php include('includes/footer.php'); ?>
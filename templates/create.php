<?php include('includes/header.php'); ?>

<form role="form">
	<div class="form-group">
		<label>Topic Title</label>
		<input type="text" class="form-control" name="title" placeholder="Enter Post Title">
	</div>
	<div class="form-group">
		<label>Category</label>
		<select class="form-control">
			<option>Design</option>
			<option>Developement</option>
			<option>Business & Marketing</option>
			<option>Search Engines</option>
			<option>Cloud & Hosting</option>
		</select>
	</div>
	<div class="form-group">
		<label>Topic Body</label>
		<textarea id="body" rows="10" cols="80" class="form-control" name="body"></textarea>
		<script>CKEDITOR.replace('body');</script>
	</div>
	<button type="submit" class="btn btn-default">Submit</button>
</form>
						
						
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="sidebar">
					<div class="block">
						<h3>Login Form</h3>
						<form role="form">
						
							<div class="form-group">
								<label>Username</label>
								<input name="username "type="text" class="form-control" placeholder="Enter Username">
							</div>
							
							<div class="form-group">
								<label>Password</label>
								<input name="password" type="password" class="form-control" placeholder="Enter Password">
							</div>
							<button name="do_login" type="submit" class="btn btn_primary">Login</button>
							<a class="btn btn_default" href="register.html">Create Account</a>
							
						</form>

<?php include('includes/footer.php'); ?>
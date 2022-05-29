<div class="container">
	<h2>Login to Your Account</h2>

	<!-- Status message -->
	<?php
	if(!empty($success_msg)){
		echo '<p class="status-msg success">'.$success_msg.'</p>';
	}elseif(!empty($error_msg)){
		echo '<p class="status-msg error">'.$error_msg.'</p>';
	}
	?>

	<!-- Login form -->
	<div class="regisFrm">
		<form action="" method="post">
			<div class="form-group">
				<input type="email" name="email" placeholder="EMAIL" required="">
				<?php echo form_error('email','<p class="help-block">','</p>'); ?>
			</div>
			<div class="form-group">
				<input type="password" name="password" placeholder="PASSWORD" required="">
				<?php echo form_error('password','<p class="help-block">','</p>'); ?>
			</div>
			<div class="send-button">
				<input type="submit" name="loginSubmit" value="LOGIN">
			</div>
		</form>
		<p>Don't have an account? <a href="<?php echo base_url('users/register'); ?>">Register</a></p>
	</div>
</div>

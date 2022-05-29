<div class="container">
	<?php
	if (!file_exists('./uploads/' . $this->session->userdata('userId'))) {
			mkdir('./uploads/' . $this->session->userdata('userId'), 0777);
		}
	?>
	<h2>Welcome <?php echo $user['first_name']; ?>!</h2>
	<a href="<?php echo base_url('users/logout'); ?>" class="logout">Logout</a>
	<?php
	$path = './uploads/' . $this->session->userdata('userId');
	$latest_ctime = 0;
	$latest_filename = '';
	$d = dir($path);
	while (false !== ($entry = $d->read())) {
		$filepath = "{$path}/{$entry}";
		if (is_file($filepath) && filectime($filepath) > $latest_ctime) {
			$latest_ctime = filectime($filepath);
			$latest_filename = $entry;
		}
	}
	?>
	<div class="regisFrm">
		<p><b>Name: </b><?php echo $user['first_name'].' '.$user['last_name']; ?></p>
		<p><b>Email: </b><?php echo $user['email']; ?></p>
		<p><b>Phone: </b><?php echo $user['phone']; ?></p>
		<p><b>Gender: </b><?php echo $user['gender']; ?></p>
		<p><b>Latest Uploaded File: </b><a href="<?php echo FCPATH . 'uploads/' . $this->session->userdata('userId') . '/' . $latest_filename?>"><?php echo $latest_filename; ?></a></p>
	</div>
	<?php $this->load->view('upload', array('error' => ' ' )); ?>
	<p><b>gif|jpg|png|JPG|GIF|PNG|jpeg|JPEG accepted.</b></p>
</div>

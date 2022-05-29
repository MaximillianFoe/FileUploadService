<?php

class Upload extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('user');

		$this->isUserLoggedIn = $this->session->userdata('isUserLoggedIn');
	}

	public function index()
	{
		if($this->isUserLoggedIn){
			redirect('users/account');
		}else{
			redirect('users/login');
		}
	}

	public function do_upload(){
		$config['upload_path']          = './uploads/' . $this->session->userdata('userId');
		$config['allowed_types']        = 'gif|jpg|png|JPG|GIF|PNG|jpeg|JPEG';
		$config['max_size']             = 1024;
		$config['max_width']            = 1920;
		$config['max_height']           = 1080;
		$config['remove_spaces']		= true;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('userfile'))
		{
			$error = array('error' => $this->upload->display_errors());

			$this->load->view('upload', $error);
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());

			$this->load->view('uploadDone', $data);
		}
	}
}
?>

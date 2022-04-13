<?php

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (isset($this->session->user))
			redirect('admin');
	}



	/**
	 * Method untuk login, dan autentikasi user dari database
	 * 
	 * @param REQUEST email
	 * @param REQUEST password
	 * 
	 * @return void
	 */
	function index()
	{
		$data = array('title' => 'Login');

		$this->load->view('auth/template/head', $data);
		$this->load->view('auth/login');
		$this->load->view('auth/template/footer');
	}
}

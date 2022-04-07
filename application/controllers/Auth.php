<?php

class Auth extends CI_Controller {

	function login() {
		// Login
		$this->load->view('auth/template/head');
		$this->load->view('auth/login');
		$this->load->view('auth/template/footer');
	}

	public function register() {
		// Register
		$this->load->view('auth/template/head');
		$this->load->view('auth/register');
		$this->load->view('auth/template/footer');
	}
}

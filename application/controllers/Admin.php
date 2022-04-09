<?php

class Admin extends CI_Controller {

	function index() {
		// Dashboard
		$this->load->view('admin/template/head');
		$this->load->view('admin/index');
		$this->load->view('admin/template/foot');
		
	}
}

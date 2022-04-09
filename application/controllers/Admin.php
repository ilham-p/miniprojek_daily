<?php

class Admin extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
	}

	function index() {
		// Dashboard
		// $this->load->view('admin/template/head');
		// $this->load->view('admin/index');
		// $this->load->view('admin/template/foot');
		print_r($this->Laporan->count_laporan(2,2));
		
	}
}

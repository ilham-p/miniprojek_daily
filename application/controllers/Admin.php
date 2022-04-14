<?php

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if(!isset($this->session->user))
			redirect('login');
	}
	

	function index()
	{
		// Dashboard

		$data = array(
			'report_valid' => $this->Laporan->count_laporan(2),
			'report_reject' => $this->Laporan->count_laporan(3),
			'report_delay' => $this->Laporan->count_laporan(1),
			'jabatan' => $this->Jabatan->get_jabatan(),
			'jobdesk' => $this->Jobdesk->get_jobdesk(),
		);

		// echo print_r($this->API->laporan_ranged());
		$this->x_view($this->session->user['jabatan'], $data);
		// $this->load->view('admin/template/export', $data);
	}

	public function x_view($jabatan, $data)
	{
		switch ($jabatan) {
			case 1:
				$this->load->view('admin/template/head');
				$this->load->view('admin/pimpinan', $data);
				$this->load->view('admin/template/plugins');
				$this->load->view('admin/template/script_admin');
				$this->load->view('admin/template/foot');
				break;
			case 2:
				$this->load->view('admin/template/head');
				$this->load->view('admin/spmi', $data);
				$this->load->view('admin/template/plugins');
				$this->load->view('admin/template/script_spmi');
				$this->load->view('admin/template/foot');
				break;
			case 3:
				$this->load->view('admin/template/head');
				$this->load->view('admin/karyawan', $data);
				$this->load->view('admin/template/plugins');
				$this->load->view('admin/template/script_karyawan');
				$this->load->view('admin/template/foot');
				break;
		}
	}	
}

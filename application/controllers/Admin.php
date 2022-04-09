<?php

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
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

		// var_dump($this->stats_chart());
		$this->load->view('admin/template/head');
		$this->load->view('admin/index', $data);
		$this->load->view('admin/template/foot');
	}

	public function laporan()
	{
		// ["20/04/2022", "Menulis Karya Ilmiah", "Jhon Doe", "Diterima"]
		$res = $this->Laporan->get_laporan();
		$data = array();
		foreach ($res as $r) {
			array_push($data, array(date('d/m/Y', strtotime($r->tanggalposting)), $r->kegiatan, $r->nama, $r->status));
		}
		echo json_encode($data);
	}

	public function stats_chart($status = null)
	{
		$res = $this->Laporan->count_laporan_bulanan();
		$data = array();
		foreach ($res as $r) {
			array_push(
				$data,
				array(
					'x' => date('Y-m-d',strtotime($r->tanggalposting)),
					'y' => $data['y'] += $r->data
				)
			);
		}

		echo json_encode($data);
	}
}

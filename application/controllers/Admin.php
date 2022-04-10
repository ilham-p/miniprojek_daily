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

		// echo print_r($this->Jabatan->get_jabatan_desk(1));
		$this->x_view($this->session->user['jabatan'], $data);

	}

	public function laporan()
	{
		// ["20/04/2022", "Menulis Karya Ilmiah", "Jhon Doe", "Diterima"]
		$res = $this->Laporan->get_laporan();
		$data = array("data" => array());
		foreach ($res as $r) {
			array_push($data['data'], array(date('d/m/Y', strtotime($r->tanggalposting)), $r->kegiatan, $r->nama, $r->status));
		}
		echo json_encode($data);
	}

	public function karyawan()
	{
		// ["20/04/2022", "Menulis Karya Ilmiah", "Jhon Doe", "Diterima"]
		$res = $this->Karyawan->get_karyawan();
		$data = array("data" => array());
		foreach ($res as $r) {
			array_push($data['data'], array($r->code, $r->nama, $r->email, $r->namajabatan, $r->namajobdesk));
		}
		echo json_encode($data);
	}

	public function stats_chart($status = null)
	{
		$res = $this->Laporan->count_laporan_bulanan($status);
		$loop = 0;
		$data = array();
		foreach ($res as $r) {
			array_push(
				$data,
				array(
					'x' => date('Y-m-d', strtotime($r->tanggalposting)),
					'y' => $r->data
				)
			);
		}

		echo json_encode($data);
	}

	public function x_view($jabatan, $data)
	{
		switch ($jabatan) {
			case 1:
				$this->load->view('admin/template/head');
				$this->load->view('admin/pimpinan', $data);
				$this->load->view('admin/template/foot');
				break;
			case 2:
				break;
			case 3:
				break;
		}
	}

	public function jabatan_jobdesk($id = null)
	{

		if ($id) {
			$res = $this->Jabatan->get_jabatan_desk($id);
			$data = array();
			foreach ($res as $r) {
				array_push($data, array($r->kodejobdesk, $r->namajobdesk, $r->keterangan));
			}
			echo json_encode($res);
		}
	}

	public function karyawan_submit()
	{
		$pass = hash('md5', 'daily123');
		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			$data = array(
				'nama' => $this->input->post('nama'),
				'email' => $this->input->post('email'),
				'password' => $pass,
				'code' => $this->Karyawan->algo($this->input->post('nama')),
				'jabatan' => $this->input->post('jabatan'),
				'jobdesk' => $this->input->post('jobdesk'),
				'bio' => $this->input->post('bio')
			);
			$this->Karyawan->add_karyawan($data);
			
			return array(
				'status' => 200
			);
		}
	}
}

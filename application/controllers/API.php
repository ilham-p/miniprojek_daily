<?php

class API extends CI_Controller
{

	public function login()
	{
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$e = $this->input->post('email');
		$p = hash('md5', $this->input->post('password'));
		$query = $this->db->get_where('karyawan', array('email' => $e, 'password' => $p));

		if ($query->num_rows() == 1) {
			/**
			 * 1. Buat Session
			 * 2. Redirect ke Admin
			 */
			$data = $query->row();

			$arr = array(
				'user' => array(
					'id' => $data->id,
					'code' => $data->code,
					'nama' => $data->nama,
					'email' => $data->email,
					'jabatan' => $data->jabatan,
					// 'jobdesk' => array() // Masih eksperimen
				)
			);
			$this->session->set_userdata($arr);
			http_response_code(200);
			echo json_encode(array("status" => true, 'message' => "Selamat! Anda Berhasil Masuk. Silahkan tunggu sebentar.", 'data' => $arr));
		} else {
			if ($this->form_validation->run() == FALSE) {
				http_response_code(200);
				echo json_encode(array("status" => false, 'message' => $this->form_validation->error_array()));
			} else {
				http_response_code(200);
				echo json_encode(array("status" => false, 'message' => "Username tidak ditemukan atau Password Salah."));
			}
		}
	}

	public function laporan_all()
	{
		// ["20/04/2022", "Menulis Karya Ilmiah", "Jhon Doe", "Diterima"]
		$res = $this->Laporan->get_laporan();
		$data = array("data" => array());
		foreach ($res as $r) {
			array_push($data['data'], array(date('d/m/Y', strtotime($r->tanggalposting)), $r->kegiatan, $r->nama, $r->status));
		}
		echo json_encode($data);
	}

	public function chart_activity($status = null)
	{
		$res = $this->Laporan->count_laporan_bulanan($status);
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
		if ($_SERVER['REQUEST_METHOD'] == "POST") {
			$data = array(
				'nama' => $this->input->post('nama'),
				'email' => $this->input->post('email'),
				'password' => $pass,
				'code' => $this->Karyawan->algo($this->input->post('nama')),
				'jabatan' => $this->input->post('jabatan'),
				// 'jobdesk' => $this->input->post('jobdesk'),
				'bio' => $this->input->post('bio')
			);

			$this->Karyawan->add_karyawan($data);

			return array(
				'status' => 200
			);
		}
	}

	public function karyawan()
	{
		// ["20/04/2022", "Menulis Karya Ilmiah", "Jhon Doe", "Diterima"]
		$res = $this->Karyawan->get_karyawan();
		$data = array("data" => array());
		foreach ($res as $r) {
			array_push($data['data'], array($r->code, $r->nama, $r->email, $r->namajabatan));
		}
		echo json_encode($data);
	}

	public function laporan_masuk($status)
	{
		// ["20/04/2022", "Menulis Karya Ilmiah", "Jhon Doe", "Diterima"]
		$res = $this->Laporan->get_laporan($status);
		$data = array("data" => array());
		foreach ($res as $r) {
			array_push($data['data'], array(date('d/m/Y', strtotime($r->tanggalposting)), $r->kegiatan, $r->deskripsi, $r->nama, $r->kodelaporan));
		}
		echo json_encode($data);
		// return $data;
	}

	public function laporan_acc($mode)
	{
		$id = $this->input->post('id');
		switch ($mode) {
			case 'accept':
				$this->Laporan->update_laporan($mode, $id);
				break;
			case 'reject':
				$this->Laporan->update_laporan($mode, $id);
				break;
		}
	}

	public function input_laporan_karyawan()
	{

		$data = array(
			'tanggalposting' => $this->input->post('tglKegiatan'),
			'kegiatan' => $this->input->post('namaKegiatan'),
			'deskripsi' => $this->input->post('detailKegiatan'),
			'pelapor' => $this->session->user['id'],
			'kodejobdesk' => (int)$this->input->post('jobdeskKegiatan'),
			'status' => 1,
			'kodelaporan' => $this->Laporan->kodelaporan()
		);
		$res = $this->Laporan->input_laporan($data);
		echo json_encode(var_dump($res));
		
	}

	public function laporan_karyawan($id = null)
	{

		$res = $this->Laporan->get_laporan_karyawan($id);
		$data = array("data" => array());
		foreach ($res as $r) {
			array_push($data['data'], array(date('d/m/Y', strtotime($r->tanggalposting)), $r->kegiatan, $r->status));
		}
		echo json_encode($data);
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('/');
	}
}

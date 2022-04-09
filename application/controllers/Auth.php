<?php

class Auth extends CI_Controller
{
	public function karyawan_algo($value)
	{
		$id = 'FUCK';
		$range = rand(1, 6);
		$domain = substr(hash('md5', $id), 6, 3);
		$unique = substr(hash('md5', $value), $range = rand(1, 6), 2);
		return strtoupper($domain . $unique);
	}

	/**
	 * Method untuk login, dan autentikasi user dari database
	 * 
	 * @param REQUEST email
	 * @param REQUEST password
	 * 
	 * @return void
	 */
	function login()
	{
		$data = array('title' => 'Login');
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
						'nama' => $data->nama,
						'email' => $data->email,
						'code' => $data->code,
						'jabatan' => $data->jabatan,
						'jobdesk' => $data->jobdesk
					)
				);
				$this->session->set_userdata($arr);

				redirect('admin');
			} else {
				$this->load->view('auth/template/head', $data);
				$this->load->view('auth/login');
				$this->load->view('auth/template/footer');
			}
		} else {
			$this->load->view('auth/template/head', $data);
			$this->load->view('auth/login');
			$this->load->view('auth/template/footer');
		}
	}


	public function logout()
	{
		$this->session->sess_destroy();
		redirect('/');
	}
}

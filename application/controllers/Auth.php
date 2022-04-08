<?php

class Auth extends CI_Controller
{
	public function karyawan_algo($value)
	{
		$id = 'FUCK';
		$range = rand(1,6);
		$domain = substr(hash('md5', $id), 6, 3);
		$unique = substr(hash('md5', $value), $range = rand(1,6), 2);
		return strtoupper($domain.$unique);
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
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$e = $this->input->post('email');
			$p = hash('md5', $this->input->post('password'));

			$query = $this->db->get_where('karyawan', array('email' => $e, 'password' => $p));

			if($query->num_rows() == 1)
			{
				// Kalo berhasil
				echo 'berhasil';
			} else {
				echo 'gagal';
			}
		} else {
			$this->load->view('auth/template/head');
			$this->load->view('auth/login');
			$this->load->view('auth/template/footer');
		}
	}

	public function register()
	{
		// Register
		$this->load->view('auth/template/head');
		$this->load->view('auth/register');
		$this->load->view('auth/template/footer');
	}
}

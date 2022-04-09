<?php

class Jabatan extends CI_Model {

	/**
	 * Mengambil data jabatan dari tabel
	 * 
	 * @return object jabatan
	 */
	public function get_jabatan() {
		return $this->db->get('jabatan')->result();
	}
}

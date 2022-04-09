<?php

class Jobdesk extends CI_Model {

	/**
	 * Mengambil data jobdesk dari tabel
	 * 
	 * @return object jobdesk
	 */
	public function get_jobdesk() {
		return $this->db->get('jobdesk')->result();
	}
}

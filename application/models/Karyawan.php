<?php

class Karyawan extends CI_Model {

	/**
	 * Fungsi untuk mengambil data karyawan beserta jabatan dan jobdesknya
	 * 
	 * @return Object karyawan
	 * 
	 */
	public function get_karyawan() {
		// SELECT `karyawan`.`code`, `karyawan`.`nama`,`karyawan`.`email`, `jabatan`.`namajabatan`,`jobdesk`.`namajobdesk` FROM ((`karyawan` INNER JOIN `jabatan` ON `karyawan`.`jabatan` = `jabatan`.`kodejabatan`) INNER JOIN `jobdesk` ON `karyawan`.`jobdesk` = `jobdesk`.`kodejobdesk`);
		$this->db->query("SELECT karyawan.code, karyawan.nama,karyawan.email, jabatan.namajabatan,jobdesk.namajobdesk FROM ((karyawan INNER JOIN jabatan ON karyawan.jabatan = jabatan.kodejabatan) INNER JOIN jobdesk ON karyawan.jobdesk = jobdesk.kodejobdesk)");
		// $this->db->select("karyawan.code, karyawan.nama,karyawan.email, jabatan.namajabatan,jobdesk.namajobdesk");
		// $this->db->join("jabatan", "karyawan.jabatan=jabatan.kodejabatan", 'inner');
		// $this->db->join("jobdesk", "karyawan.jobdesk=jobdesk.kodejobdesk", 'inner');
		$data = $this->db->query("SELECT karyawan.code, karyawan.nama,karyawan.email, jabatan.namajabatan,jobdesk.namajobdesk FROM ((karyawan INNER JOIN jabatan ON karyawan.jabatan = jabatan.kodejabatan) INNER JOIN jobdesk ON karyawan.jobdesk = jobdesk.kodejobdesk)");
		return $data->result();
	}
	
}

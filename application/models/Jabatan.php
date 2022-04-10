<?php

class Jabatan extends CI_Model
{

	/**
	 * Mengambil data jabatan dari tabel
	 * 
	 * @return object jabatan
	 */
	public function get_jabatan()
	{
		return $this->db->get('jabatan')->result();
	}

	public function get_jabatan_desk($jabatan = null)
	{
		/* Query Prototype
			SELECT
				`jobdesk`.`kodejobdesk`,
				`jobdesk`.`namajobdesk`,
				`jobdesk`.`keterangan`
			FROM `jobdesk`
				JOIN `jabatan_jobdesk` ON `jobdesk`.`kodejobdesk` = `jabatan_jobdesk`.`kodejobdesk`
				JOIN `jabatan` ON `jabatan`.`kodejabatan` = `jabatan_jobdesk`.`kodejabatan`
			WHERE `jabatan`.`kodejabatan` = 1
		*/

		$query = '';
		if($jabatan)
			$query = $this->db->query("SELECT jobdesk.kodejobdesk,jobdesk.namajobdesk,jobdesk.keterangan FROM jobdesk JOIN jabatan_jobdesk ON jobdesk.kodejobdesk = jabatan_jobdesk.kodejobdesk JOIN jabatan ON jabatan.kodejabatan = jabatan_jobdesk.kodejabatan WHERE jabatan.kodejabatan = $jabatan");
		else
			$query = $this->db->query("SELECT jobdesk.kodejobdesk,jobdesk.namajobdesk,jobdesk.keterangan FROM jobdesk JOIN jabatan_jobdesk ON jobdesk.kodejobdesk = jabatan_jobdesk.kodejobdesk JOIN jabatan ON jabatan.kodejabatan = jabatan_jobdesk.kodejabatan WHERE jabatan.kodejabatan != 1");

		return $query->result();
	}
}

<?php

class Laporan extends CI_Model
{

	public function kodelaporan()
	{
		return hash('md5', strtotime(date('Y-m-d h:i:s')));
	}
	public function input_laporan(array $data)
	{
		$this->db->insert('laporan', $data);
	}
	/**
	 * Ambil semua data laporan berdasar parameter status,
	 * Jika status bernilai null maka akan menghitung seluruh data.
	 * 
	 * @param integer $status null
	 * @param integer $pelapor null
	 * 
	 * @return object laporan
	 */
	public function get_laporan($status = null, $pelapor = null)
	{
		$awal = date("Y/m/d", strtotime("last day of previous month"));
		$akhir = date("Y/m/d", strtotime("first day of next month"));
		if ($status) {
			if ($pelapor) {
				return $this->db->join('karyawan', 'karyawan.id = laporan.pelapor')->get_where('laporan', array('status' => $status, 'pelapor' => $pelapor))->result();
			}
			return $this->db->join('karyawan', 'karyawan.id = laporan.pelapor')->get_where('laporan', array('status' => $status))->result();
		}

		return $this->db->join('karyawan', 'karyawan.id = laporan.pelapor')->where("tanggalposting BETWEEN '{$awal}' AND '{$akhir}'")->get('laporan')->result();
	}


	public function get_laporan_karyawan($pelapor = null, $status = null)
	{

		if ($pelapor) {
			return $this->db->join('karyawan', 'karyawan.id = laporan.pelapor')->get_where('laporan', array('pelapor' => $pelapor))->result();
		} else {
			return $this->db->join('karyawan', 'karyawan.id = laporan.pelapor')->get_where('laporan', array('status' => $status, 'pelapor' => $pelapor))->result();
		}
	}



	public function count_laporan_bulanan($status = null)
	{
		$awal = date("Y/m/d", strtotime("last day of previous month"));
		$akhir = date("Y/m/d", strtotime("first day of next month"));

		if ($status) {
			return $this->db->select('COUNT(*) AS data, tanggalposting')->join('karyawan', 'karyawan.id = laporan.pelapor')->where("status = {$status} AND tanggalposting BETWEEN '{$awal}' AND '{$akhir}'")->group_by('DATE(laporan.tanggalposting)')->get('laporan')->result();
		}
		return $this->db->select('COUNT(*) AS data, tanggalposting')->join('karyawan', 'karyawan.id = laporan.pelapor')->where("tanggalposting BETWEEN '{$awal}' AND '{$akhir}'")->group_by('DATE(laporan.tanggalposting)')->get('laporan')->result();
	}

	/**
	 * Menghitung jumlah laporan berdarasarkan status dan karyawan
	 * Jika status bernilai null maka akan menghitung seluruh data
	 * 
	 * @param integer $status null
	 * @param integer $pelapor null
	 * 
	 * @return number jumlah_laporan
	 */
	public function count_laporan($status = null, $pelapor = null)
	{
		if ($status) {
			if ($pelapor) {
				return $this->db->get_where('laporan', array('status' => $status, 'pelapor' => $pelapor))->num_rows();
			} else {
				return $this->db->get_where('laporan', array('status' => $status))->num_rows();
			}
		}
		return $this->db->get('laporan')->num_rows();
	}


	/**
	 * Menghitung jumlah laporan berdasar jabatan
	 * 
	 * @param integer $jabatan require
	 * 
	 * @return number jumlah_laporan
	 */
	public function count_laporan_jabatan($jabatan = null)
	{
		if ($jabatan) {
			// SELECT * FROM `laporan` LEFT JOIN `karyawan` ON `karyawan`.`id` = `laporan`.`pelapor` WHERE `karyawan`.`jabatan` = 1;
			$this->db->select('*');
			$this->db->from('laporan');
			$this->db->join('karyawan', "laporan.pelapor = karyawan.id", 'left');
			$this->db->where("karyawan.jabatan = $jabatan");
			return $this->db->get()->num_rows();
		}
		return null;
	}

	public function update_laporan($mode, $id)
	{
		$this->db->where('kodelaporan', $id);
		switch ($mode) {
			case 'accept':
				$this->db->set('status', 2);
				$this->db->update('laporan');
				break;
			case 'reject':
				$this->db->set('status', 3);
				$this->db->update('laporan');
				break;
		}
	}

	public function get_laporan_ranged($status = null, $range = [])
	{
		// return $this->db->get('laporan')->result();
		$this->db->select('laporan.kegiatan, laporan.deskripsi, karyawan.nama, laporan.status');
		$this->db->join('karyawan', 'karyawan.id=laporan.pelapor');

		if ($range) {
			if ($status) {
				// Status terdapat value ambil sesuai status
				$this->db->where('laporan.status', $status);
				$this->db->where('laporan.tanggalposting>=', $range[0]);
				$this->db->where('laporan.tanggalposting<=', $range[1]);
				return $this->db->get('laporan')->result();
			} else {

				$this->db->where('laporan.tanggalposting>=', $range[0]);
				$this->db->where('laporan.tanggalposting<=', $range[1]);
				return $this->db->get('laporan')->result();
			}

		} else {
			if ($status) {
				// Status terdapat value ambil sesuai status
				$this->db->where('laporan.status', $status);
				$this->db->where('laporan.tanggalposting', date('Y-m-d'));
				return $this->db->get('laporan')->result();
			} else {

				$this->db->where('laporan.tanggalposting', date('Y-m-d'));
				return $this->db->get('laporan')->result();
			}
		}
	}
}

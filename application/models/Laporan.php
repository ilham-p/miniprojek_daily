<?php

class Laporan extends CI_Model
{
	public function input_laporan(array $data = [])
	{
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
		}
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
		if ($status) {
			if ($pelapor) {
				return $this->db->get_where('laporan', array('status' => $status))->result();
			} else {
				return $this->db->get_where('laporan', array('status' => $status, 'pelapor' => $pelapor))->result();
			}
		}
		$tg_akhir = days_in_month(date('m'), date('Y'));
		$bulan = date('m');
		$tahun = date('Y');
		return $this->db->join('karyawan', 'karyawan.id = laporan.pelapor')->where("tanggalposting BETWEEN '{$tahun}/{$bulan}/1' AND '{$tahun}/{$bulan}/{$tg_akhir}'")->get('laporan')->result();
	}

	public function count_laporan_bulanan($status = null)
	{
		$tg_akhir = days_in_month(date('m'), date('Y'));
		$bulan = date('m');
		$tahun = date('Y');
		if ($status) {
			return $this->db->select('COUNT(*) AS data, tanggalposting')->join('karyawan', 'karyawan.id = laporan.pelapor')->where("status = {$status} AND tanggalposting BETWEEN '{$tahun}/{$bulan}/1' AND '{$tahun}/{$bulan}/{$tg_akhir}'")->group_by('DATE(laporan.tanggalposting)')->get('laporan')->result();
		}
		return $this->db->select('COUNT(*) AS data, tanggalposting')->join('karyawan', 'karyawan.id = laporan.pelapor')->where("tanggalposting BETWEEN '{$tahun}/{$bulan}/1' AND '{$tahun}/{$bulan}/{$tg_akhir}'")->group_by('DATE(laporan.tanggalposting)')->get('laporan')->result();
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
}

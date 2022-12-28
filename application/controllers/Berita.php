<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berita extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data = [
			'page_title' => 'Berita',
			'parent_title' => ''
		];
		$this->_assets();
		$this->render($data);
	}

	public function add_berita()
	{
		$data = [
			'page_title' => 'Add berita',
			'parent_title' => ''
		];

		$this->_assets();
		$this->render($data, 'berita/add_berita');
	}

	public function edit_berita()
	{
		$query = $this->db->query("SELECT * FROM berita where berita_id = '" . $_POST['berita_id'] . "'");
		$row_data = [];
		foreach ($query->result() as $row) {
			$row_data['berita_id'] = $row->berita_id;
			$row_data['judul_berita'] = $row->judul_berita;
			$row_data['isi_berita'] = $row->isi_berita;
			$row_data['kategori_id'] = $row->kategori_id;
		}

		$data = [
			'page_title' => 'Edit berita',
			'parent_title' => '',
			'row_data' => $row_data
		];

		$this->_assets();
		$this->render($data, 'berita/edit_berita');
	}

	public function list_data()
	{
		$response = [];
		$draw = isset($_GET['draw']) ? intval($_GET['draw']) : 1;
		$length = isset($_GET['length']) ? intval($_GET['length']) : 100000;
		$orders = isset($_GET['order']) ? $_GET['order'] : array();
		$start = isset($_GET['start']) ? intval($_GET['start']) : 0;
		$search = isset($_GET['search']['value']) ? $_GET['search']['value'] : '';

		$total = 0;
		$query = $this->db->query("SELECT COUNT(*) as total FROM berita");
		$row = $query->row();
		if (isset($row)) $total = $row->total;

		$total_filter = $total;
		$data = array();
		$qs = $this->db->query("SELECT * FROM berita LIMIT $start, $length");
		$no = 1;
		foreach ($qs->result_array() as $row) {
			$data[] = array(
				$row['berita_id'],
				$row['judul_berita'],
				$row['kategori_id'],
				'<a class="btn btn-sm btn-info" href="#" onclick="edit_berita('."'".$row['berita_id']."'".')">edit</a> <a class="btn btn-sm btn-danger" href="#" onclick="delete_berita('."'".$row['berita_id']."'".')">delete</a>'
			);
			$no++;
		}
		$response = [
			'data' => $data,
			'draw' => $draw,
			'length' => $length,
			'recordsTotal' => $total,
			'recordsFiltered' => $total_filter
		];

		$this->render_json($response);
	}

	public function proses_add_berita()
	{
		if (count($_POST)) {
			$judul_berita = isset($_POST['judul_berita']) ? trim(str_replace("'","''",$_POST['judul_berita'])) : '';
			$isi_berita = isset($_POST['isi_berita']) ? trim(str_replace("'","''",$_POST['isi_berita'])) : '';
			$kategori_id = isset($_POST['kategori_id']) ? trim($_POST['kategori_id']) : '';

			$data = array(
				'berita_id' => $this->randomHEX(3),
				'judul_berita' => $judul_berita,
				'isi_berita' => $isi_berita,
				'kategori_id' => $kategori_id
			);

			$sql = "INSERT INTO berita (" . implode(',', array_keys($data)) . ") VALUES ('" . implode("','", array_values($data)) . "')";
			$stmt = $this->db->query($sql);
			if ($stmt) {
				echo "Add berita success";
			} else {
				echo "Error: `$sql`";
			}
		}
	}

	public function proses_edit_berita()
	{
		if (count($_POST)) {
			$judul_berita = isset($_POST['judul_berita']) ? trim(str_replace("'","''",$_POST['judul_berita'])) : '';
			$isi_berita = isset($_POST['isi_berita']) ? trim(str_replace("'","''",$_POST['isi_berita'])) : '';
			$kategori_id = isset($_POST['kategori_id']) ? trim($_POST['kategori_id']) : '';

			$sql = "UPDATE berita set judul_berita = '".$judul_berita."', isi_berita = '".$isi_berita."', kategori_id = '".$kategori_id."' where berita_id = '".$_POST['berita_id']."'";

			$stmt = $this->db->query($sql);
			if ($stmt) {
				echo "Success edit berita";
			} else {
				echo "Error: `$sql`";
			}
		}
	}

	public function delete()
	{
		if (count($_POST)) {
			$sql = "DELETE FROM berita where berita_id = '".$_POST['berita_id']."'";

			$stmt = $this->db->query($sql);
			if ($stmt) {
				echo "Berita berhasil dihapus";
			} else {
				echo "Error: `$sql`";
			}
		}
	}

	function randomHEX($amount)
	{
		$_result = "";
		for ($i = 0; $i < $amount; $i++) {
			$_result .= str_pad(dechex(mt_rand(0, 255)), 2, '0', STR_PAD_LEFT);
		}
		return strtoupper($_result);
	}

	private function _assets()
	{
		$this->add_js(site_url('assets/js/back_page.js'));
	}
}

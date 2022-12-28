<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data = [
			'page_title' => 'Kategori',
			'parent_title' => ''
		];
		$this->_assets();
		$this->render($data);
	}

	public function add_kategori()
	{
		$data = [
			'page_title' => 'Add kategori',
			'parent_title' => ''
		];

		$this->_assets();
		$this->render($data, 'kategori/add_kategori');
	}

	public function edit_kategori()
	{
		$query = $this->db->query("SELECT * FROM kategori where kategori_id = '" . $_POST['kategori_id'] . "'");
		$row_data = [];
		foreach ($query->result() as $row) {
			$row_data['kategori_id'] = $row->kategori_id;
			$row_data['kategori'] = $row->kategori;
		}

		$data = [
			'page_title' => 'Edit kategori',
			'parent_title' => '',
			'row_data' => $row_data
		];

		$this->_assets();
		$this->render($data, 'kategori/edit_kategori');
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
		$query = $this->db->query("SELECT COUNT(*) as total FROM kategori");
		$row = $query->row();
		if (isset($row)) $total = $row->total;

		$total_filter = $total;
		$data = array();
		$qs = $this->db->query("SELECT * FROM kategori order by kategori LIMIT $start, $length");
		$no = 1;
		foreach ($qs->result_array() as $row) {
			$data[] = array(
				$row['kategori_id'],
				$row['kategori'],
				'<a class="btn btn-sm btn-info" href="#" onclick="edit_kategori('."'".$row['kategori_id']."'".')">edit</a> <a class="btn btn-sm btn-danger" href="#" onclick="delete_kategori('."'".$row['kategori_id']."'".')">delete</a>'
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

	public function proses_add_kategori()
	{
		if (count($_POST)) {
			$kategori = isset($_POST['kategori']) ? trim(str_replace("'","''",$_POST['kategori'])) : '';

			$data = array(
				'kategori_id' => $this->randomHEX(3),
				'kategori' => $kategori
			);

			$sql = "INSERT INTO kategori (" . implode(',', array_keys($data)) . ") VALUES ('" . implode("','", array_values($data)) . "')";
			$stmt = $this->db->query($sql);
			if ($stmt) {
				echo "Add kategori success";
			} else {
				echo "Error: `$sql`";
			}
		}
	}

	public function proses_edit_kategori()
	{
		if (count($_POST)) {
			$kategori = isset($_POST['kategori']) ? trim(str_replace("'","''",$_POST['kategori'])) : '';

			$sql = "UPDATE kategori set kategori = '".$kategori."' where kategori_id = '".$_POST['kategori_id']."'";

			$stmt = $this->db->query($sql);
			if ($stmt) {
				echo "Success edit kategori";
			} else {
				echo "Error: `$sql`";
			}
		}
	}

	public function delete()
	{
		if (count($_POST)) {
			$sql = "DELETE FROM kategori where kategori_id = '".$_POST['kategori_id']."'";

			$stmt = $this->db->query($sql);
			if ($stmt) {
				echo "Kategori berhasil dihapus";
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

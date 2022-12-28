<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Member extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data = [
			'page_title' => 'Login',
			'parent_title' => ''
		];
		$this->_assets();
		$this->render($data);
	}

	public function register_user()
	{
		$data = [
			'page_title' => 'Register User',
			'parent_title' => ''
		];

		$this->_assets();
		$this->render($data, 'member/register_user');
	}

	public function login_submit()
	{
		if (count($_POST)) {
			$password = isset($_POST['password']) ? md5("AhmadBahaudinNursalim" . sha1(trim($_POST['password'])) . "AhmadBahaudinNursalim") : '';
			$query = $this->db->query("select * from user where username = '" . $_POST['username'] . "'");
			$qs = $query->result();
			foreach ($qs as $row) {
				if ($row->password == $password) {
					$_SESSION['username'] = $row->username;
					$_SESSION['user_id'] = $row->user_id;
					echo "Login Success";
					// redirect('member/dashboard');
				} else {
					echo "Username atau Password salah!";
					// redirect('member/login');
					$data = [
						'page_title' => 'Login',
						'parent_title' => ''
					];

					$this->_assets();
					$this->render($data, 'member/login');
				}
			}
		}
	}

	public function logout($email)
	{
		// remove all session variables
		session_unset();

		// destroy the session
		session_destroy();

		// $this->db->query("update member set status_online = '0' where email = '" . $email . "'");

		redirect('member/login');
	}

	public function add_user()
	{
		$data = [
			'page_title' => 'Add User',
			'parent_title' => ''
		];

		$this->_assets();
		$this->render($data, 'member/add_user');
	}

	public function edit_user()
	{
		$query = $this->db->query("SELECT * FROM user where user_id = '" . $_POST['user_id'] . "'");
		$row_data = [];
		foreach ($query->result() as $row) {
			$row_data['user_id'] = $row->user_id;
			$row_data['username'] = $row->username;
		}

		$data = [
			'page_title' => 'Edit User',
			'parent_title' => '',
			'row_data' => $row_data
		];

		$this->_assets();
		$this->render($data, 'member/edit_user');
	}

	public function manajemen_user()
	{
		if (!isset($_SESSION['user_id'])) {
			redirect('member/login');
		}

		$data = [
			'page_title' => 'Manajemen User',
			'parent_title' => ''
		];

		$this->_assets();
		$this->render($data, 'member/list_member');
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
		$query = $this->db->query("SELECT COUNT(*) as total FROM user");
		$row = $query->row();
		if (isset($row)) $total = $row->total;

		$total_filter = $total;
		$data = array();
		$qs = $this->db->query("SELECT * FROM user order by username LIMIT $start, $length");
		$no = 1;
		foreach ($qs->result_array() as $row) {
			$data[] = array(
				$row['user_id'],
				$row['username'],
				'<a class="btn btn-sm btn-info" href="#" onclick="edit_user('."'".$row['user_id']."'".')">edit</a> <a class="btn btn-sm btn-danger" href="#" onclick="delete_user('."'".$row['user_id']."'".')">delete</a>'
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

	public function register()
	{
		if (count($_POST)) {
			$nama = isset($_POST['nama']) ? trim($_POST['nama']) : '';
			$password = isset($_POST['password']) ? md5("AhmadBahaudinNursalim" . sha1(trim($_POST['password'])) . "AhmadBahaudinNursalim") : '';


			$data = array(
				'user_id' => $this->randomHEX(3),
				'username' => $nama,
				'password' => $password
			);

			$sql = "INSERT INTO user (" . implode(',', array_keys($data)) . ") VALUES ('" . implode("','", array_values($data)) . "')";
			$stmt = $this->db->query($sql);
			if ($stmt) {
				echo "Register success, click ok to login";
			} else {
				echo "Error: `$sql`";
			}
		}
	}

	public function proses_edit_user()
	{
		if (count($_POST)) {
			$nama = isset($_POST['nama']) ? trim($_POST['nama']) : '';
			$password = isset($_POST['password']) ? md5("AhmadBahaudinNursalim" . sha1(trim($_POST['password'])) . "AhmadBahaudinNursalim") : '';
			$sql = "";
			if ($password != "") {
				$sql = "UPDATE user set username = '".$nama."' ,password='".$password."' where user_id = '".$_POST['user_id']."'";
			} else {
				$sql = "UPDATE user set username = '".$nama."' where user_id = '".$_POST['user_id']."'";
			}

			$stmt = $this->db->query($sql);
			if ($stmt) {
				echo "Success edit user";
			} else {
				echo "Error: `$sql`";
			}
		}
	}

	public function delete()
	{
		if (count($_POST)) {
			$sql = "DELETE FROM user where user_id = '".$_POST['user_id']."'";

			$stmt = $this->db->query($sql);
			if ($stmt) {
				echo "User berhasil dihapus";
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

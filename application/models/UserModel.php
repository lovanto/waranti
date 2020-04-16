<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class UserModel extends CI_Model
{
	public function get($username)
	{
		$this->db->where('username', $username); // Untuk menambahkan Where Clause : username='$username'
		$result = $this->db->get('login')->row(); // Untuk mengeksekusi dan mengambil data hasil query
		return $result;
	}

	//laporan
	public function laporan_all_kendaraan($keyword)
	{
		$this->db->like('model', $keyword)->or_like('nopol', $keyword);
		return $this->db->get('kendaraan')->result();

		$this->load->library('pagination'); // Load librari paginationnya

		$config['base_url'] = base_url('page/pembayaran?metode=1');
		$config['total_rows'] = $this->db->query($query)->num_rows();
		$config['per_page'] = 5;
		$config['uri_segment'] = 3;
		$config['num_links'] = 3;

		// Style Pagination
		// Agar bisa mengganti stylenya sesuai class2 yg ada di bootstrap
		$config['full_tag_open']   = '<ul class="pagination pagination-sm m-t-xs m-b-xs">';
		$config['full_tag_close']  = '</ul>';

		$config['first_link']      = 'First';
		$config['first_tag_open']  = '<li>';
		$config['first_tag_close'] = '</li>';

		$config['last_link']       = 'Last';
		$config['last_tag_open']   = '<li>';
		$config['last_tag_close']  = '</li>';

		$config['next_link']       = '&nbsp;<i class="glyphicon glyphicon-menu-right"></i>&nbsp;';
		$config['next_tag_open']   = '<li>';
		$config['next_tag_close']  = '</li>';

		$config['prev_link']       = '&nbsp;<i class="glyphicon glyphicon-menu-left"></i>&nbsp;';
		$config['prev_tag_open']   = '<li>';
		$config['prev_tag_close']  = '</li>';

		$config['cur_tag_open']    = '<li class="active"><a href="#">';
		$config['cur_tag_close']   = '</a></li>';

		$config['num_tag_open']    = '<li>';
		$config['num_tag_close']   = '</li>';
		// End style pagination

		$this->pagination->initialize($config); // Set konfigurasi paginationnya

		$page = ($this->uri->segment($config['uri_segment'])) ? $this->uri->segment($config['uri_segment']) : 0;
		$query .= " LIMIT " . $page . ", " . $config['per_page'];

		$data['limit'] = $config['per_page'];
		$data['total_rows'] = $config['total_rows'];
		$data['pagination'] = $this->pagination->create_links(); // Generate link pagination nya sesuai config diatas
		$data['pembayaran'] = $this->db->query($query)->result();

		return $data;
	}

	#untuk pengguna
	#digunakan untuk mengambil data saat edit dan hapus
	public function getDatapengguna($id_user)
	{
		return $this->db->get_where('user', ['id_user' => $id_user])->row_array();
	}
	public function getDatapengguna2($id)
	{
		if ($id != NULL) {
			$this->db->like('username', $id)->or_like('nama_user', $id);
			return $this->db->get('user')->result_array();
		} else {
			return $this->db->get('user')->result_array();
		}
	}
	#untuk menampilkan seluruh data di tabel
	public function getAllDatapengguna()
	{
		return $this->db->get('login')->result_array();
	}
	public function tambahDatapengguna()
	{
		$data = [
			'username' => htmlspecialchars($this->input->post('username', ENT_QUOTES, 'UTF-8', true)),
			'password' => htmlspecialchars($this->input->post('password', ENT_QUOTES, 'UTF-8', true)),
			'nama_user' => htmlspecialchars($this->input->post('nama_user', ENT_QUOTES, 'UTF-8', true)),
			'id_level' => htmlspecialchars($this->input->post('id_level', ENT_QUOTES, 'UTF-8', true)),
			'user_create' => htmlspecialchars($this->input->post('user_create', ENT_QUOTES, 'UTF-8', true)),
			'create_date' => htmlspecialchars($this->input->post('create_date', ENT_QUOTES, 'UTF-8', true))
		];

		$data = $this->security->xss_clean($data);
		return $this->db->insert('user', $data);
	}
	public function hapusDatapengguna($id_user)
	{
		$this->db->delete('user', ['id_user' => $id_user]);
	}
	public function ubahDatapengguna()
	{
		$data = [
			'username' => htmlspecialchars($this->input->post('username', ENT_QUOTES, 'UTF-8', true)),
			'password' => htmlspecialchars($this->input->post('password', ENT_QUOTES, 'UTF-8', true)),
			'nama_user' => htmlspecialchars($this->input->post('nama_user', ENT_QUOTES, 'UTF-8', true)),
			'id_level' => htmlspecialchars($this->input->post('id_level', ENT_QUOTES, 'UTF-8', true)),
			'user_update' => htmlspecialchars($this->input->post('user_update', ENT_QUOTES, 'UTF-8', true)),
			'update_date' => htmlspecialchars($this->input->post('update_date', ENT_QUOTES, 'UTF-8', true))
		];
		$data = $this->security->xss_clean($data);
		$this->db->where('id_user', $this->input->post('id_user'));
		$this->db->update('user', $data);
	}
	public function gantiPasswordNow()
	{
		$data = [
			'username' => htmlspecialchars($this->input->post('username', ENT_QUOTES, 'UTF-8', true)),
			'password' => htmlspecialchars($this->input->post('password', ENT_QUOTES, 'UTF-8', true)),
			'nama_user' => htmlspecialchars($this->input->post('nama_user', ENT_QUOTES, 'UTF-8', true)),
			'id_level' => htmlspecialchars($this->input->post('id_level', ENT_QUOTES, 'UTF-8', true)),
			'user_update' => htmlspecialchars($this->input->post('user_update', ENT_QUOTES, 'UTF-8', true)),
			'update_date' => htmlspecialchars($this->input->post('update_date', ENT_QUOTES, 'UTF-8', true))
		];
		$data = $this->security->xss_clean($data);
		$this->db->where('id_user', $this->input->post('id_user'));
		$this->db->update('user', $data);
	}

	public function authenticated()
	{ // Fungsi ini berguna untuk mengecek apakah user sudah login atau belum
		// Pertama kita cek dulu apakah controller saat ini yang sedang diakses user adalah controller Auth apa bukan
		// Karena fungsi cek login hanya kita berlakukan untuk controller selain controller Auth
		if ($this->uri->segment(1) != 'auth' && $this->uri->segment(1) != '') {
			// Cek apakah terdapat session dengan nama authenticated
			if (!$this->session->userdata('authenticated')) // Jika tidak ada / artinya belum login
				redirect('auth'); // Redirect ke halaman login
		}
	}
	function get_data2($table)
	{
		return $this->db->get($table);
	}

	# untuk rak
	public function tambahDatarak($image_name)
	{
		$no_rak   =  $this->input->post('no_rak', true);
		$nama_rak   =  $this->input->post('nama_rak', true);
		// $qr_code =  $this->input->post('qr_code',true);
		$user_create =  $this->input->post('user_create', true);
		$create_date =  $this->input->post('create_date', true);
		$data       =  array(
			'no_rak' => $no_rak,
			'nama_rak' => $nama_rak,
			'qr_code'   => $image_name,
			'user_create' => $user_create,
			'create_date' => $create_date
		);
		$data = $this->security->xss_clean($data);
		return $this->db->insert('rak', $data);
	}
	public function hapusDatarak($id)
	{
		$this->db->delete('rak', ['id' => $id]);
	}
	public function ubahDatarak()
	{
		$data = [
			'no_rak' => htmlspecialchars($this->input->post('no_rak', ENT_QUOTES, 'UTF-8', true)),
			'nama_rak' => htmlspecialchars($this->input->post('nama_rak', ENT_QUOTES, 'UTF-8', true)),
			'user_update' => htmlspecialchars($this->input->post('user_update', ENT_QUOTES, 'UTF-8', true)),
			'update_date' => htmlspecialchars($this->input->post('update_date', ENT_QUOTES, 'UTF-8', true)),

		];
		$data = $this->security->xss_clean($data);
		$this->db->where('id', $this->input->post('id'));
		$this->db->update('rak', $data);
	}
	public function getDatarak($id)
	{
		return $this->db->get_where('rak', ['id' => $id])->row_array();
	}
	public function getDatarak2($id)
	{
		return $this->db->get_where('rak', ['id' => $id])->result_array();
	}
	public function getDatarak3($id)
	{
		if ($id != NULL) {
			$this->db->like('no_rak', $id)->or_like('nama_rak', $id);
			return $this->db->get('rak')->result_array();
		} else {
			return $this->db->get('rak')->result_array();
		}
	}
	public function getAllDatarak()
	{
		return $this->db->get('rak')->result_array();
	}

	# untuk sparepart
	public function tambahDatapart($image_name)
	{
		$no_part   =  $this->input->post('no_part', true);
		$deskripsi   =  $this->input->post('deskripsi', true);
		// $qr_code =  $this->input->post('qr_code',true);
		$user_create =  $this->input->post('user_create', true);
		$create_date =  $this->input->post('create_date', true);
		$data       =  array(
			'no_part' => $no_part,
			'deskripsi' => $deskripsi,
			'qr_code'   => $image_name,
			'user_create' => $user_create,
			'create_date' => $create_date
		);
		$data = $this->security->xss_clean($data);
		return $this->db->insert('sparepart', $data);
	}
	public function hapusDatapart($id)
	{
		$this->db->delete('sparepart', ['id' => $id]);
	}
	public function ubahDatapart()
	{
		$data = [
			'no_part' => htmlspecialchars($this->input->post('no_part', ENT_QUOTES, 'UTF-8', true)),
			'deskripsi' => htmlspecialchars($this->input->post('deskripsi', ENT_QUOTES, 'UTF-8', true)),
			'user_update' => htmlspecialchars($this->input->post('user_update', ENT_QUOTES, 'UTF-8', true)),
			'update_date' => htmlspecialchars($this->input->post('update_date', ENT_QUOTES, 'UTF-8', true)),

		];
		$data = $this->security->xss_clean($data);
		$this->db->where('id', $this->input->post('id'));
		$this->db->update('sparepart', $data);
	}
	public function getDatapart($id)
	{
		return $this->db->get_where('sparepart', ['id' => $id])->row_array();
	}
	public function getDatapart2($id)
	{
		return $this->db->get_where('sparepart', ['id' => $id])->result_array();
	}
	public function getDatapart3($id)
	{
		if ($id != NULL) {
			$this->db->like('no_part', $id)->or_like('deskripsi', $id);
			return $this->db->get('sparepart')->result_array();
		} else {
			return $this->db->get('sparepart')->result_array();
		}
	}
	public function getAllDatapart()
	{
		return $this->db->get('sparepart')->result_array();
	}
	#untuk karyawan
	public function tambahDatakaryawan($image_name)
	{
		$npk = htmlspecialchars($this->input->post('npk', ENT_QUOTES, 'UTF-8', true));
		$nama_karyawan = htmlspecialchars($this->input->post('nama_karyawan', ENT_QUOTES, 'UTF-8', true));
		$jk = htmlspecialchars($this->input->post('jk', ENT_QUOTES, 'UTF-8', true));
		$tgl_lahir = htmlspecialchars($this->input->post('tgl_lahir', ENT_QUOTES, 'UTF-8', true));
		$alamat = htmlspecialchars($this->input->post('alamat', ENT_QUOTES, 'UTF-8', true));
		$no_telp = htmlspecialchars($this->input->post('no_telp', ENT_QUOTES, 'UTF-8', true));
		$no_ktp = htmlspecialchars($this->input->post('no_ktp', ENT_QUOTES, 'UTF-8', true));
		$email = htmlspecialchars($this->input->post('email', ENT_QUOTES, 'UTF-8', true));
		$tgl_masuk = htmlspecialchars($this->input->post('tgl_masuk', ENT_QUOTES, 'UTF-8', true));
		$status_karyawan = htmlspecialchars($this->input->post('status_karyawan', ENT_QUOTES, 'UTF-8', true));
		$user_create = htmlspecialchars($this->input->post('user_create', ENT_QUOTES, 'UTF-8', true));
		$create_date = htmlspecialchars($this->input->post('create_date', ENT_QUOTES, 'UTF-8', true));
		$data       =  array(
			'npk' => $npk,
			'nama_karyawan' => $nama_karyawan,
			'jk' => $jk,
			'tgl_lahir' => $tgl_lahir,
			'alamat' => $alamat,
			'no_telp' => $no_telp,
			'no_ktp' => $no_ktp,
			'email' => $email,
			'tgl_masuk' => $tgl_masuk,
			'status_karyawan' => $status_karyawan,
			'qr_code'   => $image_name,
			'user_create' => $user_create,
			'create_date' => $create_date
		);
		$data = $this->security->xss_clean($data);
		return $this->db->insert('karyawan', $data);
	}
	public function hapusDatakaryawan($id)
	{
		$this->db->delete('karyawan', ['id' => $id]);
	}
	public function ubahDatakaryawan()
	{
		$data = [
			'npk' => htmlspecialchars($this->input->post('npk', ENT_QUOTES, 'UTF-8', true)),
			'nama_karyawan' => htmlspecialchars($this->input->post('nama_karyawan', ENT_QUOTES, 'UTF-8', true)),
			'jk' => htmlspecialchars($this->input->post('jk', ENT_QUOTES, 'UTF-8', true)),
			'tgl_lahir' => htmlspecialchars($this->input->post('tgl_lahir', ENT_QUOTES, 'UTF-8', true)),
			'alamat' => htmlspecialchars($this->input->post('alamat', ENT_QUOTES, 'UTF-8', true)),
			'no_telp' => htmlspecialchars($this->input->post('no_telp', ENT_QUOTES, 'UTF-8', true)),
			'no_ktp' => htmlspecialchars($this->input->post('no_ktp', ENT_QUOTES, 'UTF-8', true)),
			'email' => htmlspecialchars($this->input->post('email', ENT_QUOTES, 'UTF-8', true)),
			'tgl_masuk' => htmlspecialchars($this->input->post('tgl_masuk', ENT_QUOTES, 'UTF-8', true)),
			// 'kontrak' => htmlspecialchars($this->input->post('kontrak', ENT_QUOTES, 'UTF-8', true)),
			'status_karyawan' => htmlspecialchars($this->input->post('status_karyawan', ENT_QUOTES, 'UTF-8', true)),
			'user_update' => htmlspecialchars($this->input->post('user_update', ENT_QUOTES, 'UTF-8', true)),
			'update_date' => htmlspecialchars($this->input->post('update_date', ENT_QUOTES, 'UTF-8', true))
		];
		$data = $this->security->xss_clean($data);
		$this->db->where('id', $this->input->post('id'));
		$this->db->update('karyawan', $data);
	}
	public function getDatakaryawan($id)
	{
		return $this->db->get_where('karyawan', ['id' => $id])->row_array();
	}
	public function getDatakaryawan2($id)
	{
		return $this->db->get_where('karyawan', ['id' => $id])->result_array();
	}
	public function getDatakaryawan3($id)
	{
		if ($id != NULL) {
			$this->db->like('npk', $id)->or_like('nama_karyawan', $id);
			return $this->db->get('karyawan')->result_array();
		} else {
			return $this->db->get('karyawan')->result_array();
		}
	}
	public function getAllDatakaryawan()
	{
		return $this->db->get('karyawan')->result_array();
	}

	#untuk kendaraan
	public function tambahDatakendaraan($image_name)
	{
		$nopol = htmlspecialchars($this->input->post('nopol', ENT_QUOTES, 'UTF-8', true));
		$model = htmlspecialchars($this->input->post('model', ENT_QUOTES, 'UTF-8', true));
		$tipe_mesin = htmlspecialchars($this->input->post('tipe_mesin', ENT_QUOTES, 'UTF-8', true));
		$model_kendaraan = htmlspecialchars($this->input->post('model_kendaraan', ENT_QUOTES, 'UTF-8', true));
		$vin_rangka = htmlspecialchars($this->input->post('vin_rangka', ENT_QUOTES, 'UTF-8', true));
		$kilometer = htmlspecialchars($this->input->post('kilometer', ENT_QUOTES, 'UTF-8', true));
		$user_create = htmlspecialchars($this->input->post('user_create', ENT_QUOTES, 'UTF-8', true));
		$create_date = htmlspecialchars($this->input->post('create_date', ENT_QUOTES, 'UTF-8', true));
		$data       =  array(
			'nopol' => $nopol,
			'model' => $model,
			'tipe_mesin' => $tipe_mesin,
			'model_kendaraan' => $model_kendaraan,
			'vin_rangka' => $vin_rangka,
			'kilometer' => $kilometer,
			'qr_code'   => $image_name,
			'user_create' => $user_create,
			'create_date' => $create_date
		);
		$data = $this->security->xss_clean($data);
		return $this->db->insert('kendaraan', $data);
	}
	public function hapusDatakendaraan($id)
	{
		$this->db->delete('kendaraan', ['id' => $id]);
	}
	public function ubahDatakendaraan()
	{
		$data = [
			'nopol' => htmlspecialchars($this->input->post('nopol', ENT_QUOTES, 'UTF-8', true)),
			'model' => htmlspecialchars($this->input->post('model', ENT_QUOTES, 'UTF-8', true)),
			'tipe_mesin' => htmlspecialchars($this->input->post('tipe_mesin', ENT_QUOTES, 'UTF-8', true)),
			'model_kendaraan' => htmlspecialchars($this->input->post('model_kendaraan', ENT_QUOTES, 'UTF-8', true)),
			'vin_rangka' => htmlspecialchars($this->input->post('vin_rangka', ENT_QUOTES, 'UTF-8', true)),
			'kilometer' => htmlspecialchars($this->input->post('kilometer', ENT_QUOTES, 'UTF-8', true)),
			'user_update' => htmlspecialchars($this->input->post('user_update', ENT_QUOTES, 'UTF-8', true)),
			'update_date' => htmlspecialchars($this->input->post('update_date', ENT_QUOTES, 'UTF-8', true))
		];
		$data = $this->security->xss_clean($data);
		$this->db->where('id', $this->input->post('id'));
		$this->db->update('kendaraan', $data);
	}
	public function getDatakendaraan($id)
	{
		return $this->db->get_where('kendaraan', ['id' => $id])->row_array();
	}
	public function getDatakendaraan2($id)
	{
		if ($id != NULL) {
			$this->db->like('model', $id)->or_like('nopol', $id);
			return $this->db->get('kendaraan')->result_array();
		} else {
			return $this->db->get('kendaraan')->result_array();
		}
	}
	public function getDatakendaraan3($id)
	{
		if ($id != NULL) {
			$this->db->like('model', $id)->or_like('nopol', $id);
			return $this->db->get('kendaraan')->result_array();
		} else {
			return $this->db->get('kendaraan')->result_array();
		}
	}
	public function getAllDatakendaraan()
	{
		return $this->db->get('kendaraan')->result_array();
	}

	#untuk detail_part
	public function tambahDatadetail($image_name)
	{
		$nama_karyawan = htmlspecialchars($this->input->post('nama_karyawan', ENT_QUOTES, 'UTF-8', true));
		$nopol = htmlspecialchars($this->input->post('nopol', ENT_QUOTES, 'UTF-8', true));
		$model_kendaraan = htmlspecialchars($this->input->post('model_kendaraan', ENT_QUOTES, 'UTF-8', true));
		$vin_rangka = htmlspecialchars($this->input->post('vin_rangka', ENT_QUOTES, 'UTF-8', true));
		$kilometer = htmlspecialchars($this->input->post('kilometer', ENT_QUOTES, 'UTF-8', true));
		$tgl_perbaikan = htmlspecialchars($this->input->post('tgl_perbaikan', ENT_QUOTES, 'UTF-8', true));
		$tgl_penyerahan = htmlspecialchars($this->input->post('tgl_penyerahan', ENT_QUOTES, 'UTF-8', true));
		$no_part = htmlspecialchars($this->input->post('no_part', ENT_QUOTES, 'UTF-8', true));
		$barcode = htmlspecialchars($this->input->post('barcode', ENT_QUOTES, 'UTF-8', true));
		$lpd = htmlspecialchars($this->input->post('lpd', ENT_QUOTES, 'UTF-8', true));
		$nama_rak = htmlspecialchars($this->input->post('nama_rak', ENT_QUOTES, 'UTF-8', true));
		$user_create = htmlspecialchars($this->input->post('user_create', ENT_QUOTES, 'UTF-8', true));
		$create_date = htmlspecialchars($this->input->post('create_date', ENT_QUOTES, 'UTF-8', true));
		$data       =  array(
			'nama_karyawan' => $nama_karyawan,
			'nopol' => $nopol,
			'model_kendaraan' => $model_kendaraan,
			'vin_rangka' => $vin_rangka,
			'kilometer' => $kilometer,
			'tgl_perbaikan' => $tgl_perbaikan,
			'tgl_penyerahan' => $tgl_penyerahan,
			'no_part' => $no_part,
			'barcode' => $barcode,
			'lpd' => $lpd,
			'nama_rak' => $nama_rak,
			'qr_code'   => $image_name,
			'user_create' => $user_create,
			'create_date' => $create_date
		);
		$data = $this->security->xss_clean($data);
		return $this->db->insert('detail', $data);
	}
	public function hapusDatadetail($id)
	{
		$this->db->delete('detail', ['id' => $id]);
	}
	public function ubahDatadetail()
	{
		$data = [
			'nama_karyawan' => htmlspecialchars($this->input->post('nama_karyawan', ENT_QUOTES, 'UTF-8', true)),
			'nopol' => htmlspecialchars($this->input->post('nopol', ENT_QUOTES, 'UTF-8', true)),
			'model_kendaraan' => htmlspecialchars($this->input->post('model_kendaraan', ENT_QUOTES, 'UTF-8', true)),
			'vin_rangka' => htmlspecialchars($this->input->post('vin_rangka', ENT_QUOTES, 'UTF-8', true)),
			'kilometer' => htmlspecialchars($this->input->post('kilometer', ENT_QUOTES, 'UTF-8', true)),
			'tgl_perbaikan' => htmlspecialchars($this->input->post('tgl_perbaikan', ENT_QUOTES, 'UTF-8', true)),
			'tgl_penyerahan' => htmlspecialchars($this->input->post('tgl_penyerahan', ENT_QUOTES, 'UTF-8', true)),
			'no_part' => htmlspecialchars($this->input->post('no_part', ENT_QUOTES, 'UTF-8', true)),
			'barcode' => htmlspecialchars($this->input->post('barcode', ENT_QUOTES, 'UTF-8', true)),
			'lpd' => htmlspecialchars($this->input->post('lpd', ENT_QUOTES, 'UTF-8', true)),
			'nama_rak' => htmlspecialchars($this->input->post('nama_rak', ENT_QUOTES, 'UTF-8', true)),
			'user_update' => htmlspecialchars($this->input->post('user_update', ENT_QUOTES, 'UTF-8', true)),
			'update_date' => htmlspecialchars($this->input->post('update_date', ENT_QUOTES, 'UTF-8', true))
		];
		$data = $this->security->xss_clean($data);
		$this->db->where('id', $this->input->post('id'));
		$this->db->update('detail', $data);
	}
	public function getDatadetail($id)
	{
		return $this->db->get_where('detail', ['id' => $id])->row_array();
	}
	public function getDatadetail2($id)
	{
		return $this->db->get_where('detail', ['id' => $id])->result_array();
	}
	public function getDatadetail3($id)
	{
		if ($id != NULL) {
			$this->db->like('nama_karyawan', $id)->or_like('nopol', $id);
			return $this->db->get('detail')->result_array();
		} else {
			return $this->db->get('detail')->result_array();
		}
	}
	public function getDatadetail4($id, $user)
	{
		if ($id != NULL) {
			$this->db->like('tgl_perbaikan', $id)->or_like('nopol', $id);
			return $this->db->get_where('detail', ['user_create' => $user])->result_array();
		} else {
			return $this->db->get_where('detail', ['user_create' => $user])->result_array();
		}
	}
	public function getAllDatadetail()
	{
		return $this->db->get('detail')->result_array();
	}
	public function getAllDatadetail2($user)
	{
		return $this->db->get_where('detail', ['user_create' => $user])->result_array();
	}
	#import data
	public function insert_multiple($data)
	{
		$id = $_GET['id'];
		if ($id == "karyawan") {
			$this->db->insert_batch('karyawan', $data);
		} else if ($id == "rak") {
			$this->db->insert_batch('rak', $data);
		} else if ($id == "sparepart") {
			$this->db->insert_batch('sparepart', $data);
		} else if ($id == "kendaraan") {
			$this->db->insert_batch('kendaraan', $data);
		} else if ($id == "detail") {
			$this->db->insert_batch('detail', $data);
		} else {
			echo "Page Tidak sesuai !!!";
		}
	}

	// Fungsi untuk melakukan proses upload file
	public function upload_file($filename)
	{
		$this->load->library('upload'); // Load librari upload

		$config['upload_path'] = './excel/';
		$config['allowed_types'] = 'xlsx';
		$config['max_size']	= '2048';
		$config['overwrite'] = true;
		$config['file_name'] = $filename;

		$this->upload->initialize($config); // Load konfigurasi uploadnya
		if ($this->upload->do_upload('file')) { // Lakukan upload dan Cek jika proses upload berhasil
			// Jika berhasil :
			$return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
			return $return;
		} else {
			// Jika gagal :
			$return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
			return $return;
		}
	}
}
// select * from (nama_tabel) where (nama_field_yang_akan_difilter) between ‘tanggal awal’ and ‘tanggal akhir’

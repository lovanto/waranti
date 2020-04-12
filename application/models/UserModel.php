 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class UserModel extends CI_Model {
  public function get($username){
    $this->db->where('username', $username); // Untuk menambahkan Where Clause : username='$username'
    $result = $this->db->get('login')->row(); // Untuk mengeksekusi dan mengambil data hasil query
    return $result;
   }

	#untuk pengguna
	#digunakan untuk mengambil data saat edit dan hapus
	public function getDatapengguna($id_user){
		return $this->db->get_where('user', ['id_user'=>$id_user])->row_array();
	}
	#untuk menampilkan seluruh data di tabel
	 public function getAllDatapengguna(){
		return $this->db->get('login')->result_array();
	}
	public function tambahDatapengguna(){
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
	public function hapusDatapengguna($id_user){
		$this->db->delete('user', ['id_user' => $id_user]);
	}
	public function ubahDatapengguna(){
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
	public function gantiPasswordNow(){
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
	
	 public function authenticated(){ // Fungsi ini berguna untuk mengecek apakah user sudah login atau belum
        // Pertama kita cek dulu apakah controller saat ini yang sedang diakses user adalah controller Auth apa bukan
        // Karena fungsi cek login hanya kita berlakukan untuk controller selain controller Auth
        if($this->uri->segment(1) != 'auth' && $this->uri->segment(1) != ''){
            // Cek apakah terdapat session dengan nama authenticated
            if( ! $this->session->userdata('authenticated')) // Jika tidak ada / artinya belum login
                redirect('auth'); // Redirect ke halaman login
        }
     }
     function get_data2($table){
		return $this->db->get($table);
  }

  # untuk rak
 	public function tambahDatarak($image_name){
			$no_rak   =  $this->input->post('no_rak',true);
            $nama_rak   =  $this->input->post('nama_rak',true);
            // $qr_code =  $this->input->post('qr_code',true);
            $user_create=  $this->input->post('user_create',true);
            $create_date=  $this->input->post('create_date',true);
            $data       =  array(   'no_rak'=>$no_rak,
                                    'nama_rak'=>$nama_rak,
                                     'qr_code'   => $image_name,
                                    'user_create'=>$user_create,
                                    'create_date'=>$create_date
                                );
		$data = $this->security->xss_clean($data);
		return $this->db->insert('rak', $data);
	}
	public function hapusDatarak($id){
		$this->db->delete('rak', ['id' => $id]);
	}
	public function ubahDatarak(){
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
 	public function getDatarak($id){
	 	return $this->db->get_where('rak', ['id'=>$id])->row_array();
	}
 	 public function getAllDatarak(){
		return $this->db->get('rak')->result_array();
	}

	 # untuk sparepart
 	public function tambahDatapart($image_name){
			$no_part   =  $this->input->post('no_part',true);
            $deskripsi   =  $this->input->post('deskripsi',true);
            // $qr_code =  $this->input->post('qr_code',true);
            $user_create=  $this->input->post('user_create',true);
            $create_date=  $this->input->post('create_date',true);
            $data       =  array(   'no_part'=>$no_part,
                                    'deskripsi'=>$deskripsi,
                                     'qr_code'   => $image_name,
                                    'user_create'=>$user_create,
                                    'create_date'=>$create_date
                                );
		$data = $this->security->xss_clean($data);
		return $this->db->insert('sparepart', $data);
	}
	public function hapusDatapart($id){
		$this->db->delete('sparepart', ['id' => $id]);
	}
	public function ubahDatapart(){
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
 	public function getDatapart($id){
	 	return $this->db->get_where('sparepart', ['id'=>$id])->row_array();
	}
 	 public function getAllDatapart(){
		return $this->db->get('sparepart')->result_array();
	}
	#untuk karyawan
	public function tambahDatakaryawan($image_name){
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
            $data       =  array(   'npk'=>$npk,
                                    'nama_karyawan'=>$nama_karyawan,
                                    'jk'=>$jk,
                                    'tgl_lahir'=>$tgl_lahir,                                    
                                    'alamat'=>$alamat,
                                    'no_telp'=>$no_telp,
                                    'no_ktp'=>$no_ktp,
                                    'email'=>$email,
                                    'tgl_masuk'=>$tgl_masuk,
                                    'status_karyawan'=>$status_karyawan,
                                    'qr_code'   => $image_name,
                                    'user_create'=>$user_create,
                                    'create_date'=>$create_date
                                );
		$data = $this->security->xss_clean($data);
		return $this->db->insert('karyawan', $data);
	}
	public function hapusDatakaryawan($id){
		$this->db->delete('karyawan', ['id' => $id]);
	}
	public function ubahDatakaryawan(){
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
 	public function getDatakaryawan($id){
	 	return $this->db->get_where('karyawan', ['id'=>$id])->row_array();
	}
 	 public function getAllDatakaryawan(){
		return $this->db->get('karyawan')->result_array();
	}

	#untuk kendaraan
	public function tambahDatakendaraan($image_name){
			$nopol = htmlspecialchars($this->input->post('nopol', ENT_QUOTES, 'UTF-8', true));
			$model = htmlspecialchars($this->input->post('model', ENT_QUOTES, 'UTF-8', true));
			$tipe_mesin = htmlspecialchars($this->input->post('tipe_mesin', ENT_QUOTES, 'UTF-8', true));
			$model_kendaraan = htmlspecialchars($this->input->post('model_kendaraan', ENT_QUOTES, 'UTF-8', true));
			$vin_rangka = htmlspecialchars($this->input->post('vin_rangka', ENT_QUOTES, 'UTF-8', true));
			$kilometer = htmlspecialchars($this->input->post('kilometer', ENT_QUOTES, 'UTF-8', true));
			$user_create = htmlspecialchars($this->input->post('user_create', ENT_QUOTES, 'UTF-8', true));
			$create_date = htmlspecialchars($this->input->post('create_date', ENT_QUOTES, 'UTF-8', true));
            $data       =  array(   'nopol'=>$nopol,
                                    'model'=>$model,
                                    'tipe_mesin'=>$tipe_mesin,
                                    'model_kendaraan'=>$model_kendaraan,                                    
                                    'vin_rangka'=>$vin_rangka,
                                    'kilometer'=>$kilometer,
                                    'qr_code'   => $image_name,
                                    'user_create'=>$user_create,
                                    'create_date'=>$create_date
                                );
		$data = $this->security->xss_clean($data);
		return $this->db->insert('kendaraan', $data);
	}
	public function hapusDatakendaraan($id){
		$this->db->delete('kendaraan', ['id' => $id]);
	}
	public function ubahDatakendaraan(){
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
 	public function getDatakendaraan($id){
	 	return $this->db->get_where('kendaraan', ['id'=>$id])->row_array();
	}
 	 public function getAllDatakendaraan(){
		return $this->db->get('kendaraan')->result_array();
	}
	
}
// select * from (nama_tabel) where (nama_field_yang_akan_difilter) between ‘tanggal awal’ and ‘tanggal akhir’
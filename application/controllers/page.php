<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends MY_Controller {
  private $filename = "import_data"; // Kita tentukan nama filenya

  public function __construct(){
    parent::__construct();
    $this->load->model('UserModel');
    $this->load->helper('url','form');
    //load libary pagination
    $this->load->library('pagination');
  }
  public function welcome(){
    $this->load->view('templates/header');
    $this->load->view('welcome');
    $this->load->view('templates/footer');
  }
  public function gantiPassword(){
    $this->load->view('templates/header');
    $this->authenticated();
    $this->load->view('gantiPassword');
    $this->load->view('templates/footer');
  }
  public function pengguna(){  
    $data['admin']= $this->UserModel->getAllDatapengguna();
    $this->load->view('templates/header');
    $this->authenticated();
    $this->load->view('pengguna',$data);
    $this->load->view('templates/footer');
  }
    public function karyawan(){  
    $data['karyawan']= $this->UserModel->getAllDatakaryawan();
    $this->load->view('templates/header');
    $this->authenticated();
    $this->load->view('karyawan',$data);
    $this->load->view('templates/footer');
  }
    public function kendaraan(){  
    $data['kendaraan']= $this->UserModel->getAllDatakendaraan();
    $this->load->view('templates/header');
    $this->authenticated();
    $this->load->view('kendaraan',$data);
    $this->load->view('templates/footer');
  }
  public function rak(){  
    $data['rak']= $this->UserModel->getAllDatarak();
    $this->load->view('templates/header');
    $this->authenticated();
    $this->load->view('rak',$data);
    $this->load->view('templates/footer');
  }
   public function part(){  
    $data['part']= $this->UserModel->getAllDatapart();
    $this->load->view('templates/header');
    $this->authenticated();
    $this->load->view('part',$data);
    $this->load->view('templates/footer');
  }
  # untuk Pengguna
  public function pengguna_tambah(){
    $this->UserModel->tambahDatapengguna();
    $this->session->set_flashdata('flash_sukses', 'BERHASIL ditambahkan');
    redirect('page/pengguna');
  }
  public function pengguna_hapus($id_user){
    $this->UserModel->hapusDatapengguna($id_user);
    $this->session->set_flashdata('flash_sukses', 'BERHASIL dihapus');
    redirect('page/pengguna');
  }
    public function pengguna_ubah($id_user){
    $data['user'] = $this->UserModel->getDatapengguna($id_user);
    $this->load->view('templates/header');
    $this->load->view('pengguna_ubah', $data);
    $this->load->view('templates/footer');
  }
  public function pengguna_edit(){
    $this->UserModel->ubahDatapengguna();
    $this->session->set_flashdata('flash_sukses', 'BERHASIL diubah');
    redirect('page/pengguna');
  }
  public function gantiPasswordNow(){
    $this->UserModel->gantiPasswordNow();
    $this->session->set_flashdata('flash_sukses', 'BERHASIL diubah');
    redirect('page/gantiPassword');
  }
    # untuk karyawan
  public function karyawan_tambah(){
        $npk=$this->input->post('npk');
        $nama_pegawai=$this->input->post('nama_pegawai');
        $jk=$this->input->post('jk');
        $tgl_lahir=$this->input->post('tgl_lahir');
        $alamat=$this->input->post('alamat');
        $no_telp=$this->input->post('no_telp');
        $no_ktp=$this->input->post('no_ktp');
        $email=$this->input->post('email');
        $tgl_masuk=$this->input->post('tgl_masuk');
        $status_karyawan=$this->input->post('status_karyawan');
        $qr_code=$this->input->post('qr_code');

 
        $this->load->library('ciqrcode'); //pemanggilan library QR CODE
 
        $config['cacheable']    = true; //boolean, the default is true
        $config['cachedir']     = './assets/'; //string, the default is application/cache/
        $config['errorlog']     = './assets/'; //string, the default is application/logs/
        $config['imagedir']     = './assets/images/'; //direktori penyimpanan qr code
        $config['quality']      = true; //boolean, the default is true
        $config['size']         = '1024'; //interger, the default is 1024
        $config['black']        = array(224,255,255); // array, default is array(255,255,255)
        $config['white']        = array(70,130,180); // array, default is array(0,0,0)
        $this->ciqrcode->initialize($config);
        
        $image_name=$nama_pegawai.'.png'; //buat name dari qr code sesuai dengan nama_karyawan
 
        $params['data'] = $nama_pegawai; //data yang akan di jadikan QR CODE
        $params['level'] = 'H'; //H=High
        $params['size'] = 10;
        $params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
        $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE
        $this->UserModel->tambahDatakaryawan($image_name);
        $this->session->set_flashdata('flash_sukses', 'BERHASIL ditambahkan');
        redirect('page/karyawan');
  }
  public function karyawan_hapus($id_user){

    $this->UserModel->hapusDatakaryawan($id_user);
    $this->session->set_flashdata('flash_sukses', 'BERHASIL dihapus');
    redirect('page/karyawan');
  }
    public function karyawan_ubah($id_user){
    $data['karyawan'] = $this->UserModel->getDatakaryawan($id_user);
    $this->load->view('templates/header');
    $this->load->view('karyawan_ubah', $data);
    $this->load->view('templates/footer');
  }
  public function karyawan_edit(){
    $this->UserModel->ubahDatakaryawan();
    $this->session->set_flashdata('flash_sukses', 'BERHASIL diubah');
    redirect('page/karyawan');
  }

    # untuk kendaraan
  public function kendaraan_tambah(){
        $nopol=$this->input->post('nopol');
        $model=$this->input->post('model');
        $tipe_mesin=$this->input->post('tipe_mesin');
        $model_kendaraan=$this->input->post('model_kendaraan');
        $vin_rangka=$this->input->post('vin_rangka');
        $kilometer=$this->input->post('kilometer');
        $qr_code=$this->input->post('qr_code');

 
        $this->load->library('ciqrcode'); //pemanggilan library QR CODE
 
        $config['cacheable']    = true; //boolean, the default is true
        $config['cachedir']     = './assets/'; //string, the default is application/cache/
        $config['errorlog']     = './assets/'; //string, the default is application/logs/
        $config['imagedir']     = './assets/images/'; //direktori penyimpanan qr code
        $config['quality']      = true; //boolean, the default is true
        $config['size']         = '1024'; //interger, the default is 1024
        $config['black']        = array(224,255,255); // array, default is array(255,255,255)
        $config['white']        = array(70,130,180); // array, default is array(0,0,0)
        $this->ciqrcode->initialize($config);
        
        $image_name=$model_kendaraan.'.png'; //buat name dari qr code sesuai dengan model_kendaraan
 
        $params['data'] = $model_kendaraan; //data yang akan di jadikan QR CODE
        $params['level'] = 'H'; //H=High
        $params['size'] = 10;
        $params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
        $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE
        $this->UserModel->tambahDatakendaraan($image_name);
        $this->session->set_flashdata('flash_sukses', 'BERHASIL ditambahkan');
        redirect('page/kendaraan');
  }
  public function kendaraan_hapus($id_user){

    $this->UserModel->hapusDatakendaraan($id_user);
    $this->session->set_flashdata('flash_sukses', 'BERHASIL dihapus');
    redirect('page/kendaraan');
  }
    public function kendaraan_ubah($id_user){
    $data['kendaraan'] = $this->UserModel->getDatakendaraan($id_user);
    $this->load->view('templates/header');
    $this->load->view('kendaraan_ubah', $data);
    $this->load->view('templates/footer');
  }
  public function kendaraan_edit(){
    $this->UserModel->ubahDatakendaraan();
    $this->session->set_flashdata('flash_sukses', 'BERHASIL diubah');
    redirect('page/kendaraan');
  }
   # untuk Zona
  public function rak_tambah(){
        $no_rak=$this->input->post('no_rak');
        $nama_rak=$this->input->post('nama_rak');
        $qr_code=$this->input->post('qr_code');

 
        $this->load->library('ciqrcode'); //pemanggilan library QR CODE
 
        $config['cacheable']    = true; //boolean, the default is true
        $config['cachedir']     = './assets/'; //string, the default is application/cache/
        $config['errorlog']     = './assets/'; //string, the default is application/logs/
        $config['imagedir']     = './assets/images/'; //direktori penyimpanan qr code
        $config['quality']      = true; //boolean, the default is true
        $config['size']         = '1024'; //interger, the default is 1024
        $config['black']        = array(224,255,255); // array, default is array(255,255,255)
        $config['white']        = array(70,130,180); // array, default is array(0,0,0)
        $this->ciqrcode->initialize($config);
        
        $image_name=$nama_rak.'.png'; //buat name dari qr code sesuai dengan nama_rak
 
        $params['data'] = $nama_rak; //data yang akan di jadikan QR CODE
        $params['level'] = 'H'; //H=High
        $params['size'] = 10;
        $params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
        $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE
 
        $this->UserModel->tambahDatarak($image_name); //simpan ke database
        $this->session->set_flashdata('flash_sukses', 'BERHASIL ditambahkan');
        redirect('page/rak');
  }
  public function rak_hapus($id){
    $this->UserModel->hapusDatarak($id);
    $this->session->set_flashdata('flash_sukses', 'BERHASIL dihapus');
    redirect('page/rak');
  }
    public function rak_ubah($id){
    $data['rak'] = $this->UserModel->getDatarak($id);
    $this->load->view('templates/header');
    $this->load->view('rak_ubah', $data);
    $this->load->view('templates/footer');
  }
  public function rak_edit(){
    $this->UserModel->ubahDatarak();
    $this->session->set_flashdata('flash_sukses', 'BERHASIL diubah');
    redirect('page/rak');
  }

   # untuk sparepart
  public function part_tambah(){
        $no_part=$this->input->post('no_part');
        $deskripsi=$this->input->post('deskripsi');
        $qr_code=$this->input->post('qr_code');

 
        $this->load->library('ciqrcode'); //pemanggilan library QR CODE
 
        $config['cacheable']    = true; //boolean, the default is true
        $config['cachedir']     = './assets/'; //string, the default is application/cache/
        $config['errorlog']     = './assets/'; //string, the default is application/logs/
        $config['imagedir']     = './assets/images/'; //direktori penyimpanan qr code
        $config['quality']      = true; //boolean, the default is true
        $config['size']         = '1024'; //interger, the default is 1024
        $config['black']        = array(224,255,255); // array, default is array(255,255,255)
        $config['white']        = array(70,130,180); // array, default is array(0,0,0)
        $this->ciqrcode->initialize($config);
        
        $image_name=$no_part.'.png'; //buat name dari qr code sesuai dengan deskripsi
 
        $params['data'] = $deskripsi; //data yang akan di jadikan QR CODE
        $params['level'] = 'H'; //H=High
        $params['size'] = 10;
        $params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
        $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE
 
        $this->UserModel->tambahDatapart($image_name); //simpan ke database
        $this->session->set_flashdata('flash_sukses', 'BERHASIL ditambahkan');
        redirect('page/part');
  }
  public function part_hapus($id){
    $this->UserModel->hapusDatapart($id);
    $this->session->set_flashdata('flash_sukses', 'BERHASIL dihapus');
    redirect('page/part');
  }
    public function part_ubah($id){
    $data['part'] = $this->UserModel->getDatapart($id);
    $this->load->view('templates/header');
    $this->load->view('part_ubah', $data);
    $this->load->view('templates/footer');
  }
  public function part_edit(){
    $this->UserModel->ubahDatapart();
    $this->session->set_flashdata('flash_sukses', 'BERHASIL diubah');
    redirect('page/part');
  }

}

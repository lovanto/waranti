<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Page_User extends MY_Controller
{
  private $filename = "import_data"; // Kita tentukan nama filenya

  public function __construct()
  {
    parent::__construct();
    $this->load->model('UserModel');
    $this->load->helper('url', 'form');
    //load libary pagination
    $this->load->library('pagination');
  }
  public function welcome()
  {
    $this->load->view('templates/header_user');
    $this->load->view('user/welcome');
    $this->load->view('templates/footer_user');
  }
  public function gantiPassword()
  {
    $this->load->view('templates/header_user');
    $this->authenticated();
    $this->load->view('user/gantiPassword');
    $this->load->view('templates/footer_user');
  }
  public function gantiPasswordNow()
  {
    $this->UserModel->gantiPasswordNow();
    $this->session->set_flashdata('flash_sukses', 'BERHASIL diubah');
    redirect('page_user/welcome');
  }
  public function detail()
  {
    $data['detail'] = $this->UserModel->getAllDatadetail2($this->session->userdata('nama_user'));
    $this->load->view('templates/header_user');
    $this->authenticated();
    $this->load->view('user/detail', $data);
    $this->load->view('templates/footer_user');
  }
  public function detail_tambah()
  {
    $nama_karyawan = $this->input->post('nama_karyawan');
    $nopol = $this->input->post('nopol');
    $model_kendaraan = $this->input->post('model_kendaraan');
    $vin_rangka = $this->input->post('vin_rangka');
    $kilometer = $this->input->post('kilometer');
    $tgl_perbaikan = $this->input->post('tgl_perbaikan');
    $tgl_penyerahan = $this->input->post('tgl_penyerahan');
    $no_part = $this->input->post('no_part');
    $barcode = $this->input->post('barcode');
    $lpd = $this->input->post('lpd');
    $qr_code = $this->input->post('qr_code');


    $this->load->library('ciqrcode'); //pemanggilan library QR CODE

    $config['cacheable']    = true; //boolean, the default is true
    $config['cachedir']     = './assets/'; //string, the default is application/cache/
    $config['errorlog']     = './assets/'; //string, the default is application/logs/
    $config['imagedir']     = './assets/images/'; //direktori penyimpanan qr code
    $config['quality']      = true; //boolean, the default is true
    $config['size']         = '1024'; //interger, the default is 1024
    $config['black']        = array(224, 255, 255); // array, default is array(255,255,255)
    $config['white']        = array(70, 130, 180); // array, default is array(0,0,0)
    $this->ciqrcode->initialize($config);

    $image_name = $model_kendaraan . '.png'; //buat name dari qr code sesuai dengan model_kendaraan
    $ind = ' ';
    $params['data'] = $nama_karyawan . $ind . $nopol . $ind . $model_kendaraan . $ind . $vin_rangka . $ind . $kilometer . $ind . $tgl_perbaikan . $ind . $tgl_penyerahan . $ind . $no_part . $ind . $barcode . $ind . $lpd; //data yang akan di jadikan QR CODE
    $params['level'] = 'H'; //H=High
    $params['size'] = 10;
    $params['savename'] = FCPATH . $config['imagedir'] . $image_name; //simpan image QR CODE ke folder assets/images/
    $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE
    $this->UserModel->tambahDatadetail($image_name);
    $this->session->set_flashdata('flash_sukses', 'BERHASIL ditambahkan');
    redirect('page_user/detail');
  }
  public function laporan_all_Detail()
  {
    $keyword = $this->input->get('cari', TRUE);
    $data['detail'] = $this->UserModel->getDatadetail4($keyword, $this->session->userdata('nama_user')); //mencari data karyawan berdasarkan 
    $this->load->view('templates/header_user');
    $this->load->view('user/laporan_all_detail', $data); //menampilkan data yang sudah dicari
    $this->load->view('templates/footer_user');
  }
}
?>
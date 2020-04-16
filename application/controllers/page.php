<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Page extends MY_Controller
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
    $this->load->view('templates/header');
    $this->load->view('welcome');
    $this->load->view('templates/footer');
  }
  public function gantiPassword()
  {
    $this->load->view('templates/header');
    $this->authenticated();
    $this->load->view('gantiPassword');
    $this->load->view('templates/footer');
  }
  public function pengguna()
  {
    $data['admin'] = $this->UserModel->getAllDatapengguna();
    $this->load->view('templates/header');
    $this->authenticated();
    $this->load->view('pengguna', $data);
    $this->load->view('templates/footer');
  }
  public function karyawan()
  {
    $data['karyawan'] = $this->UserModel->getAllDatakaryawan();
    $this->load->view('templates/header');
    $this->authenticated();
    $this->load->view('karyawan', $data);
    $this->load->view('templates/footer');
  }
  public function kendaraan()
  {
    $data['kendaraan'] = $this->UserModel->getAllDatakendaraan();
    $this->load->view('templates/header');
    $this->authenticated();
    $this->load->view('kendaraan', $data);
    $this->load->view('templates/footer');
  }
  public function detail()
  {
    $data['detail'] = $this->UserModel->getAllDatadetail();
    $this->load->view('templates/header');
    $this->authenticated();
    $this->load->view('detail', $data);
    $this->load->view('templates/footer');
  }
  public function rak()
  {
    $data['rak'] = $this->UserModel->getAllDatarak();
    $this->load->view('templates/header');
    $this->authenticated();
    $this->load->view('rak', $data);
    $this->load->view('templates/footer');
  }
  public function part()
  {
    $data['part'] = $this->UserModel->getAllDatapart();
    $this->load->view('templates/header');
    $this->authenticated();
    $this->load->view('part', $data);
    $this->load->view('templates/footer');
  }
  # untuk laporan
  public function laporan_kendaraan($id_kendaraan)
  {
    ob_start();
    $data['kendaraan'] = $this->UserModel->getDatakendaraan2($id_kendaraan);
    $this->load->view('laporan/laporan_kendaraan', $data);
    $html = ob_get_contents();
    ob_end_clean();
    require_once(FCPATH . 'assets/html2pdf/html2pdf.class.php');
    $pdf = new HTML2PDF('P', 'C8', 'en');
    $pdf->WriteHTML($html);
    $pdf->Output('laporan-kendaraan.pdf', 'D');

    // $data['kendaraan'] = $this->UserModel->getDatakendaraan2($id_kendaraan);
    // $this->load->library('pdf');
    // $this->pdf->setPaper('C7', 'potrait');
    // $this->pdf->filename = "laporan-kendaraan.pdf";
    // $this->pdf->load_view('laporan/laporan_kendaraan', $data);
  }
  public function laporan_all_kendaraan()
  {
    $keyword = $this->input->get('cari', TRUE);
    $data['kendaraan'] = $this->UserModel->getDatakendaraan3($keyword); //mencari data karyawan berdasarkan 
    $this->load->view('templates/header');
    $this->load->view('laporan/laporan_all_kendaraan', $data); //menampilkan data yang sudah dicari
    $this->load->view('templates/footer');

    // ob_start();
    // $data['kendaraan'] = $this->UserModel->getAllDatakendaraan();
    // $this->load->view('laporan/laporan_all_kendaraan', $data);
    // $html = ob_get_contents();
    // ob_end_clean();
    // require_once(FCPATH.'assets/html2pdf/html2pdf.class.php');
    // $pdf = new HTML2PDF('P', 'A4', 'en');
    // $pdf->WriteHTML($html);
    // $pdf->Output('laporan-semua-kendaraan.pdf', 'D');

    // $data['kendaraan'] = $this->UserModel->getAllDatakendaraan();
    // $this->load->library('pdf');
    // $this->pdf->setPaper('A4', 'potrait');
    // $this->pdf->filename = "laporan-semua-kendaraan.pdf";
    // $this->pdf->load_view('laporan/laporan_all_kendaraan', $data);
  }
  public function laporan_sparepart($id_sparepart)
  {
    ob_start();
    $data['sparepart'] = $this->UserModel->getDatapart2($id_sparepart);
    $this->load->view('laporan/laporan_sparepart', $data);
    $html = ob_get_contents();
    ob_end_clean();
    require_once(FCPATH . 'assets/html2pdf/html2pdf.class.php');
    $pdf = new HTML2PDF('P', 'C8', 'en');
    $pdf->WriteHTML($html);
    $pdf->Output('laporan-sparepart.pdf', 'D');

    // $data['sparepart'] = $this->UserModel->getDatapart2($id_sparepart);
    // $this->load->library('pdf');
    // $this->pdf->setPaper('C7', 'potrait');
    // $this->pdf->filename = "laporan-sparepart.pdf";
    // $this->pdf->load_view('laporan/laporan_sparepart', $data);
  }
  public function laporan_all_sparepart()
  {
    $keyword = $this->input->get('cari', TRUE);
    $data['sparepart'] = $this->UserModel->getDatapart3($keyword); //mencari data karyawan berdasarkan 
    $this->load->view('templates/header');
    $this->load->view('laporan/laporan_all_sparepart', $data); //menampilkan data yang sudah dicari
    $this->load->view('templates/footer');

    // ob_start();
    // $data['sparepart'] = $this->UserModel->getAllDatapart();
    // $this->load->view('laporan/laporan_all_sparepart', $data);
    // $html = ob_get_contents();
    // ob_end_clean();
    // require_once(FCPATH.'assets/html2pdf/html2pdf.class.php');
    // $pdf = new HTML2PDF('P', 'A4', 'en');
    // $pdf->WriteHTML($html);
    // $pdf->Output('laporan-semua-sparepart.pdf', 'D');

    // $data['sparepart'] = $this->UserModel->getAllDatapart();
    // $this->load->library('pdf');
    // $this->pdf->setPaper('A4', 'potrait');
    // $this->pdf->filename = "laporan-semua-sparepart.pdf";
    // $this->pdf->load_view('laporan/laporan_all_sparepart', $data);
  }
  public function laporan_karyawan($id_karyawan)
  {
    ob_start();
    $data['karyawan'] = $this->UserModel->getDatakaryawan2($id_karyawan);
    $this->load->view('laporan/laporan_karyawan', $data);
    $html = ob_get_contents();
    ob_end_clean();
    require_once(FCPATH . 'assets/html2pdf/html2pdf.class.php');
    $pdf = new HTML2PDF('P', 'C8', 'en');
    $pdf->WriteHTML($html);
    $pdf->Output('laporan-karyawan.pdf', 'D');

    // $data['karyawan'] = $this->UserModel->getDatakaryawan2($id_karyawan);
    // $this->load->library('pdf');
    // $this->pdf->setPaper('C7', 'potrait');
    // $this->pdf->filename = "laporan-karyawan.pdf";
    // $this->pdf->load_view('laporan/laporan_karyawan', $data);
  }
  public function laporan_all_karyawan()
  {
    $keyword = $this->input->get('cari', TRUE);
    $data['karyawan'] = $this->UserModel->getDatakaryawan3($keyword); //mencari data karyawan berdasarkan 
    $this->load->view('templates/header');
    $this->load->view('laporan/laporan_all_karyawan', $data); //menampilkan data yang sudah dicari
    $this->load->view('templates/footer');

    // ob_start();
    // $data['karyawan'] = $this->UserModel->getAllDatakaryawan();
    // $this->load->view('laporan/laporan_all_karyawan', $data);
    // $html = ob_get_contents();
    // ob_end_clean();
    // require_once(FCPATH.'assets/html2pdf/html2pdf.class.php');
    // $pdf = new HTML2PDF('L', 'A4', 'en');
    // $pdf->WriteHTML($html);
    // $pdf->Output('laporan-semua-karyawan.pdf', 'D');

    // $data['karyawan'] = $this->UserModel->getAllDatakaryawan();
    // $this->load->library('pdf');
    // $this->pdf->setPaper('A4', 'potrait');
    // $this->pdf->filename = "laporan-semua-karyawan.pdf";
    // $this->pdf->load_view('laporan/laporan_all_karyawan', $data);
  }
  public function laporan_all_pengguna()
  {
    $keyword = $this->input->get('cari', TRUE);
    $data['user'] = $this->UserModel->getDatapengguna2($keyword); //mencari data karyawan berdasarkan 
    $this->load->view('templates/header');
    $this->load->view('laporan/laporan_all_pengguna', $data); //menampilkan data yang sudah dicari
    $this->load->view('templates/footer');

    // ob_start();
    // $data['user'] = $this->UserModel->getAllDatapengguna();
    // $this->load->view('laporan/laporan_all_pengguna', $data);
    // $html = ob_get_contents();
    // ob_end_clean();
    // require_once(FCPATH.'assets/html2pdf/html2pdf.class.php');
    // $pdf = new HTML2PDF('P', 'A4', 'en');
    // $pdf->WriteHTML($html);
    // $pdf->Output('laporan-semua-pengguna.pdf', 'D');

    // $data['user'] = $this->UserModel->getAllDatapengguna();
    // $this->load->library('pdf');
    // $this->pdf->setPaper('A4', 'potrait');
    // $this->pdf->filename = "laporan-semua-pengguna.pdf";
    // $this->pdf->load_view('laporan/laporan_all_pengguna', $data);
  }
  public function laporan_rak($id_rak)
  {
    ob_start();
    $data['rak'] = $this->UserModel->getDatarak2($id_rak);
    $this->load->view('laporan/laporan_rak', $data);
    $html = ob_get_contents();
    ob_end_clean();
    require_once(FCPATH . 'assets/html2pdf/html2pdf.class.php');
    $pdf = new HTML2PDF('P', 'C8', 'en');
    $pdf->WriteHTML($html);
    $pdf->Output('laporan-rak.pdf', 'D');

    // $data['karyawan'] = $this->UserModel->getDatakaryawan2($id_karyawan);
    // $this->load->library('pdf');
    // $this->pdf->setPaper('C7', 'potrait');
    // $this->pdf->filename = "laporan-karyawan.pdf";
    // $this->pdf->load_view('laporan/laporan_karyawan', $data);
  }
  public function laporan_all_rak()
  {
    $keyword = $this->input->get('cari', TRUE);
    $data['rak'] = $this->UserModel->getDatarak3($keyword); //mencari data karyawan berdasarkan 
    $this->load->view('templates/header');
    $this->load->view('laporan/laporan_all_rak', $data); //menampilkan data yang sudah dicari
    $this->load->view('templates/footer');

    // ob_start();
    // $data['rak'] = $this->UserModel->getAllDatarak();
    // $this->load->view('laporan/laporan_all_rak', $data);
    // $html = ob_get_contents();
    // ob_end_clean();
    // require_once(FCPATH.'assets/html2pdf/html2pdf.class.php');
    // $pdf = new HTML2PDF('P', 'A4', 'en');
    // $pdf->WriteHTML($html);
    // $pdf->Output('laporan-semua-rak.pdf', 'D');

    // $data['rak'] = $this->UserModel->getAllDatarak();
    // $this->load->library('pdf');
    // $this->pdf->setPaper('A4', 'potrait');
    // $this->pdf->filename = "laporan-semua-rak.pdf";
    // $this->pdf->load_view('laporan/laporan_all_rak', $data);
  }
  public function laporan_detail($id_detail)
  {
    ob_start();
    $data['detail'] = $this->UserModel->getDatadetail2($id_detail);
    $this->load->view('laporan/laporan_detail', $data);
    $html = ob_get_contents();
    ob_end_clean();
    require_once(FCPATH . 'assets/html2pdf/html2pdf.class.php');
    $pdf = new HTML2PDF('P', 'C8', 'en');
    $pdf->WriteHTML($html);
    $pdf->Output('laporan-detail.pdf', 'D');

    // $data['karyawan'] = $this->UserModel->getDatakaryawan2($id_karyawan);
    // $this->load->library('pdf');
    // $this->pdf->setPaper('C7', 'potrait');
    // $this->pdf->filename = "laporan-karyawan.pdf";
    // $this->pdf->load_view('laporan/laporan_karyawan', $data);
  }
  public function laporan_all_Detail()
  {
    $keyword = $this->input->get('cari', TRUE);
    $data['detail'] = $this->UserModel->getDatadetail3($keyword); //mencari data karyawan berdasarkan 
    $this->load->view('templates/header');
    $this->load->view('laporan/laporan_all_detail', $data); //menampilkan data yang sudah dicari
    $this->load->view('templates/footer');

    // ob_start();
    // $data['sparepart'] = $this->UserModel->getAllDatapart();
    // $this->load->view('laporan/laporan_all_detail', $data);
    // $html = ob_get_contents();
    // ob_end_clean();
    // require_once(FCPATH.'assets/html2pdf/html2pdf.class.php');
    // $pdf = new HTML2PDF('P', 'A4', 'en');
    // $pdf->WriteHTML($html);
    // $pdf->Output('laporan-semua-detail.pdf', 'D');

    // $data['sparepart'] = $this->UserModel->getAllDatapart();
    // $this->load->library('pdf');
    // $this->pdf->setPaper('A4', 'potrait');
    // $this->pdf->filename = "laporan-semua-detail.pdf";
    // $this->pdf->load_view('laporan/laporan_all_detail', $data);
  }
  # untuk Pengguna
  public function pengguna_tambah()
  {
    $this->UserModel->tambahDatapengguna();
    $this->session->set_flashdata('flash_sukses', 'BERHASIL ditambahkan');
    redirect('page/pengguna');
  }
  public function pengguna_hapus($id_user)
  {
    $this->UserModel->hapusDatapengguna($id_user);
    $this->session->set_flashdata('flash_sukses', 'BERHASIL dihapus');
    redirect('page/pengguna');
  }
  public function pengguna_ubah($id_user)
  {
    $data['user'] = $this->UserModel->getDatapengguna($id_user);
    $this->load->view('templates/header');
    $this->load->view('pengguna_ubah', $data);
    $this->load->view('templates/footer');
  }
  public function pengguna_edit()
  {
    $this->UserModel->ubahDatapengguna();
    $this->session->set_flashdata('flash_sukses', 'BERHASIL diubah');
    redirect('page/pengguna');
  }
  public function gantiPasswordNow()
  {
    $this->UserModel->gantiPasswordNow();
    $this->session->set_flashdata('flash_sukses', 'BERHASIL diubah');
    redirect('page/gantiPassword');
  }
  # untuk karyawan
  public function karyawan_tambah()
  {
    $npk = $this->input->post('npk');
    $nama_karyawan = $this->input->post('nama_karyawan');
    $jk = $this->input->post('jk');
    $tgl_lahir = $this->input->post('tgl_lahir');
    $alamat = $this->input->post('alamat');
    $no_telp = $this->input->post('no_telp');
    $no_ktp = $this->input->post('no_ktp');
    $email = $this->input->post('email');
    $tgl_masuk = $this->input->post('tgl_masuk');
    $status_karyawan = $this->input->post('status_karyawan');
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

    $image_name = $nama_karyawan . '.png'; //buat name dari qr code sesuai dengan nama_karyawan
    $ind = ' ';
    $params['data'] = $npk.$ind.$nama_karyawan.$ind.$jk.$ind.$tgl_lahir.$ind.$alamat.$ind.$no_telp; //data yang akan di jadikan QR CODE
    $params['level'] = 'H'; //H=High
    $params['size'] = 10;
    $params['savename'] = FCPATH . $config['imagedir'] . $image_name; //simpan image QR CODE ke folder assets/images/
    $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE
    $this->UserModel->tambahDatakaryawan($image_name);
    $this->session->set_flashdata('flash_sukses', 'BERHASIL ditambahkan');
    redirect('page/karyawan');
  }
  public function karyawan_hapus($id_user)
  {

    $this->UserModel->hapusDatakaryawan($id_user);
    $this->session->set_flashdata('flash_sukses', 'BERHASIL dihapus');
    redirect('page/karyawan');
  }
  public function karyawan_ubah($id_user)
  {
    $data['karyawan'] = $this->UserModel->getDatakaryawan($id_user);
    $this->load->view('templates/header');
    $this->load->view('karyawan_ubah', $data);
    $this->load->view('templates/footer');
  }
  public function karyawan_edit()
  {
    $this->UserModel->ubahDatakaryawan();
    $this->session->set_flashdata('flash_sukses', 'BERHASIL diubah');
    redirect('page/karyawan');
  }

  # untuk kendaraan
  public function kendaraan_tambah()
  {

    $nopol = $this->input->post('nopol');
    $model = $this->input->post('model');
    $tipe_mesin = $this->input->post('tipe_mesin');
    $model_kendaraan = $this->input->post('model_kendaraan');
    $vin_rangka = $this->input->post('vin_rangka');
    $kilometer = $this->input->post('kilometer');
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
    $params['data'] = $nopol . $ind . $model . $ind . $model_kendaraan . $ind . $tipe_mesin . $ind . $vin_rangka . $ind . $kilometer; //data yang akan di jadikan QR CODE
    $params['level'] = 'H'; //H=High
    $params['size'] = 10;
    $params['savename'] = FCPATH . $config['imagedir'] . $image_name; //simpan image QR CODE ke folder assets/images/
    $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE
    $this->UserModel->tambahDatakendaraan($image_name);
    $this->session->set_flashdata('flash_sukses', 'BERHASIL ditambahkan');
    redirect('page/kendaraan');
  }
  public function kendaraan_hapus($id_user)
  {

    $this->UserModel->hapusDatakendaraan($id_user);
    $this->session->set_flashdata('flash_sukses', 'BERHASIL dihapus');
    redirect('page/kendaraan');
  }
  public function kendaraan_ubah($id_user)
  {
    $data['kendaraan'] = $this->UserModel->getDatakendaraan($id_user);
    $this->load->view('templates/header');
    $this->load->view('kendaraan_ubah', $data);
    $this->load->view('templates/footer');
  }
  public function kendaraan_edit()
  {
    $this->UserModel->ubahDatakendaraan();
    $this->session->set_flashdata('flash_sukses', 'BERHASIL diubah');
    redirect('page/kendaraan');
  }
  # untuk Rak
  public function rak_tambah()
  {
    $no_rak = $this->input->post('no_rak');
    $nama_rak = $this->input->post('nama_rak');
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

    $image_name = $nama_rak . '.png'; //buat name dari qr code sesuai dengan nama_rak
    $ind = ' ';
    $params['data'] = $no_rak . $ind . $nama_rak; //data yang akan di jadikan QR CODE
    $params['level'] = 'H'; //H=High
    $params['size'] = 10;
    $params['savename'] = FCPATH . $config['imagedir'] . $image_name; //simpan image QR CODE ke folder assets/images/
    $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE

    $this->UserModel->tambahDatarak($image_name); //simpan ke database
    $this->session->set_flashdata('flash_sukses', 'BERHASIL ditambahkan');
    redirect('page/rak');
  }
  public function rak_hapus($id)
  {
    $this->UserModel->hapusDatarak($id);
    $this->session->set_flashdata('flash_sukses', 'BERHASIL dihapus');
    redirect('page/rak');
  }
  public function rak_ubah($id)
  {
    $data['rak'] = $this->UserModel->getDatarak($id);
    $this->load->view('templates/header');
    $this->load->view('rak_ubah', $data);
    $this->load->view('templates/footer');
  }
  public function rak_edit()
  {
    $this->UserModel->ubahDatarak();
    $this->session->set_flashdata('flash_sukses', 'BERHASIL diubah');
    redirect('page/rak');
  }

  # untuk sparepart
  public function part_tambah()
  {
    $no_part = $this->input->post('no_part');
    $deskripsi = $this->input->post('deskripsi');
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

    $image_name = $no_part . '.png'; //buat name dari qr code sesuai dengan deskripsi
    $ind = ' ';
    $params['data'] = $no_part . $ind . $deskripsi; //data yang akan di jadikan QR CODE
    $params['level'] = 'H'; //H=High
    $params['size'] = 10;
    $params['savename'] = FCPATH . $config['imagedir'] . $image_name; //simpan image QR CODE ke folder assets/images/
    $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE

    $this->UserModel->tambahDatapart($image_name); //simpan ke database
    $this->session->set_flashdata('flash_sukses', 'BERHASIL ditambahkan');
    redirect('page/part');
  }
  public function part_hapus($id)
  {
    $this->UserModel->hapusDatapart($id);
    $this->session->set_flashdata('flash_sukses', 'BERHASIL dihapus');
    redirect('page/part');
  }
  public function part_ubah($id)
  {
    $data['part'] = $this->UserModel->getDatapart($id);
    $this->load->view('templates/header');
    $this->load->view('part_ubah', $data);
    $this->load->view('templates/footer');
  }
  public function part_edit()
  {
    $this->UserModel->ubahDatapart();
    $this->session->set_flashdata('flash_sukses', 'BERHASIL diubah');
    redirect('page/part');
  }

  # untuk detail
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
    redirect('page/detail');
  }
  public function detail_hapus($id_user)
  {

    $this->UserModel->hapusDatadetail($id_user);
    $this->session->set_flashdata('flash_sukses', 'BERHASIL dihapus');
    redirect('page/detail');
  }
  public function detail_ubah($id_user)
  {
    $data['detail'] = $this->UserModel->getDatadetail($id_user);
    $this->load->view('templates/header');
    $this->load->view('detail_ubah', $data);
    $this->load->view('templates/footer');
  }
  public function detail_edit()
  {
    $this->UserModel->ubahDatadetail();
    $this->session->set_flashdata('flash_sukses', 'BERHASIL diubah');
    redirect('page/detail');
  }
  #function import data zona
  public function form()
  {
    $data = array(); // Buat variabel $data sebagai array

    if (isset($_POST['preview'])) { // Jika user menekan tombol Preview pada form
      // lakukan upload file dengan memanggil function upload yang ada di SiswaModel.php
      $upload = $this->UserModel->upload_file($this->filename);

      if ($upload['result'] == "success") { // Jika proses upload sukses
        // Load plugin PHPExcel nya
        include APPPATH . 'third_party/PHPExcel/PHPExcel.php';

        $excelreader = new PHPExcel_Reader_Excel2007();
        $loadexcel = $excelreader->load('excel/' . $this->filename . '.xlsx'); // Load file yang tadi diupload ke folder excel
        $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true, true);

        // Masukan variabel $sheet ke dalam array data yang nantinya akan di kirim ke file form.php
        // Variabel $sheet tersebut berisi data-data yang sudah diinput di dalam excel yang sudha di upload sebelumnya
        $data['sheet'] = $sheet;
      } else { // Jika proses upload gagal
        $data['upload_error'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
      }
    }

    $id = $_GET['id'];
    $this->load->view('templates/header');
    if ($id == "karyawan") {
      $this->load->view('form_import_karyawan', $data);
    } else if ($id == "rak") {
      $this->load->view('form_import_rak', $data);
    } else if ($id == "sparepart") {
      $this->load->view('form_import_sparepart', $data);
    } else if ($id == "kendaraan") {
      $this->load->view('form_import_kendaraan', $data);
    } else if ($id == "detail") {
      $this->load->view('form_import_detail', $data);
    } else {
      echo "Page Tidak sesuai !!!";
    }
  }

  public function import()
  {
    $id = $_GET['id'];

    // Load plugin PHPExcel nya
    include APPPATH . 'third_party/PHPExcel/PHPExcel.php';

    $excelreader = new PHPExcel_Reader_Excel2007();
    $loadexcel = $excelreader->load('excel/' . $this->filename . '.xlsx'); // Load file yang telah diupload ke folder excel
    $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true, true);

    // Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database
    $data = array();

    $numrow = 1;
    foreach ($sheet as $row) {
      // Cek $numrow apakah lebih dari 1
      // Artinya karena baris pertama adalah nama-nama kolom
      // Jadi dilewat saja, tidak usah diimport
      if ($numrow > 1) {
        // Kita push (add) array data ke variabel data
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

        $image_name = $row['A'] . '.png'; //buat name dari qr code sesuai dengan nama_karyawan
        $ind = '  ';
        $params['data'] = $row['A'] .$ind. $row['B']. $ind. $row['C'] .$ind. $row['D'] .$ind. $row['E'].$ind. $row['F']; //data yang akan di jadikan QR CODE
        $params['level'] = 'H'; //H=High
        $params['size'] = 10;
        $params['savename'] = FCPATH . $config['imagedir'] . $image_name; //simpan image QR CODE ke folder assets/images/
        $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE
        if ($id == "karyawan") {
          array_push($data, array(
            'npk' => $row['A'], // Insert data nis dari kolom A di excel
            'nama_karyawan' => $row['B'], // Insert data nama dari kolom B di excel
            'jk' => $row['C'], // Insert data jenis kelamin dari kolom C di excel
            'tgl_lahir' => $row['D'], // Insert data alamat dari kolom D di excel
            'alamat' => $row['E'], // Insert data alamat dari kolom E di excel
            'no_telp' => $row['F'], // Insert data alamat dari kolom F di excel
            'no_ktp' => $row['G'], // Insert data alamat dari kolom G di excel
            'email' => $row['H'], // Insert data alamat dari kolom E di excel
            'tgl_masuk' => $row['I'],
            'status_karyawan' => $row['J'],
            'user_create' => $this->session->userdata('nama_user'),
            'create_date' => date('Y-m-d'),
            'qr_code' => $row['A'].'.png'
          ));
        } else if ($id == "rak") {
          array_push($data, array(
            'no_rak' => $row['A'], // Insert data nis dari kolom A di excel
            'nama_rak' => $row['B'], // Insert data nama dari kolom B di excel
            'user_create' => $this->session->userdata('nama_user'),
            'create_date' => date('Y-m-d'),
            'qr_code' => $row['A'].'.png'
          ));
        } else if ($id == "sparepart") {
          array_push($data, array(
            'no_part' => $row['A'], // Insert data nis dari kolom A di excel
            'deskripsi' => $row['B'], // Insert data nama dari kolom B di excel
            'user_create' => $this->session->userdata('nama_user'),
            'create_date' => date('Y-m-d'),
            'qr_code' => $row['A'].'.png'
          ));
        } else if ($id == "kendaraan") {
          array_push($data, array(
            'nopol' => $row['A'], // Insert data nis dari kolom A di excel
            'model' => $row['B'], // Insert data nama dari kolom B di excel
            'tipe_mesin' => $row['C'], // Insert data jenis kelamin dari kolom C di excel
            'model_kendaraan' => $row['D'], // Insert data alamat dari kolom D di excel
            'vin_rangka' => $row['E'], // Insert data alamat dari kolom E di excel
            'kilometer' => $row['F'], // Insert data alamat dari kolom F di excel
            'user_create' => $this->session->userdata('nama_user'),
            'create_date' => date('Y-m-d'),
            'qr_code' => $row['A'].'.png'
          ));
        } else if ($id == "detail") {
          array_push($data, array(
            'nama_karyawan' => $row['A'], // Insert data nis dari kolom A di excel
            'nopol' => $row['B'], // Insert data nama dari kolom B di excel
            'model_kendaraan' => $row['C'], // Insert data jenis kelamin dari kolom C di excel
            'vin_rangka' => $row['D'], // Insert data alamat dari kolom D di excel
            'kilometer' => $row['E'], // Insert data alamat dari kolom E di excel
            'tgl_perbaikan' => $row['F'], // Insert data alamat dari kolom F di excel
            'tgl_penyerahan' => $row['G'], // Insert data alamat dari kolom G di excel
            'no_part' => $row['H'], // Insert data alamat dari kolom E di excel
            'barcode' => $row['I'],
            'lpd' => $row['J'],
            'nama_rak' => $row['K'],
            'user_create' => $this->session->userdata('nama_user'),
            'create_date' => date('Y-m-d'),
            'qr_code' => $row['A'].'.png'
          ));
        } else {
          echo "Page Tidak sesuai !!!";
        }
      }
      $numrow++; // Tambah 1 setiap kali looping
    }

    // Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model
    if ($id == "karyawan") {
      $this->UserModel->insert_multiple($data);
      redirect('page/karyawan');
    } else if ($id == "rak") {
      $this->UserModel->insert_multiple($data);
      redirect('page/rak');
    } else if ($id == "sparepart") {
      $this->UserModel->insert_multiple($data);
      redirect('page/part');
    } else if ($id == "kendaraan") {
      $this->UserModel->insert_multiple($data);
      redirect('page/kendaraan');
    } else if ($id == "detail") {
      $this->UserModel->insert_multiple($data);
      redirect('page/detail');
    } else {
      echo "Page Tidak sesuai !!!";
    }
    // Redirect ke halaman awal (ke controller siswa fungsi index)
  }
}

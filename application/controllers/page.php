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
    require_once(FCPATH.'assets/html2pdf/html2pdf.class.php');
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
    require_once(FCPATH.'assets/html2pdf/html2pdf.class.php');
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
    require_once(FCPATH.'assets/html2pdf/html2pdf.class.php');
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
    require_once(FCPATH.'assets/html2pdf/html2pdf.class.php');
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
    require_once(FCPATH.'assets/html2pdf/html2pdf.class.php');
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
    $nama_pegawai = $this->input->post('nama_pegawai');
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

    $params['data'] = $nama_karyawan; //data yang akan di jadikan QR CODE
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

    $params['data'] = $model_kendaraan; //data yang akan di jadikan QR CODE
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

    $params['data'] = $nama_rak; //data yang akan di jadikan QR CODE
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

    $params['data'] = $deskripsi; //data yang akan di jadikan QR CODE
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

    $params['data'] = $model_kendaraan; //data yang akan di jadikan QR CODE
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
}

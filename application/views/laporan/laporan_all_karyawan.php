<?php
$this->session->userdata('authenticated')
//$this->session->set_userdata($session);
?>

<html>

<head></head>

<body style="font-size: 10px;">
<h2 style="text-align: center">Laporan Semua Karyawan</h2>
        <table border="1" width="100%" style="width: 100%; margin-top: 20px;">
        <thead>
            <tr>
                <td style="padding: 10px;">No.</td>
                <td style="padding: 10px;">NPK</td>
                <td style="padding: 10px;">Nama Lengkap</td>
                <td style="padding: 10px;">Kelamin</td>
                <td style="padding: 10px;">Tanggal Lahir</td>
                <td style="padding: 10px; width: 20px;">Alamat</td>
                <td style="padding: 10px;">No. Telp</td>
                <td style="padding: 10px;">No. KTP</td>
                <td style="padding: 10px;">Status Karyawan</td>
                <td style="padding: 10px;">Tanggal Masuk Kerja</td>
                <td style="padding: 10px;">QR QODE</td>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 0;
            foreach ($karyawan as $s) : $no++; ?>
                <tr>
                    <td style="padding: 10px;"><?= $no ?></td>
                    <td style="padding: 10px;"><?= $s['npk'] ?></td>
                    <td style="padding: 10px;"><?= $s['nama_karyawan'] ?></td>
                    <td style="padding: 10px;"><?= $s['jk'] ?></td>
                    <td style="padding: 10px;"><?= $s['tgl_lahir'] ?></td>
                    <td style="padding: 10px;"><?= $s['alamat'] ?></td>
                    <td style="padding: 10px;"><?= $s['no_telp'] ?></td>
                    <td style="padding: 10px;"><?= $s['no_ktp'] ?></td>
                    <td style="padding: 10px;"><?= $s['status_karyawan'] ?></td>
                    <td style="padding: 10px;"><?= $s['tgl_masuk'] ?></td>
                    <td style="padding: 10px;"><img style="width: 80px;" src="<?php echo FCPATH . 'assets/images/' . $s['qr_code']; ?>"></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <br><br>
    <div align="right">
        Bandung, <?= date('d/m/Y') ?><br><br><br><br>
        <?= $this->session->userdata('nama_user'); ?>
    </div>
</body>

</html>
<?php
$this->session->userdata('authenticated')
//$this->session->set_userdata($session);
?>

<html>
<head></head>
<body style="font-size: 10px;">
<br>
    <table>
    <?php foreach ($karyawan as $s) :?>
            <tr>
                <td colspan="3"><img src="<?php echo FCPATH.'assets/images/logo.png'?>" width="30px"> &nbsp;&nbsp;&nbsp;&nbsp; Data Karyawan</td>
            </tr>
            <tr><td colspan="3"><hr></td></tr>
            <tr>
                <td>Pada Tanggal</td>
                <td style="padding-left: 10px;"> : </td>
                <td><?=date('d/m/Y')?></td>
            </tr>
            <tr>
                <td>Alamat Kami</td>
                <td style="padding-left: 10px;"> : </td>
                <td>-</td>
            </tr>
            <tr>
                <td>No. Telp Kami</td>
                <td style="padding-left: 10px;"> : </td>
                <td>-</td>
            </tr>
            <tr>
                <td>NPK</td>
                <td style="padding-left: 10px;"> : </td>
                <td><?= $s['npk']; ?></td>
            </tr>
            <tr>
                <td>Nama Lengkap</td>
                <td style="padding-left: 10px;"> : </td>
                <td><?= $s['nama_karyawan']; ?></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td style="padding-left: 10px;"> : </td>
                <td><?= $s['jk']; ?></td>
            </tr>
            <tr>
                <td>Tanggal Lahir</td>
                <td style="padding-left: 10px;"> : </td>
                <td><?= $s['tgl_lahir']; ?></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td style="padding-left: 10px;"> : </td>
                <td><?= $s['alamat']; ?></td>
            </tr>
            <tr>
                <td>No.Telp</td>
                <td style="padding-left: 10px;"> : </td>
                <td><?= $s['no_telp']; ?></td>
            </tr>
            <tr>
                <td>No.KTP</td>
                <td style="padding-left: 10px;"> : </td>
                <td><?= $s['no_ktp']; ?></td>
            </tr>
            <tr>
                <td>Email</td>
                <td style="padding-left: 10px;"> : </td>
                <td><?= $s['email']; ?></td>
            </tr>
            <tr>
                <td>Status</td>
                <td style="padding-left: 10px;"> : </td>
                <td><?= $s['status_karyawan']; ?></td>
            </tr>
            <tr>
                <td>Tgl Masuk</td>
                <td style="padding-left: 10px;"> : </td>
                <td><?= $s['tgl_masuk']; ?></td>
            </tr>
            <tr>
                <td>QR QODE</td>
                <td style="padding-left: 10px;"> : </td>
                <td><img style="width: 80px;" src="<?php echo FCPATH . 'assets/images/' . $s['qr_code']; ?>"></td>
            </tr>
            <tr align="right">
                <td colspan="3"><br><br><br></td>
            </tr>
            <tr align="right">
                <td colspan="3"><?= $this->session->userdata('nama_user'); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
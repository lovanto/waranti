<?php
$this->session->userdata('authenticated')
//$this->session->set_userdata($session);
?>

<html>
<head></head>
<body style="font-size: 10px;">
<br>
    <table>
    <?php foreach ($sparepart as $s) :?>
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
                <td>No. Part</td>
                <td style="padding-left: 10px;"> : </td>
                <td><?=$s['no_part']?></td>
            </tr>
            <tr>
                <td>Deskripsi</td>
                <td style="padding-left: 10px;"> : </td>
                <td><?=$s['deskripsi']?></td>
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
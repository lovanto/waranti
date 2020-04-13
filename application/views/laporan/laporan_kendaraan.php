<?php
$this->session->userdata('authenticated')
//$this->session->set_userdata($session);
?>

<html>
<head></head>
<body style="font-size: 6px;">
<br>
    <table>
        <?php foreach ($kendaraan as $s) : ?>
            <tr>
                <td colspan="3"><img src="<?php echo FCPATH.'assets/images/logo.png'?>" style="width: 30px;"> &nbsp;&nbsp;&nbsp;&nbsp; Data Kendaraan</td>
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
                <td>Nopol</td>
                <td style="padding-left: 10px;"> : </td>
                <td><?= $s['nopol']; ?></td>
            </tr>
            <tr>
                <td>Model</td>
                <td style="padding-left: 10px;"> : </td>
                <td><?= $s['model']; ?></td>
            </tr>
            <tr>
                <td>Model Kendaraan</td>
                <td style="padding-left: 10px;"> : </td>
                <td><?= $s['model_kendaraan']; ?></td>
            </tr>
            <tr>
                <td>Tipe Mesin</td>
                <td style="padding-left: 10px;"> : </td>
                <td><?= $s['tipe_mesin']; ?></td>
            </tr>
            <tr>
                <td>VIN/No.Rangka</td>
                <td style="padding-left: 10px;"> : </td>
                <td><?= $s['vin_rangka']; ?></td>
            </tr>
            <tr>
                <td>Kilometer</td>
                <td style="padding-left: 10px;"> : </td>
                <td><?= $s['kilometer']; ?></td>
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
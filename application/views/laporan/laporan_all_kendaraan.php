<?php
$this->session->userdata('authenticated')
//$this->session->set_userdata($session);
?>

<html>

<head></head>

<body style="font-size: 10px;">
    <h2 style="text-align: center">Laporan Semua Kendaraan</h2>
        <table border="1" width="500px" style="width: 500px; margin-left: 80px; margin-top: 20px;">
            <thead>
                <tr>
                    <td style="padding: 10px;">No.</td>
                    <td style="padding: 10px;">No. Polisi</td>
                    <td style="padding: 10px;">Model</td>
                    <td style="padding: 10px;">Tipe Mesin</td>
                    <td style="padding: 10px;">Model Kendaraan</td>
                    <td style="padding: 10px;">VIN</td>
                    <td style="padding: 10px;">Kilometer</td>
                    <td style="padding: 10px;">QR QODE</td>
                </tr>
            </thead>
            <tbody>
                <?php $no = 0;
                foreach ($kendaraan as $s) : $no++; ?>
                    <tr>
                        <td style="padding: 10px;"><?= $no ?></td>
                        <td style="padding: 10px;"><?= $s['nopol'] ?></td>
                        <td style="padding: 10px;"><?= $s['model'] ?></td>
                        <td style="padding: 10px;"><?= $s['tipe_mesin'] ?></td>
                        <td style="padding: 10px;"><?= $s['model_kendaraan'] ?></td>
                        <td style="padding: 10px;"><?= $s['vin_rangka'] ?></td>
                        <td style="padding: 10px;"><?= $s['kilometer'] ?></td>
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
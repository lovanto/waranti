<?php
$this->session->userdata('authenticated')
//$this->session->set_userdata($session);
?>

<html>

<head></head>

<body style="font-size: 10px;">
    <br>
    <h2 style="text-align: center">Laporan Semua Detail Sparepart</h2>
    <?php foreach ($sparepart as $s) : ?>
        <table border="1" style="margin-top: 20px;">
            <tr>
                <td style="padding: 15px;">Dealer: awdwadwadaw</td>
                <td style="padding: 15px;">Part No: <?= $s['no_part'] ?></td>
            </tr>
            <tr>
                <td style="padding: 15px;">Claim No: awdwadwadaw</td>
                <td style="padding: 15px;">Part Qty: awdwadwadaw</td>
            </tr>
            <tr>
                <td style="padding: 15px;">DPC No: awdwadwadaw</td>
                <td style="padding: 15px;">Engine No: awdwadwadaw</td>
            </tr>
            <tr>
                <td style="padding: 15px;">VIN: awdwadwadaw</td>
                <td style="padding: 15px;">KM: awdwadwadaw</td>
            </tr>
            <tr>
                <td style="padding: 15px;"><img style="width: 90px;" src="<?php echo FCPATH . 'assets/images/' . $s['qr_code']; ?>"></td>
                <td style="padding: 15px;">
                    Part Name: awdwadwadaw
                    <br>OVERHAUL (FOR M/T)
                    <br><br>Prod. Date: awdwadwadaw
                    <br>Status Part: awdwadwadaw
                    <br>Condition: awdwadwadaw
                    <br><?= $s['deskripsi'] ?>
                </td>
            </tr>
        </table>
        <br><br><br>
    <?php endforeach; ?>
    <br><br><br><br>
    <div><?= $this->session->userdata('nama_user'); ?></div>
</body>

</html>
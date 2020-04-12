<?php
$this->session->userdata('authenticated')
//$this->session->set_userdata($session);
?>

<html>

<head></head>

<body style="font-size: 10px;">
    <br>
    <table border="1">
        <?php foreach ($part as $s) :?>
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
                <td style="padding: 15px;"><img style="width: 80px;" src="<?php echo FCPATH . 'assets/images/' . $s['qr_code']; ?>"></td>
                <td style="padding: 15px;">
                    Part Name: awdwadwadaw
                    <br>OVERHAUL (FOR M/T)
                    <br><br>Prod. Date: awdwadwadaw
                    <br>Status Part: awdwadwadaw
                    <br>Condition: awdwadwadaw
                    <br><?= $s['deskripsi'] ?>
                </td>
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
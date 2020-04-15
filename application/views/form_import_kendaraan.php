 <div class="container">
   <div class="card">
     <!-- <div class="card-header">Header</div> -->
     <div class="card-body">
       <label>Import Data</label>
       <hr>

       <a href="<?php echo base_url("excel/format-kendaraan.xlsx"); ?>">Download Format</a>
       <br>
       <br>

       <!-- Buat sebuah tag form dan arahkan action nya ke controller ini lagi -->
       <form method="post" action="<?php echo base_url("page/form?id=kendaraan"); ?>" enctype="multipart/form-data">
         <!--
                      -- Buat sebuah input type file
                      -- class pull-left berfungsi agar file input berada di sebelah kiri
                      -->
         <input type="file" name="file">

         <!--
                      -- BUat sebuah tombol submit untuk melakukan preview terlebih dahulu data yang akan di import
                      -->
         <input type="submit" name="preview" value="Preview">
       </form>

       <?php
        if (isset($_POST['preview'])) { // Jika user menekan tombol Preview pada form
          if (isset($upload_error)) { // Jika proses upload gagal
            echo "<div style='color: red;'>" . $upload_error . "</div>"; // Muncul pesan error upload
            die; // stop skrip
          }

          // Buat sebuah tag form untuk proses import data ke database
          echo "<form method='post' action='" . base_url("page/import?id=kendaraan") . "'>";

          // Buat sebuah div untuk alert validasi kosong
          echo "<div style='color: red;' id='kosong'>
                      Semua data belum diisi, Ada <span id='jumlah_kosong'></span> data yang belum diisi.
                      </div>";

          echo "<table border='1' cellpadding='8'>
                      <tr>
                        <th colspan='6'>Preview Data</th>
                      </tr>
                      <tr>
                        <th>Nomor Polisi</th>
                        <th>Model</th>
                        <th>Tipe Mesin</th>
                        <th>Model Kendaraan</th>
                        <th>VIN Rangka</th>
                        <th>Kilometer</th>
                      </tr>";

          $numrow = 1;
          $kosong = 0;

          // Lakukan perulangan dari data yang ada di excel
          // $sheet adalah variabel yang dikirim dari controller
          foreach ($sheet as $row) {
            // Ambil data pada excel sesuai Kolom
            $nopol = $row['A']; // Ambil data NIS
            $model = $row['B']; // Ambil data nama
            $tipe_mesin = $row['C']; // Ambil data jenis kelamin
            $model_kendaraan = $row['D']; // Ambil data tarif
            $vin_rangka = $row['E'];
            $kilometer = $row['F'];
            // Cek jika semua data tidak diisi
            if ($nopol == "" && $model == "" && $kategori == "" && $tarif == "")
              continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)

            // Cek $numrow apakah lebih dari 1
            // Artinya karena baris pertama adalah nama-nama kolom
            // Jadi dilewat saja, tidak usah diimport
            if ($numrow > 1) {
              // Validasi apakah semua data telah diisi
              $nopol_td = (!empty($zona)) ? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah

              $model_td = (!empty($model)) ? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merahnpl
              $tipe_mesin_td = (!empty($tipe_mesin)) ? "" : " style='background: #E07171;'"; // Jika Jenis Kelamin kosong, beri warna merah
              $model_kendaraan_td = (!empty($model_kendaraan)) ? "" : " style='background: #E07171;'"; // Jika vin_rangka kosong, beri warna merah
              $vin_rangka_td = (!empty($vin_rangka)) ? "" : " style='background: #E07171;'"; // Jika vin_rangka kosong, beri warna merah
              $kilometer_td = (!empty($kilometer)) ? "" : " style='background: #E07171;'"; // Jika vin_rangka kosong, beri warna merah

              // Jika salah satu data ada yang kosong
              if ($nopol == "" or $model == "" or $tipe_mesin == "" or $model_kendaraan == "") {
                $kosong++; // Tambah 1 variabel $kosong
              }

              echo "<tr>";
              echo "<td" . $nopol_td . ">" . $nopol . "</td>";
              echo "<td" . $model_td . ">" . $model . "</td>";
              echo "<td" . $tipe_mesin_td . ">" . $tipe_mesin . "</td>";
              echo "<td" . $model_kendaraan_td . ">" . $model_kendaraan . "</td>";
              echo "<td" . $vin_rangka_td . ">" . $vin_rangka . "</td>";
              echo "<td" . $kilometer_td . ">" . $kilometer . "</td>";
              echo "</tr>";
            }

            $numrow++; // Tambah 1 setiap kali looping
          }

          echo "</table>";

          // Cek apakah variabel kosong lebih dari 0
          // Jika lebih dari 0, berarti ada data yang masih kosong
          if ($kosong > 0) {
        ?>
           <script>
             $(document).ready(function() {
               // Ubah isi dari tag span dengan id jumlah_kosong dengan isi dari variabel kosong
               $("#jumlah_kosong").html('<?php echo $kosong; ?>');

               $("#kosong").show(); // Munculkan alert validasi kosong
             });
           </script>
       <?php
          } else { // Jika semua data sudah diisi
            echo "<hr>";

            // Buat sebuah tombol untuk mengimport data ke database
            echo "<button type='submit' name='import'>Import</button>";
            echo "<a href='" . base_url("page/kendaraan") . "'>Cancel</a>";
          }

          echo "</form>";
        }
        ?>
     </div>
     <!-- Load File jquery.min.js yang ada difolder js -->
     <script src="<?php echo base_url('js/jquery.min.js'); ?>"></script>

     <script>
       $(document).ready(function() {
         // Sembunyikan alert validasi kosong
         $("#kosong").hide();
       });
     </script>
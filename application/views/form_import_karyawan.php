 <div class="container">
   <div class="card">
     <!-- <div class="card-header">Header</div> -->
     <div class="card-body">
       <label>Import Data</label>
       <hr>

       <a href="<?php echo base_url("excel/format-karyawan.xlsx"); ?>">Download Format</a>
       <br>
       <br>

       <!-- Buat sebuah tag form dan arahkan action nya ke controller ini lagi -->
       <form method="post" action="<?php echo base_url("page/form?id=karyawan"); ?>" enctype="multipart/form-data">
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
          echo "<form method='post' action='" . base_url("page/import?id=karyawan") . "'>";

          // Buat sebuah div untuk alert validasi kosong
          echo "<div style='color: red;' id='kosong'>
                      Semua data belum diisi, Ada <span id='jumlah_kosong'></span> data yang belum diisi.
                      </div>";

          echo "<table border='1' cellpadding='8'>
                      <tr>
                        <th colspan='10'>Preview Data</th>
                      </tr>
                      <tr>
                        <th>NPK</th>
                        <th>Nama </th>
                        <th>Gender</th>
                        <th>Tanggal Lahir </th>
                        <th>Alamat </th>
                        <th>No Telp</th>
                        <th>No Ktp </th>
                        <th>Email </th>
                        <th>Tgl Masuk kerja</th>
                        <th>Status karyawan</th>
                      </tr>";

          $numrow = 1;
          $kosong = 0;

          // Lakukan perulangan dari data yang ada di excel
          // $sheet adalah variabel yang dikirim dari controller
          foreach ($sheet as $row) {
            // Ambil data pada excel sesuai Kolom
            $npk = $row['A']; // Ambil data NIS
            $nama_karyawan = $row['B']; // Ambil data nama
            $jk = $row['C']; // Ambil data jenis kelamin
            $tgl_lahir = $row['D']; // Ambil data tarif
            $alamat = $row['E'];
            $no_telp = $row['F'];
            $no_ktp = $row['G'];
            $email = $row['H'];
            $tgl_masuk = $row['I'];
            $status_karyawan = $row['J'];
            // Cek jika semua data tidak diisi
            if ($npk == "" && $nama_karyawan == "" && $kategori == "" && $tarif == "")
              continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)

            // Cek $numrow apakah lebih dari 1
            // Artinya karena baris pertama adalah nama-nama kolom
            // Jadi dilewat saja, tidak usah diimport
            if ($numrow > 1) {
              // Validasi apakah semua data telah diisi
              $npk_td = (!empty($zona)) ? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah

              $nama_karyawan_td = (!empty($nama_karyawan)) ? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merahnpl
              $jk_td = (!empty($jk)) ? "" : " style='background: #E07171;'"; // Jika Jenis Kelamin kosong, beri warna merah
              $tgl_lahir_td = (!empty($tgl_lahir)) ? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
              $alamat_td = (!empty($alamat)) ? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
              $no_telp_td = (!empty($no_telp)) ? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
              $no_ktp_td = (!empty($no_ktp)) ? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
              $email_td = (!empty($email)) ? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
              $tgl_masuk_td = (!empty($tgl_masuk)) ? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
              $status_karyawan_td = (!empty($status_karyawan)) ? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
              // Jika salah satu data ada yang kosong
              if ($npk == "" or $nama_karyawan == "" or $jk == "" or $tgl_lahir == "") {
                $kosong++; // Tambah 1 variabel $kosong
              }

              echo "<tr>";
              echo "<td" . $npk_td . ">" . $npk . "</td>";
              echo "<td" . $nama_karyawan_td . ">" . $nama_karyawan . "</td>";
              echo "<td" . $jk_td . ">" . $jk . "</td>";
              echo "<td" . $tgl_lahir_td . ">" . $tgl_lahir . "</td>";
              echo "<td" . $alamat_td . ">" . $alamat . "</td>";
              echo "<td" . $no_telp_td . ">" . $no_telp . "</td>";
              echo "<td" . $no_ktp_td . ">" . $no_ktp . "</td>";
              echo "<td" . $email_td . ">" . $email . "</td>";
              echo "<td" . $tgl_masuk_td . ">" . $tgl_masuk . "</td>";
              echo "<td" . $status_karyawan_td . ">" . $status_karyawan . "</td>";
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
            echo "<a href='" . base_url("page/karyawan") . "'>Cancel</a>";
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
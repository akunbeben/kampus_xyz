<?php include 'assets/header.php'; ?>
    <div class="wrapper">
    <br>
      <div class="row">
        <div class="container">
          <h3>Daftar Nilai</h3>
        </div>
      </div>

      <br>

      <br>

      <div class="container">
        <table class="table table-bordered table-striped">
          <thead class="thead-dark">
            <tr>
              <th>NO</th>
              <th>NIM</th>
              <th>Nama Mahasiswa</th>
              <th>Program Studi</th>
              <th>Mata Kuliah</th>
              <th>Nilai Angka</th>
              <th>Nilai Huruf</th>
              <th>Opsi</th>
            </tr>
          </thead>
          <tbody>

          <?php 
          // var_dump($conn);

          $no = 1;

          $ambildb  = "SELECT * FROM mahasiswa INNER JOIN nilai ON mahasiswa.nim=nilai.nim";

          $tampungdb  = $conn->query($ambildb);

          while ($tampil = $tampungdb->fetch_assoc()) { ?>

          <?php 
           if ($tampil['nilai_a'] < 50) {
            $huruf = "E";
          } elseif ($tampil['nilai_a'] < 65) {
            $huruf = "D";
          } elseif ($tampil['nilai_a'] < 75) {
            $huruf = "C";
          } elseif ($tampil['nilai_a'] < 85) {
            $huruf = "B";
          } elseif ($tampil['nilai_a'] >= 85) {
            $huruf = "A";
          }
          ?>
            <tr>
            <td style="text-align: center;"><?= $no++; ?></td>
              <td><?= $tampil['nim']; ?></td>
              <td><?= $tampil['nama_mhs']; ?></td>
              <td><?= $tampil['prodi']; ?></td>
              <td><?= $tampil['matkul']; ?></td>
              <td><?= $tampil['nilai_a']; ?></td>
              <td><?= $huruf; ?></td>
              <td style="text-align: center; width: 250px;">
                <a href="edit_nilai.php?id_nilai=<?= $tampil['id_nilai']; ?>" class="btn btn-warning">Ubah</a>
                <a href="hapus_nilai.php?id_nilai=<?= $tampil['id_nilai']; ?>" class="btn btn-danger" onclick="return confirm('Yakin hapus <?= $tampil['nama_mhs']; ?>');">Hapus</a>
              </td>
            </tr>
          <?php } ?>
          </tbody>
        </table>
        <div class="form-group float-right">
            <a href="index.php" class="btn btn-primary">Halaman Utama</a>
            <a href="tambah_nilai.php" class="btn btn-primary">Tambah</a>
        </div>
      </div>
    </div>
<?php include 'assets/footer.php'; ?>
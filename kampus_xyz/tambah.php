<?php include 'assets/header.php'; ?>

<div class="wrapper"><br>
    <div class="container">
      <h3>Tambah Data Mahasiswa</h3>
    </div>
    <br>
  <div class="container">
    <form action="" method="POST">

      <div class="form-group">
        <label for="nim">NIM</label>
        <input class="form-control" type="text" placeholder="NIM" name="nim" required>
      </div>

      <div class="form-group">
        <label for="nama_mhs">Nama Mahasiswa</label>
        <input class="form-control" type="text" placeholder="Nama Mahasiswa" name="nama_mhs" required>
      </div>

      <div class="form-group">
        <label for="prodi">Program Studi</label>
        <input class="form-control" type="text" placeholder="Program Studi" name="prodi" required>
      </div>

      <div class="form-group">
        <label for="alamat">Alamat Domisili</label>
        <input class="form-control" type="text" placeholder="Alamat Domisili" name="alamat" required>
      </div>

      <div class="form-group">
        <label for="hp">Nomor Handphone</label>
        <input class="form-control" type="text" placeholder="Nomor Handphone" name="hp" required>
      </div>

      <div class="form-group float-right">
        <a href="index.php" class="btn btn-danger">Halaman Utama</a>
        <input class="btn btn-primary" type="submit" name="tambah" value="Tambah">
      </div>

    </form>
  </div>
</div>

<?php

if (isset($_POST['tambah'])) {
  $nim          = $_POST['nim'];
  $nama_mhs     = $_POST['nama_mhs'];
  $prodi        = $_POST['prodi'];
  $alamat       = $_POST['alamat'];
  $hp           = $_POST['hp'];

  $query        = "INSERT INTO mahasiswa SET nim='$nim', nama_mhs='$nama_mhs', prodi='$prodi', alamat='$alamat', hp='$hp'";

  $pushdata     = $conn->query($query);

  if ($pushdata == TRUE) {
    echo "<script>alert('Data berhasil ditambahkan'); window.location.href='index.php';</script>";
  } else {
    header('Location: tambah.php');
  }
}
?>

<?php include 'assets/footer.php'; ?>
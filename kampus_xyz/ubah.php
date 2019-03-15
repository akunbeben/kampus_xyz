<?php 

include 'assets/header.php';

$get_nim    = $_GET['nim'];

$query      = "SELECT * FROM mahasiswa WHERE nim='$get_nim'";

$tampung    = $conn->query($query);

$tampil     = $tampung->fetch_assoc();

?>

<div class="wrapper"><br>
  <div class="container">
    <h3>Edit Data Mahasiswa</h3>
  </div>
  <br>
  <div class="container">
    <form action="" method="POST">

      <div class="form-group">
        <label for="nim">NIM</label>
        <input class="form-control" type="text" placeholder="NIM" name="nim" value="<?= $tampil['nim']; ?>" required readonly>
      </div>

      <div class="form-group">
        <label for="nama_mhs">Nama Mahasiswa</label>
        <input class="form-control" type="text" placeholder="Nama Mahasiswa" name="nama_mhs" value="<?= $tampil['nama_mhs']; ?>" required>
      </div>

      <div class="form-group">
        <label for="prodi">Program Studi</label>
        <input class="form-control" type="text" placeholder="Program Studi" name="prodi" value="<?= $tampil['prodi']; ?>" required>
      </div>

      <div class="form-group">
        <label for="alamat">Alamat Domisili</label>
        <input class="form-control" type="text" placeholder="Alamat Domisili" name="alamat" value="<?= $tampil['alamat']; ?>" required>
      </div>

      <div class="form-group">
        <label for="hp">Nomor Handphone</label>
        <input class="form-control" type="text" placeholder="Nomor Handphone" name="hp" value="<?= $tampil['hp']; ?>" required>
      </div>

      <div class="form-group float-right">
        <a href="index.php" class="btn btn-primary">Halaman Utama</a>
        <input class="btn btn-primary" type="submit" name="tambah" value="Ubah">
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

  $query        = "UPDATE mahasiswa SET nim='$nim', nama_mhs='$nama_mhs', prodi='$prodi', alamat='$alamat', hp='$hp' WHERE nim='$nim'";

  $pushdata     = $conn->query($query);

  if ($pushdata == TRUE) {
    echo "<script>alert('Data berhasil dirubah'); window.location.href='index.php';</script>";
  } else {
    header('Location: tambah.php');
  }
}
?>

<?php include 'assets/footer.php'; ?>
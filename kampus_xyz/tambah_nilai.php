<?php include 'assets/header.php'; ?>
<?php 

$getnim     = "SELECT nim FROM mahasiswa";

$gonim      = $conn->query($getnim);

?>
<div class="wrapper"><br>
    <div class="container">
      <h3>Tambah Data Nilai</h3>
    </div>
    <br>
  <div class="container">
    <form action="" method="POST">

      <div class="form-group">
        <label for="nim">NIM</label>
        <select class="form-control" name="nim" required>
        <?php while ($tampil = $gonim->fetch_assoc()) { ?>
            <option value="<?= $tampil['nim']; ?>"><?= $tampil['nim']; ?></option>
            
        <?php } ?>
        </select>
      </div>

      <div class="form-group">
        <label for="nama_matkul">Nama Matakuliah</label>
        <input class="form-control" type="text" placeholder="Nama Matakuliah" name="nama_matkul" required>
      </div>

      <div class="form-group">
        <label for="angka">Nilai Angka</label>
        <input class="form-control" type="text" placeholder="Nilai Angka" name="angka" required>
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
  $nama_matkul  = $_POST['nama_matkul'];
  $angka        = $_POST['angka'];

  $query        = "INSERT INTO nilai VALUES ('$nim', '', '$nama_matkul', '$angka')";

  $pushdata     = $conn->query($query);

  if ($pushdata == TRUE) {
    echo "<script>alert('Data berhasil ditambahkan'); window.location.href='nilai.php';</script>";
  } else {
    header('Location: tambah_nilai.php');
  }
}
?>

<?php include 'assets/footer.php'; ?>
<?php
if (isset($_POST['submit'])) {
  if (editProfile($_POST) > 0) {
    echo
    "
      <script>
      document.location.href='?hal=profile&sip=1&msg=Berhasil Mengedit Profil!';
      </script>
      ";
  } else {
    echo
    "
      <script>
      document.location.href='?hal=edit-profile&ops=1&msg=Gagal Mengedit Profil!';
      </script>
      ";
  }
}
?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <!-- <h1 class="h3 mb-0 text-gray-800">Profile</h1> -->
</div>
<div class="row justify-content-center">
  <div class="col-8">
    <div class="card">
      <div class="card-header">Edit Profil Saya</div>
    </div>
    <form method="post">
      <input type="hidden" name="uid" value="<?= $dataLogin['uid'] ?>">
      <div class="card-body">
        <div class="mb-3 row">
          <label for="nama" class="col-sm-2 col-form-label">Nama :</label>
          <div class="col-sm">
            <input type="text" name="nama" class="form-control" value="<?= $dataLogin['nama'] ?>" required>
          </div>
        </div>
        <div class="mb-3 row">
          <label for="nama" class="col-sm-2 col-form-label">Username :</label>
          <div class="col-sm">
            <input type="text" name="username" class="form-control" value="<?= $dataLogin['username'] ?>" required>
          </div>
        </div>
        <div class="mb-3 row">
          <label for="email" class="col-sm-2 col-form-label">Email :</label>
          <div class="col-sm">
            <input type="text" name="email" class="form-control" value="<?= $dataLogin['email'] ?>">
          </div>
        </div>
        <div class="mb-3 row text-right">
          <div class="col-sm">
            <button class="btn btn-info mb-2" type="submit" name="submit"><i class="fas fa-check"></i> Submit</button>
            <a href="?hal=profile" class="btn btn-success mb-2"><i class="fas fa-arrow-left"> Kembali</i></a>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
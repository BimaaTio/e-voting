<?php 
if(isset($_POST['submit'])){
  if(ubahPassword($_POST) > 0){
    echo
    "
      <script>
      alert('Password Berhasil diubah!')
      document.location.href='?hal=profile';
      </script>
      ";
  } else {
    echo
    "
      <script>
      alert('Gagal Mengubah Password!')
      document.location.href='?hal=ubah-password';
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
      <div class="card-header">Ubah Password</div>
    </div>
    <form method="post">
      <input type="hidden" name="uid" value="<?= $dataLogin['uid'] ?>">
      <div class="card-body">
        <div class="mb-3 row">
          <label for="pass1" class="col-sm-4 col-form-label">Password Baru :</label>
          <div class="col-sm">
            <input type="password" name="pass1" class="form-control" required>
          </div>
        </div>
        <div class="mb-3 row">
          <label for="pass2" class="col-sm-4 col-form-label">Konfirmasi Password Baru :</label>
          <div class="col-sm">
            <input type="password" name="pass2" class="form-control" required>
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
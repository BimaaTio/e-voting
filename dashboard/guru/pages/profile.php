<?php
?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <!-- <h1 class="h3 mb-0 text-gray-800">Profile</h1> -->
</div>
<div class="row justify-content-center">
  <div class="col-8">
    <?php if (isset($_GET['sip']) == 'berhasil' && isset($_GET['msg'])) : ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Siip!</strong> <?= $_GET['msg'] ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <?php endif; ?>
    <?php if (isset($_GET['ops']) == 'gagal' && isset($_GET['msg'])) : ?>
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Oops!</strong> <?= $_GET['msg'] ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <?php endif; ?>
    <div class="card">
      <div class="card-header">Profil Saya</div>
    </div>
    <div class="card-body">
      <div class="mb-3 row">
        <label for="nama" class="col-sm-2 col-form-label">Nama :</label>
        <div class="col-sm">
          <input type="text" class="form-control" readonly value="<?= $dataLogin['nama'] ?>">
        </div>
      </div>
      <div class="mb-3 row">
        <label for="nama" class="col-sm-2 col-form-label">Username :</label>
        <div class="col-sm">
          <input type="text" class="form-control" readonly value="<?= $dataLogin['username'] ?>">
        </div>
      </div>
      <div class="mb-3 row">
        <label for="email" class="col-sm-2 col-form-label">Email :</label>
        <div class="col-sm">
          <input type="text" class="form-control" readonly value="<?= $dataLogin['email'] ?>">
        </div>
      </div>
      <div class="mb-3 row">
        <label for="password" class="col-sm-2 col-form-label">Password :</label>
        <div class="col-sm">
          <input type="text" class="form-control" readonly value="*********">
        </div>
      </div>
      <div class="mb-3 row text-right">
        <div class="col-sm">
          <a href="?hal=edit-profile" class="btn btn-info mb-2"><i class="fas fa-edit"></i> Edit Profil</a>
          <a href="?hal=ubah-password" class="btn btn-success mb-2"><i class="fas fa-eye"> Ubah Password</i></a>
        </div>
      </div>
    </div>
  </div>
</div>
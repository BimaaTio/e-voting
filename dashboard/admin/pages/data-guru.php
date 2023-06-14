<?php
if (isset($_POST['submit'])) {
  if (register($_POST) > 0) {
    echo
    "
      <script>
      alert('Berhasil Membuat Akun')
      </script>
      ";
  } else {

    echo
    "
      <script>
      alert('Gagal Membuat Akun')
      </script>
      ";
  }
}
if (isset($_POST['editAkun'])) {
  if (editProfile($_POST) > 0) {
    echo
    "
      <script>
      alert('Berhasil Mengubah Akun')
      </script>
      ";
  } else {
    echo
    "
      <script>
      alert('Gagal Membuat Akun')
      </script>
      ";
  }
}
$dataGuru = query("SELECT * FROM users WHERE level='guru'");
?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Data Akun Guru</h1>
</div>
<div class="row">
  <div class="col">
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
      <div class="card-header">
        <button class="btn btn-md btn-success" data-toggle="modal" data-target="#tambahAkun">Tambah Akun</button>
        <div id="dataGuru"></div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <div>
            <table class="table table-bordered" id="akunGuru">
              <thead class="text-center">
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Username</th>
                  <th>Email</th>
                  <th>Tgl Dibuat</th>
                  <th></th>
                </tr>
              </thead>
              <tbody class="text-center">
                <?php $no = 1;
                foreach ($dataGuru as $dg) : ?>
                  <tr id="<?= $dg['uid'] ?>">
                    <td data-id="<?= $dg['uid'] ?>"><?= $no++ ?></td>
                    <td data-target="nama"><?= $dg['nama'] ?></td>
                    <td data-target="username"><?= $dg['username'] ?></td>
                    <td data-target="email"><?= $dg['email'] ?></td>
                    <td><?= $dg['tgl_dibuat'] ?></td>
                    <td>
                      <a data-toggle="modal" data-target="#editAkun" data-role="editAkun" data-id="<?= $dg['uid'] ?>" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                      <a href="hapus.php?uid=<?= $dg['uid'] ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Modal Tambah AKun -->
<div class="modal fade" id="tambahAkun" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <form action="" method="post">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Akun Baru</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="mb-3 row">
            <label for="name" class="col-sm-2 col-form-label">Name:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="name" id="name" required>
            </div>
          </div>
          <div class="mb-3 row">
            <label for="name" class="col-sm-2 col-form-label">Username:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="username" id="username" required>
            </div>
          </div>
          <div class="mb-3 row">
            <label for="email" class="col-sm-2 col-form-label">Email:</label>
            <div class="col-sm-10">
              <input type="email" class="form-control" name="email" id="email" required>
            </div>
          </div>
          <div class="mb-3 row">
            <p class="col-sm-4 col-form-label">NB : Default Password "12345"</p>
          </div>
          <input type="hidden" name="pass" value="12345">
          <input type="hidden" name="level" value="guru">
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <button class="btn btn-primary" type="submit" name="submit">Submit</button>
        </div>
      </div>
    </div>
  </form>
</div>
<!-- Modal Edit Akun Guru -->
<div class="modal fade" id="editAkun" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <form action="" method="post">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Akun</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="mb-3 row">
            <label for="name" class="col-sm-2 col-form-label">Name:</label>
            <div class="col-sm-10">
              <input type="hidden" name="id" id="id">
              <input type="text" class="form-control" name="name" id="editName" required>
            </div>
          </div>
          <div class="mb-3 row">
            <label for="name" class="col-sm-2 col-form-label">Username:</label>
            <div class="col-sm-10">
              <input type="hidden" name="id" id="id">
              <input type="text" class="form-control" name="username" id="editUsername" required>
            </div>
          </div>
          <div class="mb-3 row">
            <label for="email" class="col-sm-2 col-form-label">Email:</label>
            <div class="col-sm-10">
              <input type="email" class="form-control" name="email" id="editEmail" required>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <button class="btn btn-primary" type="submit" name="editAkun">Submit</button>
        </div>
      </div>
    </div>
  </form>
</div>
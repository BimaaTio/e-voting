<?php
if (isset($_POST['tambahKandidat'])) {
  if (tambahKandidat($_POST) > 0) {
    echo
    "
      <script>
      document.location.href='?hal=data-kandidat&sip=1&msg=Berhasil Menambah Kandidat!';
      </script>
      ";
  } else {
    echo
    "
      <script>
      document.location.href='?hal=data-kandidat&ops=1&msg=Gagal Menambah Profil!';
      </script>
      ";
  }
}

if (isset($_POST['editKandidat'])) {
  if (editKandidat($_POST) > 0) {
    echo
    "
      <script>
      document.location.href='?hal=data-kandidat&sip=1&msg=Berhasil Mengedit Data Kandidat!';
      </script>
      ";
  } else {
    echo
    "
      <script>
      document.location.href='?hal=data-kandidat&ops=1&msg=Gagal Mengedit Data Kandidat!';
      </script>
      ";
  }
}
$dataKandidat = query("SELECT * FROM candidate");
?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Data Kandidat</h1>
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
        <button class="btn btn-md btn-success" data-toggle="modal" data-target="#tambahKandidat">Tambah Kandidat</button>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="akunGuru">
            <thead class="text-center">
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Tgl Dibuat</th>
                <th></th>
              </tr>
            </thead>
            <tbody class="text-center">
              <?php $no = 1;
              foreach ($dataKandidat as $dk) : ?>
                <tr id="<?= $dk['nis'] ?>">
                  <td data-id="<?= $dk['nis'] ?>"><?= $no++ ?></td>
                  <td data-target="nama"><?= $dk['nama'] ?></td>
                  <td data-target="kelas"><?= $dk['kelas'] ?></td>
                  <td><?= $dk['tgl_dibuat'] ?></td>
                  <td>
                    <!-- <a href="" class="btn btn-sm btn-success"><i class="fas fa-info-circle"></i></a> -->
                    <a data-role="editKandidat" data-id="<?= $dk['nis'] ?>" data-toggle="modal" data-target="#editKandidat" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                    <a href="hapus.php?nis=<?= $dk['nis'] ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
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
<!-- Modal Tambah Kandidat -->
<div class="modal fade" id="tambahKandidat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            <label for="name" class="col-sm-2 col-form-label">Nama :</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="name" id="name" required>
            </div>
          </div>
          <div class="mb-3 row">
            <label for="kelas" class="col-sm-2 col-form-label">Kelas :</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="kelas" id="kelas" required>
            </div>
          </div>


        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <button class="btn btn-primary" type="submit" name="tambahKandidat">Submit</button>
        </div>
      </div>
    </div>
  </form>
</div>

<!-- Modal Edit Kandidat -->
<div class="modal fade" id="editKandidat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <form action="" method="post">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Data Kandidat</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="id" id="id">
          <div class="mb-3 row">
            <label for="name" class="col-sm-2 col-form-label">Nama :</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="editNama" id="editNama" required>
            </div>
          </div>
          <div class="mb-3 row">
            <label for="kelas" class="col-sm-2 col-form-label">Kelas :</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="editKelas" id="editKelas" required>
            </div>
          </div>


        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <button class="btn btn-primary" type="submit" name="editKandidat">Submit</button>
        </div>
      </div>
    </div>
  </form>
</div>
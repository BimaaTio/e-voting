<?php
$data = query("SELECT c.nis, c.nama, c.kelas, v.tgl_vote, v.status_vote
FROM candidate c
INNER JOIN vote v ON c.nis = v.nis
INNER JOIN users u ON v.uid = u.uid
WHERE u.uid = $uid");
$no = 1;
?>
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
        Riwayat Vote Anda
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="vote">
            <thead class="text-center">
              <tr>
                <th width="1%">No</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Tgl Vote</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody class="text-center">
              <?php foreach ($data as $d) : ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= $d['nama'] ?></td>
                  <td><?= $d['kelas'] ?></td>
                  <td><?= $d['tgl_vote'] ?></td>
                  <?php if ($d['status_vote'] === '1') : ?>
                    <td><span class="badge bg-success text-white">Naik</span></td>
                  <?php endif; ?>
                  <?php if ($d['status_vote'] === '0') : ?>
                    <td><span class="badge bg-warning text-white">Tidak Naik</span></td>
                  <?php endif; ?>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
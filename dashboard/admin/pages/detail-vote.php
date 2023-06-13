<?php
$nis = $_GET['nis'];
$no = 1;
$row = query("SELECT c.nis, c.nama, c.kelas,
            v.id_vote,
            v.status_vote,
            v.tgl_vote,
            u.uid AS vote_uid,
            u.nama AS vote_nama
      FROM candidate c
      LEFT JOIN vote v ON c.nis = v.nis
      LEFT JOIN users u ON v.uid = u.uid
      WHERE c.nis = $nis;
");
?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Detail Vote Kandidat</h1>
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
        <div class="mb-3 row">
          NIS : <?= $row[0]['nis'] ?>
        </div>
        <div class="mb-3 row">
          Nama : <?= $row[0]['nama'] ?>
        </div>
        <div class="mb-3 row">
          Kelas : <?= $row[0]['kelas'] ?>
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead class="text-center">
              <tr>
                <th>No</th>
                <th>Vote By</th>
                <th>Status Vote</th>
                <th>Tgl Vote</th>
              </tr>
            </thead>
            <tbody class="text-center">
              <?php foreach ($row as $d) : ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= $d['vote_nama'] ?></td>
                  <?php if ($d['status_vote'] === '1') : ?>
                    <td><span class="badge bg-success text-white">Naik</span></td>
                  <?php endif; ?>
                  <?php if($d['status_vote'] === '0') :?>
                    <td><span class="badge bg-warning text-white">Tidak Naik</span></td>
                  <?php endif; ?>
                  <td><?= $d['tgl_vote'] ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
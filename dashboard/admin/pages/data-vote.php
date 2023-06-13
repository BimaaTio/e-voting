<?php
$data = query("SELECT c.nis, c.nama, c.kelas,
              COALESCE(v.total_vote, 0) AS total_vote,
              COALESCE(v.total_vote_naik, 0) AS total_vote_naik,
              COALESCE(v.total_vote_tidak_naik, 0) AS total_vote_tidak_naik,
              COALESCE(v.voted_by, '') AS voted_by
        FROM candidate c
        LEFT JOIN (
          SELECT vote.nis,
                COUNT(DISTINCT vote.id_vote) AS total_vote,
                SUM(CASE WHEN vote.status_vote = '1' THEN 1 ELSE 0 END) AS total_vote_naik,
                SUM(CASE WHEN vote.status_vote = '0' THEN 1 ELSE 0 END) AS total_vote_tidak_naik,
                GROUP_CONCAT(DISTINCT users.uid) AS voted_by
          FROM vote
          JOIN users ON vote.uid = users.uid
          GROUP BY vote.nis
        ) v ON c.nis = v.nis;
");
$no = 1;
?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Data Vote</h1>
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
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="vote">
            <thead class="text-center">
              <tr>
                <th>No</th>
                <th>NIS</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Total Vote</th>
                <th></th>
              </tr>
            </thead>
            <tbody class="text-center">
              <?php foreach ($data as $d) : ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= $d['nis'] ?></td>
                  <td><?= $d['nama'] ?></td>
                  <td><?= $d['kelas'] ?></td>
                  <?php if ($d['total_vote'] <= 1) : ?>
                    <td><span class="badge bg-warning">Belum ada vote</span></td>
                  <?php else : ?>
                    <td><?= $d['total_vote'] ?></td>
                  <?php endif; ?>
                  <td>
                    <a href="?hal=detail-vote&nis=<?= $d['nis'] ?>" class="btn btn-sm btn-success"><i class="fas fa-info-circle"></i></a>
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
<?php
$kandidat = query("SELECT * FROM candidate");
$guru     = query("SELECT * FROM users WHERE level = 'guru'");
$totalVote = query("SELECT * FROM vote");


$data = query("SELECT c.nis, c.nama, c.kelas,
            COALESCE(v.total_vote, 0) AS total_vote,
            COALESCE(v.total_vote_naik, 0) AS total_vote_naik,
            COALESCE(v.total_vote_tidak_naik, 0) AS total_vote_tidak_naik,
            COALESCE(v.voted_by, '') AS voted_by,
            COALESCE(v.total_pemilih, 0) AS total_pemilih
      FROM candidate c
      LEFT JOIN (
        SELECT vote.nis,
              COUNT(DISTINCT vote.id_vote) AS total_vote,
              SUM(CASE WHEN vote.status_vote = '1' THEN 1 ELSE 0 END) AS total_vote_naik,
              SUM(CASE WHEN vote.status_vote = '0' THEN 1 ELSE 0 END) AS total_vote_tidak_naik,
              GROUP_CONCAT(DISTINCT users.uid) AS voted_by,
              COUNT(DISTINCT users.uid) AS total_pemilih
        FROM vote
        JOIN users ON vote.uid = users.uid
        GROUP BY vote.nis
      ) v ON c.nis = v.nis
      ORDER BY total_vote DESC;
");
$no = 1;
?>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>
<!-- Content Row Cards -->
<div class="row">
  <!-- Jumlah Kandidat -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
              Jumlah Kandidat</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= count($kandidat) ?></div>
          </div>
          <div class="col-auto">
            <i class="fas fa-users fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Jumlah Guru -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
              Jumlah Guru</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= count($guru) ?></div>
          </div>
          <div class="col-auto">
            <i class="fas fa-user-graduate fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Jumlah Total Vote -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-info shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
              Total Vote</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= count($totalVote) ?></div>
          </div>
          <div class="col-auto">
            <i class="fas fa-chart-line fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Content Row Chart-->
<div class="row">
  <!-- Area Chart -->
  <div class="col">
    <div class="card shadow mb-4">
      <!-- Card Header - Dropdown -->
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Hasil Vote</h6>
      </div>
      <!-- Card Body -->
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="vote">
            <thead class="text-left">
              <tr>
                <th width="1%">No</th>
                <th width="23%">Nama</th>
                <th width="8%">Kelas</th>
                <th width="29%">Vote Naik</th>
                <th>Vote Tidak Naik</th>
                <th width="6%">Total Pemilih</th>
              </tr>
            </thead>
            <tbody class="text-left">
              <?php foreach ($data as $d) : ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= $d['nama'] ?></td>
                  <td><?= $d['kelas'] ?></td>
                  <td>
                    <div class="progress">
                      <div class="progress-bar bg-success" role="progressbar" style="width: <?= $d['total_vote_naik'] ?>%;" aria-valuenow="<?= $d['total_vote_naik'] ?>" aria-valuemin="0" aria-valuemax="100"><?= $d['total_vote_naik'] ?></div>
                    </div>
                  </td>
                  <td>
                    <div class="progress">
                      <div class="progress-bar bg-warning" role="progressbar" style="width: <?= $d['total_vote_tidak_naik'] ?>%;" aria-valuenow="<?= $d['total_vote_tidak_naik'] ?>" aria-valuemin="0" aria-valuemax="100">
                        <?= $d['total_vote_tidak_naik'] ?></div>
                    </div>
                  </td>
                  <td><?= $d['total_pemilih'] ?></td>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
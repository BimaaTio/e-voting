<?php
$admin = query("SELECT * FROM users WHERE level = 'admin' ");
$guru     = query("SELECT * FROM users WHERE level = 'guru'");

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
              Jumlah Admin</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= count($admin) ?></div>
          </div>
          <div class="col-auto">
            <i class="fas fa-user-secret fa-2x text-gray-300"></i>
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
</div>
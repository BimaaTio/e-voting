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
        <ul class="list-unstyled">
          <li class="mb-2">Cara Vote :</li>
          <ul class="ml-0">
            <li>Klik tombol vote</li>
            <li>Pilih Naik / Tidak Naik</li>
            <li>Submit</li>
          </ul>
        </ul>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="vote">
            <thead class="text-center">
              <tr>
                <th width="1%">No</th>
                <th>NIS</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th width="5%"></th>
              </tr>
            </thead>
            <tbody class="text-center">
              <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                  <a href="?hal=vote&nis=" class="btn btn-sm btn-success"><i class="fas fa-bullhorn"></i> Vote</a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
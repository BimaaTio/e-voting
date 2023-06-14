<?php
$nis = $_GET['nis'];
$data = query("SELECT * FROM candidate WHERE nis='$nis'")[0];

if (isset($_POST['submit'])) {
  if (vote($_POST) > 0) {
    echo
    "
      <script>
      alert('Berhasil Melakukan Vote')
      document.location.href='?hal=votes';
      </script>
      ";
  } else {
    // echo
    // "
    //   <script>
    //   alert('Gagal Melakukan vote')
    //   document.location.href='?hal=votes';
    //   </script>
    //   ";
  }
}
?>

<div class="row justify-content-center">
  <div class="col-md-10">
    <div class="card ">
      <div class="card-header">
        <div class="mb-1 row">
          <p>NIS : <?= $data['nis'] ?></p>
        </div>
        <div class="mb-1 row">
          <p>Nama : <?= $data['nama'] ?></p>
        </div>
        <div class="mb-1 row">
          <p>Kelas : <?= $data['kelas'] ?></p>
        </div>
        <form action="" method="post">
          <input type="hidden" name="uid" value="<?= $uid ?>">
          <input type="hidden" name="nis" value="<?= $nis ?>">
          <div class="row text-center">
            <div class="col-auto">
              <div class="btn-group-toggle" data-toggle="buttons">
                <label class="btn btn-success active">
                  <input type="radio" name="options" id="option1" name="naik" value="1" autocomplete="off" required> Naik
                </label>
                <label class="btn btn-warning ml-2">
                  <input type="radio" name="options" id="option3" name="tidak-naik" value="0" autocomplete="off" required> Tidak Naik
                </label>
              </div>
            </div>
            <div class="col">
              <button type="submit" class="btn btn-md btn-primary" name="submit"><i class="fas fa-file-upload"></i> Submit</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
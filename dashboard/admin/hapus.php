<?php
require '../../config/functions.php';

if(isset($_GET['uid'])){
  $uid = $_GET['uid'];
  mysqli_query($conn, "DELETE FROM users WHERE uid = $uid");
  echo "
  <script>
      document.location.href = 'index.php?hal=data-guru&sip=1&msg=Berhasil Dihapus';
  </script>
  ";
}

if (isset($_GET['nis'])) {
  $nis = $_GET['nis'];
  mysqli_query($conn, "DELETE FROM candidate WHERE nis = $nis");
  echo "
  <script>
      document.location.href = 'index.php?hal=data-kandidat&sip=1&msg=Berhasil Dihapus';
  </script>
  ";
}

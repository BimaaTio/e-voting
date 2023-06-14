<?php
//! Timezone WIB
date_default_timezone_set('Asia/Jakarta');

//= Connection
$host   = 'localhost';
$name   = 'root';
$pass   = '';
$dbname = 'e_voting';

$conn = mysqli_connect($host,$name,$pass,$dbname);
if(mysqli_error($conn)){
  die("Connection failed" . mysqli_error($conn));
}
//= Query Data => fetch to array associative
function query($query){
  global $conn;
  $result = mysqli_query($conn, $query);
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}
//= Random Number Generator
function randNumb($lenght = 10){
  $num = '1234567890';
  $lenght = strlen($num);
  $random = '';
  for ($i = 1; $i < $lenght; $i++) {
    $random .= $num[rand(0, $lenght - 1)];
  }
  return $random;
}
function register($data)
{
  global $conn;

  $uid    = substr(randNumb(), 4);
  $nama   = ucwords(htmlspecialchars(stripslashes($data['name'])));
  $username = htmlspecialchars(stripslashes($data['username']));
  $email  = htmlspecialchars(stripslashes($data['email']));
  $pass   = mysqli_real_escape_string($conn, $data['pass']);
  $level  = $data['level'];
  //! Cek email
  $cekUsername = query("SELECT * FROM users WHERE username = '$username' ");
  if ($cekUsername) {
    echo
    "
      <script>
      alert('Username Sudah dipakai!, Silahkan Gunakan Username lain')
      </script>
      ";
    return false;
  }
  // Encrypt password yang akan dimasukan kedalam database
  $password = password_hash($pass, PASSWORD_BCRYPT);

  mysqli_query($conn, "INSERT INTO users VALUES($uid,'$nama','$username','$email','$password','$level', CURDATE())");
  return mysqli_affected_rows($conn);
}
//= Edit Profile
function editProfile($data) {
  global $conn;

  $uid = $data['uid'];
  $nama = ucwords(htmlspecialchars(stripslashes($data['nama'])));
  $username = htmlspecialchars(stripslashes($data['username']));
  $email = htmlspecialchars(stripslashes($data['email']));
  $cekEmail   = query("SELECT * FROM users WHERE email = '$email' ");
  if ($cekEmail) {
    echo
    "
      <script>
      alert('Email Sudah ada!, Silahkan Gunakan Email lain')
      </script>
      ";
    return false;
  }

  mysqli_query($conn, "UPDATE users SET nama = '$nama', username = '$username' , email = '$email' WHERE uid = $uid");
  return mysqli_affected_rows($conn);
}
//= Ubah Password
function ubahPassword($data) {
  global $conn;

  $uid = $data['uid'];
  $pass1 = mysqli_real_escape_string($conn, $data['pass1']);
  $pass2 = mysqli_real_escape_string($conn, $data['pass2']);
  if($pass1 != $pass2){
    echo
    "
      <script>
      alert('Password Tidak Sesuai!, Silahkan cek Kembali Passwordnya!')
      </script>
      ";
    return false;
  }
  $encPassword = password_hash($pass1, PASSWORD_BCRYPT);
  mysqli_query($conn, "UPDATE users SET password = '$encPassword' WHERE uid = $uid");
  return mysqli_affected_rows($conn);
}
//= Tambah Kandidat
function tambahKandidat($data) {
  global $conn;

  $nis  = substr(randNumb(), 4);
  $nama = ucwords(htmlspecialchars(stripslashes($data['name'])));
  $kelas = htmlspecialchars(stripslashes($data['kelas']));

  //! Cek nama sudah ada belum
  $cekNama = query("SELECT * FROM candidate WHERE nama = '$nama'");
  if($cekNama){
    echo
    "
      <script>
      alert('Nama Sudah dipakai!, Silahkan Cek lagi!')
      </script>
      ";
    return false;
  }
  // Cek NIS 
  $cekNis = query("SELECT * FROM candidate WHERE nis = $nis");
  if($cekNis){
    echo
    "
      <script>
      alert('NIS Sudah dipakai!, Silahkan Cek lagi!')
      </script>
      ";
    return false;
  }

  mysqli_query($conn,"INSERT INTO candidate VALUES('$nis','$nama','$kelas', CURDATE())");
  return mysqli_affected_rows($conn);
}
//= Edit Data Kandidat
function editKandidat($data)
{
  global $conn;

  $id = $data['id'];
  $nama = ucwords(htmlspecialchars(stripslashes($data['editNama'])));
  $kelas = strtoupper(htmlspecialchars(stripslashes($data['editKelas'])));

  mysqli_query($conn, "UPDATE candidate SET nama = '$nama', kelas = '$kelas' WHERE nis = $id");
  return mysqli_affected_rows($conn);
}
//= Vote
function vote($data)
{
  global $conn;

  $uid = $data['uid'];
  $nis = $data['nis'];
  $statusVote = $data['options'];

  mysqli_query($conn, "INSERT INTO vote VALUES(NULL,$uid,$nis,'$statusVote',CURRENT_TIMESTAMP())");
  return mysqli_affected_rows($conn);
  // var_dump($data);
}
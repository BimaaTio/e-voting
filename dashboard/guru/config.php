<?php
if ($_GET['hal'] == '') {
  include 'pages/dash.php';
} else if ($_GET['hal'] == 'data-guru') {
  include 'pages/data-guru.php';
} else if ($_GET['hal'] == 'data-kandidat') {
  include 'pages/data-kandidat.php';
} else if ($_GET['hal'] == 'profile') {
  include 'pages/profile.php';
} else if ($_GET['hal'] == 'edit-profile') {
  include 'pages/edit-profile.php';
} else if ($_GET['hal'] == 'ubah-password') {
  include 'pages/ubah-password.php';
} else if ($_GET['hal'] == 'votes') {
  include 'pages/list-vote.php';
} else if ($_GET['hal'] == 'vote' && $_GET['nis'] == $_GET['nis']) {
  include 'pages/detail-vote.php';
}

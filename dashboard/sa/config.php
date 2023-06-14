<?php
if ($_GET['hal'] == '') {
  include 'pages/dash.php';
} else if ($_GET['hal'] == 'data-guru') {
  include 'pages/data-guru.php';
} else if ($_GET['hal'] == 'data-admin') {
  include 'pages/data-admin.php';
} else if ($_GET['hal'] == 'profile') {
  include 'pages/profile.php';
} else if ($_GET['hal'] == 'edit-profile') {
  include 'pages/edit-profile.php';
} else if ($_GET['hal'] == 'ubah-password') {
  include 'pages/ubah-password.php';
}

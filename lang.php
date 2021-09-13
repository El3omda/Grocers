<?php


session_start();



if ($_SESSION['url'] == '/GitHub/Grocers/index.php') {
  if (!isset($_SESSION['lang'])) {
    $_SESSION['lang'] = 'ar';
    header('Location:index.php');
  }  else {
    unset($_SESSION['lang']);
    header('Location:index.php');
  }
}

if ($_SESSION['url'] == '/GitHub/Grocers/sign-up.php') {
  if (!isset($_SESSION['lang'])) {
    $_SESSION['lang'] = 'ar';
    header('Location:sign-up.php');
  }  else {
    unset($_SESSION['lang']);
    header('Location:sign-up.php');
  }
}

if ($_SESSION['url'] == '/GitHub/Grocers/sign-in.php') {
  if (!isset($_SESSION['lang'])) {
    $_SESSION['lang'] = 'ar';
    header('Location:sign-in.php');
  }  else {
    unset($_SESSION['lang']);
    header('Location:sign-in.php');
  }
}

if ($_SESSION['url'] == '/GitHub/Grocers/shop.php') {
  if (!isset($_SESSION['lang'])) {
    $_SESSION['lang'] = 'ar';
    header('Location:shop.php');
  }  else {
    unset($_SESSION['lang']);
    header('Location:shop.php');
  }
}

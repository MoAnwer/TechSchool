<!DOCTYPE html>
<html lang="en" dir="rtl">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?=$imgs?>rome.svg" type="image/x-icon">
    <link rel="stylesheet" href="<?= $css?>bootstrap.min.css">
    <link rel="stylesheet" href="<?= $css?>backend.css">
    <link rel="stylesheet" href="<?= $css?>bootstrap-icons.css">
    <script src="<?=$js?>jquery.min.js"></script>
    <script src="<?=$js?>bootstrap.min.js"></script>
    <title><?=getTitle($pageTitle)?></title>
  </head>
<?php
  if (!isset($noGrid)) {
    echo "<body class='main'>";
  } else {
    echo "<body>";
  }
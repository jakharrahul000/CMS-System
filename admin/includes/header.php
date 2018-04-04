<?php include "../includes/db.php" ?>
<?php ob_start(); ?>
<?php session_start(); ?>


<?php

if (isset($_SESSION['user_role'])) {
    if ($_SESSION['user_role'] !== 'admin') {
        header("Location: ../index.php");
    }
}

if (!isset($_SESSION['user_role'])) {
    header("Location: ../index.php");
}



?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard - CMS Admin</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <!-- Page Specific CSS -->
    <link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css">

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
  </head>

  <body>
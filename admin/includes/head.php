<?php
session_start();
include "../includes/connection.php";
if (!isset($_SESSION['name'])) {
    // code...
    header("Location: ../index.php");
}
?>
<!DOCTYPE html>
<html lang="en"> 

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/sweetalert2.min.css">
    <link rel="stylesheet" href="../assets/css/mystyles.css">
    <link rel="stylesheet" href="../assets/vendors/iconly/bold.css">
    <link rel="stylesheet" href="../assets/vendors/simple-datatables/style.css">
    <link rel="stylesheet" href="../assets/css/pages/email.css">
    <link rel="stylesheet" href="../assets/vendors/choices.js/choices.min.css" />

    <link rel="stylesheet" href="../assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="../assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/app.css">
    <link rel="shortcut icon" href="../assets/images/favicon.svg" type="image/x-icon">
    
<!-- <link rel="stylesheet" href="assets/vendors/tinymce/summernote-lite.min.css"> -->
</head>
<body>
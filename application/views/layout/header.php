<!DOCTYPE html>
<html>
<head>
    <title>My Website</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

<div class="container">

<a class="navbar-brand" href="<?php echo site_url('pages/home'); ?>">My Website</a>

<div class="navbar-nav">

<a class="nav-link" href="<?php echo site_url('pages/home'); ?>">Home</a>

<a class="nav-link" href="<?php echo site_url('pages/about'); ?>">About</a>

<a class="nav-link" href="<?php echo site_url('pages/services'); ?>">Services</a>

<a class="nav-link" href="<?php echo site_url('pages/contact'); ?>">Contact</a>

</div>

</div>

</nav>

<div class="container mt-4">
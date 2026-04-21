<?php $u = user(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mini LMS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-dark text-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-black px-3">

    <a class="navbar-brand" href="?page=home">LMS</a>

    <div class="ms-auto d-flex gap-2 align-items-center">

        <a href="?page=posts" class="btn btn-outline-light btn-sm">Posts</a>

        <?php if ($u): ?>
        <a href="?page=diary" class="btn btn-outline-light btn-sm">Diary</a>
        <?php endif; ?>
        
        <a href="?page=profile" class="btn btn-outline-light btn-sm">Profile</a>

        <?php if ($u): ?>
            <span class="text-light ms-3">
                <?= htmlspecialchars($u['email']) ?>
                (<?= htmlspecialchars($u['role']) ?>)
            </span>

            <a href="?page=logout" class="btn btn-danger btn-sm ms-2">Logout</a>

        <?php else: ?>
            <a href="?page=login" class="btn btn-primary btn-sm">Login</a>
            <a href="?page=register" class="btn btn-success btn-sm">Register</a>
        <?php endif; ?>

    </div>

</nav>

<div class="container mt-3">
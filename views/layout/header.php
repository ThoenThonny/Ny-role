<!DOCTYPE html>

<html>
<html lang="km">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Certificate System' ?></title>

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">


    <!-- link css -->
    <link href="<?= base_url('assets/css/app.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/sidebar.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/dashboard.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/studentslist.css') ?>" rel="stylesheet">
</head>

<body>
    <div class="d-flex font-siemreap">
        <!-- sidebar -->
        <?php require __DIR__ . '/sidebar.php'; ?>

        <!-- main content -->
        <main class="flex-grow-1 p-4">
    <!-- App Styles -->
    <link href="./assets/css/app.css" rel="stylesheet">
    <link href="./assets/css/sidebar.css" rel="stylesheet">
    <link href="./assets/css/dashboard.css" rel="stylesheet">
</head>
<body>
    <div class="app-wrapper font-siemreap">
        <!-- Sidebar -->
        <?php require __DIR__ . '/sidebar.php'; ?>

        <!-- Main Content -->
        <main class="app-main">


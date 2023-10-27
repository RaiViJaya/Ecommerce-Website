<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?= $this-> include("bootstrap") ?>
    <link rel="stylesheet" href="<?= base_url() ?>/public/css/main.css">
</head>
<body>
    <?= $this->include('navbar')?>
    <?= $this->renderSection('content')?>
</body>
</html>
<script src="<?= base_url() ?>/public/js/main.js"></script>
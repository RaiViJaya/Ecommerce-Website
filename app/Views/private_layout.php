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
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
            <h2>Welcome to admin dashboard</h2>
            </div>
            <div class="col-sm-3">
            <div class="list-group">
                    <a href="<?= base_url('admin/users') ?>" class="list-group-item">Users</a>
                    <a href="<?= base_url('admin/product_categories') ?>" class="list-group-item">Product Categories</a>
                </div>
            </div>
            <div class="col-sm-9">
            <?= $this->renderSection('content')?>
            </div>
        </div>
    </div>
    <?= $this->renderSection('content')?>
</body>
</html>
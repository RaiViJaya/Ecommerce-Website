<?= $this->extend('public_layout')?>
<?= $this->section('content') ?>
<!-- <?= base_url()?> -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Information details</title>
</head>
<body>
    
    <!-- <div class="mb-3">
       <label for="name" class="form-label">Name</label>
       <input type="text" class="form-control" id="name" placeholder="Enter your name">
    </div>
    <div class="mb-3">
       <label for="email" class="form-label">Email address</label>
       <input type="email" class="form-control" id="email" placeholder="name@example.com">
    </div>
    <div class="mb-3">
       <label for="phone" class="form-label">Phone number</label>
       <input type="tel" class="form-control" id="phone" placeholder="91XXXXXXXX">
    </div> -->
    <div class="container">
        <div class="card mt-5">
            <div class="card-body">
            <h4>Fill this form</h4>
            <?php $session=session();?>
                    <?php if ($success_message = $session->get("success_message")): ?>
    <div class="alert alert-success">
        <?= $success_message ?>
        <?php $session->remove("success_message"); ?>
    </div>
<?php endif; ?>
                <form action="<?= base_url() ?>" method="post">
                    <div class="mb-2">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name=name>
                    </div>
                    <div class="mb-2">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name=email>
                    </div>
                    <div class="mb-2">
                        <label for="phone">Phone number</label>
                        <input type="text" class="form-control" name=phone>
                    </div>
                    <div class="mb-2 text-center">
                        <input type="submit" name="submit" value="Submit" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
<?= $this->endSection()?>
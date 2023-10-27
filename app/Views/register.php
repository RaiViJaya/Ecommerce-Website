<?= $this->extend('public_layout') ?>
<?= $this->section('content') ?>
<div class="container">
    <div class="row">
        <div class="col-sm-4 mx-auto">
            <div class="card mt-5" >
                <div class="card-body">
                    <h2>Create new account</h2>
                    <?php $session=session();?>
                    <?php if(! is_null($session->getFlashdata('success_message'))):?>
                    <div class="alert alert-success">
                        <?=$session->getFlashdata('success_message');?>
                    </div>
                    <?php endif ?>
                    <?php $session=session();?>
                    <?php if ($success_message = $session->get("success_message")): ?>
    <div class="alert alert-success">
        <?= $success_message ?>
        <?php $session->remove("success_message"); ?>
    </div>
<?php endif; ?>

                    
                    

                    <?php $validation=\config\Services::validation();  //echo "<pre>"; print_r($validation); die; ?>
                    <form action="<?= base_url('register') ?>" method="post">
                        <div class="mb-2">
                            <label for="username">Username</label>
                            <input type="text" name="username" class="form-control" value="<?= old("username") ?>" >
                            <div class="text-danger">
                            <?= $validation->getError("username"); ?>
                            </div>
                        </div>

                        <div class="mb-2">
                            <label for="email">Email id</label>
                            <input type="text" name="email" class="form-control" value="<?= old("email") ?>" >
                            <div class="text-danger">
                            <?= $validation->getError("email") ?>
                            </div>
                        </div>

                        <div class="mb-2">
                            <label for="password">Password</label>
                            <input type="text" name="password" class="form-control" value="<?= old("password") ?>">
                            <div class="text-danger">
                            <?= $validation->getError("password") ?>
                            </div>
                        </div>

                        <div class="mb-2">
                            <label for="cpassword">Confirm Password</label>
                            <input type="text" name="cpassword" class="form-control" value="<?= old("cpassword") ?>">
                            <div class="text-danger">
                            <?= $validation->getError("cpassword") ?>
                            </div>
                        </div>

                        <div class="mb-2 text-center">
                            <input type="submit" name="register" value="Register"
                            class="btn btn-primary">
                        </div>

                    </form>
                    <a href="<?= base_url('login')?>">Already have an account?</a>
                </div>
            </div>
            
        </div>
    </div>
</div>
<?= $this->endSection() ?>
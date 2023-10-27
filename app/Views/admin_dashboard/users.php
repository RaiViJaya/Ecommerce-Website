<?= $this->extend('private_layout') ?>
<?= $this->section('content') ?>
<div class="container">
    <div class="row">
        <h2>List of registered users</h2>
        <table class="table table-dark table-bordered">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($users as $user): ?>
                    <tr>
                        <td><?=$user['username']?></td>
                        <td><?=$user['email']?></td>
                    </tr>
                    <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>


<?= $this->endSection() ?>
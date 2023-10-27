<?= $this->extend('private_layout') ?>
<?= $this->section('content') ?>
<div class="row">
    <div class="col-sm-4 mx-auto">
        <?php 
        $validation = \Config\Services::validation();
        ?>
        <div class="card">
            <div class="card-body">
                <form action="<?= base_url('admin/product_categories') ?>" method="post" enctype="multipart/form-data">
                    <div class="mb-2">
                        <h4>Add product categories</h4>
                    </div>
                    <div class="mb-2">
                        <label for="name">Category name</label>
                        <input type="text" name="name" class="form-control" value="<?=old('name')?>">
                        <span class="text-danger"><?= $validation->getError('name') ?></span>
                    </div>

                    <div class="mb-2">
                        <label for="image">Category image</label>
                        <input type="file" name="image" class="form-control">
                        <span class="text-danger"><?= $validation->getError('image') ?></span>
                    </div>
                    <div class="mb-2 text-center">
                        <input type="submit" name="save" value="Save" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <h5>List of categories</h5>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Image</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($records as $record):?>
                <tr>
                    <td><?=$record['name']?></td>
                    <td>
                        <img 
                        src="<?=base_url()?>/public/images/product_categories/<?=$record['image']?>"
                        style="width:80px; height:80px; object-fit:cover;">

                    </td>
                </tr>   
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection() ?>
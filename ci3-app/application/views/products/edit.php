<div class="container">
    <div class="card">
        <div class="card-header">
            Edit Product Form
        </div>
        <div class="card-body">
            <form action="" method="post">
                <input type="hidden" name="id" value="<?= $product['id'] ?>">
                <div class="mb-3">
                    <label for="">Product name</label>
                    <input type="text" name="name" class="form-control" value="<?= $product['name']; ?>">
                    <small class="form-text text-danger"><?= form_error('name') ?></small>
                </div>
                <input type="hidden" name="slug">
                <div class="mb-3">
                    <label for="">Product image</label>
                    <input type="text" name="image" class="form-control" value="<?= $product['image']; ?>">
                    <small class="form-text text-danger"><?= form_error('image') ?></small>
                </div>
                <div class="mb-3">
                    <label for="">Product price</label>
                    <input type="number" name="price" class="form-control" value="<?= $product['price']; ?>">
                    <small class="form-text text-danger"><?= form_error('price') ?></small>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
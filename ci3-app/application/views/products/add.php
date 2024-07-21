<div class="container">
    <div class="card">
        <div class="card-header">
            Add Product Form
        </div>
        <div class="card-body">
            <form action="" method="post">
                <div class="mb-3">
                    <label for="">Product name</label>
                    <input type="text" name="name" class="form-control">
                    <small class="form-text text-danger"><?= form_error('name') ?></small>
                </div>
                <div class="mb-3">
                    <label for="">Product image</label>
                    <input type="text" name="image" class="form-control">
                    <small class="form-text text-danger"><?= form_error('image') ?></small>
                </div>
                <div class="mb-3">
                    <label for="">Product price</label>
                    <input type="number" name="price" class="form-control">
                    <small class="form-text text-danger"><?= form_error('price') ?></small>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
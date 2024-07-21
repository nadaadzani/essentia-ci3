<div class="container">
    <?php if ($this->session->flashdata('checkout-success')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= $this->session->flashdata('checkout-success') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif ?>
    <h2 class="mb-3">Shopping history list</h2>

    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Receipt</th>
                    <th scope="col">Total items</th>
                    <th scope="col">Total price</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($items as $item) : ?>
                    <tr>
                        <th scope="row"><?= $item['id'] ?></th>
                        <td><?= $item['receipt'] ?></td>
                        <td><?= $item['total_items'] ?></td>
                        <td><?= $item['total_price'] ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
<div class="container mt-3">
  <!-- Flash cards start -->

  <?php if ($this->session->flashdata('add-product-success')) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <?= $this->session->flashdata('add-product-success') ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  <?php elseif ($this->session->flashdata('delete-product-success')) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <?= $this->session->flashdata('delete-product-success') ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  <?php elseif ($this->session->flashdata('edit-product-success')) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <?= $this->session->flashdata('edit-product-success') ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  <?php elseif ($this->session->flashdata('login-success')) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <?= $this->session->flashdata('login-success') ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  <?php elseif ($this->session->flashdata('checkout-failed')) : ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <?= $this->session->flashdata('checkout-failed') ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  <?php endif ?>

  <?php if ($this->session->flashdata('add-cart-success')) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <?= $this->session->flashdata('add-cart-success') ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      <ul class="list-group mt-3">
        <?php
        $cart = $this->session->userdata('cart');
        if (!empty($cart)) {
          foreach ($cart as $item) {
            echo '<li class="list-group-item">' . $item['name'] . '</li>';
          }
        } else {
          echo '<li class="list-group-item">Your cart is empty.</li>';
        }
        ?>
      </ul>
      <ul class="mt-3">
        <li><a href="<?= base_url(); ?>cart/checkout">Checkout</a></li>
        <li><a href="<?= base_url(); ?>cart/reset">Reset</a></li>
      </ul>
    </div>
  <?php endif ?>

  <!-- Flash cards end -->

  <h2>Product list</h2>

  <div class="d-flex justify-content-start mb-3 mt-3">
    <a href="<?= base_url(); ?>products/add" class="btn btn-primary">Add Product</a>
  </div>

  <div class="container">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Image</th>
          <th scope="col">Price</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($products as $product) : ?>
          <tr>
            <th scope="row"><?= $product['id'] ?></th>
            <td><?= $product['name'] ?></td>
            <td><img src="https://www.freeiconspng.com/uploads/laptop-icon-12.png" alt="ada" width="100"></td>
            <td><?= $product['price'] ?></td>
            <td>
              <div class="d-flex gap-2">
                <div>
                  <a href="cart/add_cart/<?= $product['slug']; ?>" class="btn btn-primary">Add to cart</a>
                </div>
                <div>
                  <a href="products/edit/<?= $product['slug']; ?>" class="btn btn-warning mr-2">Edit</a>
                </div>
                <div>
                  <a href="products/delete/<?= $product['slug']; ?>" class="btn btn-danger">Delete</a>
                </div>
              </div>
            </td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>
</div>
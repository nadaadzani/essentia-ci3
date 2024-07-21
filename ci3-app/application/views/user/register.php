<div class="container">
    <h1 class="mb-3">Register</h1>
    <form action="" method="post">

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email">
            <small class="form-text text-danger"><?= form_error('email') ?></small>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
            <small class="form-text text-danger"><?= form_error('password') ?></small>
        </div>
        <div class="mb-3">
            <label for="phone_number" class="form-label">Phone number</label>
            <input type="number" class="form-control" id="phone_number" name="phone_number">
            <small class="form-text text-danger"><?= form_error('phone_number') ?></small>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <p class="mt-3">Already have an account? <a href="<?= base_url(); ?>login">Login</a></p>
</div>
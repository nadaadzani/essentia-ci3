<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $title ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

  <div class="container mb-3">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Meepo</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="<?= base_url() ?>">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url() ?>cart">Shopping List</a>
            </li>
            <?php if ($this->session->userdata('email')) : ?>
              <li class="nav-item">
                <a class="nav-link" href="<?= base_url() ?>logout">Logout</a>
              </li>
            <?php else : ?>
              <li class="nav-item">
                <a class="nav-link" href="<?= base_url() ?>login">Login</a>
              </li>
            <?php endif ?>
          </ul>
        </div>
      </div>
    </nav>
  </div>
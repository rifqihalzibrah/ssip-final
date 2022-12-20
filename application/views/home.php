<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Full Width Pics - Start Bootstrap Template</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="<?= base_url('assets/'); ?>assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="<?= base_url('assets/'); ?>css/styles.css" rel="stylesheet" />
</head>

<body>
    <!-- Responsive navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url() ?>">Start Bootstrap</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item mx-2"><a class="nav-link active" aria-current="page" href="<?= base_url() ?>">Home</a></li>
                    <li class="nav-item dropdown mx-2">
                        <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Cars
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#best-seller">Best Seller</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <?php foreach ($types as $t) : ?>
                                <li><a class="dropdown-item" href="<?= base_url('auth/') ?>"><?= $t['name'] ?></a></li>
                            <?php endforeach ?>
                        </ul>
                    </li>
                    <li class="nav-item mx-2"><a class="nav-link" href="#contact-us">Contact</a></li>
                    <li class="nav-item ms-2">
                        <div class="btn-group" role="group" aria-label="Basic outlined example">
                            <a href="<?= base_url('auth/registration') ?>" type="button" class="btn btn-outline-light">Register</a>
                            <a href="<?= base_url('auth/') ?>" type="button" class="btn btn-outline-light">Login</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Header - set the background image for the header in the line below-->
    <header>
        <div class="text-center my-5">
            <img class="img-fluid rounded-circle mb-4" src="https://dummyimage.com/150x150/6c757d/dee2e6.jpg" alt="..." />
            <h1 class="fs-3 fw-bolder">Full Width Pics</h1>
            <p class="mb-0">Landing Page Template</p>
        </div>
    </header>
    <!-- Content section-->
    <section class="py-5">
        <div class="container my-5">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <h2>About</h2>
                    <p class="lead">A single, lightweight helper class allows you to add engaging, full width background
                        images to sections of your page.</p>
                    <p class="mb-0">The universe is almost 14 billion years old, and, wow! Life had no problem starting
                        here on Earth! I think it would be inexcusably egocentric of us to suggest that we're alone in
                        the universe.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Image element - set the background image for the header in the line below-->
    <section class="py-5" id="best-seller">
        <div class="container">
            <h2 class="text-center mb-5">Best Seller</h2>
            <div class="row">
                <?php foreach ($cars as $c) :  ?>
                    <div class="col-lg-6 mb-4">
                        <div class="card">
                            <div class="row g-0">
                                <div class="col-md-6">
                                    <img src="<?= base_url('assets/img/') ?><?= $c['image'] ?>" class="img-fluid rounded-start" alt="...">
                                </div>
                                <div class="col-md-6 d-flex align-items-center">
                                    <div class="card-body text-dark">
                                        <h3 class="card-title text-center"><?= $c['name'] ?></h3>
                                        <h5 class="card-text text-center">
                                            <?= $c['price'] ?>
                                        </h5>
                                        <p class="text-center">
                                            <a href="<?= base_url('auth/') ?>" class="btn btn-outline-primary btn-sm button-center mt-3">
                                                Book
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </section>
    <!-- Content section-->
    <section class="py-5" id="contact-us">
        <div class="container my-5">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <h2>Contact Us !</h2>
                    <p class="lead">The background images used in this template are sourced from Unsplash and are open
                        source and free to use.</p>
                    <p class="mb-0">I can't tell you how many people say they were turned off from science because of a
                        science teacher that completely sucked out all the inspiration and enthusiasm they had for the
                        course.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer-->
    <footer class="py-5 bg-primary">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Your Website 2022</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="<?= base_url('assets/'); ?>js/scripts.js"></script>
</body>

</html>
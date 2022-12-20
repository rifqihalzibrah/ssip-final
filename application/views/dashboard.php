    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800 text-center">Dashboard</h1>

        <!-- Content Row -->
        <div class="row">
            <div class="container">
                <div class="row">
                    <?php $i = 1 ?>
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
                                                <a href="#" class="btn btn-outline-primary btn-sm button-center mt-3">
                                                    Card link
                                                </a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php $i++ ?>
                    <?php endforeach ?>

                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
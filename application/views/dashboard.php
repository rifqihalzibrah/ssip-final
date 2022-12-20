    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800 text-center">Dashboard</h1>

        <!-- Content Row -->
        <div class="row">
            <div class="container">
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
                                                <a href="" data-toggle="modal" data-target="#orderCarModal<?= $c['id'] ?>" class="btn btn-outline-primary btn-sm button-center mt-3">
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
        </div>

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <!-- Order Car Modal -->
    <?php foreach ($cars as $c) : ?>
        <div class="modal fade" id="orderCarModal<?= $c['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="orderCarModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="orderCarModalLabel">Order Car</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= base_url('admin/order/') ?>" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="text" class="form-control" id="user_id" name="user_id" value="<?= $this->session->userdata('user_id') ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Car Name" value="<?= $c['name'] ?>" readonly>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="type" name="type" placeholder="Type" value="<?= $c['type'] ?>" readonly>
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control" id="price" name="price" placeholder="Price" value="<?= $c['price'] ?>" readonly>
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control" id="time" name="time" placeholder="Time">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach ?>
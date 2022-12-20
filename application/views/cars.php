<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 text-center">Cars List</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#newCarModal">Add New Cars</button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $i = 1 ?>
                        <?php foreach ($cars as $c) : ?>
                            <tr>
                                <td class="text-center align-middle"><?= $i ?></td>
                                <td class="text-center align-middle"><?= $c['name'] ?></td>
                                <td class="text-center align-middle"><?= $c['type'] ?></td>
                                <td class="text-center align-middle">$<?= $c['price'] ?></td>
                                <td class="text-center">
                                    <img width="150" height="150" src="<?= base_url('assets/img/') ?><?= $c['image'] ?>" alt="">
                                </td>
                                <td class="text-center align-middle">
                                    <!-- <button type="button" class="btn btn-warning btn-sm">Edit</button> -->
                                    <a href="" data-toggle="modal" data-target="#editCarModal<?= $c['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteCarModal">Delete</a>
                                </td>
                            </tr>
                            <?php $i++ ?>
                        <?php endforeach ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Add New Car Modal -->
<div class="modal fade" id="newCarModal" tabindex="-1" role="dialog" aria-labelledby="newCarModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newCarModalLabel">Add New Car</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo form_open_multipart('admin/cars'); ?>
            <div class="modal-body">
                <div class="form-group">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Car Name">
                </div>
                <div class="form-group">
                    <?php $i = 1 ?>
                    <select name="type" id="type" class="form-control">
                        <option disabled selected>Select Type</option>
                        <?php foreach ($types as $t) : ?>
                            <option value="<?= $t['name'] ?>" <?php
                                                                if ($t['name'] == $this->session->userdata('name')) {
                                                                    echo "selected";
                                                                }
                                                                ?>><?= $t['name'] ?>
                            </option>
                            <?php $i++ ?>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="form-group">
                    <input type="number" class="form-control" id="price" name="price" placeholder="Price">
                </div>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="image" name="image">
                    <label class="custom-file-label" for="inputImage">Choose File</label>
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

<!-- Edit Car Modal -->
<?php $no = 0; ?>
<?php foreach ($cars as $c) : $no++ ?>
    <div class="modal fade" id="editCarModal<?= $c['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="editCarModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editCarModalLabel">Edit Car</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php echo form_open_multipart('admin/editCar/' . $c['id']); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Car Name" value="<?= $c['name'] ?>">
                    </div>
                    <div class="form-group">
                        <?php $i = 1 ?>
                        <select name="type" id="type" class="form-control">
                            <option disabled selected>Select Type</option>
                            <?php foreach ($types as $t) : ?>
                                <option value="<?= $t['name'] ?>" <?php
                                                                    if ($c['type'] == $t['name']) {
                                                                        echo "selected";
                                                                    }
                                                                    ?>><?= $t['name'] ?>
                                </option>
                                <?php $i++ ?>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control" id="price" name="price" placeholder="Price" value="<?= $c['price'] ?>">
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image" name="image" value="<?= $c['image'] ?>">
                        <label class="custom-file-label" for="inputImage"><?= $c['image'] ?></label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach ?>

<!-- Delete Car Modal-->
<div class="modal fade" id="deleteCarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Are you sure want to delete this car?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Delete" below if you want to delete this car.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('admin/deleteCar/' .  $c['id']) ?>">Delete</a>
            </div>
        </div>
    </div>
</div>
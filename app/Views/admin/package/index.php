<?= $this->extend('layout/master'); ?>

<?= $this->section('content'); ?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Manage Package</h1>
    <a href="/package/create" class="d-none d-sm-inline-block btn btn-sm shadow-sm" style="background:rgb(255, 112, 136) !important;color:white"><i
class="fas fa-plus fa-sm text-white-50"></i> Add Package</a>
</div>

<div class="row">

    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Location</th>
                            <th>Price</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($data as $package) : ?>

                            <tr>
                                <td><?= $package->name; ?></td>
                                <td><?= $package->type; ?></td>
                                <td><?= $package->location; ?></td>
                                <td>$<?= $package->price; ?></td>
                                <td><?= $package->created_at; ?></td>
                                <td>
                                    <a href="/package/edit/<?= $package->id; ?>" class="btn btn-sm" style="background:rgb(255, 112, 136) !important;color:white">View</a>
                                    <a href="/package/delete/<?= $package->id; ?>" class="btn btn-sm" style="background:rgb(255, 112, 136) !important;color:white">Delete</a>
                                </td>
                            </tr>

                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<?= $this->endSection(); ?>

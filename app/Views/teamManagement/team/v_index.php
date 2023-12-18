<?= $this->extend('layouts/v_index') ?>

<?= $this->section('content') ?>

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Team List</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Team Management</a></li>
                    <li class="breadcrumb-item active">Team List</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<div class="content">
    <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Teams Total</span>
                        <span class="info-box-number">
                            <?= $total; ?>
                            <small>teams</small>
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-thumbs-up"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Active</span>
                        <span class="info-box-number"><?= $aktif; ?> <small>teams</small></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>

            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-shopping-cart"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Not Active</span>
                        <span class="info-box-number"><?= $tidak_aktif; ?> <small>teams</small></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-lg">

                <?php if (session()->getFlashdata('message')) : ?>
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <?= session()->getFlashdata('message'); ?>
                </div>
                <?php endif; ?>

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">List Data</h3>
                        <a href="/team-management/list/create" type="button" class="btn btn-primary Tambah float-right">
                            <i class="fas fa-plus-circle"></i>
                            Create New Data</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Negara</th>
                                    <th>Tanggal Berdiri</th>
                                    <th>Stadion</th>
                                    <th>Pelatih</th>
                                    <th>Manager</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (empty($data)) : ?>
                                <tr>
                                    <td colspan="9" align="center">Data tidak ditemukan</td>
                                </tr>
                                <?php else : ?>

                                <?php $i = 1;
                                    foreach ($data as $d) : ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $d['name_team']; ?></td>
                                    <td><?= $d['negara']; ?></td>
                                    <td><?= $d['tahun_berdiri']; ?></td>
                                    <td><?= $d['stadion']; ?></td>
                                    <td><?= $d['pelatih']; ?></td>
                                    <td><?= $d['manager']; ?></td>
                                    <td>
                                        <span
                                            class="badge badge-pill badge-<?= $d['status'] == "aktif" ? 'success' : 'danger'; ?>"><?= $d['status']; ?></span>
                                    </td>
                                    <td align="center">
                                        <a href="/team-management/list/edit/<?= $d['id']; ?>" type="button"
                                            class="btn btn-warning">
                                            Edit</a>
                                        <form action="/team-management/list/<?= $d['id']; ?>" method="post"
                                            class="d-inline">
                                            <?= csrf_field(); ?>
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn btn-danger delete"
                                                onclick="return confirm('Data ini akan anda hapus?')">
                                                Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                <?php endforeach; ?>

                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<?= $this->endSection() ?>
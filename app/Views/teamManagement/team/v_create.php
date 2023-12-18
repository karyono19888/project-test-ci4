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
                    <li class="breadcrumb-item"><a href="/team-management/list">List Teams</a></li>
                    <li class="breadcrumb-item active">Create new data</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Form Create new</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="post" action="/team-management/list/save">
                        <?= csrf_field() ?>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control form-control-border <?= (validation_show_error('name')) ? 'is-invalid' : ''; ?>" id="name" name="name" placeholder="Enter name" required value="<?= old('name'); ?>">
                                <div class="invalid-feedback">
                                    <?= validation_show_error('name'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="negara">Negara</label>
                                <input type="text" class="form-control form-control-border" id="negara" name="negara" placeholder="Enter Negara" required value="<?= old('negara'); ?>">
                            </div>
                            <div class="form-group">
                                <label for="tahun_berdiri">Tanggal Berdiri</label>
                                <input type="date" class="form-control form-control-border" id="tahun_berdiri" name="tahun_berdiri" placeholder="Enter Tahun Berdiri" required value="<?= old('tahun_berdiri'); ?>">
                            </div>
                            <div class="form-group">
                                <label for="stadion">Stadion</label>
                                <input type="text" class="form-control form-control-border" id="stadion" name="stadion" placeholder="Enter Stadion" required value="<?= old('stadion'); ?>">
                            </div>
                            <div class="form-group">
                                <label for="pelatih">Pelatih</label>
                                <input type="text" class="form-control form-control-border" id="pelatih" name="pelatih" placeholder="Enter Name Pelatih" required value="<?= old('pelatih'); ?>">
                            </div>
                            <div class="form-group">
                                <label for="manager">Manager</label>
                                <input type="text" class="form-control form-control-border" id="manager" name="manager" placeholder="Enter Name Manager" required value="<?= old('manager'); ?>">
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="custom-select form-control-border" id="status" name="status" required>
                                    <option <?= (old('status') == "aktif") ? 'selected' : ''; ?> value="aktif">Aktif
                                    </option>
                                    <option <?= (old('status') == "tidak aktif") ? 'selected' : ''; ?> value="tidak aktif">Tidak
                                        Aktif</option>
                                </select>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <div class="float-right">
                                <a href="/team-management/list" type="button" class="btn btn-default">Back</a>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<?= $this->endSection() ?>
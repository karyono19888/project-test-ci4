<?= $this->extend('layouts/v_index') ?>

<?= $this->section('content') ?>

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Players List</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Team Management</a></li>
                    <li class="breadcrumb-item"><a href="/team-management/players">List Players</a></li>
                    <li class="breadcrumb-item active">Create new data</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Form Edit</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="post" action="/team-management/players/update/<?= $team_id[0]['team_id']; ?>">
                        <?= csrf_field() ?>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="teams">Teams</label>
                                        <select class="custom-select form-control-border" id="teams" name="teams"
                                            required>
                                            <option value="">Pilih teams</option>
                                            <?php foreach ($teams->getResult() as $t) : ?>
                                            <option <?= ($team_id[0]['team_id'] === $t->id) ? 'selected' : ''; ?>
                                                value="<?= $t->id; ?>">
                                                <?= $t->name_team; ?>
                                            </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-sm-12">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Negara</th>
                                                <th>Tanggal lahir</th>
                                                <th>Nomor Punggung</th>
                                                <th>Posisi Pemain</th>
                                                <th>Status</th>
                                                <th>
                                                    <button type="button" class="btn btn-primary" id="add-new">Add
                                                        new</button>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody id="dynamicAddRemove">
                                            <?php
                                            $i = 1;
                                            foreach ($data->getResult() as $d) :
                                            ?>
                                            <tr>
                                                <td><?= $i++; ?></td>
                                                <td>
                                                    <input type="text" class="form-control form-control-border"
                                                        id="name" name="item[<?= $d->id; ?>][name]"
                                                        placeholder="Enter Name" required value="<?= $d->name; ?>">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control form-control-border"
                                                        id="negara" name="item[<?= $d->id; ?>][negara]"
                                                        placeholder="Enter Negara" required value="<?= $d->negara; ?>">
                                                </td>
                                                <td>
                                                    <input type="date" class="form-control form-control-border"
                                                        id="tgl_lahir" name="item[<?= $d->id; ?>][tgl_lahir]" required
                                                        value="<?= $d->tgl_lahir; ?>">
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control form-control-border"
                                                        id="nomor_punggung" name="item[<?= $d->id; ?>][nomor_punggung]"
                                                        placeholder="0" required value="<?= $d->nomor_punggung; ?>">
                                                </td>
                                                <td width="15%">
                                                    <select class="custom-select form-control-border" id="posisi_pemain"
                                                        name="item[<?= $d->id; ?>][posisi_pemain]" required>
                                                        <option
                                                            <?= ($d->posisi_pemain === "defender") ? 'selected' : ''; ?>
                                                            value="defender">
                                                            Defender
                                                        </option>
                                                        <option
                                                            <?= ($d->posisi_pemain === "midfielder") ? 'selected' : ''; ?>
                                                            value="midfielder">
                                                            Midfielder
                                                        </option>
                                                        <option
                                                            <?= ($d->posisi_pemain === "forward") ? 'selected' : ''; ?>
                                                            value="forward">
                                                            Forward
                                                        </option>
                                                        <option
                                                            <?= ($d->posisi_pemain === "goal kiper") ? 'selected' : ''; ?>
                                                            value="goal kiper">
                                                            Goal kiper
                                                        </option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select class="custom-select form-control-border" id="status"
                                                        name="item[<?= $d->id; ?>][status]" required>
                                                        <option <?= ($d->status == "aktif") ? 'selected' : ''; ?>
                                                            value="aktif">Aktif
                                                        </option>
                                                        <option <?= ($d->status == "tidak aktif") ? 'selected' : ''; ?>
                                                            value="tidak aktif">Tidak
                                                            Aktif</option>
                                                    </select>
                                                </td>
                                                <td align="center" width="10%">
                                                    <button type="button" class="btn btn-danger"
                                                        id="delete-new">Delete</button>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <div class="float-right">
                                <a href="/team-management/players" type="button" class="btn btn-default">Back</a>
                                <button type="submit" class="btn btn-warning">Update</button>
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

<script>
let i = <?= count($data->getResult()); ?>;
$("#add-new").click(function() {
    ++i;
    let list = '<tr>';
    list += '<td>' + i + '</td>';
    list +=
        '<td> <input type="text" class="form-control form-control-border" name="item[' + i +
        '][name]" placeholder = "Enter Name" require></td>';
    list +=
        '<td> <input type="text" class="form-control form-control-border" name="item[' + i +
        '][negara]" placeholder = "Enter Negara" require></td>';
    list +=
        '<td> <input type="date" class="form-control form-control-border" name="item[' + i +
        '][tgl_lahir]" require></td>';
    list +=
        '<td> <input type="number" class="form-control form-control-border" name="item[' + i +
        '][nomor_punggung]" placeholder = "0" require></td>';
    list +=
        '<td width="15%"> <select class = "custom-select form-control-border" name = "item[' + i +
        '][posisi_pemain]"required ><option value = "defender" >Defender </option> <option value = "midfielder" >Midfielder </option> <option value = "forward" >Forward </option> <option value = "goal kiper" >Goal kiper </option> </select> </td>';
    list +=
        '<td><select class="custom-select form-control-border" id="status" name="item[' + i +
        '][status]" required> <option value="aktif">Aktif</option> <option value="tidak aktif">Tidak Aktif</option></select></td>';
    list +=
        '<td align="center" width="10%"><button type="button" id="delete-new" class="btn btn-danger float-end">Delete</button></td>';
    list += '<tr>';
    $("#dynamicAddRemove").append(list)
});
$(document).on('click', '#delete-new', function() {
    $(this).parents('tr').remove();
    --count
});
</script>


<?= $this->endSection() ?>
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
                        <h3 class="card-title">Form Create new</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="post" action="/team-management/players/save">
                        <?= csrf_field() ?>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="teams">Teams</label>
                                        <select class="custom-select form-control-border" id="teams" name="teams"
                                            required>
                                            <option value="">Pilih teams</option>
                                            <?php  foreach($teams->getResult() as $t):?>
                                            <option <?= (old('teams') === $t->id) ? 'selected' : '' ; ?>
                                                value="<?= $t->id;?>">
                                                <?= $t->name_team;?>
                                            </option>
                                            <?php endforeach;?>
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
                                                <th>#</th>
                                            </tr>
                                        </thead>
                                        <tbody id="dynamicAddRemove">
                                            <tr>
                                                <td>1</td>
                                                <td>
                                                    <input type="text" class="form-control form-control-border"
                                                        id="name" name="item[0][name]" placeholder="Enter Name" required
                                                        value="<?= old('name'); ?>">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control form-control-border"
                                                        id="negara" name="item[0][negara]" placeholder="Enter Negara"
                                                        required value="<?= old('negara'); ?>">
                                                </td>
                                                <td>
                                                    <input type="date" class="form-control form-control-border"
                                                        id="tgl_lahir" name="item[0][tgl_lahir]" required
                                                        value="<?= old('tgl_lahir'); ?>">
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control form-control-border"
                                                        id="nomor_punggung" name="item[0][nomor_punggung]"
                                                        placeholder="0" required value="<?= old('nomor_punggung'); ?>">
                                                </td>
                                                <td width="15%">
                                                    <select class="custom-select form-control-border" id="posisi_pemain"
                                                        name="item[0][posisi_pemain]" required>
                                                        <option
                                                            <?= (old('posisi_pemain') === "defender") ? 'selected' : '' ; ?>
                                                            value="defender">
                                                            Defender
                                                        </option>
                                                        <option
                                                            <?= (old('posisi_pemain') === "midfielder") ? 'selected' : '' ; ?>
                                                            value="midfielder">
                                                            Midfielder
                                                        </option>
                                                        <option
                                                            <?= (old('posisi_pemain') === "forward") ? 'selected' : '' ; ?>
                                                            value="forward">
                                                            Forward
                                                        </option>
                                                        <option
                                                            <?= (old('posisi_pemain') === "goal kiper") ? 'selected' : '' ; ?>
                                                            value="goal kiper">
                                                            Goal kiper
                                                        </option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select class="custom-select form-control-border" id="status"
                                                        name="item[0][status]" required>
                                                        <option <?= (old('status') == "aktif") ? 'selected' : ''; ?>
                                                            value="aktif">Aktif
                                                        </option>
                                                        <option
                                                            <?= (old('status') == "tidak aktif") ? 'selected' : ''; ?>
                                                            value="tidak aktif">Tidak
                                                            Aktif</option>
                                                    </select>
                                                </td>
                                                <td align="center" width="10%">
                                                    <button type="button" class="btn btn-primary" id="add-new">Add
                                                        new</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
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

<script>
let i = 0;
let count = 1;
$("#add-new").click(function() {
    ++i;
    ++count;
    let list = '<tr>';
    list += '<td>' + count + '</td>';
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
        '<td width="10%"><button type="button" id="delete-new" class="btn btn-danger float-end">Delete</button></td>';
    list += '<tr>';
    $("#dynamicAddRemove").append(list)
});
$(document).on('click', '#delete-new', function() {
    $(this).parents('tr').remove();
    --count
});
</script>


<?= $this->endSection() ?>
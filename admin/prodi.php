<?php
include '../koneksi.php';
$aksi = isset($_GET['aksi']) ? $_GET['aksi'] : 'list';
switch ($aksi) {
    case 'list':

?>
        <a href="index.php?p=prodi&aksi=input" class="btn btn-primary my-3"><i class="material-icons me-2">add_circle</i>Tambah Prodi</a>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Program Studi</h4>
                        <p class="card-category">List Prodi</p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-left">No</th>
                                        <th>Nama Prodi</th>
                                        <th>Jenjang Studi</th>
                                        <th>Keterangan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $ambil = mysqli_query($db, "SELECT * FROM prodi");
                                    $no = 1;
                                    while ($data_mhs = mysqli_fetch_array($ambil)) {
                                    ?>
                                        <tr>
                                            <td class="text-center"><?php echo $no ?></td>
                                            <td><?= $data_mhs['nama_prodi'] ?></td>
                                            <td><?= $data_mhs['jenjang_studi'] ?></td>
                                            <td><?= $data_mhs['keterangan'] ?></td>
                                            <td>
                                                <a href="index.php?p=prodi&aksi=edit&id_edit=<?= $data_mhs['id'] ?>" class="btn btn-warning"><i class="material-icons">edit_square</i></a>
                                                <a href="proses_prodi.php?proses=delete&id_hapus=<?= $data_mhs['id'] ?>" class="btn btn-danger" onclick="return confirm('Yakin akan menghapus data?')"><i class="material-icons">delete</i></a>
                                            </td>
                                        </tr>
                                    <?php
                                        $no++;
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php
        break;

    case 'input':
    ?>

        <div class="container-fluid px-4">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <form action="proses_prodi.php?proses=insert" method="post">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Prodi</label>
                            <input type="text" name="nama" class="form-control" id="nama" required>
                        </div>
                        <div class="mb-3">
                            <label for="studi" class="form-label">Jenjang Studi</label>
                            <select name="studi" class="form-select" id="studi" required>
                                <option value="" disabled selected>--- Pilih Jenjang Studi ---</option>
                                <option value="D2">Diploma II</option>
                                <option value="D3">Diploma III</option>
                                <option value="D4">Diploma IV</option>
                                <option value="S2">Magister</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="ket" class="form-label">Keterangan</label>
                            <textarea name="ket" class="form-control" id="ket" rows="4" required></textarea>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        <button type="reset" name="reset" class="btn btn-warning">Reset</button>
                    </form>
                </div>
            </div>
        </div>

    <?php
        break;

    case 'edit':
    ?>

        <?php
        $ambil = mysqli_query($db, "SELECT * FROM prodi WHERE id='$_GET[id_edit]'");
        $data_mhs = mysqli_fetch_array($ambil);
        ?>

        <div class="container-fluid px-4">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <form action="proses_prodi.php?proses=update" method="post">
                        <div class="mb-3">
                            <!-- <label for="id" class="form-label">ID</label> -->
                            <input type="hidden" name="id" class="form-control" id="id" value="<?= ($data_mhs['id']) ?>" required autofocus readonly>
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Prodi</label>
                            <input type="text" name="nama" class="form-control" id="nama" value="<?= ($data_mhs['nama_prodi']) ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="studi" class="form-label">Jenjang Studi</label>
                            <select name="studi" class="form-select" id="studi" required>
                                <option value="" disabled selected>--- Pilih Jenjang Studi ---</option>
                                <option value="D2" <?= ($data_mhs['jenjang_studi'] == 'D2') ? 'selected' : '' ?>>Diploma II</option>
                                <option value="D3" <?= ($data_mhs['jenjang_studi'] == 'D3') ? 'selected' : '' ?>>Diploma III</option>
                                <option value="D4" <?= ($data_mhs['jenjang_studi'] == 'D4') ? 'selected' : '' ?>>Diploma IV</option>
                                <option value="S2" <?= ($data_mhs['jenjang_studi'] == 'S2') ? 'selected' : '' ?>>Magister</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="ket" class="form-label">Keterangan</label>
                            <textarea name="ket" class="form-control" id="ket" rows="4" required><?= $data_mhs['keterangan'] ?></textarea>
                        </div>
                        <button type="submit" name="submit" class="btn btn-warning">Update</button>
                    </form>
                </div>
            </div>
        </div>

<?php
        break;
}
?>
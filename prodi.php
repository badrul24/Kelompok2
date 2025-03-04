<?php
$aksi = isset($_GET['aksi']) ? $_GET['aksi'] : 'list';
include 'koneksi.php';
switch ($aksi) {
    case 'list':

?>
        <table id="example" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th>Nama Prodi</th>
                    <th>Jenjang Studi</th>
                    <th>Keterangan</th>
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
                    </tr>
                <?php
                    $no++;
                }
                ?>
            </tbody>
        </table>
    <?php
        break;

    case 'input':
    ?>
        <h3 class="text-center my-5">Form Program Studi</h3>

        <div class="container w-50">
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
                    <textarea name="ket" class="form-control" id="ket" required></textarea>
                </div>
                <button type="submit" name="submit" class="btn btn-primary my-5">Submit</button>
                <button type="reset" name="reset" class="btn btn-warning my-5">Reset</button>
            </form>
        </div>

    <?php
        break;

    case 'edit':
    ?>

        <?php
        $ambil = mysqli_query($db, "SELECT * FROM prodi WHERE id='$_GET[id_edit]'");
        $data_mhs = mysqli_fetch_array($ambil);
        ?>

        <h3 class="text-center my-5">Edit Program Studi</h3>

        <div class="container w-50">
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
                    <textarea name="ket" class="form-control" id="ket" required><?= $data_mhs['keterangan'] ?></textarea>
                </div>
                <button type="submit" name="submit" class="btn btn-warning my-5">Update</button>
            </form>
        </div>

<?php
        break;
}
?>
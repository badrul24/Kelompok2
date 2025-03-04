<?php
include 'koneksi.php';
$aksi = isset($_GET['aksi']) ? $_GET['aksi'] : 'list';
switch ($aksi) {
    case 'list':
?>

        <table id="example" class="table table-bordered">
            <thead>
                <tr>
                    <th class="text-left">No</th>
                    <th>Kode</th>
                    <th>Nama Matakuliah</th>
                    <th>SKS</th>
                    <th>Semester</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $getData = mysqli_query($db, "SELECT * FROM mata_kuliah JOIN prodi ON mata_kuliah.prodi_id = prodi.id");
                $no = 1;
                while ($matkul = mysqli_fetch_array($getData)) {
                ?>
                    <tr>
                        <td class="text-center"><?= $no ?></td>
                        <td><?= $matkul['kode_mk'] ?></td>
                        <td><?= $matkul['nama_mk'] ?></td>
                        <td><?= $matkul['sks'] ?></td>
                        <td><?= $matkul['semester'] ?></td>
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
        <div class="container-fluid px-4">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <form action="proses_matkul.php?proses=insert" method="post">
                        <div class="mb-3">
                            <label for="kode" class="form-label">Kode Matakuliah</label>
                            <input type="text" name="kode" class="form-control" id="kode" required autofocus>
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Matakuliah</label>
                            <input type="text" name="nama" class="form-control" id="nama" required autofocus>
                        </div>
                        <div class="mb-3">
                            <label for="sks" class="form-label">SKS</label>
                            <input type="number" name="sks" class="form-control" id="sks" required autofocus>
                        </div>
                        <div class="mb-3">
                            <label for="prodi" class="form-label">Prodi</label>
                            <select name="prodi" class="form-select" id="prodi" required>
                                <option value="" disabled selected>--- Pilih Prodi ---</option>
                                <?php
                                include 'koneksi.php';
                                $ambil_prodi = mysqli_query($db, "SELECT * FROM prodi");
                                while ($data_prodi = mysqli_fetch_array($ambil_prodi)) {
                                    echo "<option value=" . $data_prodi['id'] . ">" . $data_prodi['nama_prodi'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="smt" class="form-label">Semester</label>
                            <input type="number" name="smt" class="form-control" id="smt" required autofocus>
                        </div>
                        <button type="submit" class="btn btn-primary my-3" name="submit">Submit</button>
                        <button type="reset" class="btn btn-warning my-3">Reset</button>
                    </form>
                </div>
            </div>
        </div>

    <?php
        break;
    case 'edit':
    ?>

        <?php
        $getData = mysqli_query($db, "SELECT * FROM mata_kuliah WHERE kode_mk = $_GET[kode]");
        $no = 1;

        $matkul = mysqli_fetch_array($getData);
        ?>

        <div class="container-fluid px-4">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <form action="proses_matkul.php?proses=insert" method="post">
                        <div class="mb-3">
                            <label for="kode" class="form-label">Kode Matakuliah</label>
                            <input type="text" name="kode" class="form-control" id="kode" value="<?= $matkul['kode_mk'] ?>" required autofocus>
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Matakuliah</label>
                            <input type="text" name="nama" class="form-control" id="nama" value="<?= $matkul['nama_mk'] ?>" required autofocus>
                        </div>
                        <div class="mb-3">
                            <label for="sks" class="form-label">SKS</label>
                            <input type="number" name="sks" class="form-control" id="sks" value="<?= $matkul['sks'] ?>" required autofocus>
                        </div>
                        <div class="mb-3">
                            <label for="prodi" class="form-label">Prodi</label>
                            <select name="prodi" class="form-select" id="prodi" required>
                                <option value="" disabled selected>--- Pilih Prodi ---</option>
                                <?php
                                include 'koneksi.php';
                                $ambil_prodi = mysqli_query($db, "SELECT * FROM prodi");
                                while ($data_prodi = mysqli_fetch_array($ambil_prodi)) {
                                    echo "<option value=" . $data_prodi['id'] . " " . ($data_prodi['id'] == $data_dsn['prodi_id'] ? 'selected' : '') . ">" . $data_prodi['nama_prodi'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="smt" class="form-label">Semester</label>
                            <input type="number" name="smt" class="form-control" id="smt" value="<?= $matkul['semester'] ?>" required autofocus>
                        </div>
                        <button type="submit" class="btn btn-primary my-3" name="submit">Submit</button>
                        <button type="reset" class="btn btn-warning my-3">Reset</button>
                    </form>
                </div>
            </div>
        </div>

<?php
        break;
}
?>
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
                    <th class="text-start">NIP</th>
                    <th>Nama Dosen</th>
                    <th>Email</th>
                    <th>Prodi</th>
                    <th class="text-start">Telepon</th>
                    <th>Alamat</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $ambil = mysqli_query($db, "SELECT * FROM dosen JOIN prodi ON dosen.prodi_id = prodi.id");
                $no = 1;
                while ($data_dsn = mysqli_fetch_array($ambil)) {
                ?>
                    <tr>
                        <td class="text-center"><?php echo $no ?></td>
                        <td class="text-start"><?php echo $data_dsn['nip'] ?></td>
                        <td><?= $data_dsn['nama_dosen'] ?></td>
                        <td><?= $data_dsn['email'] ?></td>
                        <td><?= $data_dsn['nama_prodi'] ?></td>
                        <td class="text-start"><?= $data_dsn['telp'] ?></td>
                        <td><?= $data_dsn['alamat'] ?></td>
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

        <h3 class="text-center my-5">Form Dosen</h3>
        <div class="container w-50">
            <form action="proses_dosen.php?proses=insert" method="post">
                <div class="mb-3">
                    <label for="nip" class="form-label">NIP</label>
                    <input type="number" name="nip" class="form-control" id="nip" required autofocus>
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Dosen</label>
                    <input type="text" name="nama" class="form-control" id="nama" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="email" required>
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
                    <label for="telepon" class="form-label">Nomor Telepon</label>
                    <input type="number" name="telepon" class="form-control" id="telepon" required autofocus>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea name="alamat" class="form-control" id="alamat" required></textarea>
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
        $ambil = mysqli_query($db, "SELECT * FROM dosen WHERE nip='$_GET[id_edit]'");
        $data_dsn = mysqli_fetch_array($ambil);
        ?>

        <h3 class="text-center my-5">Edit Dosen</h3>
        <div class="container w-50">
            <form action="proses_dosen.php?proses=update" method="post">
                <div class="mb-3">
                    <label for="nip" class="form-label">NIP</label>
                    <input type="number" name="nip" class="form-control" id="nip" value="<?= ($data_dsn['nip']) ?>" required autofocus readonly>
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Dosen</label>
                    <input type="text" name="nama" class="form-control" id="nama" value="<?= ($data_dsn['nama_dosen']) ?>" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="email" value="<?= $data_dsn['email'] ?>" required>
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
                    <label for="telepon" class="form-label">Nomor Telepon</label>
                    <input type="number" name="telepon" class="form-control" id="telepon" value="<?= ($data_dsn['telp']) ?>" required autofocus>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea name="alamat" class="form-control" id="alamat" required><?= $data_dsn['alamat'] ?></textarea>
                </div>
                <button type="submit" name="submit" class="btn btn-warning my-5">Update</button>
            </form>
        </div>

<?php
        break;
}
?>
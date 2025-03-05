<?php
$aksi = isset($_GET['aksi']) ? $_GET['aksi'] : 'list';
include 'koneksi.php';
switch ($aksi) {
    case 'list':
?>

        <table id="example" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th class="text-start">NIM</th>
                    <th>Nama Siswa</th>
                    <th>Email</th>
                    <th>Prodi</th>
                    <th>Jekel</th>
                    <th>Alamat</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $ambil = mysqli_query($db, "SELECT * FROM mahasiswa JOIN prodi ON mahasiswa.prodi_id = prodi.id");
                $no = 1;
                while ($data_mhs = mysqli_fetch_array($ambil)) {
                ?>
                    <tr>
                        <td class="text-center"><?php echo $no ?></td>
                        <td class="text-start"><?php echo $data_mhs['nim'] ?></td>
                        <td><?= $data_mhs['nama'] ?></td>
                        <td><?= $data_mhs['email'] ?></td>
                        <td><?= $data_mhs['nama_prodi'] ?></td>
                        <td><?= $data_mhs['jekel'] ?></td>
                        <td><?= $data_mhs['alamat'] ?></td>
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

        <div class="container w-50">
            <form action="proses_mahasiswa.php?proses=insert" method="post">
                <div class="mb-3">
                    <label for="nim" class="form-label">NIM</label>
                    <input type="number" name="nim" class="form-control" id="nim" required autofocus>
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" name="nama" class="form-control" id="nama" required>
                </div>
                <div class="mb-3 row g-3">
                    <label for="" class="form-label col-12">Tanggal Lahir</label>
                    <select name="tgl" id="" class="form-select col me-4">
                        <option value="" disabled selected>Day</option>
                        <?php
                        for ($i = 1; $i <= 31; $i++) {
                            echo "<option value='$i'>$i</option>";
                        }
                        ?>
                    </select>
                    <select name="bln" id="" class="form-select col me-4">
                        <option value="" disabled selected>Month</option>
                        <?php
                        $bln = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Aug', 'Sep', 'Okt', 'Nov', 'Des'];
                        foreach ($bln as $i => $value) {
                            echo "<option value=" . ($i + 1) . ">" . $value . "</option>";
                        }
                        ?>
                    </select>
                    <select name="thn" id="" class="form-select col">
                        <option value="" disabled selected>Year</option>
                        <?php
                        for ($i = date('Y'); $i >= 1945; $i--) {
                            echo "<option value='$i'>$i</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="jk" class="form-label">Jenis Kelamin</label><br>
                    <input type="radio" class="form-check-input me-2" name="jk" id="L" value="L" checked>
                    <label for="L">Laki-Laki</label>
                    <input type="radio" class="form-check-input ms-4 me-2" name="jk" id="P" value="P">
                    <label for="P">Perempuan</label>
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
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="email" required>
                </div>
                <div class="mb-3">
                    <label for="hobi" class="form-label">Hobi</label><br>
                    <input type="checkbox" name="hobi[]" id="Bernyanyi" value="Bernyanyi" class="form-check-input me-2">
                    <label for="Bernyanyi" class="form-check-label me-4">Bernyanyi</label>
                    <input type="checkbox" name="hobi[]" id="Membaca" value="Membaca" class="form-check-input me-2">
                    <label for="Membaca" class="form-check-label me-4">Membaca</label>
                    <input type="checkbox" name="hobi[]" id="Olahraga" value="Olahraga" class="form-check-input me-2">
                    <label for="Olahraga" class="form-check-label">Olahraga</label>
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
        $ambil = mysqli_query($db, "SELECT * FROM mahasiswa WHERE nim='$_GET[id_edit]'");
        $data_mhs = mysqli_fetch_array($ambil);
        $tgl = explode('-', $data_mhs['tgl_lahir']);
        $hobies = explode(', ', $data_mhs['hobi']);

        ?>

        <div class="container w-50">
            <form action="proses_mahasiswa.php?proses=update" method="post">
                <div class="mb-3">
                    <label for="nim" class="form-label">NIM</label>
                    <input type="number" name="nim" class="form-control" id="nim" value="<?= ($data_mhs['nim']) ?>" required autofocus readonly>
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" name="nama" class="form-control" id="nama" value="<?= ($data_mhs['nama']) ?>" required>
                </div>
                <div class="mb-3 row g-3">
                    <label for="" class="form-label col-12">Tanggal Lahir</label>
                    <select name="tgl" id="" class="form-select col me-4">
                        <option value="" disabled selected>Day</option>
                        <?php
                        for ($i = 1; $i <= 31; $i++) {
                            $selected = ($tgl[2] == $i) ? 'selected' : '';
                            echo "<option value=" . $i . " $selected>" . $i . "</option>";
                        }
                        ?>
                    </select>
                    <select name="bln" id="" class="form-select col me-4">
                        <option value="" disabled>Month</option>
                        <?php
                        $bln = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Aug', 'Sep', 'Okt', 'Nov', 'Des'];
                        foreach ($bln as $i => $value) {
                            $selected = ($tgl[1] == $i + 1) ? 'selected' : '';
                            echo "<option value=" . ($i + 1) . " $selected>" . $value . "</option>";
                        }
                        ?>
                    </select>
                    <select name="thn" id="" class="form-select col">
                        <option value="" disabled selected>Year</option>
                        <?php
                        for ($i = date('Y'); $i >= 1945; $i--) {
                            $selected = ($tgl[0] == $i) ? 'selected' : '';
                            echo "<option value=" . $i . " $selected>" . $i . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="jk" class="form-label">Jenis Kelamin</label><br>
                    <input type="radio" class="form-check-input me-2" name="jk" id="L" value="L" checked>
                    <label for="L">Laki-Laki</label>
                    <input type="radio" class="form-check-input ms-4 me-2" name="jk" id="P" value="P" <?= ($data_mhs['jekel'] == 'P') ? 'checked' : '' ?>>
                    <label for="P">Perempuan</label>
                </div>
                <div class="mb-3">
                    <label for="prodi" class="form-label">Prodi</label>
                    <select name="prodi" class="form-select" id="prodi" required>
                        <option value="" disabled selected>--- Pilih Prodi ---</option>
                        <?php
                        include 'koneksi.php';
                        $ambil_prodi = mysqli_query($db, "SELECT * FROM prodi");
                        while ($data_prodi = mysqli_fetch_array($ambil_prodi)) {
                            echo "<option value=" . $data_prodi['id'] . " " . ($data_prodi['id'] == $data_mhs['prodi_id'] ? 'selected' : '') . ">" . $data_prodi['nama_prodi'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="email" value="<?= $data_mhs['email'] ?>" required>
                </div>
                <div class="mb-3">
                    <label for="hobi" class="form-label">Hobi</label><br>
                    <input type="checkbox" name="hobi[]" <?php if (in_array("Bernyanyi", $hobies)) echo "checked" ?> id="Bernyanyi" value="Bernyanyi" class="form-check-input me-2">
                    <label for="Bernyanyi" class="form-check-label me-4">Bernyanyi</label>
                    <input type="checkbox" name="hobi[]" <?php if (in_array("Membaca", $hobies)) echo "checked" ?> id="Membaca" value="Membaca" class="form-check-input me-2">
                    <label for="Membaca" class="form-check-label me-4">Membaca</label>
                    <input type="checkbox" name="hobi[]" <?php if (in_array("Olahraga", $hobies)) echo "checked" ?>id="Olahraga" value="Olahraga" class="form-check-input me-2">
                    <label for="Olahraga" class="form-check-label">Olahraga</label>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea name="alamat" class="form-control" id="alamat" required><?= $data_mhs['alamat'] ?></textarea>
                </div>
                <button type="submit" name="submit" class="btn btn-warning my-5">Update</button>
            </form>
        </div>

<?php
        break;
}
?>
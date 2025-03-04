<?php
$aksi = isset($_GET['aksi']) ? $_GET['aksi'] : 'list';
include '../koneksi.php';
switch ($aksi) {
    case 'list':
?>
        <a href="index.php?p=dosen&aksi=input" class="btn btn-primary my-3"><i class="material-icons me-2">add_circle</i>Tambah Dosen</a>
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
                                        <th>No</th>
                                        <th class="text-left">NIP</th>
                                        <th>Nama Dosen</th>
                                        <th>Email</th>
                                        <th>Prodi</th>
                                        <th class="text-left">Telepon</th>
                                        <th>Alamat</th>
                                        <th>Aksi</th>
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
                                            <td class="text-left"><?php echo $data_dsn['nip'] ?></td>
                                            <td><?= $data_dsn['nama_dosen'] ?></td>
                                            <td><?= $data_dsn['email'] ?></td>
                                            <td><?= $data_dsn['nama_prodi'] ?></td>
                                            <td class="text-left"><?= $data_dsn['telp'] ?></td>
                                            <td><?= $data_dsn['alamat'] ?></td>
                                            <td>
                                                <a href="index.php?p=dosen&aksi=edit&id_edit=<?= $data_dsn['nip'] ?>" class="btn btn-warning"><i class="material-icons">edit_square</i></a>
                                                <a href="proses_dosen.php?proses=delete&id_hapus=<?= $data_dsn['nip'] ?>" class="btn btn-danger" onclick="return confirm('Yakin akan menghapus data?')"><i class="material-icons">delete</i></a>
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
                            <textarea name="alamat" class="form-control" id="alamat" rows="4" required></textarea>
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
        $ambil = mysqli_query($db, "SELECT * FROM dosen WHERE nip='$_GET[id_edit]'");
        $data_dsn = mysqli_fetch_array($ambil);
        ?>

        <div class="container-fluid px-4">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <form action="proses_dosen.php?proses=update" method="post">
                        <div class="mb-3">
                            <label for="nip" class="form-label">NIP</label>
                            <input type="number" name="nip" class="form-control text-dark" id="nip" value="<?= ($data_dsn['nip']) ?>" required autofocus readonly>
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
                            <textarea name="alamat" class="form-control" id="alamat" rows="4" required><?= $data_dsn['alamat'] ?></textarea>
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
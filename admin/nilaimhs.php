<?php
include '../koneksi.php';
$aksi = isset($_GET['aksi']) ? $_GET['aksi'] : 'list';
switch ($aksi) {
    case 'list':

?>
        <a href="index.php?p=nilai&aksi=input" class="btn btn-primary my-3">
            <i class="material-icons me-2">add_circle</i>Tambah Nilai
        </a>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Nilai Mahasiswa</h4>
                        <p class="card-category">List Nilai</p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th style="width: 25%;">NIM</th>
                                        <th style="width: 15%;">Nama</th>
                                        <th style="width: 15%;">Prodi</th>
                                        <th style="width: 15%;">Nilai</th>
                                        <th style="width: 20%;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    $ambil = mysqli_query($db, "SELECT * FROM nilai JOIN prodi ON nilai.prodi_id = prodi.id");
                                    $no = 1;
                                    while ($data_mhs = mysqli_fetch_array($ambil)) {
                                    ?>

                                        <tr>
                                            <td class="text-center"><?php echo $no ?></td>
                                            <td class="text-left"><?php echo $data_mhs['nim'] ?></td>
                                            <td><?= $data_mhs['nama'] ?></td>
                                            <td><?= $data_mhs['prodi_id'] ?></td>
                                            <td><?= $data_mhs['nilai'] ?></td>
                                            <td>
                                                <a href="index.php?p=nilai&aksi=edit&id_edit=<?= $data_mhs['nim'] ?>" class="btn btn-warning"><i class="material-icons">edit_square</i></a>
                                                <a href="proses_nilai.php?proses=delete&id_hapus=<?= $data_mhs['nim'] ?>" class="btn btn-danger" onclick="return confirm('Yakin akan menghapus data?')"><i class="material-icons">delete</i></a>
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
                    <form action="proses_nilai.php?proses=insert" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="nim" class="form-label">NIM</label>
                            <input type="number" name="nim" class="form-control" id="nim" required autofocus>
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Mahasiswa</label>
                            <input type="text" name="nama" class="form-control" id="nama" required>
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
                            <label for="nilai" class="form-label">Nilai</label>
                            <input type="number" name="nilai" class="form-control" id="nilai" required autofocus>
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
        $ambil = mysqli_query($db, "SELECT * FROM nilai WHERE nim='$_GET[id_edit]'");
        $data_mhs = mysqli_fetch_array($ambil);
        ?>

        <div class="container-fluid px-4">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <form action="proses_nilai.php?proses=insert" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="nim" class="form-label">NIM</label>
                            <input type="number" name="nim" class="form-control" id="nim" value="<?= ($data_mhs['nim']) ?>" required autofocus readonly>
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Mahasiswa</label>
                            <input type="text" name="nama" class="form-control" id="nama" value="<?= ($data_mhs['nama']) ?>" required>
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
                            <label for="nilai" class="form-label">Nilai</label>
                            <input type="number" name="nilai" class="form-control" id="nilai" value="<?= ($data_mhs['nilai']) ?>" required autofocus>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        <button type="reset" name="reset" class="btn btn-warning">Reset</button>
                    </form>
                </div>
            </div>
        </div>

<?php
        break;
}
?>

<script>
    const input = document.getElementById('file-upload');
    const previewPhoto = () => {
        const file = input.files;
        if (file) {
            const fileReader = new FileReader();
            const preview = document.getElementById('file-preview');
            preview.classList.remove('d-none');
            fileReader.onload = function(event) {
                preview.setAttribute('src', event.target.result);
            }
            fileReader.readAsDataURL(file[0]);
        }
    }
    input.addEventListener("change", previewPhoto);
</script>
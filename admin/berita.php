<?php
include '../koneksi.php';
$aksi = isset($_GET['aksi']) ? $_GET['aksi'] : 'list';
switch ($aksi) {
    case 'list':

?>
        <a href="index.php?p=berita&aksi=input" class="btn btn-primary my-3">
            <i class="material-icons me-2">add_circle</i>Tambah Berita
        </a>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Berita</h4>
                        <p class="card-category">List Berita</p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th style="width: 25%;">Judul</th>
                                        <th style="width: 15%;">Kategori</th>
                                        <th style="width: 15%;">User</th>
                                        <th class="text-left" style="width: 15%;">Tanggal</th>
                                        <th style="width: 20%;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $ambil = mysqli_query($db, "SELECT *,berita.id AS berita_id FROM berita JOIN kategori ON berita.kategori_id = kategori.id JOIN user ON berita.user_id = user.id");
                                    $no = 1;
                                    while ($data_brt = mysqli_fetch_array($ambil)) {
                                    ?>
                                        <tr>
                                            <td class="text-center"><?php echo $no ?></td>
                                            <td class="text-truncate" style="max-width: 200px;"><?= $data_brt['judul_berita'] ?></td>
                                            <td><?= $data_brt['nama_kategori'] ?></td>
                                            <td><?= $data_brt['full_name'] ?></td>
                                            <td class="text-left"><?= $data_brt['date_created'] ?></td>
                                            <td>
                                                <a href="index.php?p=berita&aksi=edit&id_edit=<?= $data_brt['berita_id'] ?>" class="btn btn-warning"><i class="material-icons">edit_square</i></a>
                                                <a href="proses_berita.php?proses=delete&id_hapus=<?= $data_brt['berita_id'] ?>&file=<?= $data_brt['file_upload'] ?>" class="btn btn-danger" onclick="return confirm('Yakin akan menghapus data?')"><i class="material-icons">delete</i></a>
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
                    <form action="proses_berita.php?proses=insert" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Judul Berita</label>
                            <input type="text" name="nama" class="form-control" id="nama" required>
                        </div>
                        <div class="mb-3">
                            <label for="kategori" class="form-label">Kategori</label>
                            <select name="kategori" class="form-select" id="kategori" required>
                                <option value="" disabled selected>--- Pilih Kategori ---</option>
                                <?php
                                include 'koneksi.php';
                                $ambil_ktg = mysqli_query($db, "SELECT * FROM kategori");
                                while ($data_ktg = mysqli_fetch_array($ambil_ktg)) {
                                    echo "<option value=" . $data_ktg['id'] . ">" . $data_ktg['nama_kategori'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="gambar" class="form-label">File Upload</label>
                            <input type="file" name="gambar" class="form-select mb-2" accept=".jpg, .jpeg, .png" id="file-upload" required>
                            <img src="#" class="d-none" width="200" alt="Preview Uploaded Image" id="file-preview">
                        </div>
                        <div class="mb-3">
                            <label for="brt" class="form-label">Berita</label>
                            <textarea name="brt" class="form-control" id="brt" required rows="8"></textarea>
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
        $ambil = mysqli_query($db, "SELECT * FROM berita WHERE id='$_GET[id_edit]'");
        $data_brt = mysqli_fetch_array($ambil);
        ?>

        <div class="container-fluid px-4">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <form action="proses_berita.php?proses=update" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <!-- <label for="id" class="form-label">ID</label> -->
                            <input type="hidden" name="id" class="form-control" id="id" value="<?= ($data_brt['id']) ?>" required autofocus readonly>
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Judul Berita</label>
                            <input type="text" name="nama" class="form-control" id="nama" value="<?= ($data_brt['judul_berita']) ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="kategori" class="form-label">Kategori</label>
                            <select name="kategori" class="form-select" id="kategori" required>
                                <option value="" disabled selected>--- Pilih Kategori ---</option>
                                <?php
                                include 'koneksi.php';
                                $ambil_ktg = mysqli_query($db, "SELECT * FROM kategori");
                                while ($data_ktg = mysqli_fetch_array($ambil_ktg)) {
                                    echo "<option value=" . $data_ktg['id'] . " " . ($data_ktg['id'] == $data_brt['kategori_id'] ? 'selected' : '') . ">" . $data_ktg['nama_kategori'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="gambar" class="form-label">File Upload</label>
                            <input type="file" name="gambar" class="form-select mb-2" accept=".jpg, .jpeg, .png" id="file-upload">
                            <input type="hidden" name="gambar_lama" value="<?= $data_brt['file_upload'] ?>">
                            <img src="image/<?= ($data_brt['file_upload']) ?>" class="" width="200" alt="Preview Uploaded Image" id="file-preview">
                        </div>
                        <div class="mb-3">
                            <label for="brt" class="form-label">Berita</label>
                            <textarea name="brt" class="form-control" id="brt" required rows="8"><?= $data_brt['isi_berita'] ?></textarea>
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
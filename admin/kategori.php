<?php
include '../koneksi.php';
$aksi = isset($_GET['aksi']) ? $_GET['aksi'] : 'list';
switch ($aksi) {
    case 'list':

?>
        <a href="index.php?p=kategori&aksi=input" class="btn btn-primary my-3"><i class="material-icons me-2">add_circle</i></i>Tambah Kategori</a>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Kategori</h4>
                        <p class="card-category">List Kategori</p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-left">No</th>
                                        <th>Nama Kategori</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $ambil = mysqli_query($db, "SELECT * FROM kategori");
                                    $no = 1;
                                    while ($data_ktg = mysqli_fetch_array($ambil)) {
                                    ?>
                                        <tr>
                                            <td class="text-center"><?php echo $no ?></td>
                                            <td><?= $data_ktg['nama_kategori'] ?></td>
                                            <td>
                                                <a href="index.php?p=kategori&aksi=edit&id_edit=<?= $data_ktg['id'] ?>" class="btn btn-warning"><i class="material-icons">edit_square</i></a>
                                                <a href="proses_kategori.php?proses=delete&id_hapus=<?= $data_ktg['id'] ?>" class="btn btn-danger" onclick="return confirm('Yakin akan menghapus data?')"><i class="material-icons">delete</i></a>
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
                    <form action="proses_kategori.php?proses=insert" method="post">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Kategori</label>
                            <input type="text" name="nama" class="form-control" id="nama" required>
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
        $ambil = mysqli_query($db, "SELECT * FROM kategori WHERE id='$_GET[id_edit]'");
        $data_ktg = mysqli_fetch_array($ambil);
        ?>

        <div class="container-fluid px-4">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <form action="proses_kategori.php?proses=update" method="post">
                        <div class="mb-3">
                            <!-- <label for="id" class="form-label">ID</label> -->
                            <input name="id" class="form-control text-dark" id="id" value="<?= ($data_ktg['id']) ?>" required autofocus readonly>
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Kategori</label>
                            <input type="text" name="nama" class="form-control" id="nama" value="<?= ($data_ktg['nama_kategori']) ?>" required>
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
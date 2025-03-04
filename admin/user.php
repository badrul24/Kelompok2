<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if ($_SESSION['level'] != 'admin') {
    echo "<script>window.location='index.php?p=home'</script>";
    exit;
}
include '../koneksi.php';
$aksi = isset($_GET['aksi']) ? $_GET['aksi'] : 'list';
switch ($aksi) {
    case 'list':
?>
        <a href="index.php?p=user&aksi=input" class="btn btn-primary my-2"><i class="material-icons me-2">add_circle</i>Tambah User</a>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">User</h4>
                        <p class="card-category">List User</p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-left">No</th>
                                        <th>Full name</th>
                                        <th>Email</th>
                                        <th>Level</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    $getData = mysqli_query($db, "SELECT * FROM user");
                                    $no = 1;
                                    while ($user = mysqli_fetch_array($getData)) {
                                    ?>
                                        <tr>
                                            <td class="text-center"><?= $no ?></td>
                                            <td><?= $user['full_name'] ?></td>
                                            <td><?= $user['email'] ?></td>
                                            <td><?= $user['level'] ?></td>
                                            <td>
                                                <a href="index.php?p=user&aksi=edit&id=<?= $user['id'] ?>" class="btn btn-warning"><i class="material-icons">edit_square</i></a>
                                                <a href="proses_user.php?proses=delete&id=<?= $user['id'] ?>" class="btn btn-danger" onclick="return confirm('Yakin akan menghapus data?')"><i class="material-icons">delete</i></a>
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
                    <form action="proses_user.php?proses=insert" method="post">
                        <div class="mb-3">
                            <label for="full_name" class="form-label">Nama Lengkap</label>
                            <input type="text" name="full_name" class="form-control" id="full_name" required autofocus>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" id="email" required autofocus>
                            <?php if (isset($_SESSION['errors'])) { ?>
                                <?php if ($_SESSION['errors']['for'] == 'email') { ?>
                                    <p class="text-danger"><?= $_SESSION['errors']['message'] ?></p>
                                <?php $_SESSION['errors'] = null;
                                } ?>
                            <?php } ?>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="password" required autofocus>
                            <?php if (isset($_SESSION['errors'])) { ?>
                                <?php if ($_SESSION['errors']['for'] == 'password') { ?>
                                    <p class="text-danger"><?= $_SESSION['errors']['message'] ?></p>
                                <?php $_SESSION['errors'] = null;
                                } ?>
                            <?php } ?>
                        </div>
                        <div class="mb-3">
                            <label for="confirm_pass" class="form-label">Konfirmasi Password</label>
                            <input type="password" name="confirm_pass" class="form-control" id="confirm_pass" required autofocus>
                        </div>
                        <div class="mb-3">
                            <label for="level" class="form-label">Level</label>
                            <select name="level" class="form-select" id="level" required>
                                <option value="" disabled selected>--- Pilih level ---</option>
                                <option value="admin">Admin</option>
                                <option value="user">User</option>
                            </select>
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
        $getData = mysqli_query($db, "SELECT * FROM user WHERE id = $_GET[id]");
        $no = 1;

        $user = mysqli_fetch_array($getData);
        ?>

        <div class="container-fluid px-4">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <form action="proses_user.php?proses=update" method="post">
                        <input type="hidden" name="user_id" value="<?= $user['id'] ?>">
                        <div class="mb-3">
                            <label for="full_name" class="form-label">Nama</label>
                            <input type="text" name="full_name" class="form-control" id="full_name" value="<?= $user['full_name'] ?>" required autofocus>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" id="email" value="<?= $user['email'] ?>" required autofocus>
                        </div>
                        <div class="mb-3">
                            <label for="ket" class="form-label">Level</label>
                            <select name="level" class="form-select" id="level" required>
                                <option value="" disabled>--- Pilih level ---</option>
                                <option value="admin" <?= $user['level'] == 'admin' ? 'selected' : '' ?>>Admin</option>
                                <option value="user" <?= $user['level'] == 'user' ? 'selected' : '' ?>>User</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-warning my-3" name="submit">Update</button>
                    </form>
                </div>
            </div>
        </div>

<?php
        break;
}
?>
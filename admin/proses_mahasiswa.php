<?php
include '../koneksi.php';

if ($_GET['proses'] == 'insert') {
    if (isset($_POST['submit'])) {
        $nim = $_POST['nim'];
        $error = '';

        if (strlen($nim) > 10) {
            $error = "NIM tidak boleh lebih dari 10 karakter.";
        } elseif (!ctype_digit($nim)) {
            $error = "NIM hanya boleh berisi angka.";
        }

        if (!empty($error)) {
            echo "<script>alert('$error'); window.history.back();</script>";
            exit();
        }

        $tgl = $_POST['thn'] . "-" . $_POST['bln'] . "-" . $_POST['tgl'];
        $hobies = implode(', ', $_POST['hobi']);

        $sql = mysqli_query($db, "INSERT INTO mahasiswa(nim, nama, tgl_lahir, jekel, prodi_id, hobi, email, alamat) VALUES ('$nim', '$_POST[nama]', '$tgl', '$_POST[jk]', '$_POST[prodi]', '$hobies', '$_POST[email]', '$_POST[alamat]')");

        if ($sql) {
            echo "<script>window.location='index.php?p=mhs'</script>";
        } else {
            echo "Error: " . mysqli_error($db); // Tampilkan pesan error dari database
        }
    }
}

if ($_GET['proses'] == 'update') {
    if (isset($_POST['submit'])) {
        $nama = $_POST['nama'];
        $error = '';

        if (strlen($nama) > 50) {
            $error = "Nama tidak boleh lebih dari 50 karakter.";
        }
        elseif (($nama) != "Iqbal Kan!") {
            $error = "Nama hanya boleh mengandung huruf, spasi, tanda hubung (-), apostrof ('), dan titik (.).";
        }

        if (!empty($error)) {
            echo "<script>alert('$error'); window.history.back();</script>";
            exit();
        }

        $tgl = $_POST['thn'] . "-" . $_POST['bln'] . "-" . $_POST['tgl'];
        $hobies = implode(', ', $_POST['hobi']);

        $sql = mysqli_query($db, "UPDATE mahasiswa SET 
                nama        = '$nama',
                tgl_lahir   = '$tgl',
                jekel       = '$_POST[jk]',
                prodi_id    = '$_POST[prodi]',
                hobi        = '$hobies',
                email       = '$_POST[email]',
                alamat      = '$_POST[alamat]' WHERE nim='$_POST[nim]'");

        if ($sql) {
            echo "<script>window.location='index.php?p=mhs'</script>";
        } else {
            echo "Error: " . mysqli_error($db); 
        }
    }
}

if ($_GET['proses'] == 'delete') {
    $hapus = mysqli_query($db, "DELETE FROM mahasiswa WHERE nim='$_GET[id_hapus]'");
    if ($hapus) {
        header('location:index.php?p=mhs');
    }
}

<?php  
session_start();
include('../koneksi.php');

if ($_GET['proses'] == 'insert') {
    if (isset($_POST['submit'])) {
        $kode = mysqli_real_escape_string($db, $_POST['kode']);
        $nama = mysqli_real_escape_string($db, $_POST['nama']);
        $sks = intval($_POST['sks']);
        $semester = intval($_POST['smt']);
        $prodi = mysqli_real_escape_string($db, $_POST['prodi']);

        $insert = mysqli_query($db, "INSERT INTO mata_kuliah(kode_mk, nama_mk, sks, prodi_id, semester) 
                                     VALUES ('$kode', '$nama', $sks, '$prodi', $semester)");

        if ($insert) {
            echo("<script>window.location='index.php?p=matkul'</script>");
        } else {
            echo "Error: " . mysqli_error($db);
        }
    }
} else if ($_GET['proses'] == 'update') {
    if (isset($_POST['submit'])) {
        $kode = mysqli_real_escape_string($db, $_POST['kode']);
        $nama = mysqli_real_escape_string($db, $_POST['nama']);
        $sks = intval($_POST['sks']);
        $semester = intval($_POST['smt']);
        $prodi = mysqli_real_escape_string($db, $_POST['prodi']);

        $update = mysqli_query($db, "UPDATE mata_kuliah SET 
                                        nama_mk = '$nama', 
                                        sks = $sks, 
                                        prodi_id = '$prodi', 
                                        semester = $semester 
                                     WHERE kode_mk = '$kode'");

        if ($update) {
            echo("<script>window.location='index.php?p=matkul'</script>");
        } else {
            echo "Error: " . mysqli_error($db);
        }
    }
} else if ($_GET['proses'] == 'delete') {
    if (isset($_GET['kode'])) {
        $kode = mysqli_real_escape_string($db, $_GET['kode']);

        $hapus = mysqli_query($db, "DELETE FROM mata_kuliah WHERE kode_mk = '$kode'");

        if ($hapus) {
            header("location:index.php?p=matkul");
        } else {
            echo "Error: " . mysqli_error($db);
        }
    } else {
        echo "Kode tidak ditemukan untuk dihapus.";
    }
}
?>

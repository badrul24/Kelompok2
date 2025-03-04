<?php
session_start();
include('../koneksi.php');

function upload()
{
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $tmpLoc = $_FILES['gambar']['tmp_name'];

    $validExt = ['jpg', 'jpeg', 'png', 'gif'];
    $ext = explode('.', $namaFile);
    $gambarExt = strtolower(end($ext));

    if (!in_array($gambarExt, $validExt) || $ukuranFile > 10000000) {
        return false;
    }

    $uid = uniqid();
    $namaFileBaru = $uid . '.' . $gambarExt;

    move_uploaded_file($tmpLoc, 'image/' . $namaFileBaru);
    return $namaFileBaru;
}

if ($_GET['proses'] == 'insert') {
    $target_dir = "image/";

    if (isset($_POST['submit'])) {
        $userId = $_SESSION['user_id'];
        $judul = $_POST['nama'];
        $kategori = $_POST['kategori'];
        $berita = $_POST['brt'];
        $gambar = upload();

        $insert = mysqli_query($db, "INSERT INTO berita(user_id,judul_berita,kategori_id,isi_berita,file_upload) VALUES ($userId,'$judul',$kategori,'$berita','$gambar')");
        if ($insert) {
            echo ("<script>window.location='index.php?p=berita'</script>");
        }
    }
}

if ($_GET['proses'] == 'update') {
    if (isset($_POST['submit'])) {
        $judul = $_POST['nama'];
        $kategori = $_POST['kategori'];
        $berita = $_POST['brt'];
        $gambarLama = $_POST['gambar_lama'];
        
        $gambar = upload();
        if (!$gambar) {
            $gambar = $gambarLama;
        } else {
            if (file_exists('image/' . $gambarLama)) {
                unlink('image/' . $gambarLama);
            }
        }

        if (empty($_FILES['FileToUpload'])) {
            $sql = mysqli_query($db, "UPDATE berita SET 
                judul_berita = '$judul',
                kategori_id = $kategori,
                isi_berita = '$berita',
                file_upload = '$gambar' 
                WHERE id = $_POST[id]");
        } else {
            $sql = mysqli_query($db, "UPDATE berita SET 
                judul_berita = '$judul',
                kategori_id = $kategori,
                isi_berita = '$berita',
                file_upload = '$gambar' 
                WHERE id = $_POST[id]");

            unlink($target_dir . $_GET['file']);
        }
        if ($sql) {
            
            echo "<script>window.location='index.php?p=berita'</script>";
        }
    }
}

if ($_GET['proses'] == 'delete') {
    $id = $_GET['id_hapus'];
    $query = mysqli_query($db, "SELECT file_upload FROM berita WHERE id=$id");
    $data = mysqli_fetch_assoc($query);

    if (file_exists('image/' . $data['file_upload'])) {
        unlink('image/' . $data['file_upload']);
    }

    $hapus = mysqli_query($db, "DELETE FROM berita WHERE id=$id");
    if ($hapus) {
        unlink($target_dir . $_GET['file']);
        header('location:index.php?p=berita');
    }
}

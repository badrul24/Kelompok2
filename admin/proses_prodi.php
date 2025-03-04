<?php
    include '../koneksi.php';
    if($_GET['proses'] == 'insert'){
        if (isset($_POST['submit'])){ 
            $sql=mysqli_query($db, "INSERT INTO prodi(nama_prodi,jenjang_studi,keterangan) VALUES ('$_POST[nama]','$_POST[studi]','$_POST[ket]')");

            if($sql) {
                echo "<script>window.location='index.php?p=prodi'</script>";
            }
        }
    }

    if($_GET['proses'] == 'update'){
        if (isset($_POST['submit'])){
            $sql=mysqli_query($db, "UPDATE prodi SET 
                nama_prodi      = '$_POST[nama]',
                jenjang_studi   = '$_POST[studi]',
                keterangan      = '$_POST[ket]' WHERE id='$_POST[id]'");

            if($sql) {
                echo "<script>window.location='index.php?p=prodi'</script>";
            }
        }
    }

    if($_GET['proses'] == 'delete'){
        $hapus=mysqli_query($db, "DELETE FROM prodi WHERE id='$_GET[id_hapus]'");
        if($hapus){
            header('location:index.php?p=prodi');
        }
    }
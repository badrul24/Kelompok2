<?php
    include '../koneksi.php';
    if($_GET['proses'] == 'insert'){
        if (isset($_POST['submit'])){ 
            $sql=mysqli_query($db, "INSERT INTO kategori(id,nama_kategori) VALUES ('$_POST[id]','$_POST[nama]')");

            if($sql) {
                echo "<script>window.location='index.php?p=kategori'</script>";
            }
        }
    }

    if($_GET['proses'] == 'update'){
        if (isset($_POST['submit'])){
            $sql=mysqli_query($db, "UPDATE kategori SET 
                nama_kategori   = '$_POST[nama]' WHERE id='$_POST[id]'");

            if($sql) {
                echo "<script>window.location='index.php?p=kategori'</script>";
            }
        }
    }

    if($_GET['proses'] == 'delete'){
        $hapus=mysqli_query($db, "DELETE FROM kategori WHERE id='$_GET[id_hapus]'");
        if($hapus){
            header('location:index.php?p=kategori');
        }
    }
<?php
    include '../koneksi.php';
    if($_GET['proses'] == 'insert'){
        if (isset($_POST['submit'])){ 
            $sql=mysqli_query($db, "INSERT INTO nilai(nim, nama, prodi_id, nilai) VALUES ('$_POST[nim]','$_POST[nama]','$_POST[prodi]','$_POST[nilai]')");

            if($sql) {
                echo "<script>window.location='index.php?p=nilai'</script>";
            }
        }
    }

    if($_GET['proses'] == 'update'){
        if (isset($_POST['submit'])){
            $sql=mysqli_query($db, "UPDATE nilai SET 
                nama        = '$_POST[nama]',
                prodi_id    = '$_POST[prodi]',
                nilai       = '$_POST[nilai]' WHERE nim='$_POST[id]'");

            if($sql) {
                echo "<script>window.location='index.php?p=nilai'</script>";
            }
        }
    }

    if($_GET['proses'] == 'delete'){
        $hapus=mysqli_query($db, "DELETE FROM nilai WHERE nim='$_GET[id_hapus]'");
        if($hapus){
            header('location:index.php?p=nilai');
        }
    }
<?php
    include '../koneksi.php';        
    if ($_GET['proses'] == 'insert') {
        if (isset($_POST['submit'])){
            
            $sql=mysqli_query($db, "INSERT INTO dosen(nip,nama_dosen,email,prodi_id,telp,alamat) VALUES ('$_POST[nip]','$_POST[nama]','$_POST[email]','$_POST[prodi]','$_POST[telepon]','$_POST[alamat]')");

            if($sql) {
                echo "<script>window.location='index.php?p=dosen'</script>";
            }
        }
    }

    if ($_GET['proses'] == 'update') {
        if (isset($_POST['submit'])){
            $sql=mysqli_query($db, "UPDATE dosen SET 
                nama_dosen  = '$_POST[nama]',
                email       = '$_POST[email]',
                prodi_id    = '$_POST[prodi]',
                telp        = '$_POST[telepon]',
                alamat      = '$_POST[alamat]' WHERE nip='$_POST[nip]'");

            if($sql) {
                echo "<script>window.location='index.php?p=dosen'</script>";
            }
        }
    }

    if ($_GET['proses'] == 'delete') {
        $hapus=mysqli_query($db, "DELETE FROM dosen WHERE nip='$_GET[id_hapus]'");
            if($hapus){
            header('location:index.php?p=dosen');
        }
    }
    
?>
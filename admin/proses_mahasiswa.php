<?php
    include '../koneksi.php';
    if ($_GET['proses'] == 'insert') {
        if (isset($_POST['submit'])){
            $tgl=$_POST['thn'] . "-" . $_POST['bln'] . "-" . $_POST['tgl'];
            $hobies=implode(', ', $_POST['hobi']);
            
            $sql=mysqli_query($db, "INSERT INTO mahasiswa(nim,nama,tgl_lahir,jekel,prodi_id,hobi,email,alamat) VALUES ('$_POST[nim];','$_POST[nama]','$tgl','$_POST[jk]','$_POST[prodi]','$hobies','$_POST[email]','$_POST[alamat]')");

            if($sql) {
                echo "<script>window.location='index.php?p=mhs'</script>";
            }
        }
    }

    if ($_GET['proses'] == 'update') {
        if (isset($_POST['submit'])){
            $tgl=$_POST['thn'] . "-" . $_POST['bln'] . "-" . $_POST['tgl'];
            $hobies=implode(', ', $_POST['hobi']);
            
            $sql=mysqli_query($db, "UPDATE mahasiswa SET 
                nama        = '$_POST[nama]',
                tgl_lahir   = '$tgl',
                jekel       = '$_POST[jk]',
                prodi_id    = '$_POST[prodi]',
                hobi        = '$hobies',
                email       = '$_POST[email]',
                alamat      = '$_POST[alamat]' WHERE nim='$_POST[nim]'");

            if($sql) {
                echo "<script>window.location='index.php?p=mhs'</script>";
            }
        }
    }

    if ($_GET['proses'] == 'delete'){ 
        $hapus=mysqli_query($db, "DELETE FROM mahasiswa WHERE nim='$_GET[id_hapus]'");
            if($hapus){
            header('location:index.php?p=mhs');
        }
    }
?>
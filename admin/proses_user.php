<?php  
    session_start();
    include('../koneksi.php');
    if($_GET['proses'] == 'insert'){
        if(isset($_POST['submit'])){
            
            $full_name = $_POST['full_name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirm_pass = $_POST['confirm_pass'];
            $level = $_POST['level'];

            $checkEmail = mysqli_query($db, "SELECT null FROM user WHERE email='$email'");
            if(mysqli_num_rows($checkEmail) > 0){
                $_SESSION['errors'] = ["for" => "email", "message" => "email telah terdaftar!"];
                header('location:index.php?p=user&aksi=input');
                exit;
            }
            if($password !== $confirm_pass){
                $_SESSION['errors'] = ["for" => "password", "message" => "Password tidak sama"];
                header('location:index.php?p=user&aksi=input');
                exit;

            }
            $pass = md5($password);


            $insert = mysqli_query($db,"INSERT INTO user(full_name,email,password,level) VALUES ('$full_name','$email','$pass','$level')");
            if($insert){
                echo("<script>window.location='index.php?p=user'</script>");
            }else {
                echo "Error: " . mysqli_error($db);
            }

        }

    }else if($_GET['proses'] == 'update'){
        if(isset($_POST['submit'])){
            include('koneksi.php');
            
            $id = $_POST['user_id'];
            $full_name = $_POST['full_name'];
            $email = $_POST['email'];
            $level = $_POST['level'];
            
            $update = mysqli_query($db,"UPDATE user SET 
                full_name='$full_name',
                email='$email',
                level='$level' 
                WHERE id=$id");
            if($update){
                echo("<script>window.location='index.php?p=user'</script>");
            }else {
                echo "Error: " . mysqli_error($db);
            }

        }

    }else if($_GET['proses'] == 'delete'){
        $hapus = mysqli_query($db, "DELETE FROM user WHERE id = $_GET[id]");

        if($hapus){
            header("location:index.php?p=user");
        }

    }
?>
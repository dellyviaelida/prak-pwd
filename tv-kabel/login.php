<?php
session_start();

if(isset($_SESSION['login'])){
	header("location:homepel.php");
	exit;
}
require 'functions.php';

if(isset($_POST["login"])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    if($username && $password == "admin"){
        $_SESSION['login'] = true;
        header("location:home.php");
        exit;
    }
    
        $result = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username'");

    //cek username
    if(mysqli_num_rows($result) === 1){
        //cek password
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password, $row['password'])){
            // set session
            $_SESSION['login'] = true;
            $_SESSION['pelanggan'] = $row;

            header("location:homepel.php");
            exit;
        }
    }
    $error = true;
    
}
?>
<?php include 'header.php'; ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-4">
            <div class="card p-4 mt-5 shadow-lg border-0">
                <h4 class="py-3 text-center">LOGIN</h4>
                <?php if(isset($error)) : ?>
                    <p class="my-1 pl-3 small" style="color:red;">Username / password salah</p>
                <?php endif; ?>
                <form action="" method="POST">
                    <div class="form-group">
                        <input type="text" placeholder="Username" name="username" class="form-control rounded-pill" required="" autofocus="">
                    </div>
                    <div class="form-group">
                        <input type="password" placeholder="Password" name="password" class="form-control rounded-pill" required="">
                    </div>
                    <div class="tombol">
                        <input type="submit" value="Login" name="login" class="btn btn-primary rounded-pill btn-block">
                    </div>
                </form>
                <p class="my-3 text-center small">Belum punya akun ?<a href="regis.php"> Daftar Sini!</a></p>
                <p class="my-1 text-center small">Copyright &copy; 2021 All Rights Reserved by TVcable</p>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
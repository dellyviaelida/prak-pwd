<?php
require 'functions.php';

$namaErr = $userErr = $passErr = "";
$nama = $user = $pass = "";

if(isset($_POST["regis"])){
    if (!empty($_POST["nama"])) {
        $nama = test_input($_POST["nama"]);
        // melakukan validasi pada inputan nama hanya boleh berupa huruf dan spasi saja
        if (!preg_match("/^[a-zA-Z-' ]*$/",$nama)) {
            $namaErr = "Nama harus berupa huruf";
            $error = true;
        }
    }

    if (!empty($_POST["username"])) {
        $user = test_input($_POST["username"]);
        if (!preg_match("/^[a-zA-Z0-9_]+/",$user)) {
            $userErr = "Username hanya boleh diisi huruf, angka dan karakter";
            $error = true;
        }
    }

    if (!empty($_POST["password"])) {
        $pass = test_input($_POST["password"]);
        if (!preg_match("/^.{5,}$/",$pass)) {
            $passErr = "Password harus lebih dari 5 karakter";
            $error = true;
        }
    }

    if(!$error && registrasi($_POST)>0){
        echo "<script>alert('user baru berhasil ditambahkan')</script>";
        header("Location:login.php");
    }
    else{
        echo mysqli_error($koneksi);
    }
}

function test_input($data) {
    $data = trim($data); // untuk menghilangkan spasi di awal dan akhir dari inputan
    $data = stripslashes($data); // untuk menghapus character backslash dari string
    $data = htmlspecialchars($data); // untuk mengubah beberapa character khusus menjadi entitas HTML
    return $data;
}
?>
<?php include 'header.php'; ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card p-4 mt-5 shadow-lg border-0">
                <h4 class="py-3 text-center">REGISTER</h4>
                <form action="" method="POST">
                    <div class="form-group">
                        <input type="text" placeholder="Name" name="nama" class="form-control rounded-pill" required="" autofocus="">
                        <span class = "error text-danger"><?php echo $namaErr;?></span>
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="Username" name="username" class="form-control rounded-pill" required="">
                        <span class = "error text-danger"><?php echo $userErr;?></span>
                    </div>
                    <div class="form-group">
                        <input type="password" placeholder="Password" name="password" class="form-control rounded-pill" required="">
                        <span class = "error text-danger"><?php echo $passErr;?></span>
                    </div>
                    <div class="form-group">
                        <input type="password" placeholder="Konfirmasi Password" name="password2" class="form-control rounded-pill" required="">
                    </div>
                    <div class="tombol">
                        <input type="submit" value="Register" name="regis" class="btn btn-primary rounded-pill btn-block">
                    </div>
                </form>
                <p class="my-3 text-center small"><a href="login.php">Login Here</a></p>
                <p class="my-1 text-center small">Copyright &copy; 2021 All Rights Reserved by TVcable</p>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
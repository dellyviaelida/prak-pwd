<?php 
session_start();

if(!isset($_SESSION['login'])){
	header("location:login.php");
	exit;
}

require 'functions.php';
$namaErr = $telErr = "";
$nama = $jk = $alamat = $telepon = "";

if (isset($_POST['lanjut'])) {
    if (!empty($_POST["nama"])) {
        $nama = test_input($_POST["nama"]);
        // melakukan validasi pada inputan nama hanya boleh berupa huruf dan spasi saja
        if (!preg_match("/^[a-zA-Z-' ]*$/",$nama)) {
            $namaErr = "Nama harus berupa huruf";
            $error = true;
        }
    }

    if (!empty($_POST["telepon"])) {
        $telepon = test_input($_POST["telepon"]);
        // melakukan validasi pada inputan no telpon hanya boleh berupa angka
        if(!is_numeric($telepon)) {
            $telErr = "Nomor telepon hanya boleh angka";
            $error = true;
        }
    }

    if(!$error){
        $nama = $_POST['nama'];
        $jk = $_POST['jk'];
        $alamat = $_POST['alamat'];
        $telepon = $_POST['telepon'];
        
        $sql_insert = mysqli_query($koneksi, "INSERT INTO pelanggan VALUES( '', '$nama', 
                                                                            '$jk', 
                                                                            '$alamat', 
                                                                            '$telepon')");
    
        header("Location:homepel.php");
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
                <h4 class="py-3 text-center">Data Pelanggan</h4>
                <form action="" method="POST">
                    <div class="form-group">
                        <input type="text" placeholder="Nama Lengkap" name="nama" class="form-control rounded-pill" required="" autofocus="">
                        <span class = "error text-danger"><?php echo $namaErr;?></span>
                    </div>
                    <div class="btn-group btn-group-toggle mb-3" data-toggle="buttons">
                        <label class="btn btn-outline-info active">
                            <input type="radio" name="jk" id="option1" value="L" checked> Male
                        </label>
                        <label class="btn btn-outline-info">
                            <input type="radio" name="jk" id="option2" value="P"> Female
                        </label>
                    </div>
                    <div class="form-group">
                        <!-- <input type="text" placeholder="Alamat" name="alamat" class="form-control rounded-pill" required=""> -->
                        <textarea class="form-control" name="alamat" placeholder="Alamat" rows="2" required=""></textarea>
                    </div>
                    <div class="form-group">
                        <input type="tel" placeholder="Telepon" name="telepon" class="form-control rounded-pill" required="">
                        <span class = "error text-danger"><?php echo $telErr;?></span>
                    </div>
                    <div class="tombol float-right">
                        <input type="submit" value="Lanjutkan" name="lanjut" class="btn btn-primary rounded-pill">
                    </div>
                </form>
                <p class="my-1 mt-3 text-center small">Copyright &copy; 2021 All Rights Reserved by TVcable</p>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
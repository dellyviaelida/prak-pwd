<?php
// memulai session 
session_start();
// membuat koneksi ke database menggunakan file koneksi.php
include "../koneksi.php";
// tangkap data-data yang dikirim dari form login
$id_user = $_POST['id_user'];
$pass=md5($_POST['paswd']);
// menyeleksi data users dengan id user dan password yang sesuai
$sql="SELECT * FROM users WHERE id_user='$id_user' AND password='$pass'";
// melakukan pengecekan apakah kode captcha yang diinputkan sesuai atau tidak
if ($_POST["captcha_code"] == $_SESSION["captcha_code"]) {
    $login=mysqli_query($con,$sql);
    // menghitung jumlah data yang ditemukan
    $ketemu=mysqli_num_rows($login);
    $r= mysqli_fetch_array($login);
    // jika username dan password ketemu
    if ($ketemu > 0){
        // set suatu nilai ke variabel $_SESSION
        $_SESSION['iduser'] = $r['id_user'];
        $_SESSION['passuser'] = $r['password'];
        echo"USER BERHASIL LOGIN<br>";
        // menampilkan data username dan password
        echo "id user =",$_SESSION['iduser'],"<br>";
        echo "password=",$_SESSION['passuser'],"<br>";
        echo "<a href=logout.php><b>LOGOUT</b></a></center>";
    }
    // jika tidak ditemukan username dan passwordnya di database
    else{
        echo "<center>Login gagal! username & password tidak benar<br>";
        echo "<a href=form_login.php><b>ULANGI LAGI</b></a></center>";
    }
    mysqli_close($con); 
} 
// jika input kode captcha tidak sesuai
else {
    echo "<center>Login gagal! Captcha tidak sesuai<br>";
    echo "<a href=form_login.php><b>ULANGI LAGI</b></a></center>"; 
}
?>
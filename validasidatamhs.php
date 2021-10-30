<html>
<head>
    <style>
        .error {color: #FF0000;}
    </style>
</head>
<body>
    <?php
    // deklarasi variable dan set pada nilai kosong
    $namaErr = $nimErr = $genderErr = $emailErr = $nohpErr = $prodiErr = "";
    $nama = $nim = $gender = $email = $nohp = $prodi = $asal = "";
    
    // cek apakah data sudah disubmit dari form
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // proses jika sudah submit form
        // validasi input Nama
        // mengecek apakah input nama kosong atau tidak
        if (empty($_POST["nama"])) {
            $namaErr = "Nama harus diisi";
        }
        else {
            $nama = test_input($_POST["nama"]);
            // melakukan validasi pada inputan nama hanya boleh berupa huruf dan spasi saja
            if (!preg_match("/^[a-zA-Z-' ]*$/",$nama)) {
                $namaErr = "Nama harus berupa huruf";
            }
        }
        
        // validasi input NIM
        // mengecek apakah input NIM kosong atau tidak
        if (empty($_POST["nim"])) {
            $nimErr = "NIM harus diisi";
        }
        else {
            $nim = test_input($_POST["nim"]);
            // melakukan validasi pada inputan NIM hanya boleh 10 digit
            if(strlen($nim) != 10){
                $nimErr = "NIM harus 10 digit";
            }
        }

        // validasi input gender
        if (empty($_POST["gender"])) {
            $genderErr = "Gender harus dipilih";
        }else {
            $gender = test_input($_POST["gender"]);
        }

        // validasi input email
        // mengecek apakah input email kosong atau tidak
        if (empty($_POST["email"])) {
            $emailErr = "Email harus diisi";
        }else {
            $email = test_input($_POST["email"]);
            // cek apakah email sesuai format atau tidak
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Email tidak sesuai format"; 
            }
        }
        
        // validasi input no hp
        // mengecek apakah input no hp kosong atau tidak
        if (empty($_POST["nohp"])) {
            $nohpErr = "Nomor HP harus diisi";
        } 
        else {
            $nohp = test_input($_POST["nohp"]);
            // melakukan validasi pada inputan no hp hanya boleh berupa angka
            if(!is_numeric($nohp)) {
                $nohpErr = "Nomor HP hanya boleh angka";
            }
        }
        
        // validasi input program studi
        // mengecek apakah input program studi kosong atau tidak
        if (empty($_POST["prodi"])) {
            $prodiErr = "Program studi harus diisi";
        }else {
            $prodi = test_input($_POST["prodi"]);
        }

        if (empty($_POST["asal"])) {
            $asal = "";
        }else {
            $asal = test_input($_POST["asal"]);
        }
    }
    
    function test_input($data) {
        $data = trim($data); // untuk menghilangkan spasi di awal dan akhir dari inputan
        $data = stripslashes($data); // untuk menghapus character backslash dari string
        $data = htmlspecialchars($data); // untuk mengubah beberapa character khusus menjadi entitas HTML
        return $data;
    }
    ?>
    <h2>Data Mahasiswa</h2>
    
    <p><span class = "error">* Harus Diisi.</span></p>
    
    <!-- membuat form input -->
    <form method = "post" action = "<?php 
    echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <table>
        <tr>
            <td>Nama</td>
            <!-- field nama -->
            <td><input type = "text" name = "nama">
            <span class = "error">* <?php echo $namaErr;?></span>
            </td>
        </tr>

        <tr>
            <td>NIM</td>
            <!-- field NIM -->
            <td><input type = "number" name = "nim">
            <span class = "error">* <?php echo $nimErr;?></span>
            </td>
        </tr>

        <tr>
            <td>Gender</td>
            <td>
            <input type = "radio" name = "gender" value = "L">Laki-Laki
            <input type = "radio" name = "gender" value = "P">Perempuan
            <span class = "error">* <?php echo $genderErr;?></span>
            </td>
        </tr>

        <tr>
            <td>E-mail</td>
            <!-- field email -->
            <td><input type = "text" name = "email">
            <span class = "error">* <?php echo $emailErr;?></span>
            </td>
        </tr>

        <tr>
            <td>No HP</td>
            <!-- field no hp -->
            <td> <input type = "text" name = "nohp">
            <span class = "error">* <?php echo $nohpErr;?></span>
            </td>
        </tr>

        <tr>
            <td>Program Studi</td>
            <!-- field program studi-->
            <td> <input type = "text" name = "prodi">
            <span class = "error">* <?php echo $prodiErr;?></span>
            </td>
        </tr>

        <tr>
            <td>Asal</td>
            <!-- field asal -->
            <td> <textarea name = "asal" rows = "5" cols = "40"></textarea></td>
        </tr>

        <td>
        <!-- tombol submit -->
        <input type = "submit" name = "submit" value = "Submit"> 
        </td>
    </table>
    </form>

    <?php
    echo "<h2>Data yang anda isi:</h2>";
    if(isset($_POST['submit'])){
        // menampilkan data dalam bentuk tabel
        echo "<table border='1' cellspacing='0' cellpadding='10'>";
        echo "<tr>
                <th>Nama</th>
                <th>NIM</th>
                <th>Gender</th>
                <th>Email</th>
                <th>No HP</th>
                <th>Program Studi</th>
                <th>Asal</th>
                
            </tr>";
        echo "<tr>
            <td>".$_POST['nama']."</td>
            <td>".$_POST['nim']."</td>
            <td>".$_POST['gender']."</td>
            <td>".$_POST['email']."</td>
            <td>".$_POST['nohp']."</td>
            <td>".$_POST['prodi']."</td>
            <td>".$_POST['asal']."</td>
        </tr>";
        echo "</table>";
    }
    ?>
</body>
</html>
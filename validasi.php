<html>
<head>
    <style>
        .error {color: #FF0000;}
    </style>
</head>
<body>
    <?php
    // deklarasi variable dan set pada nilai kosong
    $namaErr = $emailErr = $genderErr = $websiteErr = "";
    $nama = $email = $gender = $comment = $website = "";
    
    // cek apakah data sudah disubmit dari form
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // proses jika sudah submit form
        // validasi input Nama
        // mengecek apakah input nama kosong atau tidak
        if (empty($_POST["nama"])) {
            $namaErr = "Nama harus diisi";
        }else {
            $nama = test_input($_POST["nama"]);
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
        
        if (empty($_POST["website"])) {
            $website = "";
        }else {
            $website = test_input($_POST["website"]);
        }
        
        if (empty($_POST["comment"])) {
            $comment = "";
        }else {
            $comment = test_input($_POST["comment"]);
        }
        
        // validasi input gender
        if (empty($_POST["gender"])) {
            $genderErr = "Gender harus dipilih";
        }else {
            $gender = test_input($_POST["gender"]);
        }
    }
    
    function test_input($data) {
        $data = trim($data); // untuk menghilangkan spasi di awal dan akhir dari inputan
        $data = stripslashes($data); // untuk menghapus character backslash dari string
        $data = htmlspecialchars($data); // untuk mengubah beberapa character khusus menjadi entitas HTML
        return $data;
    }
    ?>
    <h2>Posting Komentar </h2>
    
    <p><span class = "error">* Harus Diisi.</span></p>
    
    <!-- membuat form input -->
    <form method = "post" action = "<?php 
    echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <table>
        <tr>
            <td>Nama:</td>
            <!-- field nama -->
            <td><input type = "text" name = "nama">
            <span class = "error">* <?php echo $namaErr;?></span>
            </td>
        </tr>
        
        <tr>
            <td>E-mail: </td>
            <!-- field email -->
            <td><input type = "text" name = "email">
            <span class = "error">* <?php echo $emailErr;?></span>
            </td>
        </tr>
        
        <tr>
            <td>Website:</td>
            <!-- field website -->
            <td> <input type = "text" name = "website">
            <span class = "error"><?php echo $websiteErr;?></span>
            </td>
        </tr>
        
        <tr>
            <td>Komentar:</td>
            <!-- field komentar -->
            <td> <textarea name = "comment" rows = "5" cols = "40"></textarea></td>
        </tr>
        
        <tr>
            <td>Gender:</td>
            <td>
            <input type = "radio" name = "gender" value = "L">Laki-Laki
            <input type = "radio" name = "gender" value = "P">Perempuan
            <span class = "error">* <?php echo $genderErr;?></span>
            </td>
        </tr>
        
        <!-- tombol submit -->
        <td>
        <input type = "submit" name = "submit" value = "Submit"> 
        </td>
    </table>
    </form>
    
    <?php
    // echo "<h2>Data yang anda isi:</h2>";
    // echo $nama;
    // echo "<br>";
    
    // echo $email;
    // echo "<br>";
    
    // echo $website;
    // echo "<br>";
    
    // echo $comment;
    // echo "<br>";
    
    // echo $gender;
    ?>

    <?php
    echo "<h2>Data yang anda isi:</h2>";

    if(isset($_POST['submit'])){
        // menampilkan data dalam bentuk tabel
        echo "<table border='1' cellspacing='0' cellpadding='10'>";
        echo "<tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Website</th>
                <th>Comment</th>
                <th>Gender</th>
            </tr>";
        echo "<tr>
            <td>".$_POST['nama']."</td>
            <td>".$_POST['email']."</td>
            <td>".$_POST['website']."</td>
            <td>".$_POST['comment']."</td>
            <td>".$_POST['gender']."</td>
        </tr>";
        echo "</table>";
    }
    ?>
</body>
</html>
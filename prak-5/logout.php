<?php
session_start();
session_destroy(); // menghancurkan semua data yang berhubungan dengan session saat ini
echo "Anda telah sukses keluar sistem <b>LOGOUT</b>";
?>
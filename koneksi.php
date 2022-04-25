<?php
$koneksi = mysqli_connect("localhost", "u7934197_statUser", "Sabqie30!", "u7934197_stat");

// Check connection
if (mysqli_connect_errno()) {
    echo "Koneksi database gagal : " . mysqli_connect_error();
}
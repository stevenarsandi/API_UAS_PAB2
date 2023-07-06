<?php
require("koneksi.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $id = $_POST["id"];
    $nama = $_POST["nama"];
    $lokasi = $_POST["lokasi"];
    $urlmap = $_POST["urlmap"];
    $jam = $_POST["jam"];
    $nohp = $_POST["nohp"];
    
    $perintah = "UPDATE tbbiliar SET nama='$nama', lokasi='$lokasi', urlmap='$urlmap', jam='$jam', nohp='$nohp' WHERE id= '$id'";
    $eksekusi = mysqli_query($konek, $perintah);
    $cek = mysqli_affected_rows($konek);
    
    if($cek>0){
        $response["kode"] = 1;
        $response["pesan"] = "Ubah Data Sukses!";
    }
    else{
        $response["kode"] = 0;
        $response["pesan"] = "Ubah Data Gagal!";
    }
}
else {
    $response["kode"] = 0;
    $response["pesan"] = "Tidak ada Post Data";
}

echo json_encode($response);
mysqli_close($konek);

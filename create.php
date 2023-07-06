<?php
require("koneksi.php");

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $nama = $_POST["nama"];
    $lokasi = $_POST["lokasi"];
    $urlmap = $_POST["urlmap"];
    $jam = $_POST["jam"];
    $nohp = $_POST["nohp"];
    
    $perintah = "INSERT INTO tbbiliar (nama, lokasi, urlmap, jam, nohp) VALUES('$nama','$lokasi','$urlmap','$jam','$nohp')";
    $eksekusi = mysqli_query($konek, $perintah);
    $cek = mysqli_affected_rows($konek);
    
    if($cek>0){
        $response["kode"] = 1 ;
        $response["pesan"] = "Tambah Data Sukses" ;
    }
    else{
        $response["kode"] = 0 ;
        $response["pesan"] = "Tambah Data Gagal" ;
    }
}
else{
    $response["kode"] = 0;
    $response["pesan"] = "Tidak ada Post Data";
}
echo json_encode($response);
mysqli_close($konek);
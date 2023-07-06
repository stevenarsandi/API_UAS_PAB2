<?php
    require("koneksi.php");
    
    $perintah = "SELECT * FROM tbbiliar";
    $eksekusi = mysqli_query($konek, $perintah);
    
    $cek = mysqli_affected_rows($konek);
    
    if($cek>0){
        $response["kode"] = 1;
        $response["pesan"] = "Data Tersedia";
        $response["data"] = array();
        
        while($ambil = mysqli_fetch_object($eksekusi)){
            $temp["id"] = $ambil->id;
            $temp["nama"] = $ambil->nama;
            $temp["lokasi"] = $ambil->lokasi;
            $temp["urlmap"] = $ambil->urlmap;
            $temp["jam"] = $ambil->jam;
            $temp["nohp"] = $ambil->nohp;
            
            array_push($response["data"], $temp);
        }
    }
    else{
        $response["kode"] = 0;
        $response["pesan"] = "Data Tidak Tersedia";
    }
    
    echo json_encode($response);
    mysqli_close($konek);
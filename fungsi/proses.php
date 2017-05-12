<?php
session_start();
$_SESSION['pesan'] = "";
include 'koneksi.php';
//tambah buku
if (isset($_POST['sumbang'])){
    $idp    = $_POST['idp'];
    $jbuku  = $_POST['jbuku'];
    $kat    = $_POST['kat'];

    if(count($kat) > 1){
        $aket = implode(",", $kat);
    }

    if($jbuku!="" && $kat!=""){
//belum bisa karna kurang idp        $tambah = $kon->query("INSERT INTO `donasi`(`jumlah`, `kategori`, `user_id_pemilik`) VALUES ('$jbuku', '$akat', '$idp')");
        $_SESSION['pesan'] = "Berhasil ditambah";
        header('location:../umum/beranda_umum.php');
    }else{
        $_SESSION['pesan'] = "Maaf, mohon lengkapi data anda";
        header('location:../umum/beranda_umum.php');
    }

}
?>
<?php
session_start();
$_SESSION['pesan'] = "";
include 'koneksi.php';
//tambah buku
if (isset($_POST['sumbang'])){
    $id    = $_POST['id'];
    $jbuku  = $_POST['jbuku'];
    $kat    = $_POST['kat'];

    //apabila kategori yg dipilih lebih dari satu, maka akan dijadikan satu string
    if(count($kat) > 1){
        $aket = implode(",", $kat);
    }

    if($jbuku!="" && $kat!=""){
//belum bisa karna kurang id        $tambah = $kon->query("INSERT INTO `donasi`(`jumlah`, `kategori`, `user_id_pemilik`) VALUES ('$jbuku', '$akat', '$id')");
        $_SESSION['pesan'] = "Berhasil ditambah";
        header('location:../umum/beranda_umum.php');
    }else{
        $_SESSION['pesan'] = "Maaf, mohon lengkapi data anda";
        header('location:../umum/beranda_umum.php');
    }
}

//proses login
if(isset($_POST['login'])){
    $uname = $_POST['username'];
    $pass = $_POST['password'];

    if($uname!="" && $pass!=""){
        $cek = $kon->query("SELECT nama FROM user where nama='$uname'");
        if($cek->num_rows > 0){
            $upass = md5($pass);
            $auth = $kon->query("SELECT id_user, nama, password, jenis_user, status_user FROM user where nama='$uname' and password='$upass'");
            if($auth->num_rows > 0){
                while($hasil = $auth->fetch_assoc()){
                    $_SESSION['id'] = $hasil['id_user'];
                    $_SESSION['jenis'] = $hasil['jenis_user'];
                    $_SESSION['status'] = $hasil['status_user'];
                }
                if($_SESSION['jenis']==1){
                    header('location:../umum/beranda_umum.php');
                }else{
                    header('location:../org/beranda.php');
                }
            }else{
                $_SESSION['pesan']="Maaf, password anda salah";
                header('location:../index.php');
            }
        }else{
            $_SESSION['pesan']="Maaf, username belum terdaftar";
            header('location:../index.php');
        }
    }else{
        $_SESSION['pesan']="Maaf, mohon isikan username dan password";
        header('location:../index.php');
    }
}

//prosesdaftar
if(isset($_POST['register'])){
    $uname = $_POST['username'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $alamat = $_POST['alamat'];
    $provinsi = $_POST['provinsi'];
    $kota = $_POST['kota'];
    $jenis = $_POST['jenis_user'];

    if($uname!="" && $email!="" && $pass!="" && $alamat!="" && $provinsi!="" && $kota!="" && $jenis!=""){
        $upass = md5($pass);
        $daftar = $kon->prepare("INSERT INTO user(`nama`, `email`, `password`, `alamat`, `provinsi_id`, `kota`, `jenis_user`) VALUES (?, ?, ?, ?, ?, ?, ?)");
        if($daftar){
            $daftar->bind_param("ssssisi", $uname, $email, $upass, $alamat, $provinsi, $kota, $jenis);
            $daftar->execute();
            $_SESSION['pesan']="Pendaftaran berhasil";
            header('location:../register.php');
        }else{
            $_SESSION['pesan']="Maaf, ada kesalahan pada data anda";
            header('location:../register.php');
        }
    }else{
        $_SESSION['pesan']="Maaf, tidak boleh ada data yang kosong";
        header('location:../register.php');
    }
}
?>
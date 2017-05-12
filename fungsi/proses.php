<?php
session_start();
$_SESSION['pesan'];
include 'koneksi.php';
//tambah buku
if (isset($_POST['sumbang'])){
    $jbuku  = $_POST['jbuku'];
    $kat    = $_POST['kat'];
    $id     = $_SESSION['id'];

    //apabila kategori yg dipilih lebih dari satu, maka akan dijadikan satu string
    if(count($kat) > 1){
        $akat = implode(",", $kat);
    }else{
        $akat = $kat[0];
    }

    if($jbuku!="" && $akat!=""){
        $tambah = $kon->query("INSERT INTO `donasi`(`jumlah`, `kategori`, `user_id_pemilik`) VALUES ('$jbuku', '$akat', '$id')");
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

//tambahkegiatan
if(isset($_POST['tambahkegiatan'])){
    $nkeg   = $_POST['nkeg'];
    $alamat = $_POST['alamat'];
    $desk   = $_POST['desk'];
    $kat    = $_POST['kat'];
    $tkeg   = $_POST['tkeg'];
    $uid    = $_SESSION['id'];

    if(count($kat) > 1){
        $kat = implode(",", $kat);
    }else{
        $kat = $kat[0];
    }

    if($nkeg!="" && $desk!="" && $kat!="" && $tkeg!="" && $alamat!=""){
        $tambah = $kon->query("INSERT INTO kegiatan(`nama_kegiatan`, `deskripsi`, `kategori`, `tanggal`, `user_id`, `alamat`) VALUES ('$nkeg','$desk','$kat','$tkeg','$uid','$alamat')");
        $_SESSION['pesan'] = "Kegiatan berhasil ditambahkan";
        header('location:../org/beranda.php');
    }else{
        $_SESSION['pesan'] = "Maaf, mohon lengkapi data anda";
        header('location:../org/beranda.php');
    }
}

if(isset($_POST['updatefotoumum'])){

    $target_dir = "../img/fprofil/";
    $idlah = $_SESSION["id"];
    $target_file = $target_dir.basename($_FILES["fprofil"]["name"]);
//    $isi = mysqli_query($kon, "update user set foto_ktp = ")
    $ps = $kon->prepare("update user set foto_ktp = ? where id_user = ?");
    $ps->bind_param("si",$target_file, $idlah);
    $ps->execute();

    $uploadOk = 1;
    if (file_exists($target_file)) {
        echo "<script>alert('file sudah ada')</script>";
        $uploadOk = 0;
    }
    if ($_FILES["fprofil"]["size"] > 5000000 ) {
        echo "<script>alert('file terlalu besar')</script>";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "<script>alert('gagal mengupload file')</script>";
        header('location:../umum/profilumum.php');
    } else {
        if (move_uploaded_file($_FILES["fprofil"]["tmp_name"], $target_file)) {
            echo "<script>alert('berhasil upload file')</script>";
            header('location:../umum/profilumum.php');
        } else {
            echo "<script>alert('terjadi kesalahan saat meupload')</script>";
        }
    }
}

if(isset($_POST["ganti"])){
    $pass1 = md5($_POST["pass1"]);
    $pass2 = md5($_POST["pass2"]);
    $passk = md5($_POST["passkonfirmasi"]);
    echo "berhasil mah";

    if($kon->query("select password from user where password = '$pass1'")){
        echo "berhasil coy";
        if($pass2 == $passk){
            $kon->query("update user set password = '$pass2' where password = '$pass1'");
            echo "all green";
        }else{
            echo "kita berbeda";
        }
    }else{
        echo "query gagal";
    }
}

//update biodata organisasi
if(isset($_POST['updatebioorg'])){
    $desk       = $_POST['deskripsi'];
    $npemilik   = $_POST['npemilik'];
    $noktp      = $_POST['noktp'];
    $email      = $_POST['email'];
    $nohp       = $_POST['nohp'];
    $alamat     = $_POST['alamat'];
    $web        = $_POST['web'];
    $ig         = $_POST['ig'];
    $id         = $_SESSION['id'];

    if($desk!="" && $npemilik!="" && $noktp!="" && $email!="" && $nohp!="" && $alamat!="" && $web!="" && $ig!=""){
        $ubio = $kon->query("UPDATE user SET deskripsi='$desk', nama_pemilik='$npemilik', no_ktp='$noktp',
        email='$email', no_hp='$nohp', alamat='$alamat', web='$web', ig='$ig' WHERE id_user='$id'");
        if($ubio){
            $u_status = $kon->query("UPDATE user SET status_user=1 WHERE id_user='$id'");
            $_SESSION['pesan'] = "Berhasil mengubah profil";
            header('location:../org/profilorg.php');
        }else{
            $_SESSION['pesan'] = "Maaf, ada kesalahan data";
            header('location:../org/profilorg.php');
        }
    }else{
        $_SESSION['pesan'] = "Maaf, tidak boleh ada data yang kosong";
        header('location:../org/profilorg.php');
    }
}

if(isset($_POST['updatebioumum'])){
    $nama   = $_POST['nama'];
    $email  = $_POST['email'];
    $no_hp  = $_POST['no_hp'];
    $alamat = $_POST['alamat'];
    $uid    = $_SESSION['id'];

    if($nama!="" && $email!="" && $no_hp!="" && $alamat!=""){
        $ubio = $kon->query("UPDATE user SET nama='$nama', email='$email', no_hp='$no_hp', alamat='$alamat' WHERE id_user='$uid'");
        if($ubio){
          $u_status = $kon->query("UPDATE user SET status_user=1 WHERE id_user='$uid'");
          $_SESSION['pesan'] = "Berhasil mengubah biodata";
          header('location:../umum/profilumum.php');
        }else{
            $_SESSION['pesan'] = "Ada kesalahan pada data";
            header('location:../umum/profilumum.php');
        }
    }else{
        $_SESSION['pesan'] = "Maaf, tidak boleh ada data yang kosong";
        header('location:../umum/profilumum.php');
    }
}

?>
<?php
session_start();
$_SESSION['pesan'];
include "../fungsi/koneksi.php";
?>
<html>
<head>
    <title>Profil</title>
    <link rel="stylesheet" type="text/css" href="../style/style.css">
</head>
<body>
<!--navigasi-->
<nav>
<img src="../img/logo.png">
    <span><label class="dua"><h3>BANGKU</h3>Sumbang Buku</label><br></span>
    <ul>
        <li><a href="../org/beranda.php">Beranda</a> </li>
        <li><a href="profilorg.php"> Profil </a></li>
        <li><a href="../index.php">Logout</a></li>
    </ul>
</nav>

<!-- ------------------------------------------ profil -------------------------------------------------------------------------- -->
<?php
    $id = $_SESSION['id'];
    $profil = $kon->query("SELECT nama, foto_profil, deskripsi, nama_pemilik, no_ktp, no_hp, alamat, web, email, ig FROM user WHERE id_user='$id'");
    while($hasil = $profil->fetch_assoc()){
?>
    <div style="padding-top: 4%">
        <div class="model-form ">
            <h1 class="model-form profil" ><?php echo $hasil['nama'];?></h1>
            <div align="center">
                <img src="<?php echo $hasil['foto_profil'];?>" class="imgprofil">
            </div>

            <label>Deskripsi</label>
            <p align="justify"><?php echo $hasil['deskripsi'];?></p>
            <table>
                <tr rowspan="2">
                    <td>
                        Pemilik
                    </td>

                    <td>
                        : <?php echo $hasil['nama_pemilik'];?>
                    </td>
                </tr>
                <tr>
                    <td>
                No KTP
                    </td>
                    <td>
                        : <?php echo $hasil['no_ktp'];?>
                    </td>
                </tr>
                    <td colspan="2">
                        <span>
                            <img src="../img/hp.png" class="img-petak">
                            <?php echo $hasil['no_hp'];?>
                       </span>
                    </td>

                <td colspan="2">
                         <span>
                            <img src="../img/email.png" class="img img-bulat">
                             <?php echo $hasil['email'];?>
                       </span>

                    </td>
                </tr>
                <tr>
                <td colspan="2">
                <span> <img src="../img/alamat.png" class="img-petak">
                    <?php echo $hasil['alamat'];?>
                </span>
                </td>
                <td>
                    <img src="../img/ig.png" class="img-petak">
                    <?php echo $hasil['ig'];?>
                </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <img src="../img/WWW.png" class="img-petak">
                        <a href="https://<?php echo $hasil['web'];?>"><?php echo $hasil['web'];?></a>
                    </td>
                </tr>
            </table>

<?php } ?>



            <div class="kotak">

                <h2>Verifikasi Data</h2>
                <label>Untuk menverifikasi data silahkan upload ktp mu</label>
                <button type="file" name="ktp" class="bt bt-birusoft"/>Upload KTP </button>
                <button type="submit" name="verifikasi_ktp" class="bt bt-hijau" />kirim </button>
            </div>
        </div>




        <div class="model-form">
            <h1 class="model-form profil">Profil</h1>
            <div class="alert"><?php if($_SESSION['pesan']!=""){
                    echo $_SESSION['pesan'];
                }?></div>
            <?php
                $id = $_SESSION['id'];
                $profil = $kon->query("SELECT nama, foto_profil, deskripsi, nama_pemilik, no_ktp, no_hp, alamat, web, email, ig FROM user WHERE id_user='$id'");
                while($hasil = $profil->fetch_assoc()){
            ?>

            <form action="../fungsi/proses.php" method="post">

                <div class="nomor"><span>1</span>Ubah Biodata </div>
                <div class="kotak">

                    <label>Deskripsi <textarea name="deskripsi"><?php echo $hasil['deskripsi'];?></textarea></label>
                    <label>Nama Pemilik  <input type="text" name="npemilik" value="<?php echo $hasil['nama_pemilik'];?>"/></label>
                    <label>No KTP  <input type="text" name="noktp" value="<?php echo $hasil['no_ktp'];?>"/></label>
                    <label>Email  <input type="email" name="email" value="<?php echo $hasil['email'];?>"/></label>
                    <label> No Hp <input type="text" name="nohp" value="<?php echo $hasil['no_hp'];?>"/></label>
                    <label>Alamat <textarea name="alamat"><?php echo $hasil['alamat'];?></textarea></label>
                    <label>Web  <input type="text" name="web" value="<?php echo $hasil['web'];?>"/></label>
                    <label>Ig  <input type="text" name="ig" value="<?php echo $hasil['ig'];?>"/></label>
                    <input type="submit" name="updatebioorg" value="Perbarui" />
                </div>
            </form>

            <?php } ?>
            <div class="nomor"><span>2</span>Ubah Passwords</div>
            <div class="kotak">
                <form>
                <label>Password Lama <input type="password" name="pass1" /></label>
                <label>Password Baru<input type="password" name="pass2" /></label>
                <label>Confirm Password <input type="password" name="passkonfirmasi" /></label>
                    <input type="submit" name="ganti" value="Ganti Password" />
                </form>
            </div>



            <div class="nomor"><span>3</span>Ubah Logo </div>
            <div class="kotak">
                <form>
                <h2>Tukar Login</h2>

                <button type="file" name="ktp" class="bt bt-birusoft"/>Upload KTP </button>
                <button type="submit" name="verifikasi_ktp" class="bt bt-hijau" />Ubah </button>
                </form>
            </div>


        </div>
    </div>


</body>
</html>
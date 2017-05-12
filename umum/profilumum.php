<?php
session_start();
$_SESSION["pesan"];
include "../fungsi/koneksi.php";
?>

<html xmlns="http://www.w3.org/1999/html">
<head>
    <title>Profil</title>
    <link rel="stylesheet" type="text/css" href="../style/style.css">
</head>
<body>
<div>
    <nav>
        <img src="../img/logo.png">
        <span> <h1 class="label-menu">BANGKU</label></h1>
    <label class="label-menu-dua">Sumbang Buku</label></span>
        <ul>
            <li><a href="beranda_umum.php">Beranda</a> </li>
            <li><a href="profilumum.php"> Profil </a></li>
            <li><a href="../index.php">Logout</a></li>
        </ul>
    </nav>
</div>
<!-- ------------------------------------------ profil -------------------------------------------------------------------------- -->
<?php
$ddd = $_SESSION['id'];
$cek1 = $kon->query("SELECT foto_ktp FROM user where id_user = '$ddd'");
$cek2 = $cek1->fetch_assoc();

$cek3 = $kon->query("select * from user where id_user = '$ddd'");
$cek4 = $cek3->fetch_assoc();

?>
<div>
    <?php if($_SESSION['pesan']!=""){
        echo "<div class='alert'>".$_SESSION['pesan']."</div>";
    }?>
    <div class="model-form ">
        <h1 class="model-form profil" > <?php echo $cek4["nama"]; ?></h1>
        <div align="center">
            <img src="<?php echo $cek2['foto_ktp'] ?>" class="imga img-bulat ">
        </div>

        <table>
            <tr>
                <td>
                    Nama
                </td>
                <td>
                    : <?php echo $cek4["nama"]; ?>
                </td>
            </tr>
            <tr>
                <td>
                    Email
                </td>
                <td>
                    : <?php echo $cek4["email"]; ?>
                </td>
            </tr>
            <tr>
                <td>
                    Alamat :
                </td>
                <td>
                    <?php echo $cek4["alamat"]; ?>
                </td>

            </tr>

        </table>
        <div class="kotak">
            <form action="../fungsi/proses.php" method="post" enctype="multipart/form-data">
                <h2>Ganti Foto</h2>

                <input type="file" name="fprofil" accept="image/*" >
                <input type="submit" name="updatefotoumum" class="bt bt-birusoft" value="Ganti">
            </form>
        </div>
    </div>

</div>




<div class="model-form">
    <h1 class="model-form profil">Profil</h1>

    <form action="../fungsi/proses.php" method="post">

        <div class="nomor"><span>1</span>Ubah Biodata </div>
        <div class="kotak">

            <label>Nama  <input type="text" name="nama" value= <?php echo $cek4["nama"]; ?> > </label>
            <label>Email  <input type="email" name="email" value= <?php echo $cek4["email"]; ?> /></label>
            <label> No Hp <input type="text" name="no_hp" value= <?php echo $cek4["no_hp"]; ?> /></label>
            <label>Alamat <textarea name="alamat" ><?php echo $cek4["alamat"]; ?></textarea></label>
            <input type="submit" name="updatebioumum" value="Perbarui" />
        </div>
    </form>
    <div class="nomor"><span>2</span>Ubah Passwords</div>
    <div class="kotak">
        <form action="../fungsi/proses.php" method="post">
            <label>Password Lama <input type="password" name="pass1"  /></label>
            <label>Password Baru<input type="password" name="pass2" id="dpass" onchange="cpas()" /></label>
            <label>Confirm Password <input type="password" id="cpass" name="passkonfirmasi" onchange="cpas()" /></label>
    </div>
    <input type="submit" name="ganti" value="Ganti Password" />
    </form>
</div>
</div>
</div>


</body>
<script type="text/javascript" src="../js/script.js"></script>
</html>
<?php $_SESSION['pesan']="" ?>
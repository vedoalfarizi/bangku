<html xmlns="http://www.w3.org/1999/html">
<head>
    <title>Profil</title>
    <link rel="stylesheet" type="text/css" href="../style/style.css">
</head>
<body>
<!--navigasi-->
<nav class="menu">

    <!-- Item 1 -->
    <a href="../org/beranda.php">
        <label for="slide-item-2"><span>Beranda</span></label>
    </a>

    <a href="profilorg.php">
        <label for="slide-item-2"><span>Profil</span></label>
    </a>
    <a href="../index.php">
        <label for="slide-item-2"><span>LogOut</span></label>
    </a>

    </nav>
<!-- ------------------------------------------ profil -------------------------------------------------------------------------- -->

    <div>
        <div class="model-form ">
            <h1 class="model-form profil" >TANAH OMBAK</h1>
            <div align="center">
                <img src="../img/Pallet.png" class="imgprofil">
            </div>

            <label>Deskripsi</label>
            <p align="justify">Ruang Baca dan Kreativitas Tanah Ombak merupakan komunitas yang mewadahi
                anak – anak dan remaja Purus, terutama Purus III, Gang IV dan sekitarnya dengan Pendidikan
                alternative-kreatif. RBK Tanah Ombak merupakan sebuah litersi wadah pembelajaran, yang spiritnya
                membangun kecerdasan dan karakter anak – anak didiknya dengan empat hal : belajar, membaca,
                meningkatkan potensi bakat dan minat serta membangun kemandirian.</p>
            <table>
                <tr rowspan="2">
                    <td>
                        Pemilik
                    </td>

                    <td>
                        : BAPAK BUDI
                    </td>
                </tr>
                <tr>
                    <td>
                No KTP
                    </td>
                    <td>
                        : 1511521004
                    </td>
                </tr>
                    <td colspan="2">
                        <span>
                            <img src="../img/hp.png" class="img-petak">
                             0898-2628-920
                       </span>
                    </td>

                <td colspan="2">
                         <span>
                            <img src="../img/email.png" class="img img-bulat">
                             dartikaaniemarian@gmail.com
                       </span>

                    </td>
                </tr>
                <tr>
                <td colspan="2">
                <span> <img src="../img/alamat.png" class="img-petak">
                           Purus III
                </span>
                </td>
                <td>
                    <img src="../img/ig.png" class="img-petak">
                    Instagram
                </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <img src="../img/WWW.png" class="img-petak">
                        WWW.TANAH-OMBAK.com
                    </td>
                </tr>
            </table>





            <div class="kotak">

                <h2>Verifikasi Data</h2>
                <label>Untuk menverifikasi data silahkan upload ktp mu</label>
                <button type="file" name="ktp" class="bt bt-birusoft"/>Upload KTP </button>
                <button type="submit" name="verifikasi_ktp" class="bt bt-hijau" />kirim </button>
            </div>
        </div>




        <div class="model-form">
            <h1 class="model-form profil">Profil</h1>
            alert

            <form>

                <div class="nomor"><span>1</span>Ubah Biodata </div>
                <div class="kotak">

                    <label>Nama Organisasi <input type="text"> </label>
                    <label>Deskripsi <textarea name="Deskripsi"></textarea></label>
                    <label>Email  <input type="email" name="email" /></label>
                    <label> No Hp <input type="text" name="nohp" /></label>

                    <label>Provinsi
                        <select>da
                            <option>da</option>
                            <option>da</option>
                            <option>da</option></select></label>
                    <label>Kota
                        <select>da
                            <option>da</option>
                            <option>da</option>
                            <option>da</option></select></label>
                    <label>Alamat <textarea name="alamat"></textarea></label>
                    <input type="submit" name="updatebio" value="Perbarui" />
                </div>
            </form>
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
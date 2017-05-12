<html xmlns="http://www.w3.org/1999/html">
<head>
    <title>Profil</title>
    <link rel="stylesheet" type="text/css" href="../style/style.css">
</head>
<body>

<!-- ------------------------------------------ profil -------------------------------------------------------------------------- -->

    <div>
        <div class="model-form ">
            <h1 class="model-form profil" >TANAH OMBAK</h1>
            <div align="center">
                <img src="../img/profil.jpg" class="imga img-bulat ">
            </div>

            <table>
                <tr>
                    <td>
                        Nama
                    </td>
                    <td>
                        : BAPAK BUDI
                    </td>
                </tr>
                <tr>
                    <td>
                        Email
                    </td>
                    <td>
                        :dartikaaniemarian@gmail.com
                    </td>
                </tr>
                <tr>
                <td>
                        Alamat :
                </td>
                <td>
                    djsadhsaksjksj
                </td>

                </tr>

            </table>
            <div class="kotak">
                <form action="../fungsi/proses.php" method="post" enctype="multipart/form-data">
                    <h2>Ganti Foto</h2>

                    <input type="file" name="ktp" accept="image/*" >Upload Foto </input>
                    <input type="submit" name="verifikasi_ktp" class="bt bt-birusoft" >Ubah </input>
                </form>
            </div>
            </div>

        </div>




        <div class="model-form">
            <h1 class="model-form profil">Profil</h1>
            alert

            <form>

                <div class="nomor"><span>1</span>Ubah Biodata </div>
                <div class="kotak">

                    <label>Nama  <input type="text"> </label>
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
            </div>
            <input type="submit" name="ganti" value="Ganti Password" />
            </form>
        </div>
        </div>
    </div>


</body>
</html>
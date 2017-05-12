<?php
session_start();
$_SESSION['pesan'];
?>
<HTML>
<head>
    <title>REGISTER</title>
    <link rel="stylesheet" type="text/css" href="style/style.css">
</head>
<body>


        <div class="model-form register">
            <h1>REGISTER</h1>
            <form action="fungsi/proses.php" method="post">
                <div class="kotak">
                    <div class="alert"><?php if($_SESSION['pesan']!=""){
                            echo $_SESSION['pesan'];
                        }?></div>
                    <div class="nomor">
                        <span>1</span>Username
                        <input type="text" name="username">
                    </div>
                    <div class="nomor">
                        <span>2</span>Email
                        <input type="email" name="email" />
                    </div>
                    <div class="nomor">
                        <span>3</span>Password
                        <input type="password" name="password" />
                    </div>
                    <div class="nomor">
                        <span>4</span>Alamat
                        <textarea name="alamat"></textarea>
                    </div>
                    <div class="nomor">
                        <span>5</span>Provinsi
                        <select id="provinsi" name="provinsi" onchange="ChangeListKota()">
                            <?php
                            include 'fungsi/koneksi.php';
                                $prov = $kon->query("SELECT * FROM provinsi ORDER BY nama_prov ASC");
                                while($hasil = $prov->fetch_assoc()){
                                    echo "<option value='".$hasil['id_prov']."'>".$hasil['nama_prov']."</option>";
                                }
                            ?>
                        </select>Kota
                        <select id="kota" name="kota">

                        </select>
                    </div>
                    <div class="nomor"><span>6</span>Daftar Sebagai
                        <select name="jenis_user" >
                            <option value="org" >organisasi/komunitas</option>
                            <option value="Umum" >Umum</option>
                        </select>
                    </div>
                </div>

                <input type="submit" name="register" value="Register"/>

            </form>
        </div>

</body>
<script>
    var kotas = {};
    kotas['Aceh'] = ['Banda Aceh', 'Langsa', 'Meulaboh', 'Sabang'];
    kotas['Bali'] = ['Denpasar'];
    kotas['Gorontalo'] = ['Gorontalo'];
    kotas['Jakarta'] = ['Jakarta Barat', 'Jakarta Pusat', 'Jakarta Selatan'];
    kotas['Kalimantan Barat'] = ['Pontianak', 'Singkawang'];
    kotas['Lampung'] = ['Bandar Lampung', 'Metro'];
    kotas['Maluku Utara'] = ['Ternate', 'Tidore'];
    kotas['Nusa Tenggara Barat'] = ['Bima', 'Mataram', 'Kupang'];
    kotas['Papua Barat'] = ['Sorong'];
    kotas['Riau'] = ['Dumai', 'Pekanbaru'];
    kotas['Sumatera Barat'] = ['Bukittinggi', 'Padang', 'Padang Panjang', 'Pariaman'];

</script>
</HTML>

<?php
$_SESSION['pesan']="";
?>
<?php
session_start();
$_SESSION['pesan'];
if(isset($_SESSION['id'])){
    if($_SESSION['jenis']==1){
        header('location:umum/beranda_umum.php');
    }else{
        header('location:org/beranda.php');
    }
}
?>
<HTML>
<head>
    <title>REGISTER</title>
    <link rel="stylesheet" type="text/css" href="style/style.css">
</head>
<body>
        <div class="model-form" style="margin-left: 30%">
            <h1 class="model-h1">REGISTER</h1>
            <form action="fungsi/proses.php" method="post">
                <div class="kotak">
                   <?php if($_SESSION['pesan']!=""){
                       echo " <div class='alert'>".
                             $_SESSION['pesan']."</div>";
                        }?>
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
                        <span>5</span>Provinsi & Kota
                        <select id="provinsi" name="provinsi" onchange="ChangeListKota()">
                            <option value="">--PILIH--</option>
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
                            <option value="1" >Umum</option>
                            <option value="2" >Organisasi/Komunitas</option>
                        </select>
                    </div>
                </div>

            <button type="submit" name="register" value="Register" class="bt bt-birusoft">Register </button>

            </form>
            <br>
            <label>Sudah punya akun?  <a href="index.php" class="link"> Login</a></label>
        </div>

</body>
<script>
    var kotas = {};
    kotas[1] = ['Banda Aceh', 'Langsa', 'Meulaboh', 'Sabang'];
    kotas[2] = ['Denpasar'];
    kotas[3] = ['Gorontalo'];
    kotas[4] = ['Jakarta Barat', 'Jakarta Pusat', 'Jakarta Selatan'];
    kotas[5] = ['Pontianak', 'Singkawang'];
    kotas[6] = ['Bandar Lampung', 'Metro'];
    kotas[7] = ['Ternate', 'Tidore'];
    kotas[8] = ['Bima', 'Mataram', 'Kupang'];
    kotas[9] = ['Sorong'];
    kotas[10] = ['Dumai', 'Pekanbaru'];
    kotas[11] = ['Bukittinggi', 'Padang', 'Padang Panjang', 'Pariaman'];

    function ChangeListKota(){
        var listP = document.getElementById("provinsi");
        var listK = document.getElementById("kota");
        var selK = listP.options[listP.selectedIndex].value;
        while(listK.options.length){
            listK.remove(0);
        }

        var kota = kotas[selK];
        if(kota){
            var i;
            for(i = 0; i<kota.length; i++){
                var kot = new Option(kota[i], kota[i].value);
                listK.options.add(kot);
            }
        }
    }
</script>
</HTML>

<?php
$_SESSION['pesan']="";
?>
<?php
session_start();
$_SESSION['pesan'];
include_once '../fungsi/koneksi.php';
$id = $_SESSION['id'];
?>
<html>
<head>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-1Hz75qNfD5pggoNIV-1u3HubAI-3MN4&callback=initMap"
            async defer></script>
<title>Bangku</title>
    <link rel="stylesheet" href="../style/style.css">
</head>
<body>
<!--navigasi-->
<nav>
    <img src="../img/logo.png">
    <span> <label>BANGKU</label><br>
    <label class="dua">Sumbang Buku</label></span>
    <ul>
        <li><a href="../org/beranda.php">Beranda</a> </li>
        <li><a href="profilorg.php"> Profil </a></li>
        <li><a href="../fungsi/logout.php">Logout</a></li>
    </ul>
</nav>
<!--Awal Menu Navigasi-->
<button id="b2" class="btn bt-flat" onclick="dua()">penerimaan</button>
<button id="b1" class="btn bt-flat" onclick="satu()">kegiatan</button>
<button id="b3" class="btn bt-flat" onclick="tiga()">cari</button>
<button id="b4" class="btn bt-flat" onclick="empat()">Pendonasi Baru</button>


<div id="a2" class="kotak" style="margin-top: 0%;" >
    <!--Awal Penerimaan-->
    <?php

    $quer = "select donasi.tanggal, donasi.user_id_pemilik,donasi.jumlah from donasi, user WHERE donasi.user_id_pemilik = user.id_user AND user.jenis_user = 2";

    $sel = $kon->query($quer);
    echo "
	<div class=\"tabel\">
		<table class=\"tabel tabel-garis\"> 
		<th>No.</th>
		<th>Tanggal</th>
		<th>Pendonasi</th>
		<th>Jumlah</th>
		<th>Detail</th>
		<th>Konfirmasi</th>";


    while ($del =  mysqli_fetch_assoc($sel)){
        $no = 1;
        echo "<tr>";
        echo "<td>".$no."</td>";
        echo "<td>".$del['tanggal']."</td>";
        echo "<td>".$del['user_id_pemilik']."</td>";
        echo "<td>".$del['jumlah']."</td>";
        echo "<td><a href=''>detail</a></td>";
        echo "<td><a href=''>terima</a>&nbsp;<a href=''>batal</a></td>";
        echo "</tr>";
        $no++;
    }

    echo "</table></div>";

    ?>
    <!--Akhir Penerimaan-->
</div>

<div class="kotak" id="a1" style="margin-top: 0%;">
    <!--Awal kegiatan-->
    <div>
        <div>Tambah Kegiatan</div>
        <div class="alert">
            <?php
            if($_SESSION['pesan']!=""){
                echo $_SESSION['pesan'];
            }
            ?>
        </div>
        <div>
            <form action="../fungsi/proses.php" method="post">
                <label>Nama Kegiatan</label>
                <input type="text" name="nkeg">
                <label>Alamat</label>
                <input type="text" name="alamat">
                <label>Deskripsi</label>
                <textarea name="desk"></textarea>
                <label>Katagori</label>
                <input type="checkbox" name="kat[]" value="fiksi">Fiksi
                <input type="checkbox" name="kat[]" value="nonf">Non Fiksi<br>
                <label>Tanggal Kegiatan</label>
                <input type="date" name="tkeg">
                <input type="submit" value="Bagikan" name="tambahkegiatan">
            </form>
        </div>
    </div>

    <?php
    $tampil = $kon->query("SELECT id_kegiatan, nama_kegiatan, deskripsi, alamat, tanggal FROM kegiatan WHERE user_id='$id' ORDER BY tanggal ASC");
    $no = 1;
    ?>
    <div>
        <div>List Kebutuhan</div>
        <div>
            <table>
                <th>No</th>
                <th>Kegiatan</th>
                <th>Deskripsi</th>
                <th>Jadwal</th>
                <th>Alamat</th>
                <th colspan="2">Aksi</th>

                <?php
                while($hasil = $tampil->fetch_assoc()){
                    echo    "<tr>
                            <td>$no</td>
                            <td>".$hasil['nama_kegiatan']."</td>
                            <td>".$hasil['deskripsi']."</td>
                            <td>".$hasil['tanggal']."</td>
                            <td>".$hasil['alamat']."</td>
                            <td><a href='edit_kegiatan.php?id=".$hasil['id_kegiatan']."'>Edit</a></td>
                            <td><a href='hapus_kegiatan.php?id=".$hasil['id_kegiatan']."'>Hapus</a></td>
                        </tr>";
                    $no++;
                }
                ?>
            </table>
        </div>
    </div>
    <!--Akhir kegiatan-->
</div>

<div id="a3" class="kotak" style="margin-top: 0%;" >
    <!--Awal Form Ambil-->
    <div>
        <button onclick="yourLocation()">Your Location</button>
        <form style="float : left">
            <table>
                <td>
                    <?php
                        $sql= "select nama, alamat, no_hp from user where jenis_user=1";
                        $query= mysqli_query($kon, $sql);
                        while ($row = mysqli_fetch_assoc($query)) {
                    ?>
                    <tr id="sasala">
                        <a class="ambilbtn" style="color: rgb(0,0, 238); text-decoration: underline; cursor: pointer"><?php echo $row['nama'] ?></a>
                    </tr>
                    </td><br>
                    <tr><?php echo $row['alamat'] ?> </tr>  <br>
                    <tr><?php echo $row['no_hp'] ?> </tr>   <br>
                <?php
                }
                ?>

                </td>
            </table>


        </form>
        <div class="" style="float: left"></div>
        <div id="map" style="height: 600px; width:800px; float: right;">
        </div>
    </div>

    <div class="modal" id="modal1">
        <div class="modal-content">
            <div class="modal-header">
                <span class="close">&times;</span>
            </div>
            <div class="modal-body">

                <form action="../fungsi/proses.php" >

                    <table>
                        <?php
                            $nohp = $kon->query("SELECT no_hp FROM user WHERE id_user=")
                        ?>
                        <tr><h1>Masukan tanggal pengambilan buku</h1></tr>
                        <tr>
                            <td>No Hp</td>
                            <td>0898 - 2628 - 920</td>
                        </tr>

                        <tr>
                            <td>Tanggal</td>
                            <td><input type="date" name="tgl_jemput"></td>
                        </tr>
                        <tr >
                            <td align="center" colspan="2">
                                <button type="submit" name="kirimAmbil" value="Ambil" class="bt bt-birusoft"> Ambil </button>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
    <!--Akhir Form Ambil-->

</div>

<div id="a4" class="kotak" style="margin-top: 0%;">

</div>
<!--Akhir Menu Navigasi-->


<script type="text/javascript" src="../js/script.js"></script>
</body>
<script>
    var map;

    function initMap(){
        map= new google.maps.Map(document.getElementById('map'),
            {
                center : new google.maps.LatLng(-2.374382,99.5466409),
                zoom : 9,
                map : map

            })

        <?php
            $sql= "select * from user where jenis_user=2";
            $query= mysqli_query($kon, $sql);
            while ($row = mysqli_fetch_assoc($query)) {
        ?>
        var infoWindow = new google.maps.InfoWindow({
            content: "<?php echo $row['nama']?>"
        });
        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(
                <?php echo $row['lat'].",".$row['longt'];?>
            ),

            map: map,
            title : '<?php echo $row['nama'] ?>'
        });
        marker.setMap(map);
        google.maps.event.addListener(marker,'click',function() {
            map.setZoom(9);
            infoWindow.open(map,marker);
        });
        <?php
        }
        ?>

        var directionsService = new google.maps.DirectionsService;
        directionsDisplay = new google.maps.DirectionsRenderer();
        directionsDisplay.setMap(map);
    }

    function yourLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var pos = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };
                var infoWindow= new google.maps.InfoWindow;
                infoWindow.setPosition(pos);
                infoWindow.setContent('Here!!');
                infoWindow.open(map);
                map.setCenter(pos);
            }, function() {
                handleLocationError(true, infoWindow, map.getCenter());
            });
        } else {

            handleLocationError(false, infoWindow, map.getCenter());
        }

    }




</script>

</html>
<?php
$_SESSION['pesan']="";
?>

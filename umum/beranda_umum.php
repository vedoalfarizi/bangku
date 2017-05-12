<?php
    session_start();
    $_SESSION['pesan'];
    include '../fungsi/koneksi.php';
?>
<html>
<head>
    <title>Sumbang Buku</title>
    <link rel="stylesheet" href="../style/style.css">
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC9TGyPXqFWcrrFwu2QRD4kZwdTEeOBGek&callback=initMap" async defer></script>
</head>
<body>
<!--navigasi-->
<nav>
    <img src="../img/logo.png">
    <span> <label>BANGKU</label><br>
    <label class="dua">Sumbang Buku</label></span>
    <ul>
        <li><a href="beranda_umum.php">Beranda</a> </li>
        <li><a href="profilumum.php"> Profil </a></li>
        <li><a href="../index.php">Logout</a></li>
    </ul>
</nav>
<!--    <div class="tab-gaya">-->
<!--        <div class="kotak">-->
<!--            <button id="" onclick="">beranda</button>-->
<!--            <button id="" onclick="">profil</button>-->
<!--            <button id="" onclick="">logout</button>-->
<!---->
<!--        </div>-->
<!--    </div>-->


            <button id="b2" class="btn bt-flat" onclick="dua()">sumbangan</button>
            <button id="b1" class="btn bt-flat" onclick="satu()">sumbang buku</button>
            <button id="b3" class="btn bt-flat" onclick="tiga()">cari</button>
            <button id="b4" class="btn bt-flat" onclick="empat()">kegiatan</button>


        <div id="a2" class="kotak" style="margin-top: 0%;" >
            <?php
                $sumbangan = $kon->query("select donasi.tanggal, user.nama, donasi.jumlah, donasi.id_donasi from donasi, user WHERE donasi.user_id_penerima = user.id_user and donasi.status_buku=2");

            echo "
	                <div class=\"tabel\">
		            <table class=\"tabel tabel-garis\"> 
		            <th>No.</th>
		            <th>Tanggal</th>
		            <th>organisasi</th>
		            <th>Jumlah</th>
		            <th>Detail</th>";

                    $no = 1;
                    while ($hasil = $sumbangan->fetch_assoc()){

                        echo "  <tr>
                            <td>$no</td>
                            <td>".$hasil['tanggal']."</td>
                            <td>".$hasil['nama']."</td>
                            <td>".$hasil['jumlah']."</td>
                            <td><a href='detail_sumbangan.php?ids=".$hasil['id_donasi']."'>detail</a></td>
                            </tr>";
                            $no++;
                    }
                    echo "</table></div>";
                        ?>
    </div>

<div class="kotak" id="a1" style="margin-top: 0%;">

    <div>
        <div>Tambah Buku</div>
        <div class="alert">
            <?php
            if($_SESSION['pesan']!=""){
                echo $_SESSION['pesan'];
            }
            ?>
        </div>
        <form action="../fungsi/proses.php" method="post">
            <label for="tambah">Jumlah Buku</label>
            <input type="text" name="jbuku"><br>
            <label for="kategori">Katagori</label>
            <input type="checkbox" name="kat[]" value="fiksi">Fiksi
            <input type="checkbox" name="kat[]" value="nonf">Non Fiksi<br>
            <input type="submit" value="Sumbang" name="sumbang">
        </form>
    </div>

    <div>
        <!--                tampilkan list donasi user yang belum di ambil-->
        <?php
        $id = $_SESSION['id'];
        $donasi = $kon->query("SELECT id_donasi, jumlah, kategori FROM donasi WHERE user_id_pemilik=$id and status_buku=0");
        $no = 1;
        ?>
        <table>
            <th>No</th>
            <th>Jumlah</th>
            <th>Kategori</th>
            <th colspan="2">Aksi</th>

            <?php
            while($hasil = $donasi->fetch_assoc()){
                echo    "<tr>
                                        <td>$no</td>
                                        <td>".$hasil['jumlah']."</td>
                                        <td>".$hasil['kategori']."</td>
                                        <td><a href='edit_donasi.php?iddon=".$hasil['id_donasi']."'>edit</a></td>
                                        <td><a href='hapus_donasi.php?iddon=".$hasil['id_donasi']."'>hapus</a></td>
                                        </tr>";
                $no++;
            }
            ?>
        </table>
    </div>
</div>

<div id="a3" class="kotak" style="margin-top: 0%;" >
    <!--akhir fitur cari sementara disini-->
        <?php
        $sql= "select * from user where jenis_user=2";
        $query= mysqli_query($kon, $sql);
        while ($row = mysqli_fetch_assoc($query)){
            $id= $row['id_user'];
            $nama= $row['nama'];
            $alamat= $row['alamat'];
            $email= $row['email'];
            $lat= $row['lat'];
            $lng= $row['longt'];
        }
        ?>
        <button onclick="yourLocation()">Your Location</button>
        <form style="float : left">
            <table>
                <td>
                    <?php
                    $sql= "select * from user where jenis_user=2";
                    $query= mysqli_query($kon, $sql);
                    while ($row = mysqli_fetch_assoc($query)) {
                    ?>
                    <tr><a id="popup" href="blablabala"> <b><?php echo $row['nama'] ?></b></a></tr>
                </td> <br>
                <tr><?php echo $row['alamat'] ?> </tr>  <br>
                <tr><?php echo $row['no_hp'] ?> </tr>   <br>
                <?php
                }
                ?>

                </td>
            </table>
        </form>
        <div class="" style="float: left"></div>
        <div id="map" style="height: 300px; width:400px; float: right;"></div>
    <!-- akhir fitur cari sementara disini-->
</div>

<div id="a4" class="kotak" style="margin-top: 0%;">

</div>

</body>
<script type="text/javascript" src="../js/script.js"></script>
<script>
    var map;

    function initMap(){
        map= new google.maps.Map(document.getElementById('map'),
            {
                center : new google.maps.LatLng(-2.374382,99.5466409),
                zoom : 6,
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

            map: map
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
                infoWindow= new google.maps.InfoWindow;
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
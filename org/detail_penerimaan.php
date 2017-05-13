<?php
session_start();
$_SESSION['pesan'];
include_once '../fungsi/koneksi.php';
if(!isset($_SESSION['id'])){
    header('location:../index.php');
}else if($_SESSION['status']==0){
    header('location:profilorg.php');
}else if($_SESSION['status']==1){
    header('location:profilorg.php');
}
$id_p = $_GET['idd'];
?>
<html>
<head>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-1Hz75qNfD5pggoNIV-1u3HubAI-3MN4&callback=initMap"
            async defer></script>
    <title>Bangku</title>
    <link rel="stylesheet" href="../style/style.css">
</head>
<body>

<?php
    $ambil = $kon->query("SELECT user.id_user, user.nama, user.no_hp, donasi.tanggal, donasi.jumlah, donasi.kategori, 
    user.foto_profil FROM user, donasi WHERE donasi.user_id_pemilik=user.id_user AND id_donasi='$id_p'");
    global $uid;
    while($hasil = $ambil->fetch_assoc()){

        $uid = $hasil['id_user'];
        echo "
        <div style='padding: 5%; background-color: #c9c5bf; height: 100% '>
            <div>
                <img src='".$hasil['foto_profil']."' alt='' width='10%'>
            </div>
            <div style='float: left; display: '>
                <label for='nama'>".$hasil['nama']."</label><br>
                <label for='hp'>".$hasil['no_hp']."</label><br>
                <label for='jb'>".$hasil['jumlah']."</label><br>
                <label for='kat'>".$hasil['kategori']."</label>
            </div>
                <div>
                    <button onclick=\"yourLocation()\">Your Location</button>
                    <button id=\"direction\" onclick=\"directionSaya()\" style=\"width: 40%\">Get Direction</button>
                    <div id=\"map\" style=\"height:450px; width:500px; float: right\">
                </div>
            </div>
        </div>
    ";
    }

?>

</div>
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
        $sql= "select * from user where id_user='$uid'";
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

    <?php
    global $lat;
    global $lng;
    $sql= "select lat, longt from user where id_user='$uid'";
    $query= mysqli_query($kon, $sql);
    while ($row = mysqli_fetch_assoc($query))
    {
        $lat = $row['lat'];
        $lng= $row['longt'];
    }
    ?>

    function directionSaya() {
        navigator.geolocation.getCurrentPosition(function(position) {
            var latitude  = position.coords.latitude;
            var longitude = position.coords.longitude;
            var latlng    = new google.maps.LatLng(latitude, longitude);
            var start = latitude+','+longitude;

            var end = {lat : <?php echo $lat ?>, lng : <?php echo $lng ?>};

            var request = {
                origin:start,
                destination:end,
                travelMode: google.maps.DirectionsTravelMode.DRIVING,
                provideRouteAlternatives: true
            };

            var directionsService = new google.maps.DirectionsService;
            directionsService.route(request, function(response, status) {
                if (status == google.maps.DirectionsStatus.OK) {
                    directionsDisplay.setDirections(response);
                }
            });

            directionsDisplay.setPanel(document.getElementById('direction'));
        });
    }




</script>

</html>
<?php
$_SESSION['pesan']="";
?>


<!DOCTYPE html>
<html>
<body>

<section>
    <div >
        <button onclick="yourLocation()">Your Location</button>
        <p>Nama Pendonasi</p>
        <p>alamat pendonasi</p>
        <button id="direction" onclick="directionSaya()" style="width: 250px">Get Direction</button>
        <div id="map" style="height:800px; width:1000px; float: right;">
        </div>
    </div>
</section>
</body>
</html>


<script>
    var map;
    var infoWindow;
    function initMap(){
        map= new google.maps.Map(document.getElementById('map'),
            {
                center : new google.maps.LatLng(-2.374382,99.5466409),
                zoom : 6,
                map : map

            })

        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(
                <?php
                include 'koneksi.php';
                $sql= "select *from user where id_user=1";
                $query= mysqli_query($konek, $sql);
                while ($row = mysqli_fetch_array($query))
                {
                    echo $row['lat'].",".$row['longt'];
                }
                ?>
            ),
            map: map
        });

        marker.setMap(map);
        google.maps.event.addListener(marker,'click',function() {
            map.setZoom(12);
            map.setCenter(marker.getPosition());
        });

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

    <?php
    include 'koneksi.php';
    global $lat;
    global $lng;
    $sql= "select lat, longt from user where id_user=1";
    $query= mysqli_query($konek, $sql);
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
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-1Hz75qNfD5pggoNIV-1u3HubAI-3MN4&callback=initMap"
        async defer></script>

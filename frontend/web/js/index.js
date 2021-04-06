var geolocationMap, dir;

window.onload = function () {
    var popup = L.popup();
    geolocationMap = L.map('map', {
        layers: MQ.mapLayer(),
        center: [3.517350, 98.609770],
        zoom: 12
    });

    function geolocationErrorOccurred(geolocationSupported, popup, latLng) {
        popup.setLatLng(latLng);
        popup.setContent(geolocationSupported ?
            '<b>Error:</b> The Geolocation service failed.' :
            '<b>Error:</b> This browser doesn\'t support geolocation.');
        popup.openOn(geolocationMap);
    }

    geolocationErrorOccurred(false, popup, geolocationMap.getCenter());

    // if (navigator.geolocation) {
    //     navigator.geolocation.getCurrentPosition(function (position) {
    //         var latLng = {
    //             lat: position.coords.latitude,
    //             lng: position.coords.longitude
    //         };

    //         popup.setLatLng(latLng);
    //         popup.setContent('This is your current location');
    //         popup.openOn(geolocationMap);

    //         geolocationMap.setView(latLng);
    //     }, function () {
    //         geolocationErrorOccurred(true, popup, geolocationMap.getCenter());
    //     });
    // } else {
    //     //No browser support geolocation service
    //     geolocationErrorOccurred(false, popup, geolocationMap.getCenter());
    // }

    placeSearch({
        key: 'GG9Q0qO9MQ0phAsdtFOGKZDAZfGEz0AB',
        container: document.querySelector('#place-search-input'),
        useDeviceLocation: true,
        collection: [
            'adminArea',
        ]
    });

}

function getDistanceByCoordinat() {
    // console.log(MQ.routing);
    dir = MQ.routing.directions();
    // console.log(MQ);
    dir.route({
        locations: [
            '3.517350,98.609770',
            'Sei Agul'
        ]
    });
    geolocationMap.addLayer(MQ.routing.routeLayer({
        directions: dir,
        fitBounds: true
    }));
    // console.log(latLng.toString())
    dir.on('success', function (data) {
        console.log(data.route.locations);
        console.log("Rp. " + parseInt(parseFloat(data.route.distance) * 20000));
        console.log(data.route.from);
        $('#form-address-location').attr('hidden', false);
        $('#pemesanan-lokasi_jemput').val(data.route.locations[1].street + " " + data.route.locations[1].adminArea5);
        $('#pemesanan-jarak').val(parseFloat(data.route.distance).toFixed(2) + "Km");
        $('#pemesanan-harga').val("Rp. " + Math.floor(parseFloat(data.route.distance) * 20) * 1000);
    });
    // navigator.geolocation.getCurrentPosition(function (position) {
    //     // var latLng = [position.coords.latitude, position.coords.longitude];
    //     dir.route({
    //         locations: [
    //             '3.517350,98.609770',
    //             '3.5355217,98.6931502'
    //         ]
    //     });
    //     geolocationMap.addLayer(MQ.routing.routeLayer({
    //         directions: dir,
    //         fitBounds: true
    //     }));
    //     // console.log(latLng.toString())
    //     dir.on('success', function (data) {
    //         console.log(data.route.locations);
    //         console.log("Rp. " + parseInt(parseFloat(data.route.distance) * 20000));
    //         console.log(data.route.from);
    //         $('#form-address-location').attr('hidden', false);
    //         $('#pesanan-alamat').val(data.route.locations[1].street + " " + data.route.locations[1].adminArea5);
    //         $('#pesanan-jarak-disp').val(parseFloat(data.route.distance).toFixed(2));
    //         $('#pesanan-harga-disp').val(Math.floor(parseFloat(data.route.distance) * 20) * 1000);
    //     });
    // });
}





// var geolocationMap, dir;
// window.onload = function() {
//     var popup = L.popup();
//     geolocationMap = L.map('map', {
//         layers: MQ.mapLayer(),
//         center: [40.731701, -73.993411],
//         zoom: 12
//     });

//     function geolocationErrorOccurred(geolocationSupported, popup, latLng) {
//         popup.setLatLng(latLng);
//         popup.setContent(geolocationSupported ?
//                 '<b>Error:</b> The Geolocation service failed.' :
//                 '<b>Error:</b> This browser doesn\'t support geolocation.');
//         popup.openOn(geolocationMap);
//     }

//     if (navigator.geolocation) {
//         navigator.geolocation.getCurrentPosition(function(position) {
//             var latLng = {
//                 lat: position.coords.latitude,
//                 lng: position.coords.longitude
//             };

//             popup.setLatLng(latLng);
//             popup.setContent('This is your current location');
//             popup.openOn(geolocationMap);

//             geolocationMap.setView(latLng);
//         }, function() {
//             geolocationErrorOccurred(true, popup, geolocationMap.getCenter());
//         });
//     } else {
//         //No browser support geolocation service
//         geolocationErrorOccurred(false, popup, geolocationMap.getCenter());
//     }
// }


// function getDistanceByCoordinat() {
//     dir = MQ.routing.directions();
//     navigator.geolocation.getCurrentPosition(function(position) {
//       var latLng = [position.coords.latitude, position.coords.longitude];
//         dir.route({
//           locations: [
//               '3.517350,98.609770',
//               latLng.toString()
//           ]
//       });
//       geolocationMap.addLayer(MQ.routing.routeLayer({
//         directions: dir,
//         fitBounds: true
//       }));
//       console.log(latLng.toString())
//     });

    
//     dir.on('success', function (data) {
//         console.log(data.route.locations);
//         console.log("Rp. " + parseInt(parseFloat(data.route.distance) * 20000));
//         console.log(data.route.from);
//         $('#form-address-location').attr('hidden', false);
//         $('#pemesanan-lokasi_jemput').val(data.route.locations[1].street + " " + data.route.locations[1].adminArea5);
//         $('#pemesanan-jarak').val(parseFloat(data.route.distance).toFixed(2) + " KM");
//         $('#pemesanan-harga').val("Rp. " + parseInt(parseFloat(data.route.distance) * 20000));
//     });
//   }


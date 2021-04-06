function searchLocation() {
    var dir = MQ.routing.directions();
    dir.route({
        locations: [
            '3.517350,98.609770',
            $('#pemesanan-lokasi_jemput').val()

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
        console.log(data.route.distance);
        $('#form-address-location').attr('hidden', false);
        $('#pemesanan-lokasi_jarak').val(data.route.locations[1].street + " " + data.route.locations[1].adminArea5);
        $('#pemesanan-jarak').val(parseFloat(data.route.distance).toFixed(2) + " Km");
        $('#pemesanan-harga').val("Rp. " + Math.floor(parseFloat(data.route.distance) * 20) * 1000);
    });
}
//  {
// $('#pesanan-alamat').onfocusout = lostFocus($('#pesanan-alamat').val())
// event.preventDefault();
// if (event.keyCode === 13 || event.keyCode === 9) {
// console.log($(this).val());
// dir.route({
//     locations: [
//         '3.517350,98.609770',
//         $(this).val()
//     ]
// });
// geolocationMap.addLayer(MQ.routing.routeLayer({
//     directions: dir,
//     fitBounds: true
// }));
// // console.log(latLng.toString())
// dir.on('success', function (data) {
//     console.log(data.route.locations);
//     console.log("Rp. " + parseInt(parseFloat(data.route.distance) * 20000));
//     console.log(data.route.from);
//     $('#form-address-location').attr('hidden', false);
//     // $('#pesanan-alamat').val(data.route.locations[1].street + " " + data.route.locations[1].adminArea5);
//     $('#pesanan-jarak-disp').val(parseFloat(data.route.distance).toFixed(2));
//     $('#pesanan-harga-disp').val(Math.floor(parseFloat(data.route.distance) * 20) * 1000);
// });
// console.log($(this).val());
// }
// })

// function lostFocus(val) {
//     console.log(val);
// }
// }
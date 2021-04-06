<?php

/* @var $this yii\web\View */



$this->title = 'My Yii Application';

$this->registerJsFile(
    'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/leaflet.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);

$this->registerJsFile(
    'https://www.mapquestapi.com/sdk/leaflet/v2.s/mq-map.js?key=zPX5NxxLePDLs35dVpH2R7KrRJFeUm6q',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);

$this->registerJsFile(
    'https://www.mapquestapi.com/sdk/leaflet/v2.s/mq-routing.js?key=zPX5NxxLePDLs35dVpH2R7KrRJFeUm6q',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);

$this->registerJsFile(
    "@web/js/index.js",
    ['depends' => [\yii\web\JqueryAsset::className()]]
);

?>

<div class="row" style="padding-top:100px;">
<div class="col-lg-6">
            <form action="">
                <div>
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" class="form-control" id="nama" placeholder="Nama Lengkap">
                </div>
                <br>
                <div>
                    <label for="no_telp">Nomor Telephone</label>
                    <input type="text" class="form-control" id="no_telp" placeholder="Nomor Telephone">
                </div>
                <br><br>
                <div>
                    <div class="row">
                    <div class="col-lg-6">
                        <button type="button" class="btn btn-primary" onclick="getDistanceByCoordinat()">Gunakan lokasi saat ini</button>
                    </div>
                    <div class="col">
                        <button type="button" class="btn btn-primary" onclick="getDistanceByCoordinat()">Pilih lokasi penjemputan</button>
                    </div>
                    </div>
                    <br>
                    <label for="lokasi-jemput">Lokasi Jemput</label>
                    <input type="text" class="form-control" id="lokasi-jemput" readonly>
                </div>
                <br>
                <div>
                    <label for="distance">Jarak</label>
                    <input type="text" class="form-control" id="distance" readonly>
                </div>
                <br>
                <div>
                    <label for="cost">Harga</label>
                    <input type="text" class="form-control" id="cost" readonly>
                </div>
                <br>
                <button type="button" class="btn btn-success">Pesan</button>
            
            </form>

            
        </div>

<div class="col-lg-6">
    <div id="map" style="height: 500px;"></div>
</div>
</div>





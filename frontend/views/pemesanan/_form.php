<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\number\NumberControl;

/* @var $this yii\web\View */
/* @var $model common\models\Pemesanan */
/* @var $form yii\widgets\ActiveForm */
$this->registerJsFile(
    'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/leaflet.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);

$this->registerJsFile(
    'https://api.mqcdn.com/sdk/place-search-js/v1.0.0/place-search.js',
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


$this->registerJsFile(
    "@web/js/search.js",
    ['depends' => [\yii\web\JqueryAsset::className()]]
);
?>

<div class="jumbotron">
    <h2>Isikan data pemesanan anda!</h2>
</div><br>

<div class="row">
    
    <div class="col-lg-4">
        <div class="pemesanan-form" id="form-pemesanan">

            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'no_telp')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'lokasi_jemput')->textInput(['maxlength' => true]) ?>

            <br>
            <button type="button" onclick="searchLocation()" class="btn btn-secondary btn-sm">Pilih Lokasi
            </button>
            <button type="button" onclick="getDistanceByCoordinat()" class="btn btn-outline-secondary btn-sm">Gunakan Lokasi Saat Ini
            </button>
            <br><br>

        <?= $form->field($model, 'jarak')->textInput([
            'maxlength' => true,
            'readonly' => true
            ]) ?>

        <?= $form->field($model, 'harga')->textInput([
            'maxlength' => true,
            'readonly' => true
            ]) ?>
        
            <?php //echo $form->field($model, 'jarak')->widget(NumberControl::classname(), [
            //     'readonly' => true,
            //     // 'value' => null,
            //     'id' => 'jarak',
            //     'maskedInputOptions' => [
            //         'suffix' => ' Km',
            //         'groupSeparator' => '.',
            //         'radixPoint' => ',',
            //         'rightAlign' => false
            //     ],
            // ]); ?>

            <?php //echo $form->field($model, 'harga')->widget(NumberControl::classname(), [
            //     'readonly' => true,
            //     'id' => 'harga',
            //     // 'value' => null,
            //     'maskedInputOptions' => [
            //         'prefix' => 'Rp ',
            //         'groupSeparator' => '.',
            //         'radixPoint' => ',',
            //         'rightAlign' => false
            //     ],
            // ]); ?>


            <?php if (!Yii::$app->request->isAjax) { ?>
                <br><div class="form-group">
                    <?= Html::submitButton($model->isNewRecord ? 'Pesan Ambulans' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                </div>
            <?php } ?>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
    <div class="col-lg-2"></div>
    <div class="col-lg-6">
        <div style="height: 500px;" id="map"></div>
    </div>
</div>



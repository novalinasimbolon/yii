<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Pemesanan */

$this->title = 'Pemesanan';
$this->params['breadcrumbs'][] = ['label' => 'Pemesanans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pemesanan-create">

    <h1><?= Html::encode($this->title) ?></h1><br>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

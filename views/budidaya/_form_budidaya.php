<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Anggota */
/* @var $form yii\widgets\ActiveForm */
?>

<?= Html::activeHiddenInput($model, 'id_anggota'); ?>
<h3><label>Nama Anggota : <?=$model->nama_anggota; ?></label></h3>
<h4><label>NIK : <?= $model->nik; ?></label></h4>
<h4><label>Kecamatan : <?= $model->nama_kecamatan; ?></label></h4>
<h4><label>Desa : <?= $model->nama_desa; ?></label></h4>
<br>
<br>
<div class="anggota-form">

<div class="panel panel-primary" id="databantuan"  >
<div class="panel-heading"> Data Tebar

</div>
<table class="table">
    <thead>
        <tr>

            <th>Bulan</th>
            <th>Tahun</th>
            <th>Minggu</th>
          <th>Komoditas</th>
        <th>Qty Tebar</th>

            <th><a id="btn-add2" href="#"><span class="glyphicon glyphicon-plus"></span></a></th>
        </tr>
    </thead>
    <?= \mdm\widgets\TabularInput::widget([
        'id' => 'detail-grid',
        'allModels' => $model->detailAnggotaTebar,
        'model' => \app\models\Detanggotatebar::className(),
        'tag' => 'tbody',
        'form' => $form,
        'itemOptions' => ['tag' => 'tr'],
        'itemView' => '_item_detail_tebar',
        'clientOptions' => [
            'btnAddSelector' => '#btn-add2',
        ],
    ]);
    ?>
</table>



</div>
<div class="panel panel-primary" id="databantuan"  >
<div class="panel-heading"> Data Pakan

</div>
<table class="table">
    <thead>
        <tr>

            <th>Bulan</th>
            <th>Tahun</th>
            <th>Minggu</th>
                   <th>Komoditas</th>
        <th>Qty Pakan</th>

            <th><a id="btn-add3" href="#"><span class="glyphicon glyphicon-plus"></span></a></th>
        </tr>
    </thead>
    <?= \mdm\widgets\TabularInput::widget([
        'id' => 'detail-grid2',
        'allModels' => $model->detailAnggotaPakan,
        'model' => \app\models\Detanggotapakan::className(),
        'tag' => 'tbody',
        'form' => $form,
        'itemOptions' => ['tag' => 'tr'],
        'itemView' => '_item_detail_pakan',
        'clientOptions' => [
            'btnAddSelector' => '#btn-add3',
        ],
    ]);
    ?>
</table>



</div>
<div class="panel panel-primary" id="databantuan"  >
<div class="panel-heading"> Data Produksi

</div>

<table class="table">
    <thead>
        <tr>

            <th>Bulan</th>
            <th>Tahun</th>
            <th>Minggu</th>
                   <th>Komoditas</th>
        <th>Qty Produksi</th>

            <th><a id="btn-add4" href="#"><span class="glyphicon glyphicon-plus"></span></a></th>
        </tr>
    </thead>
    <?= \mdm\widgets\TabularInput::widget([
        'id' => 'detail-grid4',
        'allModels' => $model->detailAnggotaProduksi,
        'model' => \app\models\Detanggotaproduksi::className(),
        'tag' => 'tbody',
        'form' => $form,
        'itemOptions' => ['tag' => 'tr'],
        'itemView' => '_item_detail_produksi',
        'clientOptions' => [
            'btnAddSelector' => '#btn-add4',
        ],
    ]);
    ?>
</table>



</div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']); ?>
    </div>

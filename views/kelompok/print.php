<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Kelompok */

$this->title = 'Data Kelompok';
?>
<div class="kelompok-view">

    <h1><?= Html::encode($this->title); ?></h1>



    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'nama_kelompok',
            'jenis_anggota',
            'tgl_pendirian:date',
            'nama_kecamatan',
            'nama_desa',
            'no_pengukuhan',
            'tgl_pengukuhan:date',
            'no_akte_notaris',
            'tgl_akte_notaris',
            'nama_notaris',
            'tgl_mulai_usaha:date',
            'no_telepon',
            'no_rekening_bank',
            'nama_bank',
            'cabang',
            'nama_pemilik_rekening',
        ],
    ]); ?>
    <div class="panel panel-primary">
<div class="panel-heading"> Data Anggota - Kelompok

</div>

<table class="table">
    <thead>
        <tr>

            <th>Nama</th>
            <th>Posisi</th>
            <th>Jenis Kelamin</th>
            <th>Umur</th>
                <?php if ($model->jenis_anggota === 'BUDIDAYA') {
        ?>
            <th>Total Tebar</th>
            <th>Total Pakan</th>
            <th>Total Produksi</th>

            <?php
    }
        ?>

        </tr>
    </thead>
    <?= \mdm\widgets\TabularInput::widget([
        'id' => 'detail-grid',
        'allModels' => $model->detailKelompok,
        'model' => \app\models\Detkelompok::className(),
        'tag' => 'tbody',
        'itemOptions' => ['tag' => 'tr'],
        'itemView' => '_item_detail_kelompok_view',
    ]);
    ?>
</table>


</div>

<?php if ($model->status_bantuan == 'Sudah') {
        ?>

    <div class="panel panel-primary">
<div class="panel-heading"> Data Bantuan - Kelompok

</div>

<table class="table">
    <thead>
        <tr>

            <th>Tahun</th>
            <th>Bantuan</th>

        </tr>
    </thead>
    <?= \mdm\widgets\TabularInput::widget([
        'id' => 'detail-grid',
        'allModels' => $model->detailKelompokBantuan,
        'model' => \app\models\Detkelompokbantuan::className(),
        'tag' => 'tbody',
        'itemOptions' => ['tag' => 'tr'],
        'itemView' => '_item_detail_kelompok_view_bantuan',
    ]); ?>
</table>


</div>
    <?php
    } ?>
</div>

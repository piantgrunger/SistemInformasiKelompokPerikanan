<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use hscstudio\mimin\components\Mimin;

/* @var $this yii\web\View */
/* @var $model app\models\Anggota */

$this->title = $model->id_anggota;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Anggota'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="anggota-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
             <?php if ((Mimin::checkRoute($this->context->id."/update"))){ ?>        <?= Html::a(Yii::t('app', 'Ubah'), ['update', 'id' => $model->id_anggota], ['class' => 'btn btn-primary']) ?>
        <?php } if ((Mimin::checkRoute($this->context->id."/delete"))){ ?>        <?= Html::a(Yii::t('app', 'Hapus'), ['delete', 'id' => $model->id_anggota], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Apakah Anda yakin ingin menghapus item ini??'),
                'method' => 'post',
            ],
        ]) ?>
        <?php } ?>    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'nama_anggota',
            'nik',
            'jenis_kelamin',
            'tempat_lahir',
            'tgl_lahir',
            'golongan_darah',
            'alamat:ntext',
            'id_propinsi',
            'id_kota',
            'id_kecamatan',
            'id_kelurahan',
            'status_pernikahan',
            'status_dalam_keluarga',
            'jml_anggota_keluarga',
            'pendidikan',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>

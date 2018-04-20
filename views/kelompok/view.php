<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use hscstudio\mimin\components\Mimin;

/* @var $this yii\web\View */
/* @var $model app\models\Kelompok */

$this->title = $model->id_kelompok;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Kelompok'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kelompok-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
             <?php if ((Mimin::checkRoute($this->context->id."/update"))){ ?>        <?= Html::a(Yii::t('app', 'Ubah'), ['update', 'id' => $model->id_kelompok], ['class' => 'btn btn-primary']) ?>
        <?php } if ((Mimin::checkRoute($this->context->id."/delete"))){ ?>        <?= Html::a(Yii::t('app', 'Hapus'), ['delete', 'id' => $model->id_kelompok], [
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
            'nama_kelompok',
            'tgl_pendirian',
            'id_kecamatan',
            'id_kelurahan',
            'no_pengukuhan',
            'tgl_pengukuhan',
            'no_akte_notaris',
            'tgl_akte_notaris',
            'nama_notaris',
            'tgl_mulai_usaha',
            'no_telepon',
            'no_rekening_bank',
            'nama_bank',
            'cabang',
            'nama_pemilik_rekening',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>

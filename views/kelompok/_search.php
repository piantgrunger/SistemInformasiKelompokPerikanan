<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\KelompokSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kelompok-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id_kelompok') ?>

    <?= $form->field($model, 'nama_kelompok') ?>

    <?= $form->field($model, 'tgl_pendirian') ?>

    <?= $form->field($model, 'id_propinsi') ?>

    <?= $form->field($model, 'id_kota') ?>

    <?php // echo $form->field($model, 'id_kecamatan') ?>

    <?php // echo $form->field($model, 'id_kelurahan') ?>

    <?php // echo $form->field($model, 'no_pengukuhan') ?>

    <?php // echo $form->field($model, 'tgl_pengukuhan') ?>

    <?php // echo $form->field($model, 'no_akte_notaris') ?>

    <?php // echo $form->field($model, 'tgl_akte_notaris') ?>

    <?php // echo $form->field($model, 'nama_notaris') ?>

    <?php // echo $form->field($model, 'tgl_mulai_usaha') ?>

    <?php // echo $form->field($model, 'no_telepon') ?>

    <?php // echo $form->field($model, 'no_rekening_bank') ?>

    <?php // echo $form->field($model, 'nama_bank') ?>

    <?php // echo $form->field($model, 'cabang') ?>

    <?php // echo $form->field($model, 'nama_pemilik_rekening') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Anggota */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="anggota-form">

    <?php $form = ActiveForm::begin(); ?>
        <?= $form->errorSummary($model) ?> <!-- ADDED HERE -->

    <?= $form->field($model, 'nama_anggota')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nik')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jenis_kelamin')->dropDownList([ 'Laki-Laki' => 'Laki-Laki', 'Perempuan' => 'Perempuan', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'tempat_lahir')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tgl_lahir')->textInput() ?>

    <?= $form->field($model, 'golongan_darah')->dropDownList([ 'A' => 'A', 'B' => 'B', 'AB' => 'AB', 'O' => 'O', 'A+' => 'A+', 'B+' => 'B+', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'alamat')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'id_propinsi')->textInput() ?>

    <?= $form->field($model, 'id_kota')->textInput() ?>

    <?= $form->field($model, 'id_kecamatan')->textInput() ?>

    <?= $form->field($model, 'id_kelurahan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status_pernikahan')->dropDownList([ 'Belum Menikah' => 'Belum Menikah', 'Menikah' => 'Menikah', 'Cerai Hidup' => 'Cerai Hidup', 'Cerai Mati' => 'Cerai Mati', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'status_dalam_keluarga')->dropDownList([ 'Kepala Keluarga' => 'Kepala Keluarga', 'Suami' => 'Suami', 'Istri' => 'Istri', 'Anak' => 'Anak', 'Menantu' => 'Menantu', 'Cucu' => 'Cucu', 'Orangtua' => 'Orangtua', 'Mertua' => 'Mertua', 'Famili Lain' => 'Famili Lain', 'Pembantu' => 'Pembantu', 'Lainnya' => 'Lainnya', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'jml_anggota_keluarga')->textInput() ?>

    <?= $form->field($model, 'pendidikan')->dropDownList([ 'Tidak / Belum Sekolah' => 'Tidak / Belum Sekolah', 'Belum Tamat SD / Sederajat' => 'Belum Tamat SD / Sederajat', 'Tamat SD / Sederajat' => 'Tamat SD / Sederajat', 'SLTP / Sederajat' => 'SLTP / Sederajat', 'SLTA / Sederajat' => 'SLTA / Sederajat', 'Diploma I / II' => 'Diploma I / II', 'Akademi / Diploma III / Sarjana Muda' => 'Akademi / Diploma III / Sarjana Muda', 'Diploma IV / Strata I' => 'Diploma IV / Strata I', 'Strata II' => 'Strata II', 'Strata III' => 'Strata III', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

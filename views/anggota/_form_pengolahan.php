<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Propinsi;
use app\models\Kota;

use kartik\widgets\Select2;
use kartik\widgets\DepDrop;
use yii\helpers\Url;
use kartik\datecontrol\DateControl;

/* @var $this yii\web\View */
/* @var $model app\models\Anggota */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="anggota-form">
<?= $form->field($model, 'status_kelompok_usaha')->dropDownList([ 'PENGOLAH' => 'PENGOLAH', 'PEMASAR' => 'PEMASAR', 'PENGOLAH DAN PEMASAR' => 'PENGOLAH DAN PEMASAR', ], ['prompt' => '']) ?>

<?= $form->field($model, 'status_usaha')->dropDownList([ 'PT' => 'PT', 'UD' => 'UD', 'CV' => 'CV', 'PERORANGAN' => 'PERORANGAN', 'LAINYA' => 'LAINYA', ], ['prompt' => '']) ?>

<?= $form->field($model, 'jabatan_dalam_usaha')->dropDownList([ 'Pemilik' => 'Pemilik', 'Karyawan' => 'Karyawan']) ?>

<?= $form->field($model, 'perlindungan_asuransi')->dropDownList([ 'ASURANSI TENAGA KERJA' => 'ASURANSI TENAGA KERJA', 'ASURANSI KESEHATAN' => 'ASURANSI KESEHATAN', 'TANPA ASURANSI' => 'TANPA ASURANSI', ], ['prompt' => '']) ?>

<?= $form->field($model, 'no_kontak_yang_bisa_dihubungi')->textInput(['maxlength' => true]) ?>

<label >Status Perizinan : </label>
<div class="row">
<div class="col-md-2">
  <?= $form->field($model, 'stat_siup')->checkbox(array('label'=>'SIUP'))->label(""); ?>
</div>
<div class="col-md-6">
  <?= $form->field($model, 'no_siup')->textInput(); ?>
</div>

</div>
<div class="row">
<div class="col-md-2">

<?= $form->field($model, 'stat_situ')->checkbox(array('label'=>'SITU'))->label("") ?>

</div>
<div class="col-md-6">
  <?= $form->field($model, 'no_situ')->textInput(); ?>
</div>

</div>

<div class="row">
<div class="col-md-2">

<?= $form->field($model, 'stat_tdp')->checkbox(array('label'=>'TDP'))->label("") ?>

</div>
<div class="col-md-6">
  <?= $form->field($model, 'no_tdp')->textInput(); ?>
</div>

</div>


<div class="row">
<div class="col-md-2">

<?= $form->field($model, 'stat_ho')->checkbox(array('label'=>'HO'))->label("") ?>

</div>
<div class="col-md-6">
  <?= $form->field($model, 'no_ho')->textInput(); ?>
</div>

</div>

<div class="row">
<div class="col-md-2">

<?= $form->field($model, 'stat_izin_lainnya')->checkbox(array('label'=>'Lainnya'))->label("") ?>
</div>

<div class="col-md-6">
  <?= $form->field($model, 'no_izin_lainnya')->textInput(); ?>
</div>

</div>

<label >Status Sertifikasi : </label>

<div class="row">
<div class="col-md-2">

<?= $form->field($model, 'stat_skp')->checkbox(array('label'=>'SKP'))->label("") ?>
</div>

<div class="col-md-6">
  <?= $form->field($model, 'no_skp')->textInput(); ?>
</div>

</div>

<div class="row">
<div class="col-md-2">

<?= $form->field($model, 'stat_haccp')->checkbox(array('label'=>'HACCP'))->label("") ?>
</div>

<div class="col-md-6">
  <?= $form->field($model, 'no_haccp')->textInput(); ?>
</div>

</div>

<div class="row">
<div class="col-md-2">

<?= $form->field($model, 'stat_pirt')->checkbox(array('label'=>'PIRT'))->label("") ?>
</div>

<div class="col-md-6">
  <?= $form->field($model, 'no_pirt')->textInput(); ?>
</div>

</div>
<div class="row">
<div class="col-md-2">

<?= $form->field($model, 'stat_sni')->checkbox(array('label'=>'SNI'))->label("") ?>
</div>

<div class="col-md-6">
<?= $form->field($model, 'no_sni')->textInput(); ?>
</div>

</div>

<div class="row">
<div class="col-md-2">

<?= $form->field($model, 'stat_sertifikat_lainnya')->checkbox(array('label'=>'Lainnya'))->label("") ?>
</div>

<div class="col-md-6">
<?= $form->field($model, 'no_sertifikat_lainnya')->textInput(); ?>
</div>

</div>

<?= $form->field($model, 'tahun_berdiri')->textInput() ?>

<?= $form->field($model, 'jenis_usaha')->dropDownList([ 'PEMINDANGAN' => 'PEMINDANGAN', 'PENGERINGAN' => 'PENGERINGAN', 'PEMBEKUAN' => 'PEMBEKUAN', 'FERMENTASI' => 'FERMENTASI', 'PENGASAPAN' => 'PENGASAPAN', 'PENGOLAH LAINYA' => 'PENGOLAH LAINYA', ], ['prompt' => '']) ?>

<?= $form->field($model, 'jenis_bahan_baku')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'asal_bahan_baku')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'jumlah_bahan_baku_bulanan')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'jumlah_produksi_bulanan')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'kapasitas_produksi_bulanan')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'pendapatan_bulanan')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'nilai_aset')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'sarana_prasarana')->textarea(['rows' => 6]) ?>

<?= $form->field($model, 'jumlah_tenaga_kerja')->textInput() ?>

<?= $form->field($model, 'daerah_pemasaran')->textarea(['rows' => 6]) ?>
  
  
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

</div>

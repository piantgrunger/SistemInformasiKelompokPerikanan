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


<?= $form->field($model, 'perlindungan_asuransi')->dropDownList([ 'ASURANSI TENAGA KERJA' => 'ASURANSI TENAGA KERJA', 'ASURANSI KESEHATAN' => 'ASURANSI KESEHATAN', 'TANPA ASURANSI' => 'TANPA ASURANSI', ], ['prompt' => '']) ?>

<?= $form->field($model, 'no_kontak_yang_bisa_dihubungi')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'tahun_berdiri')->textInput() ?>

<?= $form->field($model, 'jumlah_produksi_bulanan')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'kapasitas_produksi_bulanan')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'pendapatan_bulanan')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'nilai_aset')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'sarana_prasarana')->textarea(['rows' => 6]) ?>

<?= $form->field($model, 'jumlah_tenaga_kerja')->textInput() ?>

<?= $form->field($model, 'daerah_pemasaran')->textarea(['rows' => 6]) ?>


<?= $form->field($model, 'luas_lahan')->textInput(['maxlength' => true]) ?>


<?= $form->field($model, 'lokasi_lahan')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'status_lahan')->dropDownList([ 'MILIK SENDIRI' => 'MILIK SENDIRI', 'SEWA' => 'SEWA' ], ['prompt' => '']) ?>


<?= $form->field($model, 'tekhnologi_digunakan')->dropDownList([ 'TRADISIONAL' => 'TRADISIONAL', 'GEOISOLATOR' => 'GEOISOLATOR' ], ['prompt' => '']) ?>

</div>

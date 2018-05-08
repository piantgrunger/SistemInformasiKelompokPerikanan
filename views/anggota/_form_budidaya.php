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
<?= $form->field($model, 'status_kelompok_budidaya')->dropDownList([ 'PENGGARAP' => 'PENGGARAP', 'PEMILIK' => 'PEMILIK' ], ['prompt' => '']) ?>

<?= $form->field($model, 'jenis_budidaya')->dropDownList([ 'JARING LAUT' =>'JARING LAUT','RUMPUT LAUT'=>'RUMPUT LAUT',	'TAMBAK'=>'TAMBAK','KOLAM'=>'KOLAM','KARAMBA'=>'KARAMBA','JARING APUNG TAWAR'=>'JARING APUNG TAWAR','JARING TANCAP TAWAR'=>'JARING TANCAP TAWAR','MINA PADI'=>'MINA PADI' ], ['prompt' => '']) ?>

<?= $form->field($model, 'luas_lahan')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'status_sertifikasi_cbib_cpib')->dropDownList([ 'SUDAH' => 'SUDAH', 'BELUM' => 'BELUM' ], ['prompt' => '']) ?>

<?= $form->field($model, 'nilai_sertifikasi')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'nomor_sertifikat')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'npwp')->textInput(['maxlength' => true]) ?>
  
 
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div> 

</div>

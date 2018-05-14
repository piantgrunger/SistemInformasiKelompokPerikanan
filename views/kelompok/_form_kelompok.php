<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Propinsi;
use app\models\Kota;

use kartik\widgets\Select2;
use kartik\widgets\DepDrop;
use yii\helpers\Url;
use kartik\datecontrol\DateControl;
use yii\bootstrap\Tabs;

/* @var $this yii\web\View */
/* @var $model app\models\Kelompok */
/* @var $form yii\widgets\ActiveForm */
?>

    <?= $form->field($model, 'nama_kelompok')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'jenis_anggota')->dropDownList([ 'PENGOLAHAN' => 'PENGOLAHAN', 'BUDI DAYA' => 'BUDI DAYA', 'PRODUKSI GARAM' => 'PRODUKSI GARAM', ], ['prompt' => ''])
  ->label('Jenis Kelompok');
?>

<?=  Html::activeHiddenInput($model, 'id_propinsi')?>

<?= Html::activeHiddenInput($model, 'id_kota') ?>

    <?= $form->field($model, 'tgl_pendirian')->widget(DateControl::classname()) ?>

   <?= $form->field($model, 'id_kecamatan')->widget(DepDrop::classname(), [
'type'=>DepDrop::TYPE_SELECT2,
'data'=> [$model->id_kecamatan=>is_null($model->kecamatan)?"":$model->kecamatan->nama_kecamatan],
'options'=>[ 'placeholder'=>'Pilih Kecamatan ...'],
'select2Options'=>['pluginOptions'=>['allowClear'=>true]],
'pluginOptions'=>[
    'depends'=>['kelompok-id_kota'],
    'url'=>Url::to(['/anggota/kecamatan']),
    'placeholder'=>'Pilih Kecamatan ...',
    'initialize' =>true,

    ]
])->label('Kecamatan'); ?>


     <?= $form->field($model, 'id_kelurahan')->widget(DepDrop::classname(), [
'type'=>DepDrop::TYPE_SELECT2,
'data'=> [$model->id_kelurahan=>is_null($model->kelurahan)?"":$model->kelurahan->nama_kelurahan],
'options'=>[ 'placeholder'=>'Pilih kelurahan ...'],
'select2Options'=>['pluginOptions'=>['allowClear'=>true]],
'pluginOptions'=>[
    'depends'=>['kelompok-id_kecamatan'],
    'url'=>Url::to(['/anggota/kelurahan']),
    'placeholder'=>'Pilih kelurahan ...',
    'initialize' =>true,

    ]
])->label('Desa'); ?>
    <?= $form->field($model, 'no_pengukuhan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tgl_pengukuhan')->widget(DateControl::classname())  ?>

    <?= $form->field($model, 'no_akte_notaris')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tgl_akte_notaris')->widget(DateControl::classname()) ?>

    <?= $form->field($model, 'nama_notaris')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tgl_mulai_usaha')->widget(DateControl::classname())  ?>

    <?= $form->field($model, 'no_telepon')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_rekening_bank')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_bank')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cabang')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_pemilik_rekening')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kelas_kelompok')->dropDownList([ 'Pemula'=>'Pemula','Madya'=>'Madya','Utama'=>'Utama'], ['prompt' => '']);?>

<?= $form->field($model, 'nilai_kelompok')->textInput(['maxlength' => true]) ?>


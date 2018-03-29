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
?>
    <?= $form->field($model, 'nama_anggota')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'nik')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'jenis_kelamin')->dropDownList([ 'Laki-Laki' => 'Laki-Laki', 'Perempuan' => 'Perempuan', ], ['prompt' => '']) ?>

<?= $form->field($model, 'tempat_lahir')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'tgl_lahir')->widget(DateControl::classname()) ?>

<?= $form->field($model, 'golongan_darah')->dropDownList([ 'A' => 'A', 'B' => 'B', 'AB' => 'AB', 'O' => 'O', 'A+' => 'A+', 'B+' => 'B+', ], ['prompt' => '']) ?>

<?= $form->field($model, 'alamat')->textarea(['rows' => 6]) ?>

<?= $form->field($model, 'id_propinsi')->widget(Select2::classname(), [

'data' => Propinsi::getDataBrowsePropinsi(),
'options' => ['placeholder' => 'Pilih Propinsi ...'],
'pluginOptions' => [
    'allowClear' => true
],])->label('Propinsi'); ?>	  

<?= $form->field($model, 'id_kota')->widget(Select2::classname(), [

'data' => Kota::getDataBrowseKota($model->id_kota),
'options' => ['placeholder' => 'Pilih Propinsi ...'],
'pluginOptions' => [
    'allowClear' => true
],])->label('Kota / Kabupaten'); ?>	  

   <?= $form->field($model, 'id_kecamatan')->widget(DepDrop::classname(), [
'type'=>DepDrop::TYPE_SELECT2,
'data'=> [$model->id_kecamatan=>is_null($model->kecamatan)?"":$model->kecamatan->nama_kecamatan],
'options'=>[ 'placeholder'=>'Pilih Kecamatan ...'],
'select2Options'=>['pluginOptions'=>['allowClear'=>true]],
'pluginOptions'=>[
    'depends'=>['anggota-id_kota'],
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
    'depends'=>['anggota-id_kecamatan'],
    'url'=>Url::to(['/anggota/kelurahan']),
    'placeholder'=>'Pilih kelurahan ...',
    'initialize' =>true,
    
    ]
])->label('Desa'); ?>	
<?= $form->field($model, 'status_pernikahan')->dropDownList([ 'Belum Menikah' => 'Belum Menikah', 'Menikah' => 'Menikah', 'Cerai Hidup' => 'Cerai Hidup', 'Cerai Mati' => 'Cerai Mati', ], ['prompt' => '']) ?>

<?= $form->field($model, 'status_dalam_keluarga')->dropDownList([ 'Kepala Keluarga' => 'Kepala Keluarga', 'Suami' => 'Suami', 'Istri' => 'Istri', 'Anak' => 'Anak', 'Menantu' => 'Menantu', 'Cucu' => 'Cucu', 'Orangtua' => 'Orangtua', 'Mertua' => 'Mertua', 'Famili Lain' => 'Famili Lain', 'Pembantu' => 'Pembantu', 'Lainnya' => 'Lainnya', ], ['prompt' => '']) ?>

<?= $form->field($model, 'jml_anggota_keluarga')->textInput() ?>

<?= $form->field($model, 'pendidikan')->dropDownList([ 'Tidak / Belum Sekolah' => 'Tidak / Belum Sekolah', 'Belum Tamat SD / Sederajat' => 'Belum Tamat SD / Sederajat', 'Tamat SD / Sederajat' => 'Tamat SD / Sederajat', 'SLTP / Sederajat' => 'SLTP / Sederajat', 'SLTA / Sederajat' => 'SLTA / Sederajat', 'Diploma I / II' => 'Diploma I / II', 'Akademi / Diploma III / Sarjana Muda' => 'Akademi / Diploma III / Sarjana Muda', 'Diploma IV / Strata I' => 'Diploma IV / Strata I', 'Strata II' => 'Strata II', 'Strata III' => 'Strata III', ], ['prompt' => '']) ?>


<?php
use app\models\Resi;
use kartik\select2\Select2;
use yii\helpers\Url;
use app\models\Anggota;
use yii\helpers\ArrayHelper;
use kartik\widgets\DepDrop;
?>

<td><?= $form->field($model,"[$key]id_anggota")->widget(DepDrop::classname(), [
'type'=>DepDrop::TYPE_SELECT2,
'data'=> [$model->id_anggota=>is_null($model->anggota)?"--":$model->anggota->nik."-".$model->anggota->nama_anggota],
'options'=>[ 'placeholder'=>'Pilih Anggota ...'],
'select2Options'=>['pluginOptions'=>['allowClear'=>true]],
'pluginOptions'=>[
    'depends'=>['kelompok-jenis_anggota'],
    'url'=>Url::to(['/kelompok/anggota']),
    'placeholder'=>'Pilih Anggota ...',
    'initialize' =>true,
    
    ]
])->label(false); ?>
       
     </td>
     <td>    <?= $form->field($model, "[$key]posisi")->dropDownList([ 'KETUA' => 'KETUA', 'WAKIL KETUA' => 'WAKIL KETUA',
    'BENDAHARA'=>'BENDAHARA',
    'SEKRETARIS'=>'SEKRETARIS',
    'ANGGOTA'=>'ANGGOTA',
    ], ['prompt' => '']) ->label(false); ?>
</td>
<td><a data-action="delete"><span class="glyphicon glyphicon-trash"></span></a></td>
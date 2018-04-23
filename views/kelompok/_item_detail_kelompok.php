<?php
use app\models\Resi;
use kartik\select2\Select2;
use yii\helpers\Url;
use app\models\Anggota;
use yii\helpers\ArrayHelper;
?>

<td><?= $form->field($model,"[$key]id_anggota")->widget(Select2::classname(),[ 
     'data' =>ArrayHelper::map(
        Anggota::find()
                           ->select([
                                   'tb_m_anggota.id_anggota','nama_anggota'
                           ])
                           ->asArray()
                           ->all(), 'id_anggota', 'nama_anggota'),
     'options' => ['placeholder' => 'Pilih Anggota...'],
     'pluginOptions' => [
         'allowClear' => true
     ],])->label(false); ?>
       
     </td>
     <td>    <?= $form->field($model, "[$key]posisi")->dropDownList([ 'KETUA' => 'KETUA', 'WAKIL KETUA' => 'WAKIL KETUA',
    'BENDAHARA'=>'BENDAHARA',
    'SEKRETARIS'=>'SEKRETARIS',
    'ANGGOTA'=>'ANGGOTA',
    ], ['prompt' => '']) ->label(false); ?>
</td>
<td><a data-action="delete"><span class="glyphicon glyphicon-trash"></span></a></td>
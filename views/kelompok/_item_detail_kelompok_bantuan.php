<?php
use app\models\Resi;
use kartik\select2\Select2;
use yii\helpers\Url;
use app\models\Anggota;
use yii\helpers\ArrayHelper;
use kartik\widgets\DepDrop;
?>

<td><?= $form->field($model,"[$key]tahun")->textInput()->label(false); ?>
       
     </td>
     <td>    <?= $form->field($model, "[$key]bantuan")->textArea(['rows' => 6]) ->label(false); ?>
</td>
<td><a data-action="delete"><span class="glyphicon glyphicon-trash"></span></a></td>
<?php
use app\models\Resi;
use kartik\select2\Select2;
use yii\helpers\Url;
use app\models\Anggota;
use yii\helpers\ArrayHelper;
use kartik\widgets\DepDrop;
?>

<td><?=$model->nama_anggota ?>
       
     </td>
     <td>    <?=$model->posisi ?>
</td>
<td>    <?=$model->jenis_kelamin ?>
</td>    <td>    <?=$model->umur ?>
</td>
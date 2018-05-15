<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datecontrol\DateControl;
use app\models\Outlet;
use app\models\Customer;
use kartik\select2\Select2;
use mdm\widgets\TabularInput;


$js=<<<JS

  $(document).ready(function()
    {

  if ($("#kelompok-status_bantuan") . val() === "Sudah") {
    document.getElementById("databantuan").style.display="block";


} else {
    document.getElementById("databantuan").style.display="none";

}
    });

    $("#kelompok-status_bantuan") . on("change", function (e)
    {

  if ($("#kelompok-status_bantuan") . val() === "Sudah") {
    document.getElementById("databantuan").style.display="block";


} else {
    document.getElementById("databantuan").style.display="none";

}
    });
JS;
$this->registerJS($js);
?>
<div class="panel panel-primary">
<div class="panel-heading"> Data Anggota - Kelompok

</div>
<table class="table">
    <thead>
        <tr>

            <th>Nama</th>
            <th>Posisi</th>

            <th><a id="btn-add" href="#"><span class="glyphicon glyphicon-plus"></span></a></th>
        </tr>
    </thead>
    <?=  \mdm\widgets\TabularInput::widget([
        'id' => 'detail-grid',
        'allModels' => $model->detailKelompok,
        'model' => \app\models\Detkelompok::className(),
        'tag' => 'tbody',
        'form' => $form,
        'itemOptions' => ['tag' => 'tr'],
        'itemView' => '_item_detail_kelompok',
        'clientOptions' => [
            'btnAddSelector' => '#btn-add',
        ]

    ]);
?>
</table>
</div>

<?= $form->field($model, 'status_bantuan')-> dropDownList(['Sudah' => 'Sudah', 'Belum' => 'Belum', ], ['prompt' => '',
 ])
?>

<div class="panel panel-primary" id="databantuan"  >
<div class="panel-heading"> Data Bantuan - Kelompok

</div>
<table class="table">
    <thead>
        <tr>

            <th>Tahun</th>
            <th>Bantuan</th>

            <th><a id="btn-add2" href="#"><span class="glyphicon glyphicon-plus"></span></a></th>
        </tr>
    </thead>
    <?=  \mdm\widgets\TabularInput::widget([
        'id' => 'detail-grid2',
        'allModels' => $model->detailKelompokBantuan,
        'model' => \app\models\Detkelompokbantuan::className(),
        'tag' => 'tbody',
        'form' => $form,
        'itemOptions' => ['tag' => 'tr'],
        'itemView' => '_item_detail_kelompok_bantuan',
        'clientOptions' => [
            'btnAddSelector' => '#btn-add2',
        ]

    ]);
?>
</table>

</div>
 <div class="form-group">
        <?= \Yii\helpers\Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>

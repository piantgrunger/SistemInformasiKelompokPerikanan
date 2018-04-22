<?

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datecontrol\DateControl;
use app\models\Outlet;
use app\models\Customer;
use kartik\select2\Select2;
use mdm\widgets\TabularInput;



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


<?php


use hscstudio\mimin\components\Mimin;
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax; use kartik\export\ExportMenu;
$gridColumns=[['class' => 'kartik\grid\SerialColumn'], 
            'nama_anggota',
            'nik',
            'jenis_kelamin',
            'tempat_lahir',
            // 'tgl_lahir',
            // 'golongan_darah',
            // 'alamat:ntext',
            // 'id_propinsi',
            // 'id_kota',
            // 'id_kecamatan',
            // 'id_kelurahan',
            // 'status_pernikahan',
            // 'status_dalam_keluarga',
            // 'jml_anggota_keluarga',
            // 'pendidikan',
            // 'created_at',
            // 'updated_at',

         ['class' => 'kartik\grid\ActionColumn',  'template' => Mimin::filterActionColumn([
              'update','delete','view'],$this->context->route),    ],    ];


/* @var $this yii\web\View */
/* @var $searchModel app\models\AnggotaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Daftar Anggota');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="anggota-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p> <?php if ((Mimin::checkRoute($this->context->id."/create"))){ ?>        <?=  Html::a(Yii::t('app', 'Anggota  Baru'), ['create'], ['class' => 'btn btn-success']) ?>
    <?php } ?>    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumns,       
        'tableOptions' => ['class' => 'table  table-bordered table-hover'],
        'striped'=>false,
        'containerOptions'=>[true],
        'pjax' => true,
        'bordered' => true,
        'striped' => false,
        'condensed' => false,
        'responsive' => true,
        'hover' => true,
        'floatHeader' => true,
        'showPageSummary' => true,
        'panel' => [
            'type' => GridView::TYPE_PRIMARY
      
        ],  
         'resizableColumns'=>true,    

    ]); ?>
    <?php Pjax::end(); ?>
</div>

<?php


use hscstudio\mimin\components\Mimin;
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax; use kartik\export\ExportMenu;
use yii\helpers\ArrayHelper;
use app\models\Kecamatan;
use app\models\Kelurahan;

$gridColumns=[['class' => 'kartik\grid\SerialColumn'], 

                  
'nama_kelompok',
[
    'attribute'=>'jenis_anggota',
    'value'=>'jenis_anggota',
   
    'filter'=>['PENGOLAHAN'=>'PENGOLAHAN','BUDI DAYA'=>'BUDI DAYA','PRODUKSI GARAM'=>'PRODUKSI GARAM']
    ],
 'tgl_pendirian:date',
          
            // 'id_propinsi',
            //'id_kota',
            [
                'attribute'=>'nama_kecamatan',
                'value'=>'nama_kecamatan',
               
                'filter'=>ArrayHelper::map(Kecamatan::find()->where('id_kota=3523')->asArray()->all(),  'nama_kecamatan','nama_kecamatan')
            ],
            [
                'attribute'=>'nama_desa',
                'value'=>'nama_desa',
               
            ],
             'no_pengukuhan',

             'tgl_pengukuhan:date',
            // 'no_akte_notaris',
            // 'tgl_akte_notaris',
            // 'nama_notaris',
            // 'tgl_mulai_usaha',
            // 'no_telepon',
            // 'no_rekening_bank',
            // 'nama_bank',
            // 'cabang',
            // 'nama_pemilik_rekening',
            // 'created_at',
            // 'updated_at',

         ['class' => 'kartik\grid\ActionColumn',  'template' => Mimin::filterActionColumn([
              'update','delete','view'],$this->context->route),    ],    ];


/* @var $this yii\web\View */
/* @var $searchModel app\models\KelompokSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Daftar Kelompok');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kelompok-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p> <?php if ((Mimin::checkRoute($this->context->id."/create"))){ ?>        <?=  Html::a(Yii::t('app', 'Kelompok  Baru'), ['create'], ['class' => 'btn btn-success']) ?>
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
           'showPageSummary' => true,
        'panel' => [
            'type' => GridView::TYPE_PRIMARY
      
        ],  
         'resizableColumns'=>true,    

    ]); ?>


    <?php Pjax::end(); ?>
</div>

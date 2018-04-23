<?php


use hscstudio\mimin\components\Mimin;
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
 use kartik\export\ExportMenu;
use yii\helpers\ArrayHelper;
use app\models\Kecamatan;
use app\models\Kelurahan;

$gridColumns=[['class' => 'kartik\grid\SerialColumn'], 
            'nama_anggota',
            'nik',
            'jenis_kelamin',
            [
            'attribute'=>'jenis_anggota',
            'value'=>'jenis_anggota',
           
            'filter'=>['PENGOLAHAN'=>'PENGOLAHAN','BUDI DAYA'=>'BUDI DAYA','PRODUKSI GARAM'=>'PRODUKSI GARAM']
            ],
            // 'tgl_lahir',
            // 'golongan_darah',
            'alamat:ntext',
            [
                'attribute'=>'nama_kecamatan',
                'value'=>'nama_kecamatan',
               
                'filter'=>ArrayHelper::map(Kecamatan::find()->where('id_kota=3523')->asArray()->all(),  'nama_kecamatan','nama_kecamatan')
            ],
            [
                'attribute'=>'nama_desa',
                'value'=>'nama_desa',
               
            ],
            // 'id_propinsi',
            // 'id_kota',
         //    'nama_kecamatan',
           //  'nama_kelurahan',
            // 'status_pernikahan',
            // 'status_dalam_keluarga',
            // 'jml_anggota_keluarga',
            // 'pendidikan',
            // 'created_at',
            // 'updated_at',

         ['class' => 'kartik\grid\ActionColumn',  'template' => Mimin::filterActionColumn([
              'update','delete','view'],$this->context->route) ." {print} ",   
              'buttons' => [
            
              'print' => function ($url, $model) {
                return Html::a('<span class="glyphicon glyphicon-print"></span>',
                ['print','id'=>$model->id_anggota], [
                           'title' => Yii::t('app', 'Cetak'),
                           'target' => '_blank', 'class' => 'linksWithTarget', 'data-pjax' => 0]);
              },]
       ],    ];


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
   <div class="row">
   <div class="col-md-4 text-center">    <p> <?php if ((Mimin::checkRoute($this->context->id."/pengolahanbaru"))){ ?> 
           <?=  Html::a(Yii::t('app', 'Anggota Pengolahan Baru'), ['pengolahanbaru'], ['class' => 'btn btn-success']) ?>
    <?php } ?>    </p>
    </div><div class="col-md-4 text-center">
    <p> <?php if ((Mimin::checkRoute($this->context->id."/budidayabaru"))){ ?> 
           <?=  Html::a(Yii::t('app', 'Anggota Budi Daya Baru'), ['budidayabaru'], ['class' => 'btn btn-success']) ?>
    <?php } ?>    </p>
    </div><div class="col-md-4 text-center">
    <p> <?php if ((Mimin::checkRoute($this->context->id."/budidayabaru"))){ ?> 
           <?=  Html::a(Yii::t('app', 'Anggota Produksi  Garam Baru'), ['garambaru'], ['class' => 'btn btn-success']) ?>
    <?php } ?>    </p>
    </div>
    </div>
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

<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use miloschuman\highcharts\Highcharts;
use yii\web\JsExpression;

$current_year = date('Y');
$range = range($current_year - 5, $current_year + 5);
$years = array_combine($range, $range);

$form = ActiveForm::begin();

?>


<div class="site-index">

    <?= $form->field($model, 'tahun')->widget(Select2::className(), [
        'data' => $years,
        'options' => ['placeholder' => 'Pilih Tahun...'],
        'pluginOptions' => [
            'allowClear' => true,
        ],
    ]); ?>

      <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Tampilkan'), ['class' => 'btn btn-success']); ?>
    </div>

    <?php ActiveForm::end(); ?>



<?php


echo Highcharts::widget([
    'scripts' => [
        'modules/exporting',
        'themes/grid-light',
    ],
    'options' => [
        'title' => ['text' => 'Data Budidaya Kabupaten Tuban'],
        'xAxis' => [
            'categories' => $xAxis,
        ],
        'yAxis' => [
            'title' => ['text' => 'Jumlah '],
        ],
        'series' => [
                 [
                    'type' => 'column',
                    'name' => 'Tebar',
                    'color' => 'blue',
                    'data' => $dataseries3,
                ],
                [
                    'type' => 'column',
                    'name' => 'Pakan',
                    'color' => 'green',
                    'data' => $dataseries2,
                ],
                  [
                    'type' => 'column',
                    'name' => 'Produksi',
                    'color' => 'red',
                    'data' => $dataseries1,
                ],
            ],
    ],
]);

echo Highcharts::widget([
    'scripts' => [
        'modules/exporting',
        'themes/grid-light',
    ],
    'options' => [
        'title' => [
            'text' => 'Data Budidaya Kabupaten Tuban',
             ],
             'labels' => [
            'items' => [
                [
                    'html' => 'Total Produksi Per Kecamatan',
                    'style' => [
                        'left' => '270px',
                        'top' => '320px',
                        'color' => new JsExpression('(Highcharts.theme && Highcharts.theme.textColor) || "black"'),
                    ],
                ],
                [
                    'html' => 'Total Produksi Per Komoditi',
                    'style' => [
                        'left' => '670px',
                        'top' => '320px',
                 'color' => new JsExpression('(Highcharts.theme && Highcharts.theme.textColor) || "black"'),
                    ],
                ],
            ],
        ],
        'series' => [
            [
                'type' => 'pie',
                'name' => 'Data Per Kecamatan',
                'data' => $series,
                'center' => [310, 150],
                'size' => 300,
                'showInLegend' => false,
                'dataLabels' => [
                    'enabled' => false,
                ],
            ],
            [
                'type' => 'pie',
                'name' => 'Data Per Komoditas',
                'data' => $series2,
                'center' => [710, 150],
                'size' => 300,
                'showInLegend' => false,
                'dataLabels' => [
                    'enabled' => false,
                ],
            ],
        ],
    ],
]);
?>


</div>
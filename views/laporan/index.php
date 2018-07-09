<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use miloschuman\highcharts\Highcharts;
use yii\web\JsExpression;


$current_year = date('Y');
$range = range($current_year-5, $current_year+5);
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
    'options' => [
        'title' => ['text' => 'Data Budidaya Kabupaten Tuban'],
        'xAxis' => [
            'categories' => $xAxis,
        ],
        'yAxis' => [
            'title' => ['text' => 'Jumlah '],
        ],
        'series' => 
           [
              
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
            'text' => 'Combination chart',
        ],
        'xAxis' => [
            'categories' => ['Apples', 'Oranges', 'Pears', 'Bananas', 'Plums'],
        ],
        'labels' => [
            'items' => [
                [
                    'html' => 'Total fruit consumption',
                    'style' => [
                        'left' => '50px',
                        'top' => '18px',
                        'color' => new JsExpression('(Highcharts.theme && Highcharts.theme.textColor) || "black"'),
                    ],
                ],
            ],
        ],
        'series' => [
            [
                'type' => 'column',
                'name' => 'Jane',
                'data' => [3, 2, 1, 3, 4],
            ],
            [
                'type' => 'column',
                'name' => 'John',
                'data' => [2, 3, 5, 7, 6],
            ],
            [
                'type' => 'column',
                'name' => 'Joe',
                'data' => [4, 3, 3, 9, 0],
            ],
            [
                'type' => 'spline',
                'name' => 'Average',
                'data' => [3, 2.67, 3, 6.33, 3.33],
                'marker' => [
                    'lineWidth' => 2,
                    'lineColor' => new JsExpression('Highcharts.getOptions().colors[3]'),
                    'fillColor' => 'white',
                ],
            ],
            [
                'type' => 'pie',
                'name' => 'Total consumption',
                'data' => [
                  $series
               ],
                'center' => [100, 80],
                'size' => 100,
                'showInLegend' => false,
                'dataLabels' => [
                    'enabled' => false,
                ],
            ],
        ],
    ]
]);
?>


</div>
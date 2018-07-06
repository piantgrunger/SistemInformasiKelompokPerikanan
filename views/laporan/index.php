<?php

use miloschuman\highcharts\Highcharts;

$bulan =
array(
    '1' => 'Januari', '2' => 'Februari', '3' => 'Maret', '4' => 'April',
    '5' => 'Mei', '6' => 'Juni', '7' => 'Juli', '8' => 'Agustus',
    '9' => 'September', '10' => 'Oktober', '11' => 'November', '12' => 'Desember',
);

foreach ($dataPeriodeTebar as $data) {
    $xAxis[] = $bulan[$data['bulan_tebar']].'-'.$data['tahun_tebar'];
    $tebar[] = (float) $data['qty_tebar'];
}

echo Highcharts::widget([
    'options' => [
        'title' => ['text' => 'Data Budidaya Kabupaten Tuban'],
        'xAxis' => [
            'categories' => $xAxis,
        ],
        'yAxis' => [
            'title' => ['text' => 'Jumlah Tebar'],
        ],
        'series' => [
            [
                'type' => 'column',
                'name' => 'Tebar',
                'color' => 'red',
                'data' => $tebar,
            ],
        ],
    ],
]);

foreach ($dataPeriodePakan as $data) {
    $xAxis[] = $bulan[$data['bulan_pakan']].'-'.$data['tahun_pakan'];
    $pakan[] = (float) $data['qty_pakan'];
}

echo Highcharts::widget([
    'options' => [
        'title' => ['text' => 'Data Budidaya Kabupaten Tuban'],
        'xAxis' => [
            'categories' => $xAxis,
        ],
        'yAxis' => [
            'title' => ['text' => 'Jumlah Pakan'],
        ],
        'series' => [
            [
                'type' => 'column',
                'name' => 'pakan',
                'color' => 'green',
                'data' => $pakan,
        ],
        ],
    ],
]);

foreach ($dataPeriodeProduksi as $data) {
    $xAxis[] = $bulan[$data['bulan_produksi']].'-'.$data['tahun_produksi'];
    $produksi[] = (float) $data['qty_produksi'];
}

echo Highcharts::widget([
    'options' => [
        'title' => ['text' => 'Data Budidaya Kabupaten Tuban'],
        'xAxis' => [
            'categories' => $xAxis,
        ],
        'yAxis' => [
            'title' => ['text' => 'Jumlah Produksi'],
        ],
        'series' => [
            [
                'type' => 'column',
                'name' => 'produksi',
                'data' => $produksi,
            ],
        ],
    ],
]);

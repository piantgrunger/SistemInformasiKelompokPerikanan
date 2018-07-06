<?php

namespace app\controllers;

use Yii;

class LaporanController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $dataPeriodeProduksi = Yii::$app->db->createCommand(
            ' select bulan_produksi,tahun_produksi, sum(qty) as qty_produksi  from tb_d_anggota_produksi
             group by bulan_produksi,tahun_produksi
           '
       )->queryAll();
        $dataPeriodePakan = Yii::$app->db->createCommand(
            ' select bulan_pakan,tahun_pakan, sum(qty) as qty_pakan  from tb_d_anggota_pakan
             group by bulan_pakan,tahun_pakan
           '
        )->queryAll();

        $dataPeriodeTebar = Yii::$app->db->createCommand(
            ' select bulan_tebar,tahun_tebar, sum(qty) as qty_tebar  from tb_d_anggota_tebar
             group by bulan_tebar,tahun_tebar
           '
        )->queryAll();

        return $this->render('index', [
            'dataPeriodeProduksi' => $dataPeriodeProduksi,
            'dataPeriodePakan' => $dataPeriodePakan,
            'dataPeriodeTebar' => $dataPeriodeTebar,
        ]);
    }
}

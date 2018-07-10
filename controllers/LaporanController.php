<?php

namespace app\controllers;

use Yii;
use yii\base\DynamicModel;

class LaporanController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $bulan =
array(
    '1' => 'Januari', '2' => 'Februari', '3' => 'Maret', '4' => 'April',
    '5' => 'Mei', '6' => 'Juni', '7' => 'Juli', '8' => 'Agustus',
    '9' => 'September', '10' => 'Oktober', '11' => 'November', '12' => 'Desember',
);

        $model = new DynamicModel([
            'tahun',
        ]);

        $model->addRule(['tahun'], 'required');

        if ($model->load(Yii::$app->request->post())) {
            $series = [];
            $series2 = [];

            $dataseries1 = [];
            for ($i = 1; $i <= 12; ++$i) {
                $xAxis[] = $bulan[$i];
                $data = Yii::$app->db->createCommand(
                    " select  sum(qty) as qty_produksi  from tb_d_anggota_produksi
                     where tahun_produksi = $model->tahun and bulan_produksi = $i
                   "
                )->queryOne();
                $dataseries1[] = (float) $data['qty_produksi'];
                $data = Yii::$app->db->createCommand(
                    " select  sum(qty) as qty_pakan  from tb_d_anggota_pakan
                     where tahun_pakan = $model->tahun and bulan_pakan= $i
                   "
                )->queryOne();

                $dataseries2[] = (float) $data['qty_pakan'];
                $data = Yii::$app->db->createCommand(
                    " select  sum(qty) as qty_tebar  from tb_d_anggota_tebar
                     where tahun_tebar = $model->tahun and bulan_tebar= $i
                   "
                )->queryOne();

                $dataseries3[] = (float) $data['qty_tebar'];
            }

            $dataKecamatan = Yii::$app->db->createCommand(
                    " select  nama_kecamatan,sum(qty) as qty_produksi  from tb_d_anggota_produksi d
                       inner join tb_m_anggota m on m.id_anggota=d.id_anggota
                       inner join tb_m_kecamatan k on m.id_kecamatan=k.id_kecamatan
                       where tahun_produksi = $model->tahun
                       group by nama_kecamatan

                   "
                )->queryAll();

            foreach ($dataKecamatan as $kecamatan) {
                $series[] =

                        [
                              'name' => $kecamatan['nama_kecamatan'],
                           'y' => (float) ($kecamatan['qty_produksi']),
                        ];
            }

            $dataKomoditas = Yii::$app->db->createCommand(
                " select  komoditas,sum(qty) as qty_produksi  from tb_d_anggota_produksi d
                       where tahun_produksi = $model->tahun

                   "
            )->queryAll();

            foreach ($dataKomoditas as $komoditas) {
                $series2[] =

                    [
                    'name' => $komoditas['komoditas'],
                    'y' => (float) ($komoditas['qty_produksi']),
                ];
            }

            return $this->render('index', [
                'model' => $model,
                'dataseries1' => $dataseries1,
                'dataseries2' => $dataseries2,
                'dataseries3' => $dataseries3,
                'series' => $series,
                'series2' => $series2,
                'xAxis' => $xAxis,
            ]);
        }

        return $this->render('index', [
           'model' => $model,
            'dataseries1' => null,
            'dataseries2' => null,
            'dataseries3' => null,
            'series' => null,
            'series2' => null,
            'xAxis' => null,
        ]);
    }
}

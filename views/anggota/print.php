<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use hscstudio\mimin\components\Mimin;

/* @var $this yii\web\View */
/* @var $model app\models\Anggota */
$attributes=[

    'nama_anggota',
    'nik',
    'jenis_kelamin',
    'tempat_lahir',
    'tgl_lahir:date',
    'golongan_darah',
    'alamat:ntext',
     'nama_kecamatan',
    'nama_desa',
    'status_pernikahan',
    'status_dalam_keluarga',
    'jml_anggota_keluarga',
    'pendidikan',

];

if( $model->jenis_anggota == 'PENGOLAHAN')
{
    $attributes1=[


        'status_kelompok_usaha',

        'status_usaha',
     'jabatan_dalam_usaha',
     'perlindungan_asuransi',
     'no_kontak_yang_bisa_dihubungi',

     'no_siup',
   'no_situ',
   'no_tdp',
   'no_ho',
   'no_izin_lainnya',
   'no_skp',
   'no_haccp',
   'no_pirt',
   'no_sni',

   'no_sertifikat_lainnya',
   'tahun_berdiri',
   'jenis_usaha',
   'jenis_bahan_baku',
   'asal_bahan_baku',
   'jumlah_bahan_baku_bulanan:decimal',
   'jumlah_produksi_bulanan:decimal',
   'kapasitas_produksi_bulanan:decimal',
   'pendapatan_bulanan:currency',
   'nilai_aset:currency',
   'sarana_prasarana',
   'jumlah_tenaga_kerja',

   'daerah_pemasaran'

];
}else
if( $model->jenis_anggota == 'BUDIDAYA')
{
    $attributes1=[
    'status_kelompok_budidaya',
    'jenis_budidaya',
    'luas_lahan:decimal',
    'status_sertifikasi_cbib_cpib',
    'nilai_sertifikasi:decimal',
    'nomor_sertifikat',
    'npwp',

];
}else
if( $model->jenis_anggota == 'GARAM')
{
    $attributes1=[
    'no_kontak_yang_bisa_dihubungi',

  'tahun_berdiri',
  'jumlah_produksi_bulanan:decimal',
  'kapasitas_produksi_bulanan:decimal',
  'pendapatan_bulanan:currency',
  'nilai_aset:currency',
  'sarana_prasarana',
  'jumlah_tenaga_kerja',
  'daerah_pemasaran',

  'lokasi_lahan',
  'luas_lahan:decimal',
  'status_lahan',

  'tekhnologi_digunakan',
  'kualitas_produksi',


];
};


$this->title = "DATA ANGGOTA KELOMPOK ".$model->jenis_anggota;
?>
<div class="anggota-view">

    <h4><?= Html::encode($this->title) ?></h4>
    <div class="row">
<div class="col-md-6 text-right"></div>
<div class="col-md-6 text-right"><?=Html::img(Yii::$app->homeUrl.'image/'. $model->foto_anggota ,['width'=>'80px','height'=>'80px'])?>
</div>

</div>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => $attributes,
    ]) ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => $attributes1,
    ]) ?>

</div>

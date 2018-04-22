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
     
     'stat_siup',
   'stat_situ',
   'stat_tdp',
   'stat_ho',
   'stat_izin_lainnya',
   'stat_skp',
   'stat_haccp',
   'stat_pirt',
   'stat_sni',
   
   'stat_sertifikat_lainnya',
   'tahun_berdiri',
   'jenis_usaha',
   'jenis_bahan_baku',
   'asal_bahan_baku',
   'jumlah_bahan_baku_bulanan',
   'jumlah_produksi_bulanan',
   'kapasitas_produksi_bulanan',
   'pendapatan_bulanan',
   'nilai_aset',
   'sarana_prasarana',
   'jumlah_tenaga_kerja',
     
   'daerah_pemasaran'
   
];
}else
if( $model->jenis_anggota == 'BUDI DAYA')
{
    $attributes1=[
    'status_kelompok_budidaya',
    'jenis_budidaya',
    'luas_lahan',
    'status_sertifikasi_cbib_cpib',
    'nilai_sertifikasi',
    'nomor_sertifikat',
    'npwp',
         
];
}else
if( $model->jenis_anggota == 'PRODUKSI GARAM')
{
    $attributes1=[ 
    'no_kontak_yang_bisa_dihubungi',
    
  'tahun_berdiri',
  'jenis_usaha',
  'jumlah_produksi_bulanan',
  'kapasitas_produksi_bulanan',
  'pendapatan_bulanan',
  'nilai_aset',
  'sarana_prasarana',
  'jumlah_tenaga_kerja',
  'daerah_pemasaran',
  
  'lokasi_lahan',
  'luas_lahan',
  'status_lahan',
 
  'tekhnologi_digunakan',
  'kualitas_produksi',


];
};


$this->title = "DATA ANGGOTA KELOMPOK ".$model->jenis_anggota;
?>
<div class="anggota-view">

    <h3><?= Html::encode($this->title) ?></h3>
    <div class="row">
<div class="col-md-6 text-right"></div>
<div class="col-md-6 text-right"><?=Html::img(Yii::$app->homeUrl.'image/'. $model->foto_anggota ,['width'=>'100px','height'=>'100px'])?>
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

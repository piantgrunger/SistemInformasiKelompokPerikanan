<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use hscstudio\mimin\components\Mimin;

/* @var $this yii\web\View */
/* @var $model app\models\Anggota */
$attributes = [
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

if ($model->jenis_anggota == 'PENGOLAHAN') {
    $attributes1 = [
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

   'daerah_pemasaran',
];
} elseif ($model->jenis_anggota == 'BUDIDAYA') {
    $attributes1 = [
    'status_kelompok_budidaya',
    'jenis_budidaya',
    'luas_lahan:decimal',
    'status_sertifikasi_cbib_cpib',
    'nilai_sertifikasi:decimal',
    'nomor_sertifikat',
    'npwp',
];
} elseif ($model->jenis_anggota == 'GARAM') {
    $attributes1 = [
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
}

$this->title = $model->nama_anggota;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Anggota'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="anggota-view">

    <h1><?= Html::encode($this->title); ?></h1>

    <p>
             <?php if ((Mimin::checkRoute($this->context->id.'/update'))) {
    ?>        <?= Html::a(Yii::t('app', 'Ubah'), ['update', 'id' => $model->id_anggota], ['class' => 'btn btn-primary']); ?>
        <?php
} ?>

<?php if ((Mimin::checkRoute($this->context->id.'/print'))) {
        ?>        <?= Html::a(Yii::t('app', 'Cetak'), ['print', 'id' => $model->id_anggota], ['class' => 'btn btn-success']); ?>
    <?php
    } ?>    </p>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => $attributes,
    ]); ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => $attributes1,
    ]); ?>

</div>

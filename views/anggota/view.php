<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use hscstudio\mimin\components\Mimin;

/* @var $this yii\web\View */
/* @var $model app\models\Anggota */
$attributes=array();

if( $model->jenis_anggota == 'PENGOLAHAN')
{
    $attributes=[
        'nama_anggota',
        'nik',
        'jenis_kelamin',
        'tempat_lahir',
        'tgl_lahir',
        'golongan_darah',
        'alamat:ntext',
         'nama_kecamatan',
        'nama_desa',
        'status_pernikahan',
        'status_dalam_keluarga',
        'jml_anggota_keluarga',
        'pendidikan',

        
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
    $attributes=[   'nama_anggota',
    'nik',
    'jenis_kelamin',
    'tempat_lahir',
    'tgl_lahir',
    'golongan_darah',
    'alamat:ntext',
     'nama_kecamatan',
    'nama_desa',
    'status_pernikahan',
    'status_dalam_keluarga',
    'jml_anggota_keluarga',
    'pendidikan',
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
    $attributes=[ 'nama_anggota',
    'nik',
    'jenis_kelamin',
    'tempat_lahir',
    'tgl_lahir',
    'golongan_darah',
    'alamat:ntext',
     'nama_kecamatan',
    'nama_desa',
    'status_pernikahan',
    'status_dalam_keluarga',
    'jml_anggota_keluarga',
    'pendidikan',
    
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


$this->title = $model->nama_anggota;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Anggota'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="anggota-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
             <?php if ((Mimin::checkRoute($this->context->id."/update"))){ ?>        <?= Html::a(Yii::t('app', 'Ubah'), ['update', 'id' => $model->id_anggota], ['class' => 'btn btn-primary']) ?>
        <?php } if ((Mimin::checkRoute($this->context->id."/delete"))){ ?>        <?= Html::a(Yii::t('app', 'Hapus'), ['delete', 'id' => $model->id_anggota], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Apakah Anda yakin ingin menghapus item ini??'),
                'method' => 'post',
            ],
        ]) ?>
        <?php } ?>    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => $attributes,
    ]) ?>

</div>

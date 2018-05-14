<?php

namespace app\models;

use Yii;

use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\web\UploadedFile;
use yii\helpers\ArrayHelper;





/**
 * This is the model class for table "{{%tb_m_anggota}}".
 *
 * @property int $id_anggota
 * @property string $nama_anggota
 * @property string $nik
 * @property string $jenis_kelamin
 * @property string $tempat_lahir
 * @property string $tgl_lahir
 * @property string $golongan_darah
 * @property string $alamat
 * @property int $id_propinsi
 * @property int $id_kota
 * @property int $id_kecamatan
 * @property int $id_kelurahan
 * @property string $status_pernikahan
 * @property string $status_dalam_keluarga
 * @property int $jml_anggota_keluarga
 * @property string $pendidikan
 * @property string $created_at
 * @property string $updated_at
 * @property string $status_kelompok_usaha
 * @property string $status_usaha
 * @property string $jabatan_dalam_usaha
 * @property string $perlindungan_asuransi
 * @property string $no_kontak_yang_bisa_dihubungi
 * @property int $stat_siup
 * @property int $stat_situ
 * @property int $stat_tdp
 * @property int $stat_ho
 * @property int $stat_izin_lainnya
 * @property int $stat_skp
 * @property int $stat_haccp
 * @property int $stat_pirt
 * @property int $stat_sni
 * @property int $stat_sertifikat_lainnya
 * @property int $tahun_berdiri
 * @property string $jenis_usaha
 * @property string $jenis_bahan_baku
 * @property string $asal_bahan_baku
 * @property string $jumlah_bahan_baku_bulanan
 * @property string $jumlah_produksi_bulanan
 * @property string $kapasitas_produksi_bulanan
 * @property string $pendapatan_bulanan
 * @property string $nilai_aset
 * @property string $sarana_prasarana
 * @property int $jumlah_tenaga_kerja
 * @property string $daerah_pemasaran
 */
class Anggota extends \yii\db\ActiveRecord
{
    public $old_foto_anggota;

    /**
     * @inheritdoc
     */


    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                // if you're using datetime instead of UNIX timestamp:
                 'value' => new Expression('NOW()'),
            ],
        ];
    }
    public static function tableName()
    {
        return '{{%tb_m_anggota}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama_anggota', 'nik', 'tempat_lahir','tgl_lahir' , 'alamat', 'id_propinsi', 'id_kota', 'jml_anggota_keluarga'], 'required'],
            [['jenis_kelamin', 'jenis_anggota','golongan_darah', 
            'alamat', 'status_pernikahan', 'status_dalam_keluarga', 
            'pendidikan', 'status_kelompok_usaha', 'status_usaha',
             'perlindungan_asuransi', 'jenis_usaha', 'sarana_prasarana', 
             'daerah_pemasaran','status_kelompok_budidaya','jenis_budidaya','nomor_sertifikat','npwp',
             'no_siup', 'no_situ', 'no_tdp', 'no_ho', 'no_izin_lainnya', 'no_skp', 'no_haccp', 'no_pirt', 'no_sni', 'no_sertifikat_lainnya','lokasi_lahan'], 'string'],
            [['tgl_lahir', 'created_at', 'updated_at'], 'safe'],
            [['id_propinsi', 'id_kota', 'id_kecamatan', 'id_kelurahan', 'jml_anggota_keluarga', 'stat_siup', 'stat_situ', 'stat_tdp', 'stat_ho', 'stat_izin_lainnya', 'stat_skp', 'stat_haccp', 'stat_pirt', 'stat_sni', 'stat_sertifikat_lainnya', 'tahun_berdiri', 'jumlah_tenaga_kerja'], 'integer'],
            [['jumlah_bahan_baku_bulanan', 'jumlah_produksi_bulanan',
             'kapasitas_produksi_bulanan', 'pendapatan_bulanan', 'nilai_aset','luas_lahan','nilai_sertifikasi'], 'number'],
            [['nama_anggota', 'nik', 'tempat_lahir', 'jabatan_dalam_usaha', 'no_kontak_yang_bisa_dihubungi', 'jenis_bahan_baku', 'asal_bahan_baku'], 'string', 'max' => 255],
            [['nik'], 'unique'],
            [['foto_anggota'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png,jpg,bmp,jpeg','maxSize' => 512000000],
 
            [['status_kelompok_usaha', 'status_usaha', 'perlindungan_asuransi', 'jenis_usaha'],'required', 'when' => function($model) {
                return $model->jenis_anggota == 'PENGOLAHAN';
            }],
            [['status_kelompok_budidaya', 'jenis_budidaya', 'status_sertifikasi_cbib_cpib'
            ],'required', 'when' => function($model) {
                return $model->jenis_anggota == 'BUDI DAYA';
            }],
            [[ 'status_lahan','tekhnologi_digunakan','kualitas_produksi'],'required', 'when' => function($model) {
                return $model->jenis_anggota == 'PRODUKSI GARAM';
            }],
          [['nik'],'checkNIK']
           
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_anggota' => Yii::t('app', 'Id Anggota'),
            'nama_anggota' => Yii::t('app', 'Nama Anggota'),
            'nik' => Yii::t('app', 'Nik'),
            'jenis_kelamin' => Yii::t('app', 'Jenis Kelamin'),
            'tempat_lahir' => Yii::t('app', 'Tempat Lahir'),
            'tgl_lahir' => Yii::t('app', 'Tgl Lahir'),
            'golongan_darah' => Yii::t('app', 'Golongan Darah'),
            'alamat' => Yii::t('app', 'Alamat'),
            'id_propinsi' => Yii::t('app', 'Id Propinsi'),
            'id_kota' => Yii::t('app', 'Id Kota'),
            'id_kecamatan' => Yii::t('app', 'Id Kecamatan'),
            'id_kelurahan' => Yii::t('app', 'Id Kelurahan'),
            'status_pernikahan' => Yii::t('app', 'Status Pernikahan'),
            'status_dalam_keluarga' => Yii::t('app', 'Status Dalam Keluarga'),
            'jml_anggota_keluarga' => Yii::t('app', 'Jml Anggota Keluarga'),
            'pendidikan' => Yii::t('app', 'Pendidikan'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'status_kelompok_usaha' => Yii::t('app', 'Status Kelompok Usaha'),
            'status_usaha' => Yii::t('app', 'Status Usaha'),
            'jabatan_dalam_usaha' => Yii::t('app', 'Jabatan Dalam Usaha'),
            'perlindungan_asuransi' => Yii::t('app', 'Perlindungan Asuransi'),
            'no_kontak_yang_bisa_dihubungi' => Yii::t('app', 'No Kontak Yang Bisa Dihubungi'),
            'stat_siup' => Yii::t('app', 'Stat Siup'),
            'stat_situ' => Yii::t('app', 'Stat Situ'),
            'stat_tdp' => Yii::t('app', 'Stat Tdp'),
            'stat_ho' => Yii::t('app', 'Stat Ho'),
            'stat_izin_lainnya' => Yii::t('app', 'Stat Izin Lainnya'),
            'stat_skp' => Yii::t('app', 'Stat Skp'),
            'stat_haccp' => Yii::t('app', 'Stat Haccp'),
            'stat_pirt' => Yii::t('app', 'Stat Pirt'),
            'stat_sni' => Yii::t('app', 'Stat Sni'),
            'stat_sertifikat_lainnya' => Yii::t('app', 'Stat Sertifikat Lainnya'),
            'tahun_berdiri' => Yii::t('app', 'Tahun Berdiri'),
            'jenis_usaha' => Yii::t('app', 'Jenis Usaha'),
            'jenis_bahan_baku' => Yii::t('app', 'Jenis Bahan Baku'),
            'asal_bahan_baku' => Yii::t('app', 'Asal Bahan Baku'),
            'jumlah_bahan_baku_bulanan' => Yii::t('app', 'Jumlah Bahan Baku Bulanan '),
            'jumlah_produksi_bulanan' => Yii::t('app', 'Jumlah Produksi Bulanan (Ton)'),
            'kapasitas_produksi_bulanan' => Yii::t('app', 'Kapasitas Produksi Bulanan (Ton)'),
            'pendapatan_bulanan' => Yii::t('app', 'Pendapatan Bulanan'),
            'nilai_aset' => Yii::t('app', 'Nilai Aset'),
            'luas_lahan' => Yii::t('app', 'Luas Lahan (M2)'),
            'sarana_prasarana' => Yii::t('app', 'Sarana Prasarana'),
            'jumlah_tenaga_kerja' => Yii::t('app', 'Jumlah Tenaga Kerja'),
            'daerah_pemasaran' => Yii::t('app', 'Daerah Pemasaran'),
        ];
    }

    public function checkNIK($attribute, $params)
    {
        // no real check at the moment to be sure that the error is triggered
      $pos = substr($this->nik, 0,4);
       if ((strlen($this->nik) !== 16)||($pos!=='3523') )
       {  
          $this->addError($attribute,'Format NIK Harus 16 digit dan diawali 3523');
          return false;          
       }  
    }
    public function upload()
    {
        $path =Yii::getAlias('@app').'/web/image/';
        $fieldName ='foto_anggota';
       
        $image = UploadedFile::getInstance($this,$fieldName);
      
        if(!empty($image) && $image->size !== 0) {  
            $fileNames =   md5($this->nik) . '.' .$image->extension;    
        
            if ($image->saveAs($path .$fileNames)){
                $this->attributes=array($fieldName=>$fileNames);
                
                return true;
            } else {
                return false;
            }
        } else
        {
            $this->attributes=array($fieldName=>$this->old_foto_anggota);
            
               
          return true;
        }  
    }
 
public function getPropinsi()
{
    return $this->hasOne(Propinsi::className(), ['id_propinsi' => 'id_propinsi']);
}

/**
 * @return \yii\db\ActiveQuery
 */
public function getKota()
{
    return $this->hasOne(Kota::className(), ['id_kota' => 'id_kota']);
}


public function getKelompok()
{
    return $this->hasOne(Detkelompok::className(), ['id_anggota' => 'id_anggota']);
}

public function getNama_kelompok()
{
    return ($this->kelompok===null)?"": $this->kelompok->nama_kelompok;
}


/**
 * @return \yii\db\ActiveQuery
 */
public function getKecamatan()
{
    return $this->hasOne(Kecamatan::className(), ['id_kecamatan' => 'id_kecamatan']);
}
public function getNama_kecamatan()
{
    return ($this->kecamatan===null)?"": $this->kecamatan->nama_kecamatan;
}

/**
 * @return \yii\db\ActiveQuery
 */
public function getKelurahan()
{
    return $this->hasOne(Kelurahan::className(), ['id_kelurahan' => 'id_kelurahan']);
}
public function getNama_desa()
{
    return ($this->kelurahan===null)?"":$this->kelurahan->nama_kelurahan;
}

public static function getDataBrowseAnggota($jenis_anggota)
{        
    $data=Anggota::find()
    ->select([
   'id'=>'id_anggota','name'=>"concat(nama_anggota,'-',nik)"
   ])
   ->where(['jenis_anggota'=>$jenis_anggota])
   ->asArray()      
   ->all();

foreach ($data as $i => $list) 
{
$out[] = ['id' => $list['id'], 'name' => $list['name']];
}
return $out;  

}

}
<?php

namespace app\models;

use Yii;

use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use mdm\behaviors\ar\RelationTrait;



/**
 * This is the model class for table "tb_m_kelompok".
 *
 * @property int $id_kelompok
 * @property string $nama_kelompok
 * @property string $tgl_pendirian
 * @property int $id_propinsi
 * @property int $id_kota
 * @property int $id_kecamatan
 * @property int $id_kelurahan
 * @property string $no_pengukuhan
 * @property string $tgl_pengukuhan
 * @property string $no_akte_notaris
 * @property string $tgl_akte_notaris
 * @property string $nama_notaris
 * @property string $tgl_mulai_usaha
 * @property string $no_telepon
 * @property string $no_rekening_bank
 * @property string $nama_bank
 * @property string $cabang
 * @property string $nama_pemilik_rekening
 * @property string $created_at
 * @property string $updated_at
 */
class Kelompok extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    use RelationTrait;


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
        return 'tb_m_kelompok';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama_kelompok', 'tgl_pendirian', 'id_propinsi', 'id_kota', 'no_pengukuhan', 'tgl_pengukuhan', 'tgl_mulai_usaha','jenis_anggota','kelas_kelompok','nilai_kelompok','status_bantuan'], 'required'],
            [['tgl_pendirian', 'tgl_pengukuhan', 'tgl_akte_notaris', 'tgl_mulai_usaha', 'created_at', 'updated_at'], 'safe'],
            [['id_propinsi', 'id_kota', 'id_kecamatan', 'id_kelurahan','nilai_kelompok'], 'integer'],
            [['nama_kelompok', 'no_pengukuhan', 'no_akte_notaris', 'nama_notaris', 'no_telepon', 'no_rekening_bank', 'nama_bank', 'cabang', 'nama_pemilik_rekening'], 'string', 'max' => 255],
            [['no_pengukuhan'], 'unique'],
            [['nilai_kelompok'],'cekNilai'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function cekNilai($attribute, $params)
    {
           if ($this->kelas_kelompok === 'Pemula' && !($this->nilai_kelompok>=0 && $this->nilai_kelompok<=350 ))
           {
             $this->addError($attribute,'Kelompok Pemula hanya boleh berada pada range nilai 0-350');
             return false;

           }
           else
           if ($this->kelas_kelompok === 'Madya' && !($this->nilai_kelompok>=351 && $this->nilai_kelompok<=650 ))
           {
             $this->addError($attribute,'Kelompok Madya hanya boleh berada pada range nilai 351-650');
             return false;

           }
           else
           if ($this->kelas_kelompok === 'Utama' && !($this->nilai_kelompok>=651 && $this->nilai_kelompok<=1000 ))
           {
             $this->addError($attribute,'Kelompok Utama hanya berada pada range nilai 651-1000');
             return false;

           }
    }
    public function attributeLabels()
    {
        return [
            'id_kelompok' => Yii::t('app', 'Id Kelompok'),
            'nama_kelompok' => Yii::t('app', 'Nama Kelompok'),
            'jenis_anggota' => Yii::t('app', 'Jenis Kelompok'),

            'tgl_pendirian' => Yii::t('app', 'Tgl Pendirian'),
            'id_propinsi' => Yii::t('app', 'Id Propinsi'),
            'id_kota' => Yii::t('app', 'Id Kota'),
            'id_kecamatan' => Yii::t('app', 'Id Kecamatan'),
            'id_kelurahan' => Yii::t('app', 'Id Kelurahan'),
            'no_pengukuhan' => Yii::t('app', 'No Pengukuhan'),
            'tgl_pengukuhan' => Yii::t('app', 'Tgl Pengukuhan'),
            'no_akte_notaris' => Yii::t('app', 'No Akte Notaris'),
            'tgl_akte_notaris' => Yii::t('app', 'Tgl Akte Notaris'),
            'nama_notaris' => Yii::t('app', 'Nama Notaris'),
            'tgl_mulai_usaha' => Yii::t('app', 'Tgl Mulai Usaha'),
            'no_telepon' => Yii::t('app', 'No Telepon'),
            'no_rekening_bank' => Yii::t('app', 'No Rekening Bank'),
            'nama_bank' => Yii::t('app', 'Nama Bank'),
            'cabang' => Yii::t('app', 'Cabang'),
            'nama_pemilik_rekening' => Yii::t('app', 'Nama Pemilik Rekening'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }



public function getPropinsi()
{
    return $this->hasOne(Propinsi::className(), ['id_propinsi' => 'id_propinsi']);
}

public function setDetailKelompok($value)
{
    return $this->loadRelated('detailKelompok',$value);
}
public function getDetailKelompokBantuan()
{
    return $this->hasMany(Detkelompokbantuan::className(), ['id_kelompok' => 'id_kelompok']);
}
public function setDetailKelompokBantuan($value)
{
    return $this->loadRelated('detailKelompokBantuan',$value);
}

/**
 * @return \yii\db\ActiveQuery
 */
public function getKota()
{
    return $this->hasOne(Kota::className(), ['id_kota' => 'id_kota']);
}

/**
 * @return \yii\db\ActiveQuery
 */
public function getKecamatan()
{
    return $this->hasOne(Kecamatan::className(), ['id_kecamatan' => 'id_kecamatan']);
}

/**
 * @return \yii\db\ActiveQuery
 */
public function getKelurahan()
{
    return $this->hasOne(Kelurahan::className(), ['id_kelurahan' => 'id_kelurahan']);
}


public function getNama_kecamatan()
{
    return ($this->kecamatan===null)?'':$this->kecamatan->nama_kecamatan;
}

public function getDetailKelompok()
{
    return $this->hasMany(Detkelompok::className(), ['id_kelompok' => 'id_kelompok']);
}
public function getJumlah_anggota()
{
    return count($this->detailKelompok);
}
public function getDetailKelompokLakiLaki()
{
    return $this->hasMany(Detkelompok::className(), ['id_kelompok' => 'id_kelompok'])
    ->innerJoin('tb_m_anggota','tb_m_anggota.id_anggota=tb_d_kelompok.id_anggota')
    ->where(['jenis_kelamin'=>'Laki-Laki']);
}
public function getLaki_laki()
{
    return count($this->detailKelompokLakiLaki);
}
public function getDetailKelompokPerempuan()
{
    return $this->hasMany(Detkelompok::className(), ['id_kelompok' => 'id_kelompok'])
    ->innerJoin('tb_m_anggota','tb_m_anggota.id_anggota=tb_d_kelompok.id_anggota')
    ->where(['jenis_kelamin'=>'Perempuan']);
}
public function getPerempuan()
{
    return count($this->detailKelompokPerempuan);
}

/**
 * @return \yii\db\ActiveQuery
 */
public function getNama_desa()
{
    return ($this->kelurahan===null)?'':$this->kelurahan->nama_kelurahan;
}

}

<?php

namespace app\models;

use Yii;

use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;


/**
 * This is the model class for table "tb_m_anggota".
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
 * @property string $id_kelurahan
 * @property string $status_pernikahan
 * @property string $status_dalam_keluarga
 * @property int $jml_anggota_keluarga
 * @property string $pendidikan
 * @property string $created_at
 * @property string $updated_at
 */
class Anggota extends \yii\db\ActiveRecord
{
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
        return 'tb_m_anggota';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama_anggota', 'nik', 'tempat_lahir', 'tgl_lahir', 'alamat', 'id_propinsi', 'id_kota', 'jml_anggota_keluarga'], 'required'],
            [['jenis_kelamin', 'golongan_darah', 'alamat', 'status_pernikahan', 'status_dalam_keluarga', 'pendidikan'], 'string'],
            [['tgl_lahir', 'created_at', 'updated_at'], 'safe'],
            [['id_propinsi', 'id_kota', 'id_kecamatan', 'id_kelurahan', 'jml_anggota_keluarga'], 'integer'],
            [['nama_anggota', 'nik', 'tempat_lahir'], 'string', 'max' => 255],
            [['nik'], 'unique'],
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
        ];
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

    
}

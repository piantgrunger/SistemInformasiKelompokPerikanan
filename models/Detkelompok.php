<?php

namespace app\models;

use Yii;

use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;


/**
 * This is the model class for table "tb_d_kelompok".
 *
 * @property int $id_kelompok
 * @property int $id_d_kelompok
 * @property int $id_anggota
 * @property string $posisi
 * @property string $created_at
 * @property string $updated_at
 *
 * @property TbMAnggota $anggota
 * @property TbMKelompok $kelompok
 */
class Detkelompok extends \yii\db\ActiveRecord
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
        return 'tb_d_kelompok';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[ 'id_anggota'], 'required'],
            [['id_kelompok', 'id_anggota'], 'integer'],
            [['posisi'], 'string'],
            [['id_kelompok','created_at', 'updated_at'], 'safe'],
            [['id_anggota'], 'cekAnggota'],
            [['id_anggota'], 'exist', 'skipOnError' => true, 'targetClass' => Anggota::className(), 'targetAttribute' => ['id_anggota' => 'id_anggota']],
            [['id_kelompok'], 'exist', 'skipOnError' => true, 'targetClass' => Kelompok::className(), 'targetAttribute' => ['id_kelompok' => 'id_kelompok']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_kelompok' => Yii::t('app', 'Id Kelompok'),
            'id_d_kelompok' => Yii::t('app', 'Id D Kelompok'),
            'id_anggota' => Yii::t('app', 'Id Anggota'),
            'posisi' => Yii::t('app', 'Posisi'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnggota()
    {
        return $this->hasOne(Anggota::className(), ['id_anggota' => 'id_anggota']);
    }
    public function getNama_anggota()
    {
        return is_null($this->anggota)?"":$this->anggota->nama_anggota;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKelompok()
    {
        return $this->hasOne(Kelompok::className(), ['id_kelompok' => 'id_kelompok']);
    }
    public function getNama_kelompok()
    {
        return is_null($this->kelompok)?"":$this->kelompok->nama_kelompok;
    }
    public function cekAnggota($attribute, $params)
    {
      $kelompok = Detkelompok::find()->where('id_anggota='.$this->id_anggota)
                      ->andWhere('id_kelompok<>'.$this->id_kelompok)->one();
      if(!is_null($kelompok))
      {
           $this->addError($attribute,$this->nama_anggota.' Sudah Menjadi Anggota Kelompok '.$kelompok->nama_kelompok);
          return false;          
      
      }  
  
    }

}

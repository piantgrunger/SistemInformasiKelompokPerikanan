<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "tb_d_anggota_tebar".
 *
 * @property int        $id_anggota
 * @property int        $id_d_anggota
 * @property string     $bulan_tebar
 * @property int        $tahun_tebar
 * @property int        $minggu_tebar
 * @property string     $komoditas
 * @property string     $qty
 * @property string     $created_at
 * @property string     $updated_at
 * @property TbMAnggota $anggota
 */
class Detanggotatebar extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
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
        return 'tb_d_anggota_tebar';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_anggota', 'bulan_tebar', 'tahun_tebar', 'minggu_tebar', 'komoditas', 'qty'], 'required'],
            [['id_anggota', 'tahun_tebar', 'minggu_tebar'], 'integer'],
            [['qty'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
            [['bulan_tebar', 'komoditas'], 'string', 'max' => 255],
            [['id_anggota'], 'exist', 'skipOnError' => true, 'targetClass' => Anggota::className(), 'targetAttribute' => ['id_anggota' => 'id_anggota']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_anggota' => Yii::t('app', 'Id Anggota'),
            'id_d_anggota' => Yii::t('app', 'Id D Anggota'),
            'bulan_tebar' => Yii::t('app', 'Bulan Tebar'),
            'tahun_tebar' => Yii::t('app', 'Tahun Tebar'),
            'minggu_tebar' => Yii::t('app', 'Minggu Tebar'),
            'komoditas' => Yii::t('app', 'Komoditas'),
            'qty' => Yii::t('app', 'Qty'),
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
}

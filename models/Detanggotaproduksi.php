<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "tb_d_anggota_produksi".
 *
 * @property int        $id_anggota
 * @property int        $id_d_anggota
 * @property string     $bulan_produksi
 * @property int        $tahun_produksi
 * @property int        $minggu_produksi
 * @property string     $komoditas
 * @property string     $qty
 * @property string     $created_at
 * @property string     $updated_at
 * @property TbMAnggota $anggota
 */
class Detanggotaproduksi extends \yii\db\ActiveRecord
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
        return 'tb_d_anggota_produksi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_anggota', 'bulan_produksi', 'tahun_produksi', 'minggu_produksi', 'komoditas', 'qty'], 'required'],
            [['id_anggota', 'tahun_produksi', 'minggu_produksi'], 'integer'],
            [['qty'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
            [['bulan_produksi', 'komoditas'], 'string', 'max' => 255],
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
            'bulan_produksi' => Yii::t('app', 'Bulan Produksi'),
            'tahun_produksi' => Yii::t('app', 'Tahun Produksi'),
            'minggu_produksi' => Yii::t('app', 'Minggu Produksi'),
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

<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tb_d_kelompok_bantuan".
 *
 * @property int $id_kelompok
 * @property int $id_d_kelompok_bantuan_
 * @property int $tahun
 * @property string $bantuan
 *
 * @property TbMKelompok $kelompok
 */
class Detkelompokbantuan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tb_d_kelompok_bantuan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [[ 'tahun','bantuan'], 'required'],
            [['id_kelompok', 'tahun'], 'integer'],
            [['bantuan'], 'string'],
            [['id_kelompok'], 'exist', 'skipOnError' => true, 'targetClass' => Kelompok::className(), 'targetAttribute' => ['id_kelompok' => 'id_kelompok']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_kelompok' => 'Id Kelompok',
            'id_d_kelompok_bantuan_' => 'Id D Kelompok Bantuan',
            'tahun' => 'Tahun',
            'bantuan' => 'Bantuan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKelompok()
    {
        return $this->hasOne(Kelompok::className(), ['id_kelompok' => 'id_kelompok']);
    }
}

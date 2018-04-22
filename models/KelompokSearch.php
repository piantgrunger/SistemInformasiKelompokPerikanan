<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Kelompok;

/**
 * KelompokSearch represents the model behind the search form of `app\models\Kelompok`.
 */
class KelompokSearch extends Kelompok
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_kelompok', 'id_propinsi', 'id_kota', 'id_kecamatan', 'id_kelurahan'], 'integer'],
            [['nama_kelompok', 'tgl_pendirian', 'no_pengukuhan', 'tgl_pengukuhan', 'no_akte_notaris', 'tgl_akte_notaris', 'nama_notaris', 'tgl_mulai_usaha', 'no_telepon', 'no_rekening_bank', 'nama_bank', 'cabang', 'nama_pemilik_rekening', 'created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Kelompok::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_kelompok' => $this->id_kelompok,
            'tgl_pendirian' => $this->tgl_pendirian,
            'id_propinsi' => $this->id_propinsi,
            'id_kota' => $this->id_kota,
            'id_kecamatan' => $this->id_kecamatan,
            'id_kelurahan' => $this->id_kelurahan,
            'tgl_pengukuhan' => $this->tgl_pengukuhan,
            'tgl_akte_notaris' => $this->tgl_akte_notaris,
            'tgl_mulai_usaha' => $this->tgl_mulai_usaha,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'nama_kelompok', $this->nama_kelompok])
            ->andFilterWhere(['like', 'no_pengukuhan', $this->no_pengukuhan])
            ->andFilterWhere(['like', 'no_akte_notaris', $this->no_akte_notaris])
            ->andFilterWhere(['like', 'nama_notaris', $this->nama_notaris])
            ->andFilterWhere(['like', 'no_telepon', $this->no_telepon])
            ->andFilterWhere(['like', 'no_rekening_bank', $this->no_rekening_bank])
            ->andFilterWhere(['like', 'nama_bank', $this->nama_bank])
            ->andFilterWhere(['like', 'cabang', $this->cabang])
            ->andFilterWhere(['like', 'nama_pemilik_rekening', $this->nama_pemilik_rekening]);

        return $dataProvider;
    }
}
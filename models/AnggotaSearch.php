<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Anggota;

/**
 * AnggotaSearch represents the model behind the search form of `app\models\Anggota`.
 */
class AnggotaSearch extends Anggota
{
    /**
     * @inheritdoc
     */
    public $nama_kecamatan;
    public $nama_desa;
    public function rules()
    {
        return [
            [['id_anggota', 'id_propinsi', 'id_kota', 'id_kecamatan', 'id_kelurahan', 'jml_anggota_keluarga'], 'integer'],
            [['nama_anggota', 'nik', 'jenis_kelamin', 'tempat_lahir', 'tgl_lahir', 'golongan_darah', 'alamat', 'status_pernikahan', 'status_dalam_keluarga', 'pendidikan', 'created_at', 'updated_at'
              ,'jenis_anggota','nama_kecamatan','nama_desa'], 'safe'],
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
        $query = Anggota::find()->select('tb_m_anggota.*,nama_kecamatan, nama_kelurahan as nama_desa')
                ->leftJoin('tb_m_kecamatan' , 'tb_m_kecamatan.id_kecamatan = tb_m_anggota.id_kecamatan')
                ->leftJoin('tb_m_kelurahan' , 'tb_m_kelurahan.id_kelurahan = tb_m_anggota.id_kelurahan');

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
            'id_anggota' => $this->id_anggota,
            'tgl_lahir' => $this->tgl_lahir,
            'id_propinsi' => $this->id_propinsi,
            'id_kota' => $this->id_kota,
            'id_kecamatan' => $this->id_kecamatan,
            'id_kelurahan' => $this->id_kelurahan,
            'jml_anggota_keluarga' => $this->jml_anggota_keluarga,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'nama_anggota', $this->nama_anggota])
            ->andFilterWhere(['like', 'nik', $this->nik])
            ->andFilterWhere(['like', 'jenis_kelamin', $this->jenis_kelamin])
            ->andFilterWhere(['like', 'tempat_lahir', $this->tempat_lahir])
            ->andFilterWhere(['like', 'golongan_darah', $this->golongan_darah])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'status_pernikahan', $this->status_pernikahan])
            ->andFilterWhere(['like', 'status_dalam_keluarga', $this->status_dalam_keluarga])
            ->andFilterWhere(['like', 'pendidikan', $this->pendidikan])
            ->andFilterWhere(['like', 'nama_kecamatan', $this->nama_kecamatan])
            ->andFilterWhere(['like', 'nama_kelurahan', $this->nama_desa])
            ->andFilterWhere(['like', 'jenis_anggota', $this->jenis_anggota])
            ;

        return $dataProvider;
    }
}

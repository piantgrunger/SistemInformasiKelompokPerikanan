<?php

use yii\db\Migration;

/**
 * Class m180404_085008_alter_anggota_budidaya
 */
class m180404_085008_alter_anggota_budidaya extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('tb_m_anggota','status_kelompok_budidaya',"enum('PEMILIK','PENGGARAP')");
        $this->addColumn('tb_m_anggota','jenis_budidaya',"enum('JARING LAUT','RUMPUT LAUT',	'TAMBAK','KOLAM','KARAMBA','JARING APUNG TAWAR','JARING TANCAP TAWAR','MINA PADI')");
        $this->addColumn('tb_m_anggota','luas_lahan',$this->decimal(19,4));
        $this->addColumn('tb_m_anggota','status_sertifikasi_cbib_cpib',"enum('SUDAH','BELUM')");
        $this->addColumn('tb_m_anggota','nilai_sertifikasi',$this->decimal(19,4));
        $this->addColumn('tb_m_anggota','nomor_sertifikat',$this->string());
        $this->addColumn('tb_m_anggota','npwp',$this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180404_085008_alter_anggota_budidaya cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180404_085008_alter_anggota_budidaya cannot be reverted.\n";

        return false;
    }
    */
}

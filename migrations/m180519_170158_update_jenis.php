<?php

use yii\db\Migration;

/**
 * Class m180519_170158_update_jenis
 */
class m180519_170158_update_jenis extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("update tb_m_anggota set jenis_anggota = 'GARAM' where jenis_anggota = 'PRODUKSI GARAM' ");
        $this->execute("update tb_m_kelompok set jenis_anggota = 'GARAM' where jenis_anggota = 'PRODUKSI GARAM' ");
        $this->execute("update tb_m_anggota set jenis_anggota = 'BUDIDAYA' where jenis_anggota = 'BUDI DAYA' ");
        $this->execute("update tb_m_kelompok set jenis_anggota = 'BUDIDAYA' where jenis_anggota = 'BUDI DAYA' ");

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180519_170158_update_jenis cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180519_170158_update_jenis cannot be reverted.\n";

        return false;
    }
    */
}

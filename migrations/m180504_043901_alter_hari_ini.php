<?php

use yii\db\Migration;

/**
 * Class m180504_043901_alter_hari_ini
 */
class m180504_043901_alter_hari_ini extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('tb_m_anggota','kode_anggota',$this->string());
        $this->addColumn('tb_m_kelompok','kode_kelompok',$this->string());
        $this->execute('update tb_m_anggota set kode_anggota = nik');
        $this->execute('update tb_m_kelompok set kode_kelompok = nama_kelompok');
        $this->alterColumn('tb_m_anggota','kode_anggota',$this->string()->notNull()->unique());
        $this->alterColumn('tb_m_kelompok','kode_kelompok',$this->string()->notNull()->unique());
        

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180504_043901_alter_hari_ini cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180504_043901_alter_hari_ini cannot be reverted.\n";

        return false;
    }
    */
}

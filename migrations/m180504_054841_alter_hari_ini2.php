<?php

use yii\db\Migration;

/**
 * Class m180504_054841_alter_hari_ini2
 */
class m180504_054841_alter_hari_ini2 extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('tb_m_anggota','no_siup',$this->string());
        $this->addColumn('tb_m_anggota','no_situ',$this->string());
        $this->addColumn('tb_m_anggota','no_tdp',$this->string());
        $this->addColumn('tb_m_anggota','no_ho',$this->string());
        $this->addColumn('tb_m_anggota','no_izin_lainnya',$this->string());
        $this->addColumn('tb_m_anggota','no_skp',$this->string());
        $this->addColumn('tb_m_anggota','no_haccp',$this->string());
        $this->addColumn('tb_m_anggota','no_pirt',$this->string());
        $this->addColumn('tb_m_anggota','no_sni',$this->string());
        $this->addColumn('tb_m_anggota','no_sertifikat_lainnya',$this->string());
       
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180504_054841_alter_hari_ini2 cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180504_054841_alter_hari_ini2 cannot be reverted.\n";

        return false;
    }
    */
}

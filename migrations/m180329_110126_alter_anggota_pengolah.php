<?php

use yii\db\Migration;

/**
 * Class m180329_110126_alter_anggota_pengolah
 */
class m180329_110126_alter_anggota_pengolah extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('tb_m_anggota','jenis_anggota',$this->string());
 
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180329_110126_alter_anggota_pengolah cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180329_110126_alter_anggota_pengolah cannot be reverted.\n";

        return false;
    }
    */
}

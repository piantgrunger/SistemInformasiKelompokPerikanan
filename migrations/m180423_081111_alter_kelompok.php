<?php

use yii\db\Migration;

/**
 * Class m180423_081111_alter_kelompok
 */
class m180423_081111_alter_kelompok extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('tb_m_kelompok','jenis_anggota',$this->string());
 
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180423_081111_alter_kelompok cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180423_081111_alter_kelompok cannot be reverted.\n";

        return false;
    }
    */
}

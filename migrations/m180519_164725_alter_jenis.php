<?php

use yii\db\Migration;

/**
 * Class m180519_164725_alter_jenis
 */
class m180519_164725_alter_jenis extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('tb_m_anggota','jenis_anggota',$this->string());

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180519_164725_alter_jenis cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180519_164725_alter_jenis cannot be reverted.\n";

        return false;
    }
    */
}

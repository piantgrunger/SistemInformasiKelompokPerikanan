<?php

use yii\db\Migration;

/**
 * Class m180515_042955_alter_kelompok
 */
class m180515_042955_alter_kelompok extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('tb_m_kelompok', 'status_bantuan', "enum ('Sudah','Belum')");

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180515_042955_alter_kelompok cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180515_042955_alter_kelompok cannot be reverted.\n";

        return false;
    }
    */
}

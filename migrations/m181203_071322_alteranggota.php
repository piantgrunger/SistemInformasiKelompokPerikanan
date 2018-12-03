<?php

use yii\db\Migration;

/**
 * Class m181203_071322_alteranggota
 */
class m181203_071322_alteranggota extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('tb_m_anggota','jenis_ikan',$this->string(100));

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m181203_071322_alteranggota cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181203_071322_alteranggota cannot be reverted.\n";

        return false;
    }
    */
}

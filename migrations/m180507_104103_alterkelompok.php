<?php

use yii\db\Migration;

/**
 * Class m180507_104103_alterkelompok
 */
class m180507_104103_alterkelompok extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('tb_m_kelompok', 'kode_kelompok');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180507_104103_alterkelompok cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180507_104103_alterkelompok cannot be reverted.\n";

        return false;
    }
    */
}

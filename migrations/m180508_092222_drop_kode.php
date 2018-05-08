<?php

use yii\db\Migration;

/**
 * Class m180508_092222_drop_kode
 */
class m180508_092222_drop_kode extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
       $this->dropColumn('tb_m_anggota', 'kode_anggota');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180508_092222_drop_kode cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180508_092222_drop_kode cannot be reverted.\n";

        return false;
    }
    */
}

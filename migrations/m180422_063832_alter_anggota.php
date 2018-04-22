<?php

use yii\db\Migration;

/**
 * Class m180422_063832_alter_anggota
 */
class m180422_063832_alter_anggota extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('tb_m_anggota','foto_anggota',$this->string());
    
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180422_063832_alter_anggota cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180422_063832_alter_anggota cannot be reverted.\n";

        return false;
    }
    */
}

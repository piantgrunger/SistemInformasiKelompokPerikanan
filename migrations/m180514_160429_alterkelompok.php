<?php

use yii\db\Migration;

/**
 * Class m180514_160429_alterkelompok
 */
class m180514_160429_alterkelompok extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {   $this->addColumn('tb_m_kelompok','kelas_kelompok',"enum ('Pemula','Madya','Utama')");
        $this->addColumn('tb_m_kelompok','nilai_kelompok',$this->integer());
     

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180514_160429_alterkelompok cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180514_160429_alterkelompok cannot be reverted.\n";

        return false;
    }
    */
}

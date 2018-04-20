<?php

use yii\db\Migration;

/**
 * Class m180420_035424_alter_anggota_garam
 */
class m180420_035424_alter_anggota_garam extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('tb_m_anggota','tekhnologi_digunakan',"enum('INTENSIF','TRADISIONAL')");
        $this->addColumn('tb_m_anggota','kualitas_produksi',"enum('KP1','KP2')");
        
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180420_035424_alter_anggota_garam cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180420_035424_alter_anggota_garam cannot be reverted.\n";

        return false;
    }
    */
}

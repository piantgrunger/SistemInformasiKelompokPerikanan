<?php

use yii\db\Migration;

/**
 * Class m180406_170802_alter_anggota_garam
 */
class m180406_170802_alter_anggota_garam extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('tb_m_anggota','lokasi_lahan',$this->string());
        $this->addColumn('tb_m_anggota','status_lahan',"enum('MILIK SENDIRI','SEWA')");
        $this->addColumn('tb_m_anggota','tekhnologi_digunakan',"enum('GEOISOLATOR','TRADISIONAL')");
       
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180406_170802_alter_anggota_garam cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180406_170802_alter_anggota_garam cannot be reverted.\n";

        return false;
    }
    */
}

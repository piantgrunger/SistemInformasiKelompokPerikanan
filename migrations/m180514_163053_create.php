<?php

use yii\db\Migration;

/**
 * Class m180514_163053_create
 */
class m180514_163053_create extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('tb_d_kelompok_bantuan',
        [
            'id_kelompok' =>  $this->integer()->notNull(),
            'id_d_kelompok_bantuan_' =>  $this->primaryKey(),
            
 
            'tahun' =>  $this->integer()->notNull(),
            'bantuan' =>$this->text(),   
      
  
          
          
        ]);
        $this->addForeignKey(
            'fk-kelompoketail2',
            'tb_d_kelompok_bantuan',
            'id_kelompok',
            'tb_m_kelompok',
            'id_kelompok',
            'CASCADE',
            'CASCADE'        
            );
       
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('tb_d_kelompok_bantuan');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180514_163053_create cannot be reverted.\n";

        return false;
    }
    */
}

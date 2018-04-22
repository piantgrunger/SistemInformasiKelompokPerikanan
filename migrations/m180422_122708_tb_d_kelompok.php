<?php

use yii\db\Migration;

/**
 * Class m180422_122708_tb_d_kelompok
 */
class m180422_122708_tb_d_kelompok extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('tb_d_kelompok',
        [
            'id_kelompok' =>  $this->integer()->notNull(),
            'id_d_kelompok' =>  $this->primaryKey(),
            
 
            'id_anggota' =>  $this->integer()->notNull()->unique(),
            'posisi' => "enum ('KETUA','WAKIL KETUA','BENDAHARA','SEKRETARIS','ANGGOTA')",   
            'created_at'=>$this->datetime(),
          'updated_at'=>$this->datetime(),
    
  
          
          
        ]);
        $this->addForeignKey(
            'fk-kelompoketail',
            'tb_d_kelompok',
            'id_kelompok',
            'tb_m_kelompok',
            'id_kelompok',
            'CASCADE',
            'CASCADE'        
            );
            $this->addForeignKey(
                'fk-kelompokanggota',
                'tb_d_kelompok',
                'id_anggota',
                'tb_m_anggota',
                'id_anggota',
                'RESTRICT',
                'CASCADE'        
                );
           
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('tb_d_kelompok');
     
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180422_122708_tb_d_kelompok cannot be reverted.\n";

        return false;
    }
    */
}

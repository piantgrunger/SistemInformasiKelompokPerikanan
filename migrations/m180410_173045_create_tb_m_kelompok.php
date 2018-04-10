<?php

use yii\db\Migration;

/**
 * Class m180410_173045_create_tb_m_kelompok
 */
class m180410_173045_create_tb_m_kelompok extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('tb_m_kelompok',
        [
          'id_kelompok' =>  $this->primaryKey(),
          'nama_kelompok' =>  $this->string()->notNull(),
          'tgl_pendirian' =>  $this->date()->notNull(),
          'id_propinsi' => $this->integer()->notNull(),
          'id_kota' => $this->integer()->notNull(),
          'id_kecamatan' => $this->integer(),
          'id_kelurahan' => $this->bigInteger(),
          'no_pengukuhan' =>  $this->string()->unique()->notNull(),
          'tgl_pengukuhan' =>  $this->date()->notNull(),
          'no_akte_notaris' =>  $this->string(),
          'tgl_akte_notaris' =>  $this->date(),
          'nama_notaris' =>  $this->string(),
          'tgl_mulai_usaha' =>  $this->date()->notNull(),
          'no_telepon' =>  $this->string(),
          'no_rekening_bank' =>  $this->string(),
          'nama_bank' =>  $this->string(),
          'cabang' =>  $this->string(),
          'nama_pemilik_rekening' =>  $this->string(),
          
       
       
       
       
       
       
          'created_at'=>$this->datetime(),
          'updated_at'=>$this->datetime(),
    
  
          
          
        ]);
  
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180410_173045_create_tb_m_kelompok cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180410_173045_create_tb_m_kelompok cannot be reverted.\n";

        return false;
    }
    */
}

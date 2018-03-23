<?php

use yii\db\Migration;

/**
 * Class m180323_070159_create_tb_m_anggota
 */
class m180323_070159_create_tb_m_anggota extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
      $this->createTable('tb_m_anggota',
      [
        'id_anggota' =>  $this->primaryKey(),
        'nama_anggota' =>  $this->string()->notNull(),
        'nik' =>  $this->string()->unique()->notNull(),
        'jenis_kelamin' =>"ENUM('Laki-Laki','Perempuan')",
        'tempat_lahir' =>  $this->string()->notNull(),
        'tgl_lahir' =>  $this->date()->notNull(),
        'golongan_darah' =>"ENUM('A','B','AB','O','A+','B+')",
        'alamat' => $this->text()->notNull(),
        'id_propinsi' => $this->integer()->notNull(),
        'id_kota' => $this->integer()->notNull(),
        'id_kecamatan' => $this->integer(),
        'id_kelurahan' => $this->bigInteger(),
        'status_pernikahan' =>"ENUM('Belum Menikah','Menikah','Cerai Hidup','Cerai Mati')",
        'status_dalam_keluarga' =>"ENUM('Kepala Keluarga','Suami',
        'Istri','Anak','Menantu','Cucu','Orangtua','Mertua',
        'Famili Lain','Pembantu','Lainnya')",
        'jml_anggota_keluarga' =>$this->integer()->notNull(),
         'pendidikan'=>"ENUM('Tidak / Belum Sekolah',
         'Belum Tamat SD / Sederajat',
         'Tamat SD / Sederajat',
         'SLTP / Sederajat',
         'SLTA / Sederajat',
         'Diploma I / II',
         'Akademi / Diploma III / Sarjana Muda',
         'Diploma IV / Strata I',
         'Strata II',
         'Strata III'
         )" ,        

        'created_at'=>$this->datetime(),
        'updated_at'=>$this->datetime(),
  

        
        
      ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180323_070159_create_tb_m_anggota cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180323_070159_create_tb_m_anggota cannot be reverted.\n";

        return false;
    }
    */
}

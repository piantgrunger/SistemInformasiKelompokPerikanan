<?php

use yii\db\Migration;

/**
 * Class m180329_053518_alter_anggota_pengolah
 */
class m180329_053518_alter_anggota_pengolah extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('tb_m_anggota','status_kelompok_usaha',"enum('PENGOLAH','PEMASAR','PENGOLAH DAN PEMASAR')");
        $this->addColumn('tb_m_anggota','status_usaha',"enum('PT','UD','CV','PERORANGAN','LAINYA')");
        $this->addColumn('tb_m_anggota','jabatan_dalam_usaha',$this->string());
        $this->addColumn('tb_m_anggota','perlindungan_asuransi',"enum('ASURANSI TENAGA KERJA','ASURANSI KESEHATAN','TANPA ASURANSI')");
        $this->addColumn('tb_m_anggota','no_kontak_yang_bisa_dihubungi',$this->string());
        $this->addColumn('tb_m_anggota','stat_siup',$this->integer());
        $this->addColumn('tb_m_anggota','stat_situ',$this->integer());
        $this->addColumn('tb_m_anggota','stat_tdp',$this->integer());
        $this->addColumn('tb_m_anggota','stat_ho',$this->integer());
        $this->addColumn('tb_m_anggota','stat_izin_lainnya',$this->integer());
        $this->addColumn('tb_m_anggota','stat_skp',$this->integer());
        $this->addColumn('tb_m_anggota','stat_haccp',$this->integer());
        $this->addColumn('tb_m_anggota','stat_pirt',$this->integer());
        $this->addColumn('tb_m_anggota','stat_sni',$this->integer());
        $this->addColumn('tb_m_anggota','stat_sertifikat_lainnya',$this->integer());
        $this->addColumn('tb_m_anggota','tahun_berdiri',$this->integer());
        $this->addColumn('tb_m_anggota','jenis_usaha',"enum('PEMINDANGAN','PENGERINGAN','PEMBEKUAN','FERMENTASI','PENGASAPAN','PENGOLAH LAINYA')");
        $this->addColumn('tb_m_anggota','jenis_bahan_baku',$this->string());
        $this->addColumn('tb_m_anggota','asal_bahan_baku',$this->string());
        $this->addColumn('tb_m_anggota','jumlah_bahan_baku_bulanan',$this->decimal(19,4));
        $this->addColumn('tb_m_anggota','jumlah_produksi_bulanan',$this->decimal(19,4));
        $this->addColumn('tb_m_anggota','kapasitas_produksi_bulanan',$this->decimal(19,4));
        $this->addColumn('tb_m_anggota','pendapatan_bulanan',$this->decimal(19,4));
        $this->addColumn('tb_m_anggota','nilai_aset',$this->decimal(19,4));
        $this->addColumn('tb_m_anggota','sarana_prasarana',$this->text());
        $this->addColumn('tb_m_anggota','jumlah_tenaga_kerja',$this->integer());
        
        $this->addColumn('tb_m_anggota','daerah_pemasaran',$this->text());
        
        
       
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180329_053518_alter_anggota_pengolah cannot be reverted.\n";

     //   return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180329_053518_alter_anggota_pengolah cannot be reverted.\n";

        return false;
    }
    */
}

<?php

use yii\db\Migration;

/**
 * Class m180702_050131_create_dt_budidaya.
 */
class m180702_050131_create_dt_budidaya extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(
            'tb_d_anggota_tebar',
            [
                'id_anggota' => $this->integer()->notNull(),
                'id_d_anggota' => $this->primaryKey(),
                'bulan_tebar' => $this->string()->notNull(),
                'tahun_tebar' => $this->integer()->notNull(),
                'minggu_tebar' => $this->integer()->notNull(),
                'komoditas' => $this->string()->notNull(),
                'qty' => $this->decimal(19, 4)->notNull(),
                'created_at' => $this->datetime(),
                'updated_at' => $this->datetime(),
            ]
        );

        $this->addForeignKey(
            'fk-anggotatebar',
            'tb_d_anggota_tebar',
            'id_anggota',
            'tb_m_anggota',
            'id_anggota',
            'CASCADE',
            'CASCADE'
        );

        $this->createTable(
            'tb_d_anggota_produksi',
            [
                'id_anggota' => $this->integer()->notNull(),
                'id_d_anggota' => $this->primaryKey(),
                'bulan_produksi' => $this->string()->notNull(),
                'tahun_produksi' => $this->integer()->notNull(),
                'minggu_produksi' => $this->integer()->notNull(),
                'komoditas' => $this->string()->notNull(),
                'qty' => $this->decimal(19, 4)->notNull(),
                'created_at' => $this->datetime(),
                'updated_at' => $this->datetime(),
            ]
        );

        $this->addForeignKey(
            'fk-anggotaproduksi',
            'tb_d_anggota_produksi',
            'id_anggota',
            'tb_m_anggota',
            'id_anggota',
            'CASCADE',
            'CASCADE'
        );

        $this->createTable(
            'tb_d_anggota_pakan',
            [
                'id_anggota' => $this->integer()->notNull(),
                'id_d_anggota' => $this->primaryKey(),
                'bulan_pakan' => $this->string()->notNull(),
                'tahun_pakan' => $this->integer()->notNull(),
                'minggu_pakan' => $this->integer()->notNull(),
                'komoditas' => $this->string()->notNull(),
                'qty' => $this->decimal(19, 4)->notNull(),
                'created_at' => $this->datetime(),
                'updated_at' => $this->datetime(),
            ]
        );

        $this->addForeignKey(
            'fk-anggotapakan',
            'tb_d_anggota_pakan',
            'id_anggota',
            'tb_m_anggota',
            'id_anggota',
            'CASCADE',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180702_050131_create_dt_budidaya cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180702_050131_create_dt_budidaya cannot be reverted.\n";

        return false;
    }
    */
}

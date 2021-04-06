<?php

use yii\db\Migration;

/**
 * Class m210405_100525_tabel_pemesanan
 */
class m210405_100525_tabel_pemesanan extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%pemesanan}}', [
            'id' => $this->primaryKey(),
            'nama' => $this->string(),
            'no_telp' => $this->string(),
            'lokasi_jemput' => $this->string(),
            'jarak' => $this->string(),
            'harga' => $this->string(),
            'created_at'    => $this->integer(),
            'updated_at'    => $this->integer()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210405_100525_tabel_pemesanan cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210405_100525_tabel_pemesanan cannot be reverted.\n";

        return false;
    }
    */
}

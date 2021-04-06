<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "pemesanan".
 *
 * @property int $id
 * @property string|null $nama
 * @property string|null $no_telp
 * @property string|null $lokasi_jemput
 * @property string|null $jarak
 * @property string|null $harga
 * @property int|null $created_at
 * @property int|null $updated_at
 */
class Pemesanan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at'],
                    // ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                // if you're using datetime instead of UNIX timestamp:
                // 'value' => new Expression('NOW()'),
            ],
        ];
    }

    public static function tableName()
    {
        return 'pemesanan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at'], 'default', 'value' => null],
            [['created_at', 'updated_at'], 'integer'],
            [['nama', 'no_telp', 'lokasi_jemput', 'jarak', 'harga'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
            'no_telp' => 'No Telp',
            'lokasi_jemput' => 'Lokasi Jemput',
            'jarak' => 'Jarak',
            'harga' => 'Harga',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}

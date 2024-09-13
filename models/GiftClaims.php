<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gift_claims".
 *
 * @property int $gift_claim_id
 * @property string $first_name
 * @property string|null $last_name
 * @property string $email
 * @property string $phone
 * @property string $address_line_1
 * @property string|null $address_line_2
 * @property string $landmark
 * @property string $city
 * @property string $item_code
 * @property string|null $purchase_date
 * @property string $purchase_place
 * @property string $invoice_file
 * @property int $is_deleted
 * @property int $is_contacted
 * @property int $is_processed
 * @property string $created_at
 */
class GiftClaims extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gift_claims';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['first_name', 'email', 'phone', 'city', 'item_code', 'purchase_place', 'created_at'], 'required'],
            [['purchase_date', 'created_at', 'invoice_file'], 'safe'],
            [['is_deleted', 'is_contacted', 'is_processed'], 'integer'],
            [['first_name', 'last_name', 'email', 'phone', 'address_line_1', 'address_line_2', 'landmark', 'city', 'item_code', 'purchase_place'], 'string', 'max' => 100],
            [['invoice_file'], 'file'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'gift_claim_id' => 'Gift Claim ID',
            'first_name' => Yii::t('yii', 'First Name'),
            'last_name' => Yii::t('yii', 'Last Name'),
            'email' => Yii::t('yii', 'Email'),
            'phone' => Yii::t('yii', 'Phone'),
            'address_line_1' => Yii::t('yii', 'Address Line 1'),
            'address_line_2' => Yii::t('yii', 'Address Line 2'),
            'landmark' => Yii::t('yii', 'Landmark'),
            'city' => Yii::t('yii', 'City'),
            'item_code' => Yii::t('yii', 'Gift Code'),
            'purchase_date' => Yii::t('yii', 'Purchase Date'),
            'purchase_place' => Yii::t('yii', 'Purchase Place'),
            'invoice_file' => Yii::t('yii', 'Upload Invoice/Proof of Purchase'),
            'is_deleted' => 'Is Deleted',
            'is_contacted' => 'Is Contacted',
            'is_processed' => 'Is Processed',
            'created_at' => 'Created At',
        ];
    }
}

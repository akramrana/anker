<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "items".
 *
 * @property int $item_id
 * @property string $name_en
 * @property string $name_ar
 * @property int $remaining_qty
 * @property string $created_at
 * @property string $updated_at
 * @property int $is_active
 * @property int $is_deleted
 */
class Items extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'items';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['name_en', 'name_ar', 'remaining_qty', 'created_at', 'updated_at', 'sku'], 'required'],
            [['remaining_qty', 'is_active', 'is_deleted', 'is_store_pickup'], 'integer'],
            [['created_at', 'updated_at', 'sku', 'is_store_pickup'], 'safe'],
            [['name_en', 'name_ar'], 'string', 'max' => 100],
            ['sku', 'checkUniqueSku'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'item_id' => 'Item ID',
            'name_en' => 'Name in English',
            'name_ar' => 'Name in Arabic',
            'remaining_qty' => 'Remaining Qty',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'is_active' => 'Status',
            'is_deleted' => 'Is Deleted',
            'sku' => 'SKU',
            'is_store_pickup' => 'Is Store Pickup ?',
        ];
    }
    
    public function checkUniqueSku($attribute, $params) {
        $query = Items::find()
                ->where(['sku' => $this->sku, 'is_deleted' => 0]);
        if (isset($this->item_id) && $this->item_id != "") {
            $query->andWhere(['<>', 'item_id', $this->item_id]);
        }
        $model = $query->one();
        if (!empty($model)) {
            $this->addError($attribute, Yii::t('app', 'This code has already been taken.'));
        }
    }
}

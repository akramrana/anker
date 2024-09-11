<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "login_codes".
 *
 * @property int $login_code_id
 * @property string $code
 * @property string $created_at
 * @property string $updated_at
 * @property string|null $used_at
 * @property int $used
 * @property int $is_active
 * @property int $is_deleted
 */
class LoginCodes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'login_codes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code', 'created_at', 'updated_at'], 'required'],
            [['created_at', 'updated_at', 'used_at'], 'safe'],
            [['used', 'is_active', 'is_deleted'], 'integer'],
            [['code'], 'string', 'max' => 100],
            ['code', 'checkUniqueCode'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'login_code_id' => 'Login Code ID',
            'code' => Yii::t('yii', 'Login Code'),
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'used_at' => 'Used At',
            'used' => 'Used',
            'is_active' => 'Status',
            'is_deleted' => 'Is Deleted',
        ];
    }
    
    public function checkUniqueCode($attribute, $params) {
        $query = LoginCodes::find()
                ->where(['code' => $this->code, 'is_deleted' => 0]);
        if (isset($this->login_code_id) && $this->login_code_id != "") {
            $query->andWhere(['<>', 'login_code_id', $this->login_code_id]);
        }
        $model = $query->one();
        if (!empty($model)) {
            $this->addError($attribute, Yii::t('app', 'This code has already been taken.'));
        }
    }
}

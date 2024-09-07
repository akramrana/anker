<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "admins".
 *
 * @property int $admin_id
 * @property string|null $name
 * @property string|null $email
 * @property string|null $phone
 * @property string|null $password
 * @property string|null $image
 * @property int|null $is_active
 * @property int|null $is_deleted
 * @property string|null $admin_type
 */
class Admins extends \yii\db\ActiveRecord
{

    public $password_hash;

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'admins';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['name', 'email', 'phone'], 'required'],
            [['is_active', 'is_deleted'], 'integer'],
            [['admin_type'], 'string'],
            [['name', 'password', 'image'], 'string', 'max' => 255],
            [['email'], 'string', 'max' => 50],
            ['email', 'email'],
            ['email', 'checkUniqueEmail'],
            [['phone'], 'string', 'max' => 15],
            [['password_hash'], 'required', 'on' => 'create'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'admin_id' => 'Admin ID',
            'name' => 'Name',
            'email' => 'Email',
            'phone' => 'Phone',
            'password' => 'Password',
            'password_hash' => 'Password',
            'image' => 'Image',
            'is_active' => 'Status',
            'is_deleted' => 'Is Deleted',
            'admin_type' => 'Admin Type',
        ];
    }

    public function checkUniqueEmail($attribute, $params) {
        $query = Admins::find()
                ->where(['email' => $this->email, 'is_deleted' => 0]);
        if (isset($this->admin_id) && $this->admin_id != "") {
            $query->andWhere(['<>', 'admin_id', $this->admin_id]);
        }
        $model = $query->one();
        if (!empty($model)) {
            $this->addError($attribute, Yii::t('app', 'This email has already been taken.'));
        }
    }
}

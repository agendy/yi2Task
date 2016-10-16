<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%user}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $mobile
 * @property integer $gender
 * @property string $created_at
 * @property string $updated_at
 */
class User extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return '{{%user}}';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['name', 'username', 'email', 'mobile', 'gender'], 'required'],
            [ 'password', 'required','on'=>'insert'],
            [['name', 'username', 'email', 'mobile', 'gender'], 'trim'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'username', 'email'], 'string', 'max' => 255],
            ['password', 'string', 'max' => 15],
            ['password', 'string', 'min' => 8],
            [['email'], 'unique'],
            ['email', 'email'],
            [['username'], 'unique'],
            [['name'], 'match', 'pattern' => '/^[a-zA-Z ]+$/i', 'message' => Yii::t('app', 'only characters and spaces are allowed')],
            [['username'], 'match', 'pattern' => '/^[a-zA-Z0-9_-]+$/i', 'message' => Yii::t('app', 'only characters and numerber plus _- are allowed')],
            [['mobile'], 'match', 'pattern' => '/^(010|012|011)(\d{8})$/i', 'message' => Yii::t('app', 'Egyptian Mobile Numbers are only available')],
            [['password'], 'match', 'pattern' => '/^([a-zA-Z0-9@*#]{8,15})$/i', 'message' => Yii::t('app', "charcters, numbers and @*# only are available")],
            [['gender'], 'match', 'pattern' => '/^(0|1)$/i', 'message' => Yii::t('app', "plz, don't change code")],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'username' => Yii::t('app', 'Username'),
            'password' => Yii::t('app', 'Password'),
            'email' => Yii::t('app', 'Email'),
            'mobile' => Yii::t('app', 'Mobile'),
            'gender' => Yii::t('app', 'Gender'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @inheritdoc
     * @return UserQuery the active query used by this AR class.
     */
    public static function find() {
        return new UserQuery(get_called_class());
    }

}

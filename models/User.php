<?php

namespace app\models;
use yii\web\IdentityInterface;
use yii\db\ActiveRecord;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id_user
 * @property string $login
 * @property string $name
 * @property string $surname
 * @property string $email
 * @property string $password
 * @property int $role
 *
 * @property Projects[] $projects
 */
class User extends ActiveRecord implements IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['login', 'name', 'surname', 'email', 'password'], 'required'],
            [['role'], 'integer'],
            [['login', 'name', 'surname', 'email', 'password'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_user' => 'ID',
            'login' => 'Логин',
            'name' => 'Имя',
            'surname' => 'Фамилия',
            'email' => 'Email',
            'password' => 'Пароль',
            'role' => 'Роль',
        ];
    }

    /**
     * Gets query for [[Projects]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProjects()
    {
        return $this->hasMany(Projects::class, ['user_id' => 'id_user']);
    }

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    /**
     * Finds user by login
     *
     * @param string $login
     * @return static|null
     */
    public static function findByLogin($login)
    {
        return self::find()->where(['login' => $login])->one();
    }

    /**
    * Finds user by email
    *
    * @param string $email
    * @return static|null
     */
    public static function findByEmail($email)
    {
        return self::find()->where(['email' => $email]->one());
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id_user;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }
}

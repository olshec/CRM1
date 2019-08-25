<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "User".
 *
 * @property int $id
 * @property string $login
 * @property string $email
 * @property string $password
 * @property int $isAdmin
 * @property resource $photo
 * @property string $name
 */
class User extends \yii\db\ActiveRecord  implements \yii\web\IdentityInterface
{
    public $authKey;
    public $username;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'User';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['login', 'email', 'password', 'isAdmin', 'name'], 'required'],
            [['isAdmin'], 'integer'],
            [['photo'], 'string'],
            [['login', 'email', 'password', 'name'], 'string', 'max' => 45],
            [['login'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'login' => 'Login',
            'email' => 'Email',
            'password' => 'Password',
            'isAdmin' => 'Is Admin',
            'photo' => 'Photo',
            'name' => 'Name',
        ];
    }



    public static function findByUsername($username)
    {
        $user = self::find()
            ->where([
                "login" => $username
            ])
            ->one();
        
        return new static($user);
    }

    public function validatePassword($password)
    {
        return $this->password === $password;
    }

    public static function findIdentity($id)
    {
         $user = User::findOne($id);
         return $user;
        //return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
    }

      /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }


    public static function findIdentityByAccessToken($token, $type = null)
    {
        foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }

        return null;
        //throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');

    }

}

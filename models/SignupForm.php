<?php
namespace app\models;
use Yii;
use yii\base\Model;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $login;
    public $email;
    public $phone;
    public $password;
    public $currency_id;
    public $city_id;
    public $photo_url;

//    public function behaviors()
//    {
//        return [
//            [
//                'class' => TimestampBehavior::class,
//                'createdAtAttribute' => 'created_at',
//                'updatedAtAttribute' => 'updated_at',
//                'value' => new Expression('NOW()'),
//            ],
//        ];
//    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['login', 'trim'],
            ['login', 'required'],
            ['login', 'unique', 'targetClass' => '\app\models\User', 'message' => 'Этот логин уже занят.'],
            ['login', 'string', 'min' => 2, 'max' => 255],
            ['email', 'trim'],
            [['created_at', 'updated_at'], 'safe'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\app\models\User', 'message' => 'Этот адрес электронной почты уже занят.'],

            ['phone', 'trim'],
            ['phone', 'required'],
            ['phone', 'string', 'max' => 255],
            ['phone', 'unique', 'targetClass' => '\app\models\User', 'message' => 'Этот номер телефона уже занят.'],

            ['city_id', 'required'],
            ['currency_id', 'required'],

            ['city_id', 'integer'],
            ['currency_id', 'integer'],




            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }

//    public function rules()
//    {
//        return [
//            ['nick', 'trim'],
//            ['nick', 'required'],
//            ['nick', 'unique', 'targetClass' => '\app\models\User', 'message' => 'This nick has already been taken.'],
//            ['nick', 'string', 'min' => 2, 'max' => 255],
//            ['email', 'trim'],
//            ['email', 'required'],
//            ['email', 'email'],
//            ['email', 'string', 'max' => 255],
//            ['email', 'unique', 'targetClass' => '\app\models\User', 'message' => 'This email address has already been taken.'],
//
//            ['phone', 'trim'],
//            ['phone', 'required'],
//            ['phone', 'string', 'max' => 255],
//            ['phone', 'unique', 'targetClass' => '\app\models\User', 'message' => 'This phone has already been taken.'],
//
//            ['password', 'required'],
//            ['password', 'string', 'min' => 6],
//        ];
//    }











/**
 * Signs user up.
 *
 * @return User|null the saved model or null if saving fails
 */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        $user = new User();
        $user->login = $this->login;
        $user->email = $this->email;
        $user->phone = $this->phone;
        $user->city_id = $this->city_id;
        $user->currency_id = $this->currency_id;
        $user->setPassword($this->password);
        $user->generateAuthKey();
//        var_dump($user);
        return $user->save() ? $user : null;
    }
}

//public function signUp(): ?User
//{
//    $user = new User();
//
//    $user->login = $this->login;
//    $user->first_name = $this->first_name;
//    $user->last_name = $this->last_name;
//    $user->phone = $this->phone;
//    $user->sex_id = $this->sex_id;
//    $user->city_id = $this->city_id;
//    $user->mail = $this->mail;
//    $user->date_of_birth = $this->date_of_birth;
//    $user->photo_url = $this->photo_url;
//    $user->password_hash = $this->password;
//    $user->setPassword($this->password);
//
//    var_dump($user);
//
//    return $user->save() ? $user : null;
//}
//}
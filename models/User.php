<?php

namespace app\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $login
 * @property string $auth_key
 * @property string $password_hash
 * @property string|null $password_reset_token
 * @property int $city_id
 * @property int $currency_id
 * @property int $cart_id
 * @property string $email
 * @property string $phone
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Card[] $cards
 * @property Cart $cart
 * @property City $city
 * @property Currency $currency
 * @property OrderPlace[] $orderPlaces
 * @property UserHasOrder[] $userHasOrders
 * @property UserProfile $userProfile
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user}}';
    }


    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['login', 'password_hash', 'city_id', 'currency_id', 'email', 'phone'], 'required'],
            [['city_id', 'currency_id', 'cart_id'], 'integer'],
            [['login', 'password_hash', 'password_reset_token', 'email'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['phone'], 'string', 'max' => 15],
            [['login'], 'unique'],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique'],
            [['city_id'], 'exist', 'skipOnError' => true, 'targetClass' => City::class, 'targetAttribute' => ['city_id' => 'id']],
            [['cart_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cart::class, 'targetAttribute' => ['cart_id' => 'id']],
            [['currency_id'], 'exist', 'skipOnError' => true, 'targetClass' => Currency::class, 'targetAttribute' => ['currency_id' => 'id']],
            ['status', 'default', 'value' => self::STATUS_ACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_DELETED]],
        ];
    }

//return [
//[['nick', 'email', 'phone', 'password_hash'], 'required'],
//[['nick', 'phone', 'password_hash'], 'string', 'max' => 80],
//[['email'], 'string', 'max' => 256],
//[['created_at'], 'safe'],
//    //[['photo'], 'string', 'max' => 255],
//[['nick'], 'unique'],
//['status', 'default', 'value' => self::STATUS_ACTIVE],
//['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_DELETED]],
//];
//
//}


    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'login' => 'Login',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'city_id' => 'City ID',
            'currency_id' => 'Currency ID',
            'cart_id' => 'Cart ID',
            'email' => 'Email',
            'phone' => 'Phone',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }




    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
        //return self::findOne(['id'=>$id]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
//        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
        foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }

        return null;
    }


    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($login)
    {
//        return static::findOne(['login' => $login, 'status' => self::STATUS_ACTIVE]);
        return self::findOne(['login' => $login]);
    }

//    public static function findByUsername($nick)
//    {
//        // VarDumper::dump(self::findOne(['nick' => $nick]));
//        return self::findOne(['nick' => $nick]);
//
//    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }


    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }


    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
    * @return bool if password provided is valid for current user
    */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }


    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    static function  getUser($id){
        return self::find()->where(['id' => $id])->all();


    }


    /**
     * Gets query for [[Cards]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCards()
    {
        return $this->hasMany(Card::class, ['user_id' => 'id']);
    }

    /**
     * Gets query for [[Cart]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCart()
    {
        return $this->hasOne(Cart::class, ['id' => 'cart_id']);
    }

    /**
     * Gets query for [[City]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCity()
    {
        return $this->hasOne(City::class, ['id' => 'city_id']);
    }

    /**
     * Gets query for [[Currency]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCurrency()
    {
        return $this->hasOne(Currency::class, ['id' => 'currency_id']);
    }

    /**
     * Gets query for [[OrderPlaces]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderPlaces()
    {
        return $this->hasMany(OrderPlace::class, ['user_id' => 'id']);
    }

    /**
     * Gets query for [[UserHasOrders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserHasOrders()
    {
        return $this->hasMany(UserHasOrder::class, ['user_id' => 'id']);
    }

    /**
     * Gets query for [[UserProfile]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserProfile()
    {
        return $this->hasOne(UserProfile::class, ['user_id' => 'id']);
    }
}

<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order_place".
 *
 * @property int $id
 * @property int $city_id
 * @property string $street
 * @property int $house
 * @property int $flat
 * @property string $description
 * @property int $user_id
 *
 * @property City $city
 * @property User $user
 * @property UserOrder[] $userOrders
 */
class OrderPlace extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order_place';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['city_id', 'street', 'house', 'flat', 'description', 'user_id'], 'required'],
            [['city_id', 'house', 'flat', 'user_id'], 'integer'],
            [['description'], 'string'],
            [['street'], 'string', 'max' => 100],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
            [['city_id'], 'exist', 'skipOnError' => true, 'targetClass' => City::class, 'targetAttribute' => ['city_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'city_id' => 'City ID',
            'street' => 'Street',
            'house' => 'House',
            'flat' => 'Flat',
            'description' => 'Description',
            'user_id' => 'User ID',
        ];
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
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    /**
     * Gets query for [[UserOrders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserOrders()
    {
        return $this->hasMany(UserOrder::class, ['order_place_id' => 'id']);
    }
}

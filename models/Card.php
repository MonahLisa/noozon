<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "card".
 *
 * @property int $id
 * @property int $number
 * @property string $expiry_date
 * @property string $owner_name
 * @property int $is_default
 * @property int $user_id
 *
 * @property User $user
 * @property UserOrder[] $userOrders
 */
class Card extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'card';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['number', 'expiry_date', 'owner_name', 'is_default', 'user_id'], 'required'],
            [['number', 'is_default', 'user_id'], 'integer'],
            [['expiry_date'], 'safe'],
            [['owner_name'], 'string', 'max' => 40],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'number' => 'Number',
            'expiry_date' => 'Expiry Date',
            'owner_name' => 'Owner Name',
            'is_default' => 'Is Default',
            'user_id' => 'User ID',
        ];
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
        return $this->hasMany(UserOrder::class, ['card_id' => 'id']);
    }
}

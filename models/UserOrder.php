<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_order".
 *
 * @property int $id
 * @property int $delivery_type_id
 * @property float $total_cost
 * @property int $total_discount
 * @property int $order_place_id
 * @property int $card_id
 * @property string $created_at
 * @property int $is_delivered
 *
 * @property Card $card
 * @property DeliveryType $deliveryType
 * @property OrderPlace $orderPlace
 * @property UserHasOrder[] $userHasOrders
 */
class UserOrder extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['delivery_type_id', 'total_cost', 'total_discount', 'order_place_id', 'card_id', 'created_at', 'is_delivered'], 'required'],
            [['delivery_type_id', 'total_discount', 'order_place_id', 'card_id', 'is_delivered'], 'integer'],
            [['total_cost'], 'number'],
            [['created_at'], 'safe'],
            [['delivery_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => DeliveryType::class, 'targetAttribute' => ['delivery_type_id' => 'id']],
            [['card_id'], 'exist', 'skipOnError' => true, 'targetClass' => Card::class, 'targetAttribute' => ['card_id' => 'id']],
            [['order_place_id'], 'exist', 'skipOnError' => true, 'targetClass' => OrderPlace::class, 'targetAttribute' => ['order_place_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'delivery_type_id' => 'Delivery Type ID',
            'total_cost' => 'Total Cost',
            'total_discount' => 'Total Discount',
            'order_place_id' => 'Order Place ID',
            'card_id' => 'Card ID',
            'created_at' => 'Created At',
            'is_delivered' => 'Is Delivered',
        ];
    }

    /**
     * Gets query for [[Card]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCard()
    {
        return $this->hasOne(Card::class, ['id' => 'card_id']);
    }

    /**
     * Gets query for [[DeliveryType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDeliveryType()
    {
        return $this->hasOne(DeliveryType::class, ['id' => 'delivery_type_id']);
    }

    /**
     * Gets query for [[OrderPlace]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderPlace()
    {
        return $this->hasOne(OrderPlace::class, ['id' => 'order_place_id']);
    }

    /**
     * Gets query for [[UserHasOrders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserHasOrders()
    {
        return $this->hasMany(UserHasOrder::class, ['order_id' => 'id']);
    }
}

<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "favourite_has_product".
 *
 * @property int $favourite_id
 * @property int $product_id
 *
 * @property Favourite $favourite
 * @property Product $product
 */
class FavouriteHasProduct extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'favourite_has_product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
//            [['favourite_id', 'product_id'], 'required'],
            [['favourite_id', 'product_id'], 'integer'],
            [['favourite_id'], 'exist', 'skipOnError' => true, 'targetClass' => Favourite::class, 'targetAttribute' => ['favourite_id' => 'user_id']],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::class, 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'favourite_id' => 'Favourite ID',
            'product_id' => 'Product ID',
        ];
    }

    /**
     * Gets query for [[Favourite]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFavourite()
    {
        return $this->hasOne(Favourite::class, ['user_id' => 'favourite_id']);
    }

    /**
     * Gets query for [[Product]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::class, ['id' => 'product_id']);
    }
}

<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product_media".
 *
 * @property int $id
 * @property int $media_type_id
 * @property string $url
 * @property int $product_id
 *
 * @property MediaType $mediaType
 * @property Product $product
 */
class ProductMedia extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product_media';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['media_type_id', 'url', 'product_id'], 'required'],
            [['media_type_id', 'product_id'], 'integer'],
            [['url'], 'string', 'max' => 2000],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::class, 'targetAttribute' => ['product_id' => 'id']],
            [['media_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => MediaType::class, 'targetAttribute' => ['media_type_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'media_type_id' => 'Media Type ID',
            'url' => 'Url',
            'product_id' => 'Product ID',
        ];
    }

    /**
     * Gets query for [[MediaType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMediaType()
    {
        return $this->hasOne(MediaType::class, ['id' => 'media_type_id']);
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

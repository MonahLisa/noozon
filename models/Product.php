<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $discount
 * @property int $is_discounted
 * @property string $specifications
 * @property string $way_to_use
 * @property float $rating
 * @property int $company_id
 * @property string $created_at
 * @property string $updated_at
 * @property int $created_by
 * @property float $price
 * @property float $new_price
 * @property int $category_id
 *
 * @property CartHasProduct[] $cartHasProducts
 * @property Category $category
 * @property Company $company
 * @property FavouriteProduct[] $favouriteProducts
 * @property Feedback[] $feedbacks
 * @property ProductMedia[] $productMedia
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }
    public function behaviors()
    {
        return [
            [
                'class' => BlameableBehavior::class,
                'createdByAttribute' => 'created_by',
                'updatedByAttribute' => false,

            ],
            [
                'class' => TimestampBehavior::class,
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new Expression('NOW()'),
            ],
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
                [['name', 'description', 'is_discounted', 'company_id', 'price', 'category_id'], 'required'],
            [['description', 'specifications', 'way_to_use'], 'string'],
            [['discount', 'is_discounted', 'company_id', 'created_by', 'category_id'], 'integer'],
            [['rating', 'price', 'new_price'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 100],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['category_id' => 'id']],
            [['company_id'], 'exist', 'skipOnError' => true, 'targetClass' => Company::class, 'targetAttribute' => ['company_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '????????????????',
            'description' => '????????????????',
            'discount' => '????????????',
            'is_discounted' => '???????? ???? ????????????',
            'specifications' => '?????????????????????? ????????????????????????????',
            'way_to_use' => '???????????? ????????????????????',
            'rating' => '??????????????',
            'company_id' => 'ID ????????????????',
            'created_at' => '??????????????',
            'updated_at' => '??????????????????',
            'created_by' => '?????? ??????????????',
            'price' => '????????',
            'new_price' => '?????????? ????????',
            'category_id' => 'ID ??????????????????',
        ];
    }

    /**
     * Gets query for [[CartHasProducts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCartHasProducts()
    {
        return $this->hasMany(CartHasProduct::class, ['product_id' => 'id']);
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }

    /**
     * Gets query for [[Company]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCompany()
    {
        return $this->hasOne(Company::class, ['id' => 'company_id']);
    }

    /**
     * Gets query for [[CreatedBy]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::class, ['id' => 'created_by']);
    }

    /**
     * Gets query for [[FavouriteProducts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFavouriteProducts()
    {
        return $this->hasMany(FavouriteProduct::class, ['product_id' => 'id']);
    }

    /**
     * Gets query for [[Feedbacks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFeedbacks()
    {
        return $this->hasMany(Feedback::class, ['product_id' => 'id']);
    }

    /**
     * Gets query for [[ProductMedia]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductMedia()
    {
        return $this->hasMany(ProductMedia::class, ['product_id' => 'id']);
    }
}

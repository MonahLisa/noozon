<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "feedback".
 *
 * @property int $id
 * @property string $advantages
 * @property string $disadvantages
 * @property string $description
 * @property int $evalutation
 * @property string $status
 * @property int $likes
 * @property int $dislikes
 * @property string $created_at
 * @property string $updated_at
 * @property int $created_by
 * @property int $product_id
 *
 * @property FeedbackMedia[] $feedbackMedia
 * @property Product $product
 */
class Feedback extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'feedback';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['advantages', 'disadvantages', 'description', 'evalutation', 'status', 'likes', 'dislikes', 'created_at', 'updated_at', 'created_by', 'product_id'], 'required'],
            [['advantages', 'disadvantages', 'description', 'status'], 'string'],
            [['evalutation', 'likes', 'dislikes', 'created_by', 'product_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::class, 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'advantages' => 'Плюсы',
            'disadvantages' => 'Минусы',
            'description' => 'Описание',
            'evalutation' => 'Оценка',
            'status' => 'Статус',
            'likes' => 'Лайки',
            'dislikes' => 'Дизлайки',
            'created_at' => 'Создано',
            'updated_at' => 'Обновлено',
            'created_by' => 'Кем создано',
            'product_id' => 'ID продукта',
        ];
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
     * Gets query for [[FeedbackMedia]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFeedbackMedia()
    {
        return $this->hasMany(FeedbackMedia::class, ['feedback_id' => 'id']);
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

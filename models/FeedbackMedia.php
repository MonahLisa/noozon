<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "feedback_media".
 *
 * @property int $id
 * @property int $media_type_id
 * @property string $url
 * @property int $feedback_id
 *
 * @property Feedback $feedback
 * @property MediaType $mediaType
 */
class FeedbackMedia extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'feedback_media';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['media_type_id', 'url', 'feedback_id'], 'required'],
            [['media_type_id', 'feedback_id'], 'integer'],
            [['url'], 'string', 'max' => 2000],
            [['feedback_id'], 'exist', 'skipOnError' => true, 'targetClass' => Feedback::class, 'targetAttribute' => ['feedback_id' => 'id']],
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
            'feedback_id' => 'Feedback ID',
        ];
    }

    /**
     * Gets query for [[Feedback]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFeedback()
    {
        return $this->hasOne(Feedback::class, ['id' => 'feedback_id']);
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
}

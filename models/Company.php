<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "company".
 *
 * @property int $id
 * @property string $name
 * @property int $tax_number
 * @property string $photo
 * @property string $created_at
 * @property string $updated_at
 * @property int $created_by
 * @property int $manager_list_id
 *
 * @property ManagerList $managerList
 * @property Product[] $products
 */
class Company extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'company';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'tax_number', 'photo', 'created_at', 'updated_at', 'created_by', 'manager_list_id'], 'required'],
            [['tax_number', 'created_by', 'manager_list_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 255],
            [['photo'], 'string', 'max' => 2000],
            [['manager_list_id'], 'exist', 'skipOnError' => true, 'targetClass' => ManagerList::class, 'targetAttribute' => ['manager_list_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'tax_number' => 'Tax Number',
            'photo' => 'Photo',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'manager_list_id' => 'Manager List ID',
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
     * Gets query for [[ManagerList]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getManagerList()
    {
        return $this->hasOne(ManagerList::class, ['id' => 'manager_list_id']);
    }

    /**
     * Gets query for [[Products]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::class, ['company_id' => 'id']);
    }
}

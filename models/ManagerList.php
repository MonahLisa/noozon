<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "manager_list".
 *
 * @property int $id
 * @property int $manager_id
 *
 * @property Company[] $companies
 */
class ManagerList extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'manager_list';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['manager_id'], 'required'],
            [[ 'manager_id'], 'integer'],
            [['manager_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['manager_id' => 'id']],
        ];

    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'manager_id' => 'ID менеджера',
        ];
    }

    /**
     * Gets query for [[Companies]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCompanies()
    {
        return $this->hasMany(Company::class, ['manager_list_id' => 'id']);
    }

    /**
     * Gets query for [[Manager]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getManager()
    {
//        $userRole = Yii::$app->authManager->getRole('manager');
//        Yii::$app->authManager->assign($userRole, \Yii::$app->user->id);
        return $this->hasOne(User::class, ['id' => 'manager_id']);
    }

    public function createManager()
    {
        if (!$this->validate()) {
            return null;
        }
        $manager = $this->hasOne(User::class, ['id' => 'manager_id']);
        $manager->manager_id = $this->manager_id;
        return $manager->save() ? $manager : null;
    }

//    public function signup()
//    {
//        if (!$this->validate()) {
//            return null;
//        }
//        $user = new User();
//        $user->login = $this->login;
//        $user->email = $this->email;
//        $user->phone = $this->phone;
//        $user->city_id = $this->city_id;
//        $user->currency_id = $this->currency_id;
//        $user->setPassword($this->password);
//        $user->generateAuthKey();
//        return $user->save() ? $user : null;
//    }

}

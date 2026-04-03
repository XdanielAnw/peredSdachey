<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cook_time".
 *
 * @property int $id
 * @property string $hours
 *
 * @property Application[] $applications
 */
class CookTime extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cook_time';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['hours'], 'required'],
            [['hours'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'hours' => 'Hours',
        ];
    }

    /**
     * Gets query for [[Appliications]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAppliications()
    {
        return $this->hasMany(Application::class, ['cook_time_id' => 'id']);
    }

    public static function getCookTime()
    {
        return static::find()
            ->select('title')
            ->indexBy('id')
            ->column();
    }

}

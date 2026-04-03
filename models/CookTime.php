<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cook_time".
 *
 * @property int $id
 * @property string $hours
 *
 * @property Appliication[] $appliications
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
        return $this->hasMany(Appliication::class, ['cook_time_id' => 'id']);
    }

}
